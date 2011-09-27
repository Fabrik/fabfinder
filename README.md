This system plugin and admin module allow you to search from within your Joomal1.7 administration pages. 
You can search for:
* Fabrik records
* Content articles
* Users
* Modules
* Plugins
* Categories
* Components
* K2 Items
* Menus
* Menu Items
* RS Events
* Users
* Virtuemart products
* 

Search types can be added by adding a PHP file to 
plugins/system/fabfinder/adaptors/

They should set a variable $tmp which is then merged into the search results.

$tmp should be an array of objects, each object should have the following properties

* title 
* text
* href
* 
* generally $tmp is produced by a database query- see plugins/system/fabfinder/adaptors/content.php for an example.
                                                - 