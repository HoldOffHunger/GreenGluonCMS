/* Font Wars Game Code
Copyright 2011, Oran Looney
MIT License, see README
*/

/* Font Wars Sound Library
Copyright 2011, Oran Looney
MIT License, see README
*/

var sound = {
	fx: {
		sounds: {},
		multi: 3,
		masterVolume: 1.0,

		load: function(label, resource, volume, multi) {
			if ( volume === undefined ) volume = 1.0;
			if ( multi === undefined ) multi = this.multi;
			var channels = [];
			channels.volume = volume;
			this.sounds[label] = channels;
			for ( var i=0; i<multi; i++ ) {
				var audio = new Audio(resource);
				channels.push(audio);
				// *force* the audio to load.
				audio.volume = 0;
				audio.play(); 
			}
			return this;
		},

		_each: function(label, fn) {
			var channels = this.sounds[label];
			if ( !channels ) throw Error("no \"" + label + "\" sound effect!");
			for ( var i=0; i < channels.length; i++ ) {
				var done = fn.call(this, channels[i], i, channels);
				if ( done ) return this;
			}
			return this;
		},
		
		// play a short sound effect immediately
		play: function(label, volume) { 
			return this._each(label, function(audio, i, channels) {
				if( audio.ended == true || audio.currentTime == 0 ) {
					if ( this.muted ) {
						audio.volume = 0;
					} else {
						if ( volume === undefined ) volume = channels.volume;
						audio.volume = this.masterVolume * volume;
					}
					audio.currentTime = 0;
					audio.play();
					return true;
				}
			});
		},

		muted: false,
		mute: function() {
			this.muted = true;
			for ( var label in this.sounds ) {
				this._each(label, function(audio) {
					audio.volume = 0;
				});
			}
		},
		unmute: function() {
			this.muted = false;
		}
	},

	// man, this is way too complicated.  All I wanted was to be
	// able to fade music in and out, and cancel it at any point;
	// how did I end up with this?
	music: {
		masterVolume: 0.5,
		tracks: {},
		timeouts: [],
		current: undefined,

		load: function(label, resource) {
			this.tracks[label] = new Audio(resource);
			return this;
		},

		stop: function() {
			for ( var i=0; i < this.timeouts.length; i++ ) {
				clearTimeout(this.timeouts[i]);
			}
			this.timeouts = [];
			if ( !this.current ) return this;
			this.current.pause();
			this.current.currentTime = 0;
			delete this.current;
			return this;
		},

		_timeout: function(duration, fn) {
			var music = this;
			this.timeouts.push(setTimeout(function() {
				fn.call(music);
			}, duration));
			return this;
		},

		_start: function(label, volume) {
			var audio = this.tracks[label];
			if ( !audio ) throw Error("no music track \"" + label + "\"");
			this.current = audio;
			if ( volume === undefined ) volume = 1;
			if ( this.muted ) {
				this.current.volume = 0;
			} else {
				this.current.volume = this.masterVolume * (volume);
			}
			this.current.play();
			return this;
		},

		volume: function(volume, fade) {
			if ( !this.current ) return this;
			if ( fade === undefined ) {
				this.currentVolume = volume;
				if ( this.muted ) {
					this.current.volume = 0;
				} else {
					this.current.volume = volume * this.masterVolume;
				}
			} else {
				var initialVolume = this.current.volume;
				for ( var i=1; i<=10; i++ ) (function(i) {
					this._timeout(fade * i/10, function() {
						this.volume(initialVolume + (volume * this.masterVolume - initialVolume) * i/10);
					});
				}).call(this, i);
			}
			return this;
		},

		play: function(label, volume, fade, callback, scope) {
			if ( volume === undefined ) volume = 1.0;
			if ( fade === undefined ) fade = 200;
			this.stop()._start(label, 0).volume(volume, fade);

			var timeToEnd = Math.round( (this.current.duration - this.current.currentTime ) * 1000 );

			this._timeout(timeToEnd - fade, function() {
				this.volume(0.0, fade);
			});

			this._timeout(timeToEnd, function() {
				this.stop();
				if ( callback ) callback.call(scope, this);
			});
		},

		loop: function(label, volume, fade) {
			if ( volume === undefined ) volume = 1.0;
			if ( fade === undefined ) fade = 10;
			this.play(label, volume, fade, function() {
				this.loop(label, volume, fade);
			}, this);
		},

		muted: false,
		mute: function() {
			this.muted = true;
			if ( this.current ) this.current.volume = 0;
		},
		unmute: function() {
			this.muted = false;
			if ( this.current && this.currentVolume ) {
				this.current.volume = this.currentVolume;
			}
		}
	},

	mute: function() {
		this.fx.mute();
		this.music.mute();
	},

	unmute: function() {
		this.fx.unmute();
		this.music.unmute();
	}
};

