# To-Do

## Almost Done

[nothing assigned yet]

## Eventually To Do - Short-Term/Long-Term

* master hyperlink codeofconduct pages (from relative site to anarchistcode.com site)
* control terms/codeofcoduct/privacy pages by means of globals
* control terms/codeofcoduct/privacy sitemap listings by means of globals
* fix anarchistcode.com child entries for alternate record access
* complete list-title/sort-title distinction code
* hyperlink inspired sources in the code of conduct script
* detect files ending in the name "php.php" because of the basic inability of the Windows operating system to save, open, or update files, of any type
* fix css in terms/codeofconduct/privacy/etc pages for document width
* multilink privacy/codeofconduct/terms pages
* move suggestion config stuff to globals file
* move thumbs up/down functionality to top of pages, also, modularize
* make all common links, i.e., privacy, codeofconduct, search, home, about, terms, suggestions, etc., be configurable within globals
* make suggestions link in master linking globals-file-controlled
* fix the record count numbers in wordweight on the primary index page
* make an actual user-panel page
* have wordweight link to other pages based on keywords
* remove image::1 etc. junk from browseLikes action on sub-child records
* breadcrumb trail option: indicate full title/subtitle combo on primary entry
* move breadcrumb trails into a module
* always-include css/js php template file list
* integrate givenname/familyname to entries
* don't create 404 reports if the user logged in is admin
* actually finish up listTitle versus ListSortKey
* restyle the header box to float to top and be surrounded with kickass border thing (put the date in the header)
* put Authentication.php's salts into the globals file
* misspellings: float correct spelling over misspelled word
* full-text search, two fields, one with html stripped for search, the other without it stripped for storage
* utf8: store everything native without html entities
* text-error-detector: type-selectable, and let english-alt's be a type
* Have both english/misspelling language classes inherit the same parent class
* chronology: list number of changes
* detect all new DBAccess calls to guarantee globals-passing
* make a dummy globals file for github for clonefrom
* "subscribe to entry"'s changes
* backup all textbody changes
* show textbody changes logs
* show diff in updating entry
* detect bad text
* print words func for english/british, misspellings, wordweight dictionary, etc..
* finish view/resolve/etc issues/errors
* search results for chapters: do not display text
* autopopulate URL field form SERVER field in issues/errors
* entry aka field
* admin: find host db's missing fields, etc.
* actual die() call on bad image source printing for the html-to-pdf php app
* pull handler.pm functionality for dictionaries into config func
* js file that detects and reports ISE's on non-resolved images
* generate the github-shareable clonefrom db file
* warroom: comment linkage
* actual default backup languages for css
* detect: entries w/ images and textbodies, but no Image::123 text
* swap left/right the images for multi-child textbody view
* randomized new-user password in Security/Password.php
* old-logs => password detector
* old-logs => password censoring
* display popular searches in index action of view
* separate view/index?
* smallify social media icons
* remove all "..._object"-named object vars.
* only copy essential files when setting up new system
* error/issue generator script
* move color settings to globals
* move all lists to globals
* have master-c.php use the global colors fully, compare revoltlib.com with any other domain's master-c.php
* scrollable/hidable "newest changes" list, with more than 10 entries
* scrollable/hidable "newest changes" page! (news.php)
* new domain protocol: add /image/ directory
* new domain protocol: build globals file
* edit link for completed changes on primary entry does not link correctly site.com/Site.com/edit, etc..
* "newest additions" index * > skip if entry is primary domain
* image-floatover, show artist picture, as well, if possible
* autoredirect if "//" occurs within a url
* detect/fix/change-code for all 777 folders to be 755
* password-deleting from logging data should be the duty of the logger, not the password management system
* github project/site: instagram scheduler
* "style:" detector within template/etc. code
* move all domain folders "blah.com" to a domains folder in root dir
* move ValidateOrm() in /scripts/ to Handler.php somehow
* move about.php images
* make all templates use the entrylinks module
* turn all JS scripts into php pages and merely render them as *.js, etc.
* a progress bar physically indicating current location in browsing
* a history.php page detailing all changes so far
* php, good-version check/verify
* plz fix: https://www.revoltlib.com/dbstatus.php?action=ShowTablesListSchemas
* display backup records in save
* detect .htaccess files in folders in which it does not belong
* test record backups for brand-new records
* delete(), in modify.php, handle backups
* view.php, link to history.php, if necessary, etc.
* clone entry w/ entry children between db's (through transfer! *  give transfer a clone option)
* clone child records from record to record option
* list boolean operator table in search.php page
* utf-8 diamonds in fulltext search results
* git.php url, "Oh, so, how to git to this project"
* store/display text without any html entities at all
* option to detect/correct alphabetizing the list of "words" at /classes/Languages/words/*
* detect texts over x-length that should be broken up
* if user ever logs in on http, save a cookie that makes them always redirect to https
* fix spacing on the siblings-navigation panel
* detect commas in entry CODE field
* entry code generation, preserve dashes that occur without spaces, i.e., "self-employment" vs "chapter 1 - self employment";
* detect entry titles containing zero-padded numbers, i.e. "Chapter 01"
* make all comment links be "no-follow"
* mouseover on detectbadtext's errors, indicating the correct-theorized spelling
* README.MD in ~ALL~ folders!
* detect no-longer matching keyword/tag-for-entry's text
* make "birth day", "death day", "publication" be preselectable options for publication title
* detector for broken image records wherein some size field is set to 0
* annual reminder to delete and refresh all api keys/passwords
* modify.php: "about to leave this page" warning on pages if there have been changes to any fields
* cut words like "a", "an", "the" from code-generation
* make a common clonefrom.com/images/*some-doc-type-image-that-is-general*/ folder
* colorize icons for terms/privacy/codeofconduct pages

