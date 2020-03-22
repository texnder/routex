# routex
light and fast routing system for PHP framework

## Installation
install this library using composer.

	syntex:
		composer require texnder/routex


## Clean Url
using routex library you can write clean urls for application pages. It's easy and fast in use. It provides professional look to your website and also helps you indexing high in google search. clean url very much helps in digital marketing and search engine optimisation(SEO).

## defined your own routes
Routex provides full freedom to define custom Urls for each pages of application. if client request is different from Urls which are defined in application, client will get [404 http error] response.

## create Route instance
create new instance and pass resource directory path and view file extension([.html] or [.php] : By default it's [.php]) as argument for constructor.

	syntex:
		Routex\Route(string [resource directory],string [file .extension]);

## Use .htaccess file
use .htaccess file to redirecting each request to Routex library, where it can resolve requested url and send response data to client back.

## any queries
for any further queries, please email us on: (texnder.components@gmail.com)

## License

The aditex is open-sourced php library licensed under the [MIT license](http://opensource.org/licenses/MIT).
