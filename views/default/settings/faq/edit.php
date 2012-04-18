<?php
	
?>
<!-- Publicly availible? -->
<select name="params[publicAvailable]">
	<option value="yes" <?php if ($vars['entity']->publicAvailable == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
	<option value="no" <?php if ($vars['entity']->publicAvailable == 'no' || empty($vars['entity']->publicAvailable)) echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
</select>
<?php echo elgg_echo("faq:settings:public");?><br>

<!-- Allow user questions? -->
<select name="params[userQuestions]">
	<option value="yes" <?php if ($vars['entity']->userQuestions == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
	<option value="no" <?php if ($vars['entity']->userQuestions == 'no' || empty($vars['entity']->publicAvailable)) echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
</select>
<?php echo elgg_echo("faq:settings:ask");?><br>

<!-- Minimun search word length -->
<?php if(!$vars['entity']->minimumSearchTagSize) $vars['entity']->minimumSearchTagSize = "3";?>
<input type="text" name="params[minimumSearchTagSize]" value="<?php echo $vars['entity']->minimumSearchTagSize;?>"/><?php echo elgg_echo("faq:settings:minimum_search_tag_size"); ?>
<br>

<!-- Minimun Search hit count -->
<?php if(!$vars['entity']->minimumHitCount) $vars['entity']->minimumHitCount = "1";?>
<input type="text" name="params[minimumHitCount]" value="<?php echo $vars['entity']->minimumHitCount;?>"/><?php echo elgg_echo("faq:settings:minimum_hit_count"); ?>