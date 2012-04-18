<?php
	
?>

#layout_footer .footer_toolbar_links {
	float:right;
}

.hitcount {
	color: #cccccc;
	white-space: nowrap;
}

.faqtitle {
	font-weight: bold;
}

.faqremove {
	margin: 2px 2px 0 4px;
	cursor: pointer;
	width:14px;
	height:14px;
	background: url("<?php echo $vars['url']; ?>_graphics/icon_customise_remove.png") no-repeat 0 0;
}

.faqremove:hover {
	background-position: 0 -16px;
}

.faqedit {
	margin: 2px 2px 0 4px;
	cursor: pointer;
	width:14px;
	height:14px;
	background: url("<?php echo $vars['url']; ?>mod/faq/_graphics/edit.png") no-repeat 0 0;
}

.answer {
	display: none;
	border-left:1px solid #cccccc;
	border-top:1px solid #cccccc;
	padding-left: 5px;
}

/* asked List */
.askedBy {
	text-align: right;
	color: grey;
}

.askedQuestion {
	border-bottom: solid 1px;
	border-color: #cccccc;
}

.askedLink {
	text-align: left;
	width:100%;
}

.askedSince {
	text-align: right;
	white-space: nowrap;
	color: grey;
}

.askedAnswer {
	display:none;
	margin: 10px 0 10px 0;
	padding: 3px;
}

/* category list */
.listEditBegin {

}

.listEditOptions {
	display: none;
}

.editRight {
	floar: right;
	text-align: right;
}

.editLeft {
	float: left;
	text-align: left;
}

.faqSelect {
	display:none;
}