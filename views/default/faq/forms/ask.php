<?php
	$user = get_loggedin_user();
	
	$formBody = elgg_view("input/text", array("internalname" => "question"));
	$formBody .= elgg_view("input/hidden", array("internalname" => "userGuid", "value" => $user->guid));
	$formBody .= elgg_view("input/submit", array("internalname" => "submit", "value" => elgg_echo("save")));
	
	$form = elgg_view("input/form", array("action" => $CONFIG->wwwroot . "action/faq/ask",
											"body" => $formBody));
?>
<div class="contentWrapper">
	<p><?php echo elgg_echo("faq:ask:description"); ?></p>
	<?php echo $form; ?>
</div>