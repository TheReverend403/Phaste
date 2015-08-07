Phaste
======

God what a great name. Probably.

Anyway...

* Install [Phalcon](https://phalconphp.com/en/).
* Install [Phalcon dev tools](https://github.com/phalcon/phalcon-devtools).
* Set up your webserver pretty much how you'd set any other Phalcon app up (root set to public/, correct rewrite rules etc...).
* Create a database and user to access said database.
* Copy config.ini.dist to config.ini and edit it as you see fit.
* Same as above for app/config/config.php.dist => app/config/config.php
* Run `phalcon migration run` from the project's root folder.
* Probably have fun assuming nothing went wrong.