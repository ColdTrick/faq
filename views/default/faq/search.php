<?php 
	global $CONFIG;
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#searchForm').submit(function(){
			if($('#searchForm input[name="search"]').val() != ""){
				$('#result').hide();
				$('#waiting').show();
				$('#result').html('');
				
				$.post("<?php echo $CONFIG->wwwroot; ?>action/faq/search", $('#searchForm').serialize(), function(data){
					$('#result').html(data);
					$('#waiting').hide();
					$('#result').show();
					
				});
			}
			
			return false;
		});
	});
</script>
<div class="contentWrapper" id="search">
	<form id="searchForm" action="" method="POST">
		<input type="text" name="search">
		<input type="submit" value="<?php echo elgg_echo("search"); ?>">
	</form>
</div>
<div class="contentWrapper" id="result" style="display:none;"></div>
<div class="contentWrapper" id="waiting" style="display:none;">
	<img src="<?php echo $CONFIG->wwwroot; ?>_graphics/ajax_loader.gif" />
</div>