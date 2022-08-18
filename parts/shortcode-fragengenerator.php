<div id="generator"></div>

<script type='text/javascript'>
<?php
	$php_array = get_field('democracy-day-questions', 'sh_options');
	
	foreach($php_array as $question) {
		$locale = get_locale();
		$currentQuestion = $question['question_' . $locale];
		if( $currentQuestion !== '' ) {
			$questions[] = $question['question_' . $locale];
		} 
	}
	$js_array = json_encode($questions);
	echo "var questions = ". $js_array . ";\n";
?>
</script>

<style>
	canvas {
		width: 100% !important;
		height: auto !important;
		object-fit: contain;
	}
</style>
