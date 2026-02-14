=== VS Event List ===
Contributors: Guido07111975
Version: 19.9
Stable tag: 19.9
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Requires PHP: 7.4
Requires at least: 6.0
Tested up to: 6.9
Tags: event, events, event list, event manager, classicpress


With this lightweight plugin you can create an event list.


== Description ==
= About =
With this lightweight plugin you can create an event list.

Main features of the plugin:

* Free and lightweight
* Support for Block Editor and Classic Editor
* Display your event list with block, shortcode or widget
* Display upcoming and past events
* Share events via RSS or iCal feed
* Organise events with categories
* Customize your event list via the settings page or with attributes
* Add extra content to events with the Advanced Custom Fields (ACF) plugin
* Documentation at WP plugin page
* Active support from developer at WP forum

= How to use =
After installation go to menu item "Events" and create some events.

Go to the editor and add the VS Event List block or the shortcode `[vsel]` to a page. This will display your event list.

Or go to Appearance > Widgets and use the VS Event List widget.

When using the shortcode add the `list` attribute to display the events you want.

* `[vsel list="upcoming"]` to display upcoming events (today included)
* `[vsel list="future"]` to display future events (today not included)
* `[vsel list="current"]` to display current events
* `[vsel list="past"]` to display past events (before today)
* `[vsel list="all"]` to display all events

Without this attribute the default event list is displayed (upcoming events).

Customize your event list via the settings page or with attributes.

= Settings page =
The settings page is located at Settings > VS Event List.

= Attributes =
Settings can be overridden by adding attributes to the block, shortcode, or widget.

This can be useful when having multiple event lists on your website.

* Add custom CSS class to event list: `class="your-class-name"`
* Change the number of events per page: `posts_per_page="5"`
* Display all events (without pagination): `posts_per_page="-1"`
* Skip one or multiple events: `offset="1"`
* Change date format: `date_format="j F Y"`
* Display events from a certain category: `event_cat="your-category-slug"`
* Display events from multiple categories: `event_cat="first-category-slug, second-category-slug"`
* Reverse the order of events in the upcoming, future and current events list: `order="DESC"`
* Reverse the order of events in the past and all events list: `order="ASC"`
* Change the "no events are found" text: `no_events_text="your text"`
* Disable event title link: `title_link="false"`
* Disable featured image link: `featured_image_link="false"`
* Disable featured image caption: `featured_image_caption="false"`
* Disable featured image: `featured_image="false"`
* Disable read more link: `read_more="false"`
* Disable pagination: `pagination="false"`
* Display all event info: `event_info="all"`
* Display a summary: `event_info="summary"`

Example: `[vsel posts_per_page="5" event_cat="your-category-slug" event_info="summary"]`

When using the block or the widget, don't add the main shortcode tag or the brackets.

Example: `posts_per_page="5" event_cat="your-category-slug" event_info="summary"`

= Featured image =
Featured images will be used as the primary image for every event.

By default the "post thumbnail" is used as the source for the featured image. The size of the post thumbnail may vary by theme.

WordPress creates duplicate images in different sizes upon upload. These sizes can be set via Settings > Media. If the post thumbnail doesn't look as expected (low resolution or poor cropping), you can choose a different size via the settings page.

You can also change the width of the featured image.

The featured image on the single event page is handled by your theme.

= Default support =
The plugin creates a custom post type "event".

This automatically supports the single event page, the event category page, the (event) post type archive page and the search results page. It hooks into the theme template file that is being used by these pages.

Support for the single event page is needed. Support for the other pages is added to make the plugin compatible with page builder plugins. Events on default WP pages are not ordered by event date.

Plugin activates the post attributes box in the editor. In the post attributes box you can set a custom order for events that have the same date. Custom order can be handy when automatic ordering by time is disabled.

Plugin supports the menu page. Support is added to make the plugin compatible with page builder plugins.

= Advanced Custom Fields (ACF) =
You can add extra content to the event details or the event info by using the [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields) plugin. The most commonly used fields are supported.

Create a field group for the post type "event" and add fields to this group. This new field group will then be added to the editor. With these fields you can add the extra content to each event.

Via the settings page you can decide where to display the extra content.

= RSS and iCal feed =
You can share your upcoming events via an RSS feed.

The default RSS widget will display events from future to upcoming. To reverse this order I recommend using an RSS feed plugin capable of changing the RSS feed order.

You can share your upcoming and past events with an external calendar via an iCal feed.

You can activate both feeds on the settings page.

= Have a question? =
Please take a look at the FAQ section.

= Translation =
Translations are not included, but the plugin supports WordPress language packs.

