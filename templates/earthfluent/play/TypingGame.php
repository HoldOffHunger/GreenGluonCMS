<style>
/* Font Wars Styling
Copyright 2011, Oran Looney
MIT License, see README
*/

html, body {
	overflow: hidden;
}
.sprite {
	position: absolute;
	font-size: 32px;
	line-height: 32px;
	height: 1em;
	width: 2em;
	overflow: visible;
	text-align: center;
}

.spaceship {
	width: 64px;
	height: 64px;
	font-size: 64px;
	line-height: 64px;
	font-family: sans-serif;
	-webkit-transition: all 0.2s ease;
}

.target {
	text-decoration: underline;
}
.score {
	text-align: right;
	right: 10px;
	bottom: 10px;
	font-size: 20px;
	line-height: 25px;
	height: 6em;
	width: 10em;
}
.spark-score {
	font-family: 'Bentham', serif;
}
.mute {
	text-align: center;
	border: 1px solid black;
	right: 10px;
	top: 10px;
	font-size: 16px;
	line-height: 16px;
	height: 16px;
	width: 5em;
}

.instructions {
	font-size: 20px;
	line-height: 30px;
	height: 15em;
	width: 20em;
	background-color: white;
	font-family: 'Bentham', serif;
}

.off-white {
    background-color: #FEFEFE;
}
.instructions h1 {
	font-size: 72px;
	font-family: 'Arimo', sans-serif;
	margin: 0px;
	padding: 0px;
}

</style>

	<div id="word-data" style="display: none">

               <?php
			
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
			
			foreach($new_children as $child) {
				$word = $child['entrytranslation'][0]['Title'];
				print($word . ' ');
			}
		?>

	</div>