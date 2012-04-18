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
	global $CONFIG;
	
	function faq_init(){
		global $CONFIG;

		if(get_plugin_setting("publicAvailable", "faq") == "yes" || isadminloggedin()){
			// Register a page handler, so we can have nice URLs
			register_page_handler('faq', 'faq_page_handler');
			
			// Extend footer
			extend_view("footer/links", "faq/footer");
			
			// Extend CSS
			extend_view("css", "faq/css");
			
			// Add Tools menu
			add_menu(elgg_echo("faq:shorttitle"), $CONFIG->wwwroot . "pg/faq/");
			
			register_elgg_event_handler('pagesetup', 'system', 'faq_pagesetup');
		
			// Register Actions
			register_action("faq/add", false, $CONFIG->pluginspath . "faq/actions/faq/add.php");
			register_action("faq/delete", false, $CONFIG->pluginspath . "faq/actions/faq/delete.php");
			register_action("faq/edit", false, $CONFIG->pluginspath . "faq/actions/faq/edit.php");
			register_action("faq/search", false, $CONFIG->pluginspath . "faq/actions/faq/search.php");
			register_action("faq/changeCategory", false, $CONFIG->pluginspath . "faq/actions/faq/changeCategory.php");
			
			if(get_plugin_setting("userQuestions", "faq") == "yes"){
				register_action("faq/ask", false, $CONFIG->pluginspath . "faq/actions/faq/ask.php");
				register_action("faq/answer", false, $CONFIG->pluginspath . "faq/actions/faq/answer.php");
			}
			
			// Register subtype
			add_subtype("object", "faq");
		}
	}
	
	function faq_pagesetup(){
		global $CONFIG;
		
		// Add Admin menu
		if(get_context() == "admin" && isadminloggedin()){
			add_submenu_item(elgg_echo("faq:title"), $CONFIG->wwwroot . "pg/faq/");
		} elseif(get_context() == "faq"){
			add_submenu_item(elgg_echo("faq:title"), $CONFIG->wwwroot . "pg/faq/");
			
			$cats = getCategories();
			foreach($cats as $id => $cat){
				add_submenu_item("- " . $cat, $CONFIG->wwwroot . "pg/faq/list?categoryId=" . $id);
			}
			
			if(isadminloggedin()){
				add_submenu_item(elgg_echo("faq:add"), $CONFIG->wwwroot . "pg/faq/add", "b");
				add_submenu_item(sprintf(elgg_echo("faq:asked"), getUserQuestionsCount()), $CONFIG->wwwroot . "pg/faq/asked", "b");
			}
			if(isloggedin() && get_plugin_setting("userQuestions", "faq") == "yes"){
				add_submenu_item(elgg_echo("faq:ask"), $CONFIG->wwwroot . "pg/faq/ask", "b");
			}
		}
	}
	
	function faq_page_handler($page){
		global $CONFIG;
		
		if(!empty($page[0]) && $page[0] == "add"){
			include($CONFIG->pluginspath . "faq/add.php");
		} elseif(!empty($page[0]) && $page[0] == "edit"){
			include($CONFIG->pluginspath . "faq/edit.php");
		} elseif(!empty($page[0]) && $page[0] == "ask"){
			include($CONFIG->pluginspath . "faq/ask.php");
		} elseif(!empty($page[0]) && $page[0] == "asked"){
			include($CONFIG->pluginspath . "faq/asked.php");
		} elseif(!empty($page[0]) && $page[0] == "list"){
			include($CONFIG->pluginspath . "faq/list.php");
		} else {
			include($CONFIG->pluginspath . "faq/index.php");
		}
	}
	
	//Helper functions
	function getCategories(){
		$result = array();
		
		$metadatas = find_metadata("category", "", "object", "faq", getFaqCount());
		
		foreach($metadatas as $metadata){
			$cat = $metadata['value'];
			$id = get_metastring_id($cat);
			
			if(!in_array($id, $result)){
				$result[$id] = $cat;
			}
		}
		
		natcasesort($result);
		
		return $result;
	}
	
	function getFaqs($category = ""){
		return get_entities_from_metadata("category", $category, "object", "faq", 0, getFaqCount($category));
	}
	
	function getFaqCount($category = ""){
		return get_entities_from_metadata("category", $category, "object", "faq", 0, 0, 0, "", 0, true);
	}
	
	function getUserQuestionsCount(){
		return get_entities_from_metadata("userQuestion", true, "object", "faq", 0, 0, 0, "", 0, true);
	}
	
	function notifyAdminNewQuestion(){
		global $CONFIG;
		
		$count = get_entities_from_metadata("admin", true, "user", "", 0, 0, 0, "", 0, true);
		$admins1 = get_entities_from_metadata("admin", true, "user", "", 0, $count);
		
		$count = get_entities_from_metadata("admin", "yes", "user", "", 0, 0, 0, "", 0, true);
		$admins2 = get_entities_from_metadata("admin", "yes", "user", "", 0, $count);
		
		if(is_array($admins1) && is_array($admins2)){
			$admins = array_merge($admins1, $admins2);
		}elseif(is_array($admins1)){
			$admins = $admins1;
		} elseif(is_array($admins2)){
			$admins = $admins2;
		}else{
			$admins = array();
		}
		
		$result = array();
		foreach($admins as $admin){
			$result[] = notify_user($admin->guid, $admin->site_guid, elgg_echo("faq:ask:notify:admin:subject"), sprintf(elgg_echo("faq:ask:notify:admin:message"), $admin->name, $CONFIG->wwwroot . "pg/faq/asked"));
		}
		
		if(in_array($result, true)){
			$result = true;
		} else {
			$result = false;
		}
		
		return $result;
	}
	
	// Initialise FAQ
	register_elgg_event_handler('init', 'system', 'faq_init');
	
?>