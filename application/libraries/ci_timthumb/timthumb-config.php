<?php
/**
 * Parametros com valores diferentes do default que consta no timthumb.php
 *
 */

//Image fetching and caching
if(! defined('FILE_CACHE_TIME_BETWEEN_CLEANS'))	define ('FILE_CACHE_TIME_BETWEEN_CLEANS', 864000);	// How often the cache is cleaned

if(! defined('FILE_CACHE_MAX_FILE_AGE') ) 	define ('FILE_CACHE_MAX_FILE_AGE', 864000);				// How old does a file have to be to be deleted from the cache
if(! defined('FILE_CACHE_SUFFIX') ) 		define ('FILE_CACHE_SUFFIX', '');						// What to put at the end of all files in the cache directory so we can identify them
if(! defined('FILE_CACHE_DIRECTORY') ) 		define ('FILE_CACHE_DIRECTORY', './file/cache');		// Directory where images are cached. Left blank it will use the system temporary directory (which is better for security)
if(! defined('FILE_CACHE_ENABLED') ) 		define ('FILE_CACHE_ENABLED', TRUE);					// Should we store resized/modified images on disk to speed things up?

//Browser caching
if(! defined('BROWSER_CACHE_MAX_AGE') ) 	define ('BROWSER_CACHE_MAX_AGE', 2592000);				// Time to cache in the browser

//Image size and defaults
if(! defined('MAX_WIDTH') ) 			define ('MAX_WIDTH', 700);									// Maximum image width
if(! defined('MAX_HEIGHT') ) 			define ('MAX_HEIGHT', 700);								// Maximum image height

if(! defined('DEBUG_ON') )					define ('DEBUG_ON', true);								// Enable debug logging to web server error log (STDERR)
if(! defined('DEBUG_LEVEL') )				define ('DEBUG_LEVEL', 3);								// Debug