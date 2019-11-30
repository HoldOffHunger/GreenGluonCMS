<script type="text/javascript">

	$(document).ready(function(event) {
		var word =  '<?php
			
			$previous_quizzes = (int)$this->Param('previousquizzes');
			$future_quizzes = (int)$this->Param('futurequizzes');
			
			$younger_sibling_count = count($this->younger_siblings);
			$older_sibling_count = count($this->older_siblings);

			$new_children = $this->children;
			
			if($previous_quizzes)
			{
				$max_younger_sibling_iteration = $younger_sibling_count;
				
				if($max_younger_sibling_iteration > $previous_quizzes)
				{
					$max_younger_sibling_iteration = $previous_quizzes;
				}
				
				for($i = $younger_sibling_count - 1; $i >= $younger_sibling_count - $max_younger_sibling_iteration && $i >= 0; $i--)
				{
					$younger_sibling = $this->younger_siblings[$i];
					$younger_sibling_children = $younger_sibling['children'];
					foreach($younger_sibling_children as $younger_sibling_child)
					{
						$new_children[] = $younger_sibling_child;
					}
				}
			}
			
			if($future_quizzes)
			{
				foreach($this->older_siblings as $older_sibling)
				{
					$older_sibling_children = $older_sibling['children'];
					foreach($older_sibling_children as $older_sibling_child)
					{
						$new_children[] = $older_sibling_child;
					}
				}
			}
			
			$new_children_count = count($new_children);
			
			$word = $new_children[(array_rand($new_children, 1))];
			print($word['entrytranslation'][0]['Title']);
		?>';

		WordGuessGame(word);
	});

</script>

<div id="image-div">

	<img id="image" src="http://www.earthfluent.com/image/full-lunar-eclipse-progression-phase-1.jpg">
	
</div>

<div style="clear:both;"></div>

<p class="letter-text">Word : <span id="open-letters">(generating)</span></p>

<p class="letter-text"><span id="message">&nbsp;</span></p>

<p class="letter-text">Guess a Letter : <input id="solution-answer" type="text" size="5" maxlength="1"> <input type="button" id="guess" value="Guess"></p>

<p class="letter-text">Letters Tried So Far : <span id="letters-tried-so-far">(none)</span></p>

<p class="letter-text"><a href="">New Game?</a></p>