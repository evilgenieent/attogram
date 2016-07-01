Attogram Framework
==================
[//]: # ( Attogram Framework - README.md (markdown) - v0.1.0 )

* The Attogram Framework provides developers a PHP skeleton starter site with
content modules, file-based URL routing, IP-protected backend, user system,
integrated SQLite database with web admin, Markdown parser, jQuery and Bootstrap.

* The Attogram Framework is Dual Licensed under the MIT License (MIT)
_or_ the GNU General Public License version 3 or higher (GPL-3.0+), at your choosing.

* [Read more about how to install, setup and extend Attogram](modules/attogram/actions/about.md).

More Info
=========

* Attogram @ GitHub: https://github.com/attogram/attogram
* [Download latest Attogram as a zip file](https://github.com/attogram/attogram/archive/master.zip)

* Attogram @ Packagist: https://packagist.org/packages/attogram/attogram-framework

Notes
=====
* Need the `vendor` directory and can't run composer?  Download and install the [Attogram vendor package as a zip file](https://github.com/attogram/attogram-vendor/archive/master.zip).

* Or get the Attogram vendor package @ GitHub: https://github.com/attogram/attogram-vendor


_Attogram now has modules!  Updated docs coming soon..._

Attogram gives developers a jumpstart to quickly create web sites.

Attogram is a PHP-based framework that provides developers a skeleton site with:

* file-based URL routing
* IP-protected backend
* simple user system
* integrated SQLite database with phpLiteAdmin
* Markdown parser
* jQuery and Bootstrap

After that, Attogram tries to stay out of your way while you do your thing!

Attogram is Dual Licensed under the The MIT License *or* the GNU General Public License, at your choosing.

Requirements
============
* PHP5 or PHP7, with SQLite PDO driver
* Apache 2.2.16 or higher, with setting: AllowOveride all

Setup: Install
==============

* Get Attogram:
  * use Composer:  
    `composer create-project attogram/attogram-framework your-install-directory`
  * or manually install:
    * Download latest code from GitHub:[`https://github.com/attogram/attogram/archive/master.zip`](https://github.com/attogram/attogram/archive/master.zip)
    * If composer is not available, also download the vendor distribution from [`https://github.com/attogram/attogram-vendor/archive/master.zip`](https://github.com/attogram/attogram-vendor/archive/master.zip) and move the `./vendor/` directory to the top level of your install directory.

* Setup your web server to use the `./public/` directory as the web site root.

* edit `./public/.htaccess`, set **FallbackResource**, **ErrorDocument 403** and **ErrorDocument 404** to the full web path to the index.php file in the install directory.

* (optional) copy `./public/config.sample.php` to `./public/config.php` and edit to change default settings .

Setup: Admin
============
* admin pages are IP protected
* change the allowed admin IPs by setting `$config['admins']` in `./public/config.php`
* default admin IPs is localhost in ip4 and ip6: `array( '127.0.0.1', '::1' )`
* admin page requests from non-admin IPs will result in a 404 Page Not Found error

Setup: Database
===============
* Make sure the database file `./db/global` is writeable by the web server
* Tables are lazily created when needed.  To create all tables at once,
goto the [**db-setup admin page**](../db-setup/) and click **Create Attogram Tables**
* phpLiteAdmin is available for database administration, goto the [**db-admin admin page**](../db-admin/), default password is **attogram**

Setup: Users
============
* load the homepage, goto admin action [**users**](../users/), click **Create New User**
* enter username, password, etc. and click **Insert**
* load the homepage, click [**login**](../login), login as the new user

Create a page
=============
* create a new **PHP** or **Markdown** file in the `./actions/` directory, add anything you want!
* The filename is used as the page URL.  ./actions/**example**.php = example.com/**example**/

PHP pages
=========
* PHP filenames must end in `.php`
* The Attogram object is available via the `$this` variable
* Helpful functions:
  * $this->page_header($title)
  * $this->page_footer()
  * $this->log->debug(), ->error(), etc.
  * $this->get_site_url()
  * $this->error404($error_message)
  * $this->is_admin()
  * $this->is_logged_in()
* Depth settings in `./public/config.php`
  * `$config['depth']['insert-action-name-here']`
* End Slash settings in `./public/config.php`
  * `$config['no_end_slash'][] = 'insert-action-name-here'`

Markdown pages
==============
* Markdown filenames must end in `.md`
* The first line of the Markdown file is used as the page title

Remove a page
=============
* delete the pages corresponding file from the `./actions/` directory

Admin pages
===========
* create/delete the same as normal pages, but in the `./admin/` directory

Database tables
===============
* To add a table, add a file into `./tables/` directory
* The filename must be the name of the table
* File content is the sql `CREATE TABLE ...` statement
* tables are automatically created upon first use

Web discovery
=============
* If [`./robots.txt`](../robots.txt) does not exist, Attogram dynamically serves it, with a link to the Sitemap
* If [`./sitemap.xml`](../sitemap.xml) does not exist, Attogram dynamically serves it, with a listing of all public pages

Admin URL overrides
===================
* admins may use URL/[`?noadmin`](?noadmin) on any page to turn off admin access
* admins may use URL/[`?debug`](?debug) on any page to turn on debugging

More Info
=========
* Attogram @ GitHub: https://github.com/attogram/attogram
* Attogram vendor package @ GitHub: https://github.com/attogram/attogram-vendor
* Attogram @ Packagist: https://packagist.org/packages/attogram/attogram-framework
* Demo: http://getitdaily.com/attogram/
