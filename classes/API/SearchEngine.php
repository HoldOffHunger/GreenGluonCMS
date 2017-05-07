<?php

	class SearchEngine
	{
		# TO ADD:
		# http://l-lists.com/en/lists/qukoen.html
		# http://www.dreamsubmit.net/series/Series_list_universal_home1.html
		# http://www.jrwhipple.com/findit/misc.html
		# http://search.godonthe.net/e.htm
		# http://www.submittoday.com/search_engine_list.htm
		# http://www.quarkis.com/italian-search-engines.php
		# http://www.virtualfreesites.com/search.html
				
				# "CANCEL" button, to generate a blank file in place of the curl request
				
				# descriptions
				
					# specialized directories
	
			# http://www.davidpbrown.co.uk/help/top-100-languages-by-population.html
	
				# English (EN)
				# -------------------------------------------------
				
		public function GetSearchEngines_byLanguage_en()
		{
			return $this->GetSearchEngines();
		}
		
		public function GetSearchEngines()
		{
			return [
					# The Big Three
					# -------------------------------------------------
					
				'google.com',
				'bing.com',
				'yahoo.com',
				
					# The Second-Biggest Globally
					# -------------------------------------------------
					
				'duckduckgo.com',
				'ecosia.org',
				'exalead.com',
				'gigablast.com',
				'munax.com',
				'qwant.com',
				'yandex.com',
				
					# Anything Else Ya' Got?
					# -------------------------------------------------
					
				'ask.com',		# AKA: askjeeves.com, pregunta.com
				'msn.com',
				'aol.com',
				'dmoz.org',
				'unbubble.eu',
				'go.com',		# AKA: infoseek.com
				'altavista.com',
				'galaxy.com',
				'goodsearch.com',
				'wow.com',
				'newrelevant.com',
				'addictomatic.com',
				
					# Okay, Time to Take in the Trash Now
					# -------------------------------------------------
				
				'webcrawler.com',
				'infospace.com',
				'dogpile.com',
				'info.com',
				'contenko.com',
				'alhea.com',
				'lycos.com',
				'entireweb.com',
				'ixquick.com',		# AKA: surfboard.nl
				'exactseek.com',
				'excite.com',
				'find.com',
				'icerocket.com',
				'infotiger.com',
				'search.com',
				'looksmart.com',
				'izito.com',
				'mamma.com',
				'hotbot.com',
				'zensearch.com',
				'finditquick.com',	# AKA: findit-quick.com
				'cluuz.com',
				'draze.com',
				'mojeek.com',
				'startpage.com',
				'whosbest.com',
				'goto.com',
				'wepa.com',
				
					# Really at the Bottom of the Barrel Here
					# -------------------------------------------------
				
				'4anything.com',
				'activesearchresults.com',
				'amray.com',
				'azoos.com',
				'beaucoup.com',
				'click4choice.com',
				'efind.com',
				'mastersite.com',
				'metabear.com',
				'scrubtheweb.com',
				'wotbox.com',
			];
		}
		
				# ALL LANGUAGE ALTS
				# (CODE = 'com.CODE' AND '.CODE')
				# -------------------------------------------------
			
			# aol.CODE
			# bing.CODE
			# CODE.altavista.com
			# CODE.ask.com
			# CODE.yahoo.com
			# dmoz.CODE
			# excite.CODE
			# google.CODE
			# lycos.CODE
			# msn.CODE
			# sharelook.CODE
			# web.CODE
			# www.CODE
			# wow.CODE
		
				# German (DE)
				# "Search Engine": Suchmaschine
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_de()
		{
			return [
						# Germany (*.de)
						
				'aarno.de',
				'abacho.de',
				'acoon.de',
				'alexana.de',
				'allesklar.de',
				'amidalla.de',
				'aol.de',		# AKA: aol.at, aol.ch
				'auserlesen.de',
				'bellnet.de',		# AKA: bellnet.com
				'bing.de',
				'blitzsuche.de',
				'de.altavista.com',
				'de.ask.com',
				'de.yahoo.com',
				'dino-online.de',
				'deusu.de',
				'dmoz.de',
				'eichsfeld-net.de',
				'excite.de',		# AKA: excite.at, excite.ch
				'fireball.de',
				'firstsfind.de',
				'flix.de',
				'freenet.de',
				'google.de',
				'hamburg-web.de',
				'hannover-web.de',
				'infoseeker.de',
				'lapoo.de',
				'lycos.de',
				'metager.de',
				'mittelfranken-online.de',
				'msn.de',
				'multimeta.de',
				'paperball.de',
				'ruhrinfo.de',
				'seek.de',
				'schnellsuche.de',
				'sharelook.de',
				'suchbot.de',
				'suchmaschine.com',
				't-online.de',
				'umlu.de',
				'unbubble.de',
				'web.de',
				'witch.de',
				'zeig.de',
						
						# Austria (*.at)
				
				'at.altavista.com',
				'at.ask.com',
				'at.yahoo.com',
				'austria-seek.at',
				'austria-www.at',
				'austrobot.at',
				'austrolinks.info',
				'bing.at',
				'dmoz.at',
				'google.at',
				'lycos.at',
				'mair.net',
				'moose.at',
				'msn.at',
				'sharelook.at',
				'socia.at',
				'web.at',
				'webwizard.at',
				
						# Switzerland (*.ch)
				
				'bing.ch',
				'bluewin.ch',
				'ch.altavista.com',
				'ch-de.altavista.com',
				'dmoz.ch',
				'etools.ch',
				'furttalweb.ch',
				'google.ch',
				'lycos.ch',
				'msn.ch',
				'search.ch',
				'yoodle.ch',
				
						# Liechtenstein (*.li)
				
				'dmoz.li',
				'google.li',
				'web.li',
				
						# Luxembourg (*.lu)
						
				'google.lu',
				'www.lu',
			];
		}
		
				# Spanish (ES)
				# "Search Engine": buscador
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_es()
		{
			return [
						# Spain (*.es)
						
				'anuncios.es',		# AKA: biwe.es
				'apali.com',
				'bing.es',
				'buscador.com',
				'buscador.terra.es',
				'buscadorespanol.com',
				'dmoz.es',
				'elmundo.es',
				'es.altavista.com',
				'es.ask.com',
				'es.yahoo.com',		# AKA: espanol.yahoo.com, es.search.yahoo.com
				'excite.es',
				'euskaraz.com',
				'google.es',
				'hispavista.com',
				'lycos.es',
				'msn.es',
				'ozu.es',
				'searchiberia.com',
				'terra.es',
				'trovator.com',
				'typicallyspanish.com',
				'wanadoo.es',
				
						# Argentina (*.ar)
				
				'ahijuna.com.ar',
				'ar.altavista.com',
				'ar.ask.com',		# AKA: co.ask.com, pe.ask.com
				'ar.yahoo.com',
				'arnet.com.ar',
				'clarin.com',
				'google.com.ar',
				'grippo.com.ar',
				'guiafe.com.ar',
				'terra.com.ar',
				'webfe.com',
				
						# Bolivia (*.bo)
				
				'bing.bo',
				'boliviaweb.com',
				'enlacesbolivia.net',
				'google.bo',
				'msn.bo',
				
						# Chile (*.cl)
				
				'123.cl',
				'antena.cl',
				'bing.cl',
				'buscapique.com',
				'cl.ask.com',
				'cl.yahoo.com',
				'dmoz.cl',
				'google.cl',
				'lycos.cl',
				'sipo.cl',
				'terra.cl',
				'websites.cl',
						
						# Colombia (*.co)
				
				'bingo.com.co',
				'co.yahoo.com',
				'conexcol.com',
				'google.com.co',
				'interimagen.com',
				'lamira.com',
				'msn.com.co',
					
						# Ecuador (*.ec)
				
				'bacan.com',
				'google.ec',
				
						# Paraguay (*.py)
				
				'google.com.py',
				'msn.com.py',
				'yagua.com',
						
						# Peru (*.pe)
				
				'adonde.com',
				'astrolabio.net',
				'bhanvad.com',
				'google.com.pe',
				'maskay.com',
				'msn.com.pe',
				'ohperu.com',
				'pe.yahoo.com',
				'peruhoo.com',
				'perulinks.com',
				'peru.com',
				'terra.com.pe',
				
						# Philippines (*.ph)
				
				'alleba.com',
				'ph.ask.com',
				'google.com.ph',
				
						# Uruguay (*.uy)
				
				'bing.com.uy',
				'google.com.uy',
				'uruguaytotal.com',
				
						# Venezuela (*.ve)
				
				'auyantepui.com',
				'google.co.ve',
				've.yahoo.com',
			];
		}
		
				# French (FR)
				# "Search Engine": moteur de recherche
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_fr()
		{
			return [
						# France (*.fr)
						
				'abondance.com',
				'aol.fr',		# AKA: recherche.aol.fr
				'bing.fr',
				'cantal.fr',
				'club-internet.fr',
				'dmoz.fr',
				'excite.fr',
				'fr.altavista.com',
				'fr.ask.com',
				'fr.yahoo.com',		# AKA fr.search.yahoo.com
				'google.fr',
				'hotbot.lycos.fr',
				'indexa.fr',
				'kartoo.com',
				'lemoteur.fr',
				'lycos.fr',
				'mozbot.fr',
				'msn.fr',
				'orange.fr',
				'sfr.fr',
				'sharelook.fr',
				'souany.com',
				'telefrance.com',
				'voila.fr',
				'zeemotor.com',
				
						# Switzerland (*.ch)
				
				'ch-fr.altavista.com',
						
						# French Guinea (*.gn)
						
				'domtomfr.com',
			];
		}
		
				# Japanese (JA)
				# "Search Engine": 検索エンジン
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_ja()
		{
			return [
						# Japan (*.ja)
				
				'aol.jp',
				'alcarna.net',
				'biglobe.ne.jp',
				'bing.co.jp',
				'excite.co.jp',
				'fresheye.com',
				'goo.ne.jp',
				'google.co.jp',
				'infoseek.co.jp',
				'interconnect.co.jp',
				'jp.ask.com',
				'kagu-info.jp',
				'kensapu.com',
				'lycos.jp',
				'msn.jp',
				'searchdesk.com',
				'yahoo.co.jp',
			];
		}
		
				# Italian (IT)
				# "Search Engine": motore di ricerca
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_it()
		{
			return [
						# Italy (*.it)
				
				'arianna.it',
				'aristotele.net',
				'bing.it',
				'categorico.it',
				'dive3000.com',
				'excite.it',
				'google.it',
				'ilnocchiero.it',
				'iltrovatore.it',
				'it.altavista.com',
				'it.ask.com',
				'it.yahoo.com',
				'iussearch.it',
				'libero.it',
				'lycos.it',
				'msn.it',
				'sharelook.it',
				'simpatico.it',
				'supereva.it',
				'tiscali.it',
				'trivago.it',
				'trovaprezzi.it',
				'virgilio.it',
			];
		}
		
				# Dutch (NL)
				# "Search Engine": zoekmachine
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_nl()
		{
			return [
						# Netherlands (*.nl)
						
				'1stekeuze.nl',
				'bing.nl',
				'botje.nl',
				'google.nl',
				'excite.nl',
				'ilse.nl',
				'jongerenweb.nl',
				'jouwzoekmachine.nl',
				'lycos.nl',
				'masterlinks.nl',
				'metaspider.nl',
				'msn.nl',
				'nl.altavista.com',
				'nl.ask.com',
				'nl.yahoo.com',
				'rubrieken.com',
				'startzoek.nl',
				'theking.nl',
				'vinden.nl',
				'voelspriet.nl',
				'web.nl',
				'wwwgids.nl',
				'zoek.nl',
				
						# Belgium (*.be)
						
				'bing.be',
				'be.altavista.com',
				'be.yahoo.com',
				'google.be',
				'lycos.be',
				'sharelook.be',
			];
		}
		
				# Polish (PL)
				# "Search Engine": wyszukiwarka
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_pl()
		{
			return [
						# Poland (*.pl)
				
				'bing.pl',
				'chomikuj-wyszukiwarka.eu',
				'google.pl',
				'gooru.pl',
				'hoga.pl',
				'interia.pl',
				'onet.pl',
				'pl.ask.com',
				'pl.search.yahoo.com',
				'polishworld.com',
				'szukaj.onet.pl',
				'wow.pl',
				'wp.pl',
			];
		}
		
				# Portuguese (PT)
				# "Search Engine": mecanismo de busca
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_pt()
		{
			return [
						# Portugal (*.pt)
						
				'aeiou.pt',
				'bing.pt',
				'google.pt',
				'lycos.pt',
				'msn.pt',
				'netindex.pt',
				'pt.altavista.com',
				'pt.ask.com',
				'sapo.pt',
				
						# Brazil (*.br)
				
				'achei.com.br',
				'aonde.com',
				'bing.com.br',
				'br.altavista.com',
				'br.ask.com',
				'br.yahoo.com',			# AKA: cade.com.br
				'buscatematica.net',
				'exploora.com.br',
				'msn.com.br',
				'ponteiro.com.br',
				'terra.com.br',
			];
		}
		
				# Russian (RU)
				# "Search Engine": поисковый движок
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_ru()
		{
			return [
						# Russia (*.ru)
				
				'adwin.ru',
				'aport.ru',
				'bing.ru',
				'google.ru',
				'holms.ru',
				'list.ru',
				'mail.ru',
				'msn.ru',
				'rambler.ru',
				'refer.ru',
				'ulitka.ru',
				'yandex.ru',
				
						# Belarus (*.by)
						
				'google.by',
			];
		}
		
				# Turkish (TR)
				# "Search Engine": arama motoru
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_tr()
		{
			return [
						# Turkey (*.tr)
						
				'arama.com',
				'arrama.com',
				'bing.com.tr',
				'geliyoo.com',
				'google.com.tr',
				'ilbilge.com',
				'linkekle.net',
				'netbul.com',
				'msn.com.tr',
				'tr.ask.com',
				'tr.search.yahoo.com',
				'trivago.com.tr',
				'turkarama.com',
				'turkeycentral.com',
				'turkish-media.com',
				'yardimicinara.org',
			];
		}
		
				# Chinese (ZH)
				# "Search Engine": 搜索引擎
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_zh()
		{
			return [
						# China (*.cn)
				
				'baidu.com',
				'baimin.com',
				'bing.com.cn',
				'chinaso.com',
				'chinavista.com',
				'cwrank.com',
				'google.cn',
				'hk.yahoo.com',
				'openfind.com',
				'peak-labs.com',
				'qkankan.com',
				'sina.com.cn',
				'so.com',
				'sogou.com',
				'sohu.com',
				'sowang.com',
				'youdao.com',
				
						# Singapore (*.sg)
				
				'google.com.sg',
				'sg.ask.com',
				
						# Taiwan (*.tw)
				
				'google.com.tw',
				'tw.ask.com',
				'tw.yahoo.com',
			];
		}
		
				# Korean (KO)
				# "Search Engine": 검색 엔진
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_ko()
		{
			return [
				# another day, maybe
			];
		}
		
				# Hindi (HI)
				# "Search Engine": ___
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_hi()
		{
			return [
				# another day, maybe
			];
		}
		
				# Indonesian (ID)
				# "Search Engine": ___
				# -------------------------------------------------
		
		public function GetSearchEngines_byLanguage_id()
		{
			return [
				# another day, maybe
			];
		}
	}
	
?>