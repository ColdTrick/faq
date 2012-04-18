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
	
	$id = get_input("guid");
	
	if(!empty($id)){
		$faq = get_entity($id);
		
		if(!empty($faq) && $faq instanceof ElggObject && $faq->getSubtype() == "faq"){
			$question = get_input("question");
			$answer = get_input("answer");
			$oldCat = get_input("oldCat");
			$newCat = get_input("newCat");
			$access = (int) get_input("access");
			
			if(!empty($question) && !empty($answer) && !empty($access) && (!empty($oldCat) || !empty($newCat))){
				$cat = "";
				if($oldCat == "newCat" && !empty($newCat)){
					$cat = ucfirst(strtolower($newCat));
				} else {
					$cat = ucfirst(strtolower($oldCat));
				}
				
				if(!empty($cat)){
					$faq->question = $question;
					$faq->answer = $answer;
					$faq->category = $cat;
					$faq->access_id = $access;
					
					$faq->owner_guid = $CONFIG->site_guid;
					$faq->container_guid = $CONFIG->site_guid;
					
					if($faq->save()){
						system_message(elgg_echo("faq:edit:success"));
					} else {
						register_error(elgg_echo("faq:edit:error:save"));
					}
				} else {
					register_error(elgg_echo("faq:edit:error:invalid_category"));
				}
			} else {
				register_error(elgg_echo("faq:edit:error:invalid_input"));
			}
		} else {
			register_error(elgg_echo("faq:edit:error:invalid_object"));
		}
	} else {
		register_error(elgg_echo("faq:edit:error:invalid_input"));
	}
	
	forward($CONFIG->wwwroot . "pg/faq/list?categoryId=" . get_metastring_id($faq->category));
?>