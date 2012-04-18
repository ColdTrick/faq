<?php 
	global $CONFIG;
	
	$cats = getCategories();
	$faq_count = getFaqCount();
	$cats_count = count($cats);
	
	$display = sprintf(elgg_echo("faq:stats:categories"), $cats_count);
	$display .= sprintf(elgg_echo("faq:stats:questions"), $faq_count);
	
	if(isadminloggedin()){
		$user_questions = getUserQuestionsCount();
		$display .= "<br />" . sprintf(elgg_echo("faq:stats:user"), $user_questions);
	}
?>
<div class="contentWrapper">
	<?php echo $display; ?>
</div>