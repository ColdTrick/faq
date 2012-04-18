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
	
	action_gatekeeper();
	admin_gatekeeper();
	
	$category = get_input("category");
	$faqGuids = get_input("faqGuid");
	
	$succes = false;
	
	if(!empty($category) && !empty($faqGuids) && is_array($faqGuids)){
		foreach($faqGuids as $faqGuid){
			$faq = get_entity($faqGuid);
			
			if($faq->getSubtype() == "faq"){
				$faq->category = $category;
				
				if($faq->save()){
					system_message(elgg_echo("faq:change_category:succes"));
					$succes = true;
				} else {
					register_error(elgg_echo("faq:change_category:error:save"));
				}
			} else {
				register_error(elgg_echo("faq:change_category:error:no_faq"));
			}
		}
	} else {
		register_error(elgg_echo("faq:change_category:error:input"));
	}
	
	if($succes){
		forward($CONFIG->wwwroot . "pg/faq/list?categoryId=" . get_metastring_id($category));
	} else {
		forward($_SERVER["HTTP_REFERER"]);
	}
?>