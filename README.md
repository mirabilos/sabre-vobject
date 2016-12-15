sabre/vobject
=============

The VObject library allows you to easily parse and manipulate [iCalendar](https://tools.ietf.org/html/rfc5545)
and [vCard](https://tools.ietf.org/html/rfc6350) objects using PHP.

The goal of the VObject library is to create a very complete library, with an easy to use API.

Derivative
----------

This derivative of Sabre\vObject parses data from legacy libical versions correctly.


Installation
------------

VObject requires PHP 5.3, and should be installed using composer.
The general composer instructions can be found on the [composer website](http://getcomposer.org/doc/00-intro.md composer website).

After that, just declare the vobject dependency as follows:

    "require" : {
        "sabre/vobject" : "~3.4"
    }

Then, run `composer.phar update` and you should be good.

Usage
-----

* [3.x documentation](http://sabre.io/vobject/usage/)
* [2.x documentation](http://sabre.io/vobject/usage_2/)
* [Migrating from 2.x to 3.x](http://sabre.io/vobject/upgrade/)

Support
-------

Head over to the [SabreDAV mailing list](http://groups.google.com/group/sabredav-discuss) for any questions.

Made at fruux
-------------

This library is being developed by [fruux](https://fruux.com/). Drop us a line for commercial services or enterprise support.