# Done

## Version 1.01

* intensive spellchecker, detect odd caps in text (i.e., thIs)
* common misspelling spellchecker
* complete anarchistcode.com
* change google API keys (oops, sorry for leaking that on github, sigh)
* changing filename of an image doesn't move the image locations of Image.IconFileName and Image.StandardFileName
* disallow %'s in filenames when uploading images
* make permalink url's script-intelligent, i.e., site.com/?id=123 goes to Entry 123's view.php url, but now site.com/modify.php?id=123&action=Edit will redirect to Entry 123's modify.php?action=Edit URL
* detect "logged-in-status" on non-https pages, and properly redirect to https pages
* have all scripts' templates use the modularized entry-controls.php
* login.php: allow google use
* logout.php: allow google use
* login.php: redirect to url option
* logout.php: redirect to url option
* fix display of small-than-icon size images at revoltlib, etc,. templates
* list title auto-generation, ucfirst after all is done
* zap all passwords or password-passed args from bash files
* make entrycontrols module accept that=>this as args in constructor and not in function calls
* module-ize breadcrumb trails
* module-ize login/logout info
* add breadcrumbs/login info to suggest.php
* remove login/logout info from bottom of all templates
* fixup login info for classes/Language/Dictionary.php
* fix bad format-icon images on terms/codeofconduct/etc pages
* modularize the alternate format icons/etc.
* miniaturize bad format-icon images on terms/codeofconduct/etc pages
* export user data - fix format icons
* handle alternate formats for terms/codeofconduct/privacy/etc pages
* actually move user-login info to top of page plz
* fix privacy policy/code of conduct/terms pages to have proper audio-translators
* finish terms/codeofconduct/privacy/etc pages

## Version 1.00

* make format icons tiny, but have them resize to large when hover'd over
* add server, get, post var's to internalserverissue-logging
* issue logging on 404
* actually move the password to the globals file
* test robots.txt regexes
* actually move the brand new user default password
* move google api keys to globals
* long-term, actual test robots.txt regexes diagnostic tool
* show artist/uploader/etc. info for floatover of main index image