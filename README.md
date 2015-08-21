Phaste
======
###### (The 'h' is silent)

God what a great name. Probably.

Demo available at https://pste.pw

GitHub: https://github.com/FoxDev/Phaste

GitLab: https://gitlab.notoriousdev.com/foxdev/Paste

### Anyway, how to install...

* Install [Phalcon](https://phalconphp.com/en/).
* Set up your webserver pretty much how you'd set any other Phalcon app up. See https://docs.phalconphp.com/en/latest/reference/nginx.html and https://docs.phalconphp.com/en/latest/reference/apache.html.
* Create a database and user to access said database.
* Run `mysql -u <user> -p < schemas/paste.sql`, where `<user>` is the user you just created to initialise the database.
* Copy config.ini.dist to config.ini and edit it as you see fit.
* Probably have fun assuming nothing went wrong.

### For developers...

It is recommended to use https://github.com/phalcon/vagrant for development to ease the process of setting up a development environment, and to ensure a consistent environment when debugging.

### Clients

[PstePy](https://github.com/FoxDev/PstePy) (Python, CLI)