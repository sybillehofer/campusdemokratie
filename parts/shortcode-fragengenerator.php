<div id="generator" style="margin-top: 4rem;"></div>

<script type='text/javascript'>
<?php
	$locale = get_locale();
	$cardtitle = get_field('cardtitle_' . $locale, 'sh_options');
	$buttontext = get_field('buttontext_' . $locale, 'sh_options');
	$php_array = get_field('democracy-day-questions', 'sh_options');
	
	foreach($php_array as $question) {
		$currentQuestion = $question['question_' . $locale];
		if( $currentQuestion !== '' ) {
			$questions[] = $question['question_' . $locale];
		} 
	}
	$js_array = json_encode($questions);
	$textstrings = ['cardtitle' => $cardtitle, 'buttontext' => $buttontext, 'questions' => $js_array];
	echo "var cardtitle = '". $textstrings['cardtitle'] . "';\n" . "var buttontext = '". $textstrings['buttontext'] . "';\n" . "var questions = ". $textstrings['questions'] . ";\n";
?>
</script>

<style>
	canvas {
		width: 100% !important;
		height: auto !important;
		object-fit: contain;
		-webkit-tap-highlight-color:transparent;
	}
</style>
