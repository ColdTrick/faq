<?php
	$english = array(
		// Main Title
		'faq' => "Frequently Asked Questions",
		'faq:title' => "Frequently Asked Questions",
		'faq:shorttitle' => "FAQ",
		
		'item:object:faq' => "FAQ Object",
		
		// add
		'faq:add' => "New FAQ",
		'faq:add:title' => "New Frequently Asked Question",
		'faq:add:question' => "Question",
		'faq:add:category' => "Category",
		'faq:add:answer' => "Answer",
		
		'faq:add:oldcat:please' => "Select a category",
		'faq:add:oldcat:new' => "Enter new category:",
		
		'faq:add:check:question' => "Please enter a question",
		'faq:add:check:category' => "Please enter a category",
		'faq:add:check:answer' => "Please enter an answer",
		
		
		
		'faq:add:error:invalid_input' => "Error saving: invalid input, please check all the fields",
		'faq:add:error:save' => "Unknown error while saving",
		'faq:add:success' => "Succesfully added a new FAQ",
		
		// edit
		'faq:edit:title' => "Edit Frequently Asked Question",
		'faq:edit:error:invalid_input' => "Error saving: invalid input, please check all the fields",
		'faq:edit:error:invalid_object' => "Error editing: invalid object, looks like the faq you are trying to edit doesn't exist",
		'faq:edit:error:save' => "Unknown error while saving",
		'faq:edit:success' => "Succesfully edited a FAQ",
		
		// delete
		'faq:delete:confirm' => "Are you sure you wish to delete this FAQ?",
		'faq:delete:success' => "Succesfully deleted a FAQ",
		
		// settings
		'faq:settings:public' => "Is the faq publicly available? Else only for admins",
		'faq:settings:minimum_search_tag_size' => "Minimum size of searchtags",
		'faq:settings:minimum_hit_count' => "Minimum hitcount",
		'faq:settings:ask' => "Allow users to ask questions",
		
		// search
		'faq:search:noresult' => "No results were found",
		'faq:search:hitcount' => "Hitcount:",
		
		// List a category
		'faq:list:no_category' => "No valid category provided",
		'faq:list:edit:new_category' => "Please provide a new category",
		'faq:list:edit:confirm:question' => "Are you sure you want to move ",
		'faq:list:edit:confirm:category' => " question(s) to the category ",
		'faq:list:edit:category:please' => "Please select one or more questions to move",
		'faq:list:edit:begin' => "Change category",
		'faq:list:edit:all' => "Select all",
		'faq:list:edit:none' => "Select none",
		'faq:list:edit:select:choice' => "- Please select a category",
		'faq:list:edit:select:new' => "- Create a new category",
		
		// Change category
		'faq:change_category:error:input' => "Invalid input provided",
		'faq:change_category:error:no_faq' => "No FAQ objects provided",
		'faq:change_category:error:save' => "There was an error while saving the FAQ, please try again",
		'faq:change_category:succes' => "The FAQ was succesfully saved",
		
		// Ask a question
		'faq:ask' => "Ask a question",
		'faq:ask:title' => "Ask a question",
		'faq:ask:description' => "Could not find an answer in the FAQ? Ask your question here! Your question may be added to the FAQ, or not. However you will always get an answer.",
		
		'faq:ask:new_question:subject' => "You submitted a new question",
		'faq:ask:new_question:message' => "Thank you for submitting your question.
		
We will do our best to answer your question:

%s

as soon as possible. 

We may decide to add your question to the FAQ, you will be notified with an answer and wether or not your question was added to the FAQ.",
		'faq:ask:new_question:send' => "Your question was added, and you will receive a notification of this",
		'faq:ask:error:not_send' => "Your question was added, but we couldn't notify you about this",
		'faq:ask:error:save' => "There was an error while saving your question, please try again",
		'faq:ask:error:no_user' => "An error occured, please provide a valid User",
		'faq:ask:error:input' => "An error occured, invalid input. Please try again",
		'faq:ask:notify:admin:subject' => "A new question has been asked",
		'faq:ask:notify:admin:message' => "Dear %s,

A new question has been asked in the FAQ. 

To check out the outstanding question(s) please click here:
%s",
		
		// View asked questions
		'faq:asked' => "User questions (%s)",
		'faq:asked:title' => "User submitted questions",
		'faq:asked:no_questions' => "No unanswered questions at the moment",
		'faq:asked:not_allowed' => "User are currently not allowed to submit questions. If you would like to allow this, check the Plugin Settings",
		'faq:asked:added' => "Added:",
		'faq:asked:add' => "Add this question to the FAQ",
		'faq:asked:by' => "Question by: %s",
		'faq:asked:check:add' => "Please select if this question should be added to the FAQ",
		
		// Answer an asked question
		'faq:answer:notify:subject' => "Your question has been answered",
		'faq:answer:notify:message:added:same' => "The question:
%s

you asked has been answered. The answer can be found here:

%s

And as you can see your question has been added to the FAQ.",
		'faq:answer:notify:message:added:adjusted' => "The question:
%s

you asked has been answered. However we adjusted the question to:
%s

The answer can be found here:

%s

And as you can see your question has been added to the FAQ.",
		'faq:answer:succes:added:send' => "The question was added to the FAQ and the User notified",
		'faq:answer:error:added:not_send' => "The question was added to the FAQ, however the User could not be notified",
		'faq:answer:error:save' => "There was an error while saving the FAQ",
		'faq:answer:error:remove' => "There was an error while removing the question, please try again",
		'faq:answer:error:no_cat' => "Error: invalid category provided, please try again",
		'faq:answer:notify:not_added:same' => "The question:
%s

you asked has been answered. The answer is:

%s

Your question was NOT added to the FAQ.",
		'faq:answer:notify:not_added:adjusted' => "The question:
%s

you asked has been answered. However we adjusted the question to:
%s

The answer is:

%s

Your question was NOT added to the FAQ.",
		'faq:answer:succes:not_added:send' => "The User has been notified of the answer",
		'faq:answer:error:not_added:not_send' => "There was an error while notifying the User",
		'faq:answer:error:no_faq' => "Error: not a valid FAQ object",
		'faq:answer:error:input' => "Error: invalid input, please try again",
	
		// Stats page
		'faq:stats:categories' => "This FAQ contains %s categories,",
		'faq:stats:questions' => " with %s questions/answers in total.",
		'faq:stats:user' => "There are %s outstanding User questions that need an answer.",
	);
	
	add_translation("en", $english);
?>