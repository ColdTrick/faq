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
			if($faq->delete()){
				system_message(elgg_echo("faq:delete:success"));
			} else {
				register_error(elgg_echo("faq:delete:error:delete"));
			}
		} else {
			register_error("faq:delete:error:invalid_object");
		}
	} else {
		register_error(elgg_echo("faq:delete:error:invalid_input"));
	}
	
	forward($_SERVER["HTTP_REFERER"]);
?>