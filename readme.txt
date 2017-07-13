=== Media Category Library ===
Contributors: timmcdaniels
Donate link: http://WeAreConvoy.com
Tags: media library, attachments, upload date, media taxonomy
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 2.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WordPress plugin that allows items in the Media Library to be assigned to a category.

== Description ==

Features include:

* Associate categories to each file in the Media Library
* Edit or delete media categories
* View files associated to categories in a separate submenu page of Media called Media Category Library
* Change the upload date of files in the Media Category Library
* In Media Category Library, view a list of Pages that have the file included in the content.
* Display lists of files by categories using a shortcode: [mediacat cats="Documents,Images" orderby="date" order="DESC"] or [mediacat cats="Documents,Images" orderby="title" order="ASC"]
* Front end search form with customizable rewrite URL -- the default URL is /mediacat-library/ (or ?mediacat_library=1 if you use default permalinks), but this can be changed in the plugin settings
* Display front end search form by shortcode: [mediacatform]

== Installation ==

1. Upload `media-category-library` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Enable permalinks (optional but suggested)

== Frequently Asked Questions ==

= How do I access the frontend search form? =

The frontend search form is available as a rewrite URL (requires a permalink structure to be defined); the default URL is http://www.YOUR_DOMAIN_HERE.com/mediacat-library/. You can change the rewrite URL under Settings -> Media Category Library. If you don't use a permalink structure, you can access it here: http://www.YOUR_DOMAIN_HERE.com/?mediacat_library=1

= How do I change the HTML output of the search form, search results, and/or shortcode output? =

Create a directory named media-category-library in your theme directory and then copy the 3 HTML templates (search.php [search form], list.php [search results], and shortcode.php [shortcode output]) from the plugin's views directory into that new directory. The plugin will use the HTML templates in your theme instead of the ones found in the plugin's views directory.

== Screenshots ==
1. This is a screenshot of the Media Category settings page.

2. This is a screenshot of the Edit Media page with a Media Category checkboxes.

3. This is a screenshot of the backend Media Category Library page.

4. This is a screenshot of the Media Category Taxonomy page.

5. This is a screenshot of the frontend search form.

== Changelog ==

= 2.4 =
* Add limit for shortcode options

= 2.3 =
* Updated screenshots and readme file.

= 2.2 =
* Added media categories dropdown on Add New Media modal; used solution employed by Media-Taxonomies plugin (https://github.com/Horttcore/Media-Taxonomies).

= 2.1 =
* Added operator as a shortcode option at request of darksteir

= 2.0 =
* Added function_exists call for ANOTHER get_current_screen function

= 1.9 =
* Added function_exists call for get_current_screen function

= 1.8 =
* Add media category dropdown filter to Media Library list.

= 1.7 =
* Make changes that allow plugin to play more nicely with new media uploader.
* Allow multiple categories.
* Remove ability to choose category after upload -- category association only happens on edit media library page.
* Add distinct to search query and use prepared query.
* Fix number of warnings in error log.
* Fix delete image link from backend library page.

= 1.6 =
* Added French language support (translation by tlemaire).

= 1.5 =
* Fix backend search bug.

= 1.4 =
* Fixed keyword search issue.
* Fixed misspelling in views/list.php (Mar changed to May).
* Added Check All option to search form.

= 1.3 =
* Changed manage_options to manage_categories.
* Added set height for category container with overflow auto on search form.

= 1.2 =
* Fixed warning: Warning: in_array() expects parameter 2 to be array, null given in views/search.php

= 1.1 =
* Fixed warning: Warning: Missing argument 1 for MediaCategoryLibrary::media_category_content()
* Localization for Media Categories page name

= 1.0 =
* Added Media Categories taxonomy add/edit page.
* Improved links on edit media page.

= 0.9 =
* Fixed category deletion issue.

= 0.8 =
* Added returnposts parameter for shortcode function.

= 0.7 =
* Fixed shortcode orderby issue.
* Allow title or post_title and date or post_date for short code attributes.
* Add classes to shortcode table output to enable css display:none for certain columns.

= 0.6 =
* Fixed shortcode sorting issue.
* Add ability to customize templates by copying them to current theme.

= 0.5 =
* Fixed base url issue with search and pagination.
* Add orderby (title or date) and order (ASC, DESC, menu_order) to search and shortcode.

= 0.4 =
* Added priority for wp_title add_filter.

= 0.3 =
* Changed backend posts per page to 20.

= 0.2 =
* Fixed issues for WordPress subdirectory installs (thanks to Logitec21).
* Added German language support (translation by Logitec21).
* Changed URLs in plugin so that things work if you use default permalinks.
* Add custom column for media category on Media Library listing.

= 0.1 =
* First release!

== Upgrade Notice ==

= 0.1 =
First release!
