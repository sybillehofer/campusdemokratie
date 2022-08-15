
<div style="background:lightgrey;padding:1rem;">
Fragengenerator
</div>


<script type='text/javascript'>
<?php
	$php_array = get_field('democracy-day-questions', 'sh_options');
	
	foreach($php_array as $question) {
		$questions[] = $question['question'];
	}
	$js_array = json_encode($questions);
	echo "var questions = ". $js_array . ";\n";
?>
console.log(questions);
</script>
