<?php
	global $CONFIG;
	
	$id = get_input("id");
	
	if(!empty($id)){
		$edit = true;
		$faq = get_entity($id);
	}
	
	$count = get_entities("object", "faq", 0, "", 0, 0, true);
	$metadatas = find_metadata("category", "", "object", "faq", $count);
	
	$cats = array();
	foreach($metadatas as $metadata){
		$cat = $metadata['value'];
		if(!in_array($cat, $cats)){
			$cats[] = $cat;
		}
	}
	
	$select = "<select name='oldCat' id='oldCat' onChange='checkCat();'>";
	if(!$edit){
		$select .= "<option value=''>" . elgg_echo("faq:add:oldcat:please");
	}
	
	foreach($cats as $cat){
		if($edit && $faq->category == $cat){
			$select .= "<option SELECTED>" . $cat;
		} else {
			$select .= "<option>" . $cat;
		}
	}
	
	$select .= "<option value='newCat'>" . elgg_echo("faq:add:oldcat:new");
	$select .= "</select>";
	
	// Access Selector
	$accessSelector = "<select name='access'>";
	if($edit){
		if($faq->access_id == ACCESS_PUBLIC){
			$accessSelector .= "<option value='" . ACCESS_PUBLIC . "' selected>" . elgg_echo("PUBLIC");
		} else {
			$accessSelector .= "<option value='" . ACCESS_PUBLIC . "'>" . elgg_echo("PUBLIC");
		}
		
		if($faq->access_id == ACCESS_LOGGED_IN){
			$accessSelector .= "<option value='" . ACCESS_LOGGED_IN . "' selected>" . elgg_echo("LOGGED_IN");
		} else {
			$accessSelector .= "<option value='" . ACCESS_LOGGED_IN . "'>" . elgg_echo("LOGGED_IN");
		}
	} else {
		$accessSelector .= "<option value='" . ACCESS_PUBLIC . "' selected>" . elgg_echo("PUBLIC");
		$accessSelector .= "<option value='" . ACCESS_LOGGED_IN . "'>" . elgg_echo("LOGGED_IN");
	}
	$accessSelector .= "</select>";
	
	// Make form
	$addBody = "<table width='100%'>\n";
	$addBody .= "<tr>\n";
	$addBody .= "<td colspan='2' class='faqtitle'>" . elgg_echo("faq:add:question") . "</td>\n";
	$addBody .= "</tr>\n";
	$addBody .= "<tr>\n";
	if($edit){
		$addBody .= "<td colspan='2'>" . elgg_view("input/text", array("internalname" => "question", "value" => $faq->question)) . "</td>\n";
	} else {
		$addBody .= "<td colspan='2'>" . elgg_view("input/text", array("internalname" => "question")) . "</td>\n";
	}
	$addBody .= "</tr>\n";
	$addBody .= "<tr>\n";
	$addBody .= "<td colspan='2' class='faqtitle'>" . elgg_echo("faq:add:category") . "</td>\n";
	$addBody .= "</tr>\n";
	$addBody .= "<tr>\n";
	$addBody .= "<td colspan='2'>" . $select . "</td>\n";
	$addBody .= "</tr>\n";
	$addBody .= "<tr>\n";
	$addBody .= "<td colspan='2' width='100%'>" . elgg_view("input/text", array("internalname" => "newCat", "disabled" => true)) . "</td>\n";
	$addBody .= "</tr>\n";
	$addBody .= "<tr>\n";
	$addBody .= "<td colspan='2' class='faqtitle'>" . elgg_echo("faq:add:answer") . "</td>\n";
	$addBody .= "</tr>\n";
	$addBody .= "<tr>\n";
	if($edit){
		$addBody .= "<td colspan='2'>" . elgg_view("input/longtext", array("internalname" => "answer", "value" => $faq->answer)) . "</td>\n";
	} else {
		$addBody .= "<td colspan='2'>" . elgg_view("input/longtext", array("internalname" => "answer")) . "</td>\n";
	}
	$addBody .= "</tr>\n";
	$addBody .= "<tr>\n";
	$addBody .= "<td class='faqtitle'>" . elgg_echo("access") . "</td>\n";
	$addBody .= "<td>" . $accessSelector . "</td>\n";
	$addBody .= "</tr>\n";
	$addBody .= "<tr>\n";
	$addBody .= "<td colspan='2'>" . elgg_view("input/submit", array("internalname" => "save", "value" => elgg_echo("save"))) . "</td>\n";
	$addBody .= "</tr>\n";
	$addBody .= "</table>\n";
	
	if($edit){
		$addBody .= elgg_view("input/hidden", array("internalname" => "guid", "value" => $faq->guid));
		
		$addForm = elgg_view("input/form", array("internalname" => "editForm",
												"internalid" => "questionForm",
												"body" => $addBody,
												"action" => $CONFIG->wwwroot . "action/faq/edit"));
	} else {
		$addForm = elgg_view("input/form", array("internalname" => "addForm",
												"internalid" => "questionForm",
												"body" => $addBody,
												"action" => $CONFIG->wwwroot . "action/faq/add"));
	}
?>
<script type="text/javascript">
	function checkCat(){
		var cat = $('#oldCat').val();
		
		if(cat == "newCat"){
			$('input[name="newCat"]').removeAttr("disabled");
		} else {
			$('input[name="newCat"]').attr("disabled", "disabled");
		}
	}
	
	function validateForm(){
		var title = $('input[name="question"]').val();
		var oldCat = $('#oldCat').val();
		var text = $('textarea[name="answer"]').val();
		
		var result = true;
		var focus = false;
		var msg = "";
		
		if(title == ""){
			result = false;
			msg = msg + "<?php echo elgg_echo("faq:add:check:question"); ?>\n";
			$('input[name="question"]').focus();
			focus = true;
		}
		if(oldCat == ""){
			result = false;
			msg = msg + "<?php echo elgg_echo("faq:add:check:category"); ?>\n";
		}
		if(oldCat == "newCat"){
			var newCat = $('input[name="newCat"]').val();
			if(newCat == ""){
				result = false;
				msg = msg + "<?php echo elgg_echo("faq:add:check:category"); ?>\n";
				if(!focus){
					$('input[name="newCat"]').focus();
					focus = true;
				}
			}
		}
		if(text == ""){
			result = false;
			msg = msg + "<?php echo elgg_echo("faq:add:check:answer"); ?>\n";
			if(!focus){
				$('textarea[name="answer"]').focus();
				focus = true;
			}
		}
		
		if(!result){
			alert(msg);
		}
		
		return result;
	}
	
	$(document).ready(function(){
		$('#questionForm').submit(function(){
			return validateForm();
		});
	});
</script>
<div class="contentWrapper">
	<?php echo $addForm; ?>
</div>