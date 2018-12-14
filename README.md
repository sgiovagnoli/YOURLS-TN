# YOURLS Plugin: YOURLS-TN
Plugin for [YOURLS](http://yourls.org) (version 1.7 or newer)

Description
-----------
Display thumbnails on YOURLS admin page ans stats page, using thumbnail.ws.

Installation
------------
1. Go to the folder `./user/plugins/` inside your YOURLS
1. Create a folder named "tn", and download all files from here into this folder
1. Go to [thumbnail.ws](https://thumbnail.ws/), sign up and copy your Free API-key
1. Edit `./user/plugins/tn/plugin.php`, paste your Free API-key here : `define( 'THUMBNAIL_WS_API_KEY', 'YOUR-FREE-API-KEY' );`
1. If you want, you can adjust the width of the thumbnails (default admin is 200px, default stat is 500px)
1. Go to the plugin admin page and activate the plugin
1. here you are

License
-------
<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>.
