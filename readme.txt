=== Mailchimp Single Sub ===
Contributors: haroldparis
Donate link: http://www.tribeleadr.com/
Tags: mailchimp, single optin, single opt-in
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 0.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Provides a shortcode and a widget to add a single optin Mailchimp form.

== Description ==

Provides a shortcode and a widget to add a single optin Mailchimp form.

== Frequently Asked Questions ==

= Does it allow to add new subscribers on mailchimp without double optin ? =

Yes it does ! And that's exactly the point of this plugin

= It does not work ! =

From scratch ? No, it won't. I've still got some things to do to make it "user friendly".

There are a few steps to take to configure the plugin :

1. In /inc/config.php - you need to set your API Key from Mailchimp and set your list ID
2. In /inc/mcapi_listSubscribe.php - you need to set the pages to show for "thank you for subscribing" and also the one to show them in case of error

= It still does not work ! =

You sure you took those previous steps ? If so, feel free to contact me on Github. The better is to post an issue here :

= What's the shortcode code ? =

It's : "[mailchimp-single-sub-print]"

= Where's the widget ? =

The widget will be available on your widgets page. Its name is : Mailchimp Single Sub Widget

= Man ! This is a cool plugin ! How to thank you ? =

Well, you can give me shoutout here on twitter : @haroldparis

= Cheers ! =

Yeah ! Cheers ! ^^

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets 
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png` 
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 0.2 =
* Added the widget

= 0.1 =
* Plugin creation ! Woohoo !

== License ==

Copyright &copy; 2013 TRIBELEADR

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/.