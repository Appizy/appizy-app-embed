# Appizy App Embed

[![Build Status](https://travis-ci.org/Appizy/appizy-app-embed.svg?branch=master)](https://travis-ci.org/Appizy/appizy-app-embed)

Appizy official WordPress plugin is the easiest way to embed the web-calculator created with Appizy into your content.

Note: this is the development area. **For the ready to use package, got to the official [App Embed](https://wordpress.org/plugins/appizy-app-embed/#description) page on WordPress.org.**

## Usage

See [plugin readme](src)

## Contribute

### Install

The development of the plugin is Dockerified for easy setup.

Step 1 - start Docker

```bash
docker-compose -f ./docker/docker-compose.yml up
```

Step 2 - visit your localhost:8080 in your browser and the WordPress setup

Step 3 - activate the plugin in the WordPress interface.

Step 4 - enjoy testing, developing...

### PHP tests

* Install a WordPress test instance: `./bin/install-wp-tests.sh`
* Launch the tests:`phpunit`

### Javascript tests

* Install npm modules: `./bin/npm install`
* Launch the tests: `./bin/npm run test`

### SVN repo

https://plugins.svn.wordpress.org/appizy-app-embed/

## Resources

[WordPress readme validator](https://wordpress.org/plugins/developers/readme-validator/)

[WordPress plugin guidelines](https://developer.wordpress.org/plugins/wordpress-org/detailed-plugin-guidelines/)

[Plugin SVN](https://developer.wordpress.org/plugins/wordpress-org/how-to-use-subversion/)

[Introduction to unit testing of WordPress pluging](https://www.smashingmagazine.com/2017/12/automated-testing-wordpress-plugins-phpunit/)