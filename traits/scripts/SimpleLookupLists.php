<?php

	trait SimpleLookupLists {
		public function getListAndItems($args)
		{
			$list_title = $args['ListTitle'];
			
			$lookup_list_args = [
				'type'=>'LookupList',
				'definition'=>[
					'Title'=>$list_title,
				],
			];
			
			$lookup_list = $this->db_access_object->GetRecords($lookup_list_args)[0];
			
			if($lookup_list && $lookup_list['id'])
			{
				$lookup_list_item_args = [
					'type'=>'LookupListItem',
					'definition'=>[
						LookupListid=>$lookup_list['id'],
					],
				];
				
				$lookup_list_items = $this->db_access_object->GetRecords($lookup_list_item_args);
				$lookup_list_key_to_values = [];
				
				foreach($lookup_list_items as $lookup_list_item)
				{
					if($lookup_list_key_to_values[$lookup_list_item['ItemKey']])
					{
						if(is_array($lookup_list_key_to_values[$lookup_list_item['ItemKey']]))
						{
							$lookup_list_key_to_values[$lookup_list_item['ItemKey']][] = $lookup_list_item['ItemValue'];
						}
						else
						{
							$lookup_list_piece_aside = $lookup_list_key_to_values[$lookup_list_item['ItemKey']];
							
							$lookup_list_key_to_values[$lookup_list_item['ItemKey']] = [$lookup_list_piece_aside, $lookup_list_item['ItemValue']];
						}
					}
					else
					{
						$lookup_list_key_to_values[$lookup_list_item['ItemKey']] = $lookup_list_item['ItemValue'];
					}
				}
			}
			
			return $lookup_list_key_to_values;
		}
	}
	
?>