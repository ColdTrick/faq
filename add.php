<?php
/*
* A Frequently Asked Question Plugin
*
* @module faq
* @author ColdTrick
* @copyright ColdTrick 2009
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
* @link http://www.coldtrick.com
*/
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

admin_gatekeeper();

// Page elements
$title = elgg_view_title(elgg_echo('faq:add:title'));
$add = elgg_view('faq/forms/add');

// Page data
$page_data = $title . $add;

// display page
page_draw(elgg_echo('faq:add:title'), elgg_view_layout("two_column_left_sidebar", "", $page_data));	
?>