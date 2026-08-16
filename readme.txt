=== Nexus – SEO REST Meta for Watchdog ===
Contributors: lookitdesign
Tags: rest api, seo, meta, n8n, watchdog
Requires at least: 5.8
Tested up to: 7.0
Requires PHP: 7.4
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Exposes SEO meta fields for the watchdog post type over the WordPress REST API so they can be written by automation tools such as n8n.

== Description ==

This plugin registers the SEO meta fields used by the watchdog post type (focus keyphrase, meta description, and related keyphrases) with `show_in_rest` enabled, so they can be read and written through the standard WordPress REST API. This lets automation workflows (for example, n8n) set SEO values when creating or updating watchdog posts. It is designed to work with Yoast SEO.

Write access requires the `edit_posts` capability, enforced by an authorization callback on each field. The plugin makes no external network requests of its own.

== Changelog ==

= 1.0.1 =
* Renamed the plugin and slug to remove a restricted trademarked term so it can be published.
* Added the required License header and a readme.txt.

= 1.0.0 =
* Initial release: registers SEO meta fields for the watchdog post type for REST API access.
