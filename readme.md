RestrictedAssets Plugin For Craft CMS

To use this plugin just make a link like below:

`<a href="actions/RestrictedAssets/download/{{ asset.id }}">{{asset.title}}</a>`

And it will check if the user is logged in or not, only then he or she can download the file.

and remember to create a .htaccess file in your source folder with the following line:

`deny from all`
