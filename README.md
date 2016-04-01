Every Click Counts
==================

Plugin for [YOURLS](http://yourls.org) `1.5+`. 

Description
-----------
This plugin, aptly named "Every Click Counts", is for counting every click. That is, including multiple clicks for the same client. This is done by not caching the 301 redirects.

Installation
------------
1. In `/user/plugins`, create a new folder named `every-click-counts`.
2. Drop these files in that directory.
3. Go to the Plugins administration page ( *eg* `http://sho.rt/admin/plugins.php` ) and activate the plugin.
4. Have fun (with counts in large amounts)!

License
-------
* Copyright (c) 2016 BestNa.me (http://BestNa.me)
* Licensed under the MIT license:
* http://www.opensource.org/licenses/mit-license.php

Background
--------------
This plugin prevents the caching of [HTTP 301 redirects](https://en.wikipedia.org/wiki/HTTP_301) as issued by [YOURLS](http://yourls.org) for every short URL. With such a redirect cached in a client browser, the client will not hit the server with the YOURLS installation on subsequent visits of the respective short URL (but rather jump directly to the corresponding long URL). Consequently, only a first client hit of a short URL can be counted by [YOURLS](http://yourls.org). In other words, subsequent hits are not included in the clicks statistics. 

Instead you may want to see *every* click included, that is, including multiple clicks for the same client. If this is so, then this plugin is for you: if activated, HTTP 301 redirects are not cached anymore.

To also see your own multiple clicks as an admin counted, notice that you may need to get rid of the redirects already cached in your browser if you had already used your [YOURLS](http://yourls.org) install before, that is, without this plugin being activated. Depending on what browser you use, this might be more or less elaborate, see e.g. this [discussion on stackoverflow.com](http://stackoverflow.com/questions/9130422/how-long-do-browsers-cache-http-301s).