More [translations](https://translate.wordpress.org/projects/wp-plugins/very-simple-event-list) are very welcome!

The translation folder inside this plugin is redundant, but kept for reference.

= Credits =
Without help and support from the WordPress community I was not able to develop this plugin, so thank you!


== Frequently Asked Questions ==
= How do I set plugin language? =
The plugin will use the website language, set in Settings > General.

If translations are not available in the selected language, English will be used.

= Does plugin support multilingual websites? =
Yes, but do not set custom labels for Date, Time, Location, etc via the settings page. Use a multilingual plugin instead.

= How do I set the date and time format? =
By default, the plugin uses the date and time format from Settings > General.

The date picker in the editor is using the date format from your browser.

You can change the date and time format for the frontend of your website via the settings page. You can also change the date format by using an attribute.

The date icon only supports 2 date formats: "day-month-year" (30 Jan 2016) and "year-month-day" (2016 Jan 30).

If your date format is not supported, it will be converted into 1 of the 2 formats above.

= Which timezone does the plugin use? =
Events are saved in the database and displayed at your website without a timezone offset.

= Why does the event list look different between themes? =
The plugin uses minimal styling and therefore also depends on the styling of your theme.

The single event page uses the same template as a post. This template may vary by theme.

= Why is the event list not displaying properly? =
The following only applies to pages with a manually added shortcode.

When using the block editor, edit the page and check the shortcode in "Edit as HTML" mode.

When using the classic editor, edit the page and check the shortcode after switching to the "Text" tab instead of "Visual".

The shortcode might be accidentally wrapped in HTML tags, such as code tags. Remove these tags and resave the page.

= Can I have multiple event lists on the same page? =
This is possible, but to avoid a conflict you should disable pagination. This can be done via the settings page or by using an attribute.

= How does the plugin hook into theme template files? =
The plugin hooks into the `the_content()` and `the_excerpt()` functions. These are used by most themes.

= Can I override the plugin template files via my (child) theme? =
You can only override the single event page via your (child) theme.

In most cases, the PHP file "single" is being used for the single event page. This file is located in your theme folder.

Create a duplicate of the file "single" and rename it "single-event". Then add this file to your (child) theme folder and customize it to your needs.

= Can I change the colors of the date icon? =
You can use page Additional CSS of the Customizer for your custom styling.

Examples:

Change background and text color of whole icon: `.vsel-start-icon, .vsel-end-icon {background:#eee; color:#f26535;}`

Change background and text color of top part: `.vsel-day-top, .vsel-month-top {background:#f26535; color:#eee;}`

= Why does the location map not display properly? =
Plugin has been tested with Google Maps and OpenStreetMap.

You should use the HTML iframe embed code. It starts and ends with an iframe tag.

OpenStreetMap may add HTML that contains a link to a bigger map, after the closing iframe tag. You can leave or remove this HTML.

= Why is there no pagination in the widget? =
Pagination is not working properly in a widget.

But you can add a link to the page that displays more events.

= Why is there no pagination when using the offset attribute? =
Offset breaks pagination. That's why pagination is disabled when using the offset attribute.

= Can I have "Event" as page title? =
Having "Event" as page (or post) title will not cause any problems, but having "event" as slug (end of URL) will cause a conflict with the (event) post type archive page.

You should change this slug into something else. This can be done by changing the permalink of this page (or post).

= Why a 404 (nothing found) when I click the title link? =
This is often caused by the permalink settings. Please resave the permalink via Settings > Permalinks.

= Why a 404 (nothing found) when I click the event category link? =
This is often caused by the permalink settings. Please resave the permalink via Settings > Permalinks.

= Why no event details or event categories box in the editor? =
When using the block editor, click the options icon and select "Preferences".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

= Why no featured image box in the editor? =
When using the block editor, click the options icon and select "Preferences".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

But sometimes your theme does not support featured images. Or only for posts and pages. In that case you must manually add this support for events.

= Why no Advanced Custom Fields field group in the editor? =
When using the block editor, click the options icon and select "Preferences".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

= Why does my RSS or iCal feed not refresh? =
When visiting your feed via the subscription URL and feed is outdated, empty your browser cache.

If you're using the default RSS widget you can force a refresh via Settings > Reading, by changing the number of items in the feed.

But this may not work in case there's other caching as well.

= Why is there no semantic versioning? =
The version number won't give you info about the type of update (major, minor, patch). You should check the changelog to see whether or not the update is a major or minor one.

= How can I make a donation? =
You like my plugin and want to make a donation? There's a PayPal donate link at my website. Thank you!

= Other questions or comments? =
Please open a topic in the WordPress.org support forum for this plugin.


== Changelog ==
= Version 19.9 =
* Minor changes in code

= Version 19.8 =
* Added support for ClassicPress
* The block will only load in WP 6.3 and higher
* Reverted the "Requires at least" version to 6.0

= Version 19.7 =
* Minor changes in code

= Version 19.6 =
* New: display location map in your event details
* Added field for the iframe embed code
* Plugin has been tested with Google Maps and OpenStreetMap
* New: location field accepts line breaks
* Minor changes in code

= Version 19.5 =
* New: setting to link date label and date icon to single event page

= Version 19.4 =
* Fix: forgot text in editor about info and available attributes

= Version 19.3 =
* Full rewrite of the block
* It now supports the Block API version 3
* Bumped the "Requires at least" version to 6.3

= Version 19.2 =
* Fixed errors flagged by PCP
* Added translation descriptions
* Output escaping for widget
* Minor changes in code

= Version 19.1 =
* Code improvements
* Thanks to Craig from Roundup WP

= Version 19.0 =
* New: display event details on top (full width)
* Fix: timezone related error (flagged by PCP)
* Added RTL (Right-To-Left) language support for date icons
* Minor changes in code

For all versions please check file changelog.


== Screenshots ==
1. Event list
2. Event list
3. Event list widget
4. Single event
5. Page with block (dashboard)
6. Widget (dashboard)
7. Events page (dashboard)
8. Single event (dashboard)
9. Settings page (dashboard)
10. Settings page (dashboard)
11. Settings page (dashboard)
12. Settings page (dashboard)
13. Settings page (dashboard)
14. Settings page (dashboard)
15. Settings page (dashboard)
16. Settings page (dashboard)
17. Settings page (dashboard)