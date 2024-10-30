=== More Subscribers ===

Contributors: mdarmanin
Plugin Name: More Subscribers
Version: 2.0.0
Stable tag: 2.0.0
Plugin URI: https://wordpress.org/plugins/more-subscribers/
Description: A simple plugin that uses a widget to ask for someones first name, last name and email address and adds it to WP Users as a subscriber.
Tags: more subscribers, newsletter
Author URI: https://profiles.wordpress.org/mdarmanin
Author: Michael Darmanin (mdarmanin)
Requires at least: 3.0.1
Tested up to: 4.6.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html/

== Description ==

Sometimes, you just want to get the users first name, last name and email address and have it added to WordPress user list as a subscriber. This
plugin does just that! 

Perhaps you would like to start sending out newsletters to your subscribers? There are plenty of WordPress
plugins that allow you to set up newsletters so you can start sending out mailing lists to your subscribers.

Grow your subscriber list today and start connecting with your subscribers.

Technical details:

When a subscriber signs up, a new user is created in the wp_users table as a subscriber. The subscriber will contain the details provided through the form and a random password will be assigned consisting of a complex randomly generated string of 34 characters in length.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `more-subscribers` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to widgets to see the available widget and drag it your desired location.

== Frequently Asked Questions ==

= Can I change the password of the subscriber? =

Yes! Simply go to the subscribers account and change the password there.

= What happens when a user hits submit after entering an email address? =

An alert pops up letting the user know that their email address has been added to the database.

= What about support for WPML? =

It is possible for WPML to detect strings in the plugin so these can be translated.

= What about security and strange inputs? =

There are multiple security checks carried out to ensure that strange inputs like php code, and sql injections are not inserted into the database as-is. Instead, such inputs are manipulated by the plugin before being inserted.

= Can I get more custom functionality? =

Sure, just leave a message behind in the forum as to what you would like to have included in the plugin and I will do my best to make time and implement the new changes.

== Screenshots ==

1. How the widget looks in my dev.

== Changelog ==

= 2.0.0 =
* User can now provide first and last name
* Subscriber random generated password consists of 34 random characters i.e. $P$BUPKmRDgIjrCb0RGLBwywtFSvyyfgK1
* Changed default role to 'subscriber' to prevent admin roles being inserted if default role is set to something else in Settings -> General
* User receives appropriate message when no email is entered and submit is clicked
* Strings can now be detected by WPML making translation possible
* Extra security audits at both front and back-end level to ensure no php or sql injections end up in the database
* Input widths are set to 100% wide
* Debugging provides no errors since refactoring a few functions to new WP style

= 1.2.16 =
* Still testing with version control

= 1.2.15 =
* Still testing with version control

= 1.2.14 =
* Still testing with version control

= 1.2.13 =
* Still testing with version control

= 1.2.12 =
* Still testing with version control

= 1.2.11 =
* Still testing with version control

= 1.2.10 =
* Still testing with version control

= 1.2.9 =
* Still testing with version control

= 1.2.8 =
* Still testing with version control

= 1.2.7 =
* Still testing with version control

= 1.2.6 =
* Still testing with version control

= 1.2.5 =
* Still testing with version control

= 1.2.4 =
* Improving the readme.txt

= 1.2.3 =
* Improving the readme.txt

= 1.2.2 =
* Improving the readme.txt

= 1.2.1 =
* Improving the readme.txt

= 1.2.0 =
* Initial release