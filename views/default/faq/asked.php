<?php
	if(get_plugin_setting("userQuestions", "faq") == "yes"){
		$allow = true;
	} else {
		$allow = false;
	}
	
	if($allow){
		$count = get_entities_from_metadata("userQuestion", true, "object", "faq", 0, 0, 0, "", 0, true);
		
		if($count > 0){
			$open = get_entities_from_metadata("userQuestion", true, "object", "faq", 0, $count);
			
			// Category selector
			$categories = getCategories();
			
			// Access selector
			$accessSelector = "<select name='access' id='access'>";
			$accessSelector .= "<option value='" . ACCESS_PUBLIC . "' selected>" . elgg_echo("PUBLIC") . "</option>";
			$accessSelector .= "<option value='" . ACCESS_LOGGED_IN . "'>" . elgg_echo("LOGGED_IN") . "</option>";
			$accessSelector .= "</select>";
			
			foreach($open as $faq){
				$content .= "<div class='askedQuestion' id='question" . $faq->guid . "'><table><tr><td class='askedLink''><a href='javascript:void(0);' onClick='show(" . $faq->guid . ");'>" . $faq->question . "</a></td><td class='askedSince'>" . elgg_echo("faq:asked:added") . " " . friendly_time($faq->time_created) . "</td></tr></table></div>\n";
				$content .= "<div class='clearfloat'></div>";
				
				// Categoory selector
				$select = "<select name='oldCat' id='oldCat' onChange='checkCat(" . $faq->guid . ");'>";
				$select .= "<option value=''>" . elgg_echo("faq:add:oldcat:please") . "</option>";
				foreach($categories as $cat){
					$select .= "<option>" . $cat . "</option>";
				}
				$select .= "<option value='newCat'>" . elgg_echo("faq:add:oldcat:new") . "</option>";
				$select .= "</select>";
				
				// User who asked the question
				$user = get_user($faq->owner_guid);
				
				// Create elements
				$formElements = "<table width='100%'>\n";
				$formElements .= "<tr>\n";
				$formElements .= "<td class='faqtitle'>" . elgg_echo("faq:add:question") . "</td>\n";
				$formElements .= "<td class='askedBy'>" . sprintf(elgg_echo("faq:asked:by"), $user->name) . "</td>\n";
				$formElements .= "</tr>\n";
				$formElements .= "<tr>\n";
				$formElements .= "<td colspan='2'>";
				$formElements .= elgg_view("input/hidden", array("internalname" => "guid", "value" => $faq->guid));
				$formElements .= elgg_view("input/hidden", array("internalname" => "originalQuestion", "value" => $faq->question));
				$formElements .= elgg_view("input/text", array("internalname" => "question", "value" => $faq->question));
				$formElements .= "</td>\n";
				$formElements .= "</tr>\n";
				$formElements .= "<tr>\n";
				$formElements .= "<td class='faqtitle'>" . elgg_echo("faq:asked:add") . "</td>\n";
				$formElements .= "<td>";
				$formElements .= "<input type='radio' name='add' value='yes' onChange='addQuestion(" . $faq->guid . ");'>" . elgg_echo("option:yes");
				$formElements .= "<input type='radio' name='add' value='no' onChange='addQuestion(" . $faq->guid . ");'>" . elgg_echo("option:no");
				$formElements .= "</td>\n";
				$formElements .= "</tr>\n";
				$formElements .= "<tr>\n";
				$formElements .= "<td colspan='2' class='faqtitle'>" . elgg_echo("faq:add:category") . "</td>\n";
				$formElements .= "</tr>\n";
				$formElements .= "<tr>\n";
				$formElements .= "<td colspan='2'>" . $select . "</td>\n";
				$formElements .= "</tr>\n";
				$formElements .= "<tr>\n";
				$formElements .= "<td colspan='2'>" . elgg_view("input/text", array("internalname" => "newCat", "disabled" => true)) . "</td>\n";
				$formElements .= "</tr>\n";
				$formElements .= "<tr>\n";
				$formElements .= "<td colspan='2' class='faqtitle'>" . elgg_echo("faq:add:answer") . "</td>\n";
				$formElements .= "</tr>\n";
				$formElements .= "<tr>\n";
				$formElements .= "<td colspan='2'>" . elgg_view("input/longtext", array("internalname" => "answer")) . "</td>\n";
				$formElements .= "</tr>\n";
				$formElements .= "<tr>\n";
				$formElements .= "<td class='faqtitle'>" . elgg_echo("access") . "</td>\n";
				$formElements .= "<td>" . $accessSelector . "</td>\n";
				$formElements .= "</tr>\n";
				$formElements .= "<tr>\n";
				$formElements .= "<td colspan='2'>";
				$formElements .= elgg_view("input/submit", array("internalname" => "save", "value" => elgg_echo("save"))) . "&nbsp;";
				$formElements .= elgg_view("input/reset", array("internalname" => "cancel", "value" => elgg_echo("cancel"), "type" => "reset", "js" => "onClick='cancelForm(" . $faq->guid . ");'"));
				$formElements .= "</td>\n";
				$formElements .= "</tr>\n";
				$formElements .= "</table>\n";
				
				$form = elgg_view("input/form", array("internalname" => "answer",
														"internalid" => "answer" . $faq->guid,
														"body" => $formElements,
														"action" => $CONFIG->wwwroot . "action/faq/answer"));
				
				$content .= "<div class='askedAnswer' id='formDiv" . $faq->guid . "'>\n";
				$content .= $form;
				$content .= "</div>\n";
			}
		} else {
			$content = elgg_echo("faq:asked:no_questions");
		}
	} else {
		$content = elgg_echo("faq:asked:not_allowed");
	}
