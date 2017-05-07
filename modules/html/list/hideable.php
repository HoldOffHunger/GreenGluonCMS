<?php

	class module_hideable extends module_spacing
	{
		public function display ($args) {
			$table_args = $args;
			
			if(!isset($table_args[level]))
			{
				$table_args[level] = 1;
			}
			if(!isset($table_args[indentation]))
			{
				$table_args[indentation] = 0;
			}
			
			$this->display_tablestart($table_args);
			$table_args[indentation] = $table_args[indentation] + 1;
			
			$this->display_rows($table_args);
			
			$table_args[indentation] = $table_args[indentation] - 1;
			$this->display_tableend($table_args);
		}
		
		public function display_tablestart ($args) {
			$indentation = $args[indentation];
			$level = $args[level];
			
			if($indentation)
			{
				$tr_tabs = str_repeat("\t", $indentation);
				print($tr_tabs);
			}
			
			print('<ol');
			
			if($level)
			{
				print(' class="list-level-' . $level . '"');
			}
			
			print('>');
			print("\n\n");
		}
		
		public function display_tableend ($args) {
			$indentation = $args[indentation];
			
			if($indentation)
			{
				$tr_tabs = str_repeat("\t", $indentation);
				print($tr_tabs);
			}
			
			print('</ol>');
			print("\n\n");
		}
		
		public function display_rows ($args) {
			if($args)
			{
				$list = $args['list'];
				$level = $args[level];
				$indentation = $args[indentation];
				
				foreach ($list as $listkey => $listoption)
				{
				#	print_r($listoption);
					$text = $listoption[text];
					$link = $listoption[link];
					$mouseover = $listoption[mouseover];
					
					$row_args = array(
						'title'=>$text,
						'link'=>$link,
						'mouseover'=>$mouseover,
						'level'=>$level,
						'indentation'=>$indentation,
					);
					
					$this->display_row_start($row_args);
					
					if(is_array($listoption[0]))
					{
						unset($listoption[text]);
						unset($listoption[link]);
						unset($listoption[mouseover]);
						$next_indentation = $indentation + 1;
						$after_next_indentation = $indentation + 2;
						
						$next_level = $level + 1;
						
						$display_row_args = array(
							'level'=>$level,
							'indentation'=>$indentation,
						);
						
						$tablestart_args = array(
							'level'=>$next_level,
							'indentation'=>$next_indentation,
						);
						
						$this->display_tablestart($tablestart_args);
						
						$hideable_args = array(
							'list'=>$listoption,
							'level'=>$next_level,
							'indentation'=>$after_next_indentation,
						);
						$this->display_rows($hideable_args);
						
						$tableend_args = array(
							'indentation'=>$next_indentation,
						);
						
						$this->display_tableend($tableend_args);
					}
					
					$this->display_row_end($row_args);
				}
			}
		}
		
		public function display_row_start ($args) {
			$title = $args[title];
			$link = $args[link];
			$mouseover = $args[mouseover];
			$level = $args[level];
			$indentation = $args[indentation];
			
			$tr_tabs = str_repeat("\t", $indentation);
			$line_tabs = str_repeat("\t", $indentation + 1);
			
			if(strlen($link))
			{
				$link_start_code = '<a href="' . $link . '" class="list-item-link-level-' . $level .'">';
				$link_end_code = '</a>';
			}
			else
			{
				$link_start_code = '';
				$link_end_code = '';
			}
			
			print(	$tr_tabs . '<li class="list-item-row-level-' . $level . '" title="' . $mouseover .'">' . "\n\n" .
				$line_tabs . $link_start_code . '<span class="list-item-row-text-level-' . $level . '">' . 
				$title . '</span>' . $link_end_code . "\n\n"
			);
		}
		
		public function display_row_end ($args) {
			$link = $args[link];
			$indentation = $args[indentation];
			
			$tr_tabs = str_repeat("\t", $indentation);
			
			if(strlen($link))
			{
				$link_start_code = '<a href="' . $link . '" class="list-item-link-level-' . $level .'">';
				$link_end_code = '</a>';
			}
			else
			{
				$link_start_code = '';
				$link_end_code = '';
			}
			
			print($tr_tabs . '</li>' . "\n\n");
		}
	}
?>