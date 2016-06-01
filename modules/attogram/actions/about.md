Attogram Framework
==================
[//]: # ( Attogram Framework - About Page (markdown) - v0.0.4 )

Attogram gives developers a jumpstart to quickly create web sites.

Attogram runs on PHP with Apache. It provides developers a skeleton site with:

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

* Setup apache to use `./public/` directory as the web site root.

* edit `./public/.htaccess`, set **FallbackResource**, **ErrorDocument 403** and **ErrorDocument 404** to the full web path to the index.php file in the install directory.

* copy `./public/config.sample.php` to `./public/config.php` and edit to change default settings.

Setup: Admin
============
* admin pages are IP protected
* change the allowed admin IPs by setting `$config['admins']` in `./public/config.php`
* default admin IPs is localhost in ip4 and ip6: `array( '127.0.0.1', '::1' )`
* admin page requests from non-admin IPs will result in a 404 Page Not Found error

Setup: Database
===============
* Make sure the database file `./db/global` is writeable by the web server
* load the homepage, goto admin action [**db-setup**](../db-setup/), click **Create Attogram Tables**
* load the homepage, goto admin action [**db-admin**](../db-admin/), login as **attogram**

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
  * `$config['force_slash_exceptions'][] = 'insert-action-name-here'`

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