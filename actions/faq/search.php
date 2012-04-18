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
	
	$minimum_tag_length = get_plugin_setting("minimumSearchTagSize","faq");
	if(!$minimum_tag_length) $minimum_tag_length = 3;
	$minimum_hit_count = get_plugin_setting("minimumHitCount","faq");;
	if(!$minimum_hit_count) $minimum_hit_count = 1;
		
	$tags = strtolower(get_input("search"));
	
	$rankedArray = array();
	
	if($tags){
		
		$tagArray = explode(" ",$tags);
		
		$count = get_entities("object", "faq", 0, "", 0, 0, true);
		$faqs = get_entities("object", "faq", 0, "", $count);
	
		foreach($faqs as $faq_id => $faq){
			if(!$faq->userQuestion){
				$count = 0;
				
				foreach($tagArray as $tag){
				
					if(strlen($tag) >= $minimum_tag_length){
						$count += substr_count(strtolower($faq->question), $tag); 
						$count += substr_count(strtolower($faq->answer), $tag);
						$count += substr_count(strtolower($faq->category), $tag);	
					} 
				}
				if($count >= $minimum_hit_count){
					$rankedArray[$faq_id] = $count;
				}
			}
		}
		
		if(count($rankedArray) > 0){
			arsort($rankedArray);
			foreach($rankedArray as $faq_id=>$count){
				echo elgg_view("object/faq",array("entity"=>$faqs[$faq_id], "hitcount"=>$count));
			}
		} else {
			echo elgg_echo("faq:search:noresult");
		}
	}
	
?>
