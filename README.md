This is a module for Jelix 1.8+, that shows a list of news. A module for an admin interface
is also provided to manage news. 


Installation
============

As the application developer
----------------------------

Install it by hands like any other Jelix modules, or use Composer.
In your project:

```
composer require "jelix/news-module"
```

Launch the configurator for your application to enabling the module.

```bash
php yourapp/dev.php module:configure news
php yourapp/dev.php module:configure news_admin
```

And then launch the installer to activate the module

```bash
php yourapp/install/installer.php
```

As an application user
----------------------

Retrieve the package, and copy the news directory into the modules/ or
extra-modules/ directory of the application.

Then execute on the command line, this command to configure the module:

```bash
php yourapp/install/configurator.php news
php yourapp/install/configurator.php news_admin
```

And then launch the installer to activate the module

```bash
php yourapp/install/installer.php
```