// the HTML5 audio tag is pretty unreliable across all browsers.
// Use the nuclear option and catch EVERYTHING.
(function() { 
	function safely(fn) {
		return function() {
			try {
				return fn.apply(this, arguments);
			} catch ( e ) { }
			return this; // safely chain...
		}
	}

	function makeSafe(obj) {
		for ( var m in obj ) {
			if ( typeof obj[m] === 'function' ) {
				obj[m] = safely(obj[m]);
			}
		}
	}

	makeSafe(sound.fx);
	makeSafe(sound.music);
})();

(function(jQuery){
	
	jQuery.hotkeys = {
		version: "0.8",

		specialKeys: {
			8: "backspace", 9: "tab", 13: "return", 16: "shift", 17: "ctrl", 18: "alt", 19: "pause",
			20: "capslock", 27: "esc", 32: "space", 33: "pageup", 34: "pagedown", 35: "end", 36: "home",
			37: "left", 38: "up", 39: "right", 40: "down", 45: "insert", 46: "del", 
			96: "0", 97: "1", 98: "2", 99: "3", 100: "4", 101: "5", 102: "6", 103: "7",
			104: "8", 105: "9", 106: "*", 107: "+", 109: "-", 110: ".", 111 : "/", 
			112: "f1", 113: "f2", 114: "f3", 115: "f4", 116: "f5", 117: "f6", 118: "f7", 119: "f8", 
			120: "f9", 121: "f10", 122: "f11", 123: "f12", 144: "numlock", 145: "scroll", 191: "/", 224: "meta"
		},
	
		shiftNums: {
			"`": "~", "1": "!", "2": "@", "3": "#", "4": "$", "5": "%", "6": "^", "7": "&", 
			"8": "*", "9": "(", "0": ")", "-": "_", "=": "+", ";": ": ", "'": "\"", ",": "<", 
			".": ">",  "/": "?",  "\\": "|"
		}
	};

	function keyHandler( handleObj ) {
		// Only care when a possible input has been specified
		if ( typeof handleObj.data !== "string" ) {
			return;
		}
		
		var origHandler = handleObj.handler,
			keys = handleObj.data.toLowerCase().split(" ");
	
		handleObj.handler = function( event ) {
			// Don't fire in text-accepting inputs that we didn't directly bind to
			if ( this !== event.target && (/textarea|select/i.test( event.target.nodeName ) ||
				 event.target.type === "text") ) {
				return;
			}
			
			// Keypress represents characters, not special keys
			var special = event.type !== "keypress" && jQuery.hotkeys.specialKeys[ event.which ],
				character = String.fromCharCode( event.which ).toLowerCase(),
				key, modif = "", possible = {};

			// check combinations (alt|ctrl|shift+anything)
			if ( event.altKey && special !== "alt" ) {
				modif += "alt+";
			}

			if ( event.ctrlKey && special !== "ctrl" ) {
				modif += "ctrl+";
			}
			
			// TODO: Need to make sure this works consistently across platforms
			if ( event.metaKey && !event.ctrlKey && special !== "meta" ) {
				modif += "meta+";
			}

			if ( event.shiftKey && special !== "shift" ) {
				modif += "shift+";
			}

			if ( special ) {
				possible[ modif + special ] = true;

			} else {
				possible[ modif + character ] = true;
				possible[ modif + jQuery.hotkeys.shiftNums[ character ] ] = true;

				// "$" can be triggered as "Shift+4" or "Shift+$" or just "$"
				if ( modif === "shift+" ) {
					possible[ jQuery.hotkeys.shiftNums[ character ] ] = true;
				}
			}

			for ( var i = 0, l = keys.length; i < l; i++ ) {
				if ( possible[ keys[i] ] ) {
					return origHandler.apply( this, arguments );
				}
			}
		};
	}

	jQuery.each([ "keydown", "keyup", "keypress" ], function() {
		jQuery.event.special[ this ] = { add: keyHandler };
	});

})( jQuery );

jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

$(function() { 

var words = $('#word-data').html().split(/\s+/g).filter(function(w) { return w.length; });

var alphabet = 'abcdefghijklmnopqrstuvwxyz';

// DRY: figure out available fonts from the HTML
var fonts = (function() {
	var fonts = [];
	var fontUrlPattern = /^http:\/\/fonts.*=([a-zA-Z0-9+]+)/
	$('link[rel=stylesheet]').each(function() {
		var url = $(this).attr('href');
		var match = fontUrlPattern.exec(url);
		if ( match ) {
			fonts.push( match[1].replace(/\+/g, ' ') );
		}
	});
	return fonts;
})();

var loadingScreen = true;
var gameOver = false;
var points = 0;
var multiplier = 1;
var hits = 0;
var misses = 0;
var startTime = new Date();

var bullets = ['.', '!', '*', '! !', '* *', '!!!', '***'];
function setMultiplier(m) {
	var oldMultiplier = multiplier || 1;
	multiplier = m || 1;
	if ( multiplier > 50 ) multiplier = 50;

	if ( multiplier >= 10 ) bullet = bullets[ Math.floor(multiplier/10) + 1 ];
	else if ( multiplier >= 5 ) bullet = bullets[1];
	else bullet = bullets[0];

	if ( multiplier <= 1 ) {
		return '';
	} else if ( multiplier === 5 || (multiplier % 10 === 0) ) {
		return 'level up!';
	} else if ( multiplier > oldMultiplier ) {
		return '+' + (multiplier - oldMultiplier);
	} else {
		return '';
	}
}
setMultiplier(1);

sound.fx.load('hit.', '/sound/39459__THE_bizniss__laser.ogg', 0.6, 7);
sound.fx.load('hit!', '/sound/39456__THE_bizniss__laser_2.ogg', 0.8, 7);
sound.fx.load('hit*', '/sound/39458__THE_bizniss__laser_4.ogg', 0.8, 7);
sound.fx.load('miss','/sound/2225__Andrew_Duke__garp.ogg', 0.4);
sound.fx.load('kill', '/sound/91924__Benboncan__Till_With_Bell.ogg');
sound.fx.load('die', '/sound/33245__ljudman__grenade.ogg');

sound.music.load('fast', '/sound/Speed_Kills_1.ogg');
sound.music.load('ending', '/sound/erase-it.ogg');

function log(message) {
	$('body').append( message + '<br>');
}

$.fn.startsWith = function(letter) {
	return this.filter(function() {
		return ( $(this).html().charAt(0).toLowerCase() === letter.toLowerCase() );
	});
}

// take the single lowest element closest to another
$.fn.nearest = function(target) { 
	var minD = Infinity, nearestEl;
	this.each(function() {
		var d = distance(this, target);
		if ( d < minD ) {
			minD = d;
			nearestEl = this;
		}
	});
	return $(nearestEl);
}

// rotate an element to point at another
$.fn.pointAt = function(target) { 
	target = pos(target);
	$(this).each(function() {
		var p = $(this).position();
		var dx = target.left - p.left;
		var dy = p['top'] - target['top'];
		var angle = Math.atan(dy/dx);
		if ( dx < 0 ) angle += Math.PI;
		// that's the angle in the usual coordinates... but rotate
		// specifies a clockwise rotation starting 90 degrees off.
		rotateAngle = -(angle - Math.PI/2);

		var rotate = 'rotate(' + (rotateAngle * 180/Math.PI) + 'deg)';
		$(this).css({ 
			'-webkit-transform': rotate,
			'-moz-transform': rotate,
			'transform': rotate 
		});
	});
	return this;
}

$.fn.center = function() {
    this.css("position","absolute");
    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
}


Array.prototype.random = function() {
	return this[ Math.floor(Math.random() * this.length) ]
}

// creates a new sprite on the document
function newSprite(cls, content) { 
	var sprite = document.createElement('div');
	sprite.innerHTML = content;
	sprite.className = 'sprite ' + cls;
	$('body').append(sprite);
	return sprite;
}

// shows a message coming up off an element and fading away
$.fn.sparkScore = function(score) {
	$(this).each(function() {
		var particle = newSprite('spark-score', score);
		var initialPosition = alignCenters(this, particle);
		$(particle).css(initialPosition);
		$(particle).css({ opacity: 0.8 });
		$(particle).animate({
			'top': initialPosition['top'] - 50,
			'left': initialPosition['left'],
			opacity: 'hide'
		}, 1000, 'linear', function() { 
			$(particle).remove(); 
		});
	});
}

// spark off a single letter
$.fn.spark = function(letter, duration, distance) {
	if ( !duration ) duration = 500;
	if ( !distance ) distance = 100;
	$(this).each(function() {
		var particle = newSprite('spark', letter);
		var initialPosition = alignCenters(this, particle);
		var angle = Math.random() * 2 * Math.PI;
		$(particle).css({
			'top': initialPosition['top'] + Math.round(20 * Math.cos(angle)),
			'left': initialPosition['left'] + Math.round(20 * Math.sin(angle))
		});
		$(particle).css({ opacity: 0.8 });
		$(particle).animate({
			'top': initialPosition['top'] + Math.round(distance * Math.cos(angle)),
			'left': initialPosition['left'] + Math.round(distance * Math.sin(angle)),
			opacity: 'hide'
		}, duration, 'linear', function() { 
			$(particle).remove(); 
		});
	});
}

$.fn.explode = function(letters, duration, distance) {
	if ( !distance ) distance = 100;
	if ( !duration ) duration = 1000;
	for ( var i=0; i < letters.length; i++ ) {
		$(this).spark( letters.charAt(i), duration, Math.floor(distance + 200 * Math.random()) );
	}
}


var spaceship = newSprite('spaceship', 'A');
$(spaceship).css({
        'position' : 'absolute',
        'left' : '50%',
        'top' : '50%',
        'margin-left' : function() {return -$(this).outerWidth()/2},
        'margin-top' : function() {return -$(this).outerHeight()/2}
}).hide();

function alignCenters(target, mover) {
	target = $(target);
	mover = $(mover);
	var p = target.position();
	p.top = p.top + Math.floor(target.height()/2);
	p.left = p.left + Math.floor(target.width()/2);
	p.top = p.top - Math.floor(mover.height()/2);
	p.left = p.left - Math.floor(mover.width()/2);
	return p;
}

var instructions = newSprite('instructions', [
	'<h1>Font Wars</h1>',
	'Type the words as they appear',
	'Once you start a word you must finish it',
	'The currently targeted word is underlined',
	'The game is over when they reach you',
	'',
	'Press Enter to begin'
].join('<br>'));

$(instructions).css({
        'position' : 'absolute',
        'left' : '50%',
        'top' : '50%',
        'margin-left' : function() {return -$(this).outerWidth()/2},
        'margin-top' : function() {return -$(this).outerHeight()/2}
});

var score = newSprite('score', '');
$(score).css({ opacity: 0.7 });

var mute = newSprite('mute', 'Mute');
function toggleMute() {
	if ( $(mute).html() === 'Mute' ) {
		sound.mute();
		$(mute).html('Unmute');
		$.cookie('font-wars-muted', true);
	} else {
		sound.unmute();
		$(mute).html('Mute');
		$.cookie('font-wars-muted', null);
	}
}
$(mute).css({ opacity: 0.7 }).click(toggleMute);
if ( $.cookie('font-wars-muted') ) toggleMute();

function updateScore() {
	var minutes = (new Date() - startTime) / 6e4;
	if ( minutes < 0.1 ) { 
		var wpm = 0;
	} else {
		var words = hits / 5;
		var wpm = Math.floor(words/minutes);
	}

	if ( hits == 0 ) {
		var accuracy = 0;
	} else {
		var accuracy = Math.floor(100 * hits / (hits + misses));
	}
	

	var x = ' ' + multiplier + 'x';
	if ( gameOver ) {
		x = '';
		var seconds = Math.floor((new Date() - startTime)/1000);
		var minutes = Math.floor(seconds/60);
		var seconds = seconds - minutes * 60;
		var duration = minutes + ' minutes ' + seconds + ' seconds';
		var highScoreMessage = handleHighScore();
		$(score).html('<b>' + points + ' Points</b><br>' + highScoreMessage + wpm + ' WPM<br>' + accuracy + '% Accuracy<br>' + duration);
	} else {
		$(score).html(points + ' Points<br>' + multiplier + 'x Multiplier<br>' + wpm + ' WPM<br>' + accuracy + '% Accuracy');
	}
}
updateScore();

function handleHighScore() {
	var message = '';
	var previousHighScore = $.cookie('font-wars-high-score') || 0;
	if ( points > previousHighScore ) {
		$.cookie('font-wars-high-score', points, { expires: 999, path: '/' });
		message = '<b>New High Score!</b><br>';
	} else if ( previousHighScore > 0 ) {
		message = 'Previous Best: ' + previousHighScore + '<br>';
	}
	return message;
}


function pos(any) {
	if ( !any['top'] || !any['left'] ) return $(any).position();
	else return any;
}
function distance(a,b) {
	a = pos(a);
	b = pos(b);
	var dx = (a.left - b.left);
	var dy = (a['top'] - b['top']);
	return Math.sqrt( dx*dx + dy*dy );
}

function attackingWordCount() {
	var chars = 0;
	$('.enemy').each(function() {
		chars += $(this).html().replace(/[^a-zA-Z']/g, '').length;
	});
	return Math.floor(chars/5);
}

function spawn() {
	if ( gameOver ) return;

	// ambiguous starting letters are annoying.
	var word = words.random();
	for ( var i=0; i<10; i++ ) {
		if ( $('.enemy').startsWith(word.charAt(0)).length ) {
			word = words.random();
		} else {
			break;
		}
	}
	
	var enemy = newSprite('enemy', word);

	// use a random font for each enemy.
	var font = fonts.random();
	$(enemy).css({ 'font-family': "'" + font + "', serif" });
	if ( font === 'Tangerine' ) $(enemy).css({ 'font-size': '48px' });

	var side = Math.floor(Math.random() * 4);
	if ( side == 0 ) { // top
		$(enemy).css({ "top": -32, left: Math.random() * $(window).width() });
	} else if ( side == 1 ) { // right
		$(enemy).css({ "left": $(window).width()+32, top: Math.random() * $(window).height() });
	} else if ( side == 2 ) { // bottom
		$(enemy).css({ "top": $(window).height() + 32, left: Math.random() * $(window).width() });
	} else { // left
		$(enemy).css({ "left": -32, top: Math.random() * $(window).height() });
	}

	// auto-balancing logic
	var danger = attackingWordCount();
	$(enemy).animate( alignCenters(spaceship, enemy), 10000 + 1000*danger - 5*hits, 'linear', function() {
		// the player dies when an enemy reaches the spaceship.
		// the timeout is because we can't start the fade animation on this enemy from inside this callback.
		if ( $.contains(document.body, this) ) setTimeout(function() { die(); }, 1);
	});
	var spawnInterval = 200 + 400*danger - 2*hits + 100 - 200*Math.random();
	if ( spawnInterval < 500 ) spawnInterval = 500;
	setTimeout(spawn, spawnInterval);
}

function die() {
	sound.music.volume(0, 500);
	sound.fx.play('die');
	$(spaceship).explode(alphabet, 3000);
	$(spaceship).explode(alphabet.toUpperCase(), 3000);
	gameOver = true;

	updateScore();

	$('.enemy').stop();
	$('.enemy').animate({opacity: 'hide'}, 1000, 'linear', function() { $(this).remove(); });
	$(spaceship).animate({opacity: 0}, 2000, 'linear', function() {
		setTimeout(function() { 
			sound.music.play('ending', 1.0, 700);
			$(newSprite('game-over', 'Game Over'))
				.css({ fontSize: '64px', width: '10em', opacity: 0 })
				.css({
				        'position' : 'absolute',
				        'left' : '50%',
				        'top' : '50%',
				        'margin-left' : function() {return -$(this).outerWidth()/2},
				        'margin-top' : function() {return -$(this).outerHeight()/2}
				})
				.animate({ opacity: 1.0 }, 4000, undefined, function() {
					$(score).css($(score).position()).animate({
						opacity: 1.0,
						"top": 80 + ( $(window).height() - $(score).height() ) / 2 + $(window).scrollTop() + "px",
						left: ( $(window).width() - $(score).width() ) / 2 + $(window).scrollLeft() + "px",
					}, 1500);
				});
		}, 500);
	});
}

// target an enemy...
$.fn.target = function() {
	this.addClass('target');
	this.siblings('.enemy').removeClass('target');
	$(spaceship).pointAt(this);
	return this;
}

// hit an enemy...
$.fn.hit = function() {
	hits++;
	points += multiplier;
	sound.fx.play('hit' + bullet.charAt(0));
	$(newSprite('bullet', bullet))
		.css( $('.spaceship').position() )
		.pointAt(this)
		.animate( this.position(), distance(spaceship, this)/3, 'linear', function() { 
			$(this).remove();}
		);
	var letter = this.html().charAt(0);
	var newWord = this.html().slice(1);
	this.spark(letter);
	if ( newWord.length === 0 ) {
		sound.fx.play('kill');
		var msg = setMultiplier(multiplier+1);
		if ( msg ) this.sparkScore(msg);
		this.remove();
	} else {
		if ( !this.hasClass('target') ) this.target();
		this.html(newWord);
	}
	return this;
}

// oops, a bad character
function miss(letter) { 
	misses++;
	setMultiplier(1);
	sound.fx.play('miss');
}

$(document).keypress(function(e) {
	if ( gameOver ) return;

	if ( loadingScreen ) {
		if ( e.which === 13 ) {
			startTime = new Date();
			loadingScreen = false;
			$(spaceship).show();
			$(instructions).fadeOut(500);
			spawn();
			sound.music.loop('fast', 1.0, 10);

            // without this, Chrome leaves trails behind some fonts
            // as they move. This forces Chrome to redraw the background
            // 50 times a second and therefore work around this issue.
            setInterval(function() {
                $('body').toggleClass('off-white');
            }, 50);
		}
	}

	// ignore all shortcuts
	if ( e.altKey || e.ctrlKey ) return;
	var key = e.which;
	var letter = '';
	if ( key > 96 && key < 123 ) letter = String.fromCharCode(key);
	else if ( key > 64 && key < 91 ) letter = String.fromCharCode(key + 32);
	else if ( key === 39 || key === 34 ) letter = "'"; // apostrophes are used in some words...
	else letter = String.fromCharCode(key);

	var target = $('.enemy.target').first();
	if ( target.length ) {
		if ( target.startsWith(letter).length ) target.hit();
		else miss(letter);
	} else {
		var target = $('.enemy').startsWith(letter).nearest(spaceship);
		if ( target.length ) target.hit();
		else miss(letter);
	}
	updateScore();
	return false;
});

});