?>
<script type="text/javascript">
	function show(id){
		$("div[id^='question']").each(function(){
			$('#' + this.id).show();
		});
		
		$("div[id^='formDiv']").each(function(){
			$('#' + this.id).hide();
		});
		
		$("#question" + id).hide();
		$("#formDiv" + id).show();
	}
	
	function cancelForm(id){
		$("#question" + id).show();
		$("#formDiv" + id).hide();
	}
	
	function addQuestion(id){
		var addVal = $("#answer" + id + " input[name='add']:checked").val();
		
		if(addVal == "yes"){
			$("#answer" + id + " #oldCat").removeAttr("disabled");
			$("#answer" + id + " #access").removeAttr("disabled");
			checkCat(id);
		} else {
			$("#answer" + id + " #oldCat").attr("disabled", true);
			$("#answer" + id + " #access").attr("disabled", true);
			$("#answer" + id + " input[name='newCat']").attr("disabled", true);
		}
	}
	
	function checkCat(id){
		var cat = $("#answer" + id + " #oldCat").val();
		
		if(cat == "newCat"){
			$("#answer" + id + " input[name='newCat']").removeAttr("disabled");
		} else {
			$("#answer" + id + " input[name='newCat']").attr("disabled", true);
		}
	}
	
	function validateForm(form){
		var formID = '#' + form.id;
		var title = $(formID + ' input[name="question"]').val();
		var addVal = $(formID + " input[name='add']:checked").val();
		var oldCat = $(formID + ' #oldCat').val();
		var text = $(formID + ' textarea[name="answer"]').val();
		
		var result = true;
		var focus = false;
		var msg = "";
		
		// Is there a question
		if(title == ""){
			result = false;
			msg = msg + "<?php echo elgg_echo("faq:add:check:question"); ?>\n";
			$(formID + ' input[name="question"]').focus();
			focus = true;
		}
		
		// Add to FAQ?
		if(addVal == undefined){
			result = false;
			msg = msg + "<?php echo elgg_echo("faq:asked:check:add"); ?>\n";
		} else if (addVal == "yes"){
			// Yes!!
			// Check category
			if(oldCat == ""){
				result = false;
				msg = msg + "<?php echo elgg_echo("faq:add:check:category"); ?>\n";
			}
			// Check new category
			if(oldCat == "newCat"){
				var newCat = $('input[name="newCat"]').val();
				if(newCat == ""){
					result = false;
					msg = msg + "<?php echo elgg_echo("faq:add:check:category"); ?>\n";
					if(!focus){
						$(formID + ' input[name="newCat"]').focus();
						focus = true;
					}
				}
			}
		}
		
		// Check answer
		if(text == ""){
			result = false;
			msg = msg + "<?php echo elgg_echo("faq:add:check:answer"); ?>\n";
			if(!focus){
				$(formID + ' textarea[name="answer"]').focus();
				focus = true;
			}
		}
		
		if(!result){
			alert(msg);
		}
		
		return result;
	}
	
	$(document).ready(function(){
		$('form[name="answer"]').each(function(){
			$('#' + this.id).submit(function(){
				return validateForm(this);
			});
		});
	});
</script>
<div class="contentWrapper">
	<?php echo $content; ?>
</div>