<?php

	class NumberTheory
	{
		
		public function ExtendedEuclideanAlgorithmDifferences($args)
		{
			$sum = $args[sum];
			$products = $args[products];
			$products_count = count($products);
			
			$second_to_last_quantity = $products[($products_count - 2)];
			$last_quantity = $products[($products_count - 1)];
			
			$extended_euclidean_algorithm_differences_data_structure_args = array(
				'firstquantity'=>$second_to_last_quantity,
				'secondquantity'=>$last_quantity,
			);
			
			$extended_euclidean_algorithm_equation = $this->ExtendedEuclideanAlgorithmDifferencesDataStructure($extended_euclidean_algorithm_differences_data_structure_args);
			
			for($i = $products_count - 2; $i > 0; $i--)
			{
				$current_product = $products[$i];
				$next_product = $products[$i - 1];
				$last_product = $products[$i + 1];
				
				if($extended_euclidean_algorithm_equation[firstquantity][stage] == 'multiple' && $extended_euclidean_algorithm_equation[secondquantity][stage] == 'multiple')
				{
					$euclidean_algorithm_differences_expansion_args = array(
						'equation'=>$extended_euclidean_algorithm_equation,
						'currentproduct'=>$current_product,
						'lastproduct'=>$last_product,
						'nextproduct'=>$next_product,
					);
					
					if($extended_euclidean_algorithm_equation[firstquantity][value][multiplyer] > $extended_euclidean_algorithm_equation[secondquantity][value][multiplyer])
					{
						$extended_euclidean_algorithm_equation = $this->ExtendedEuclideanAlgorithmDifferencesRightSideExpansion($euclidean_algorithm_differences_expansion_args);
					}
					else
					{
						$extended_euclidean_algorithm_equation = $this->ExtendedEuclideanAlgorithmDifferencesLeftSideExpansion($euclidean_algorithm_differences_expansion_args);
					}
				}
				
				if($extended_euclidean_algorithm_equation[secondquantity][stage] == 'expanded')
						// Second Quantity is Expanded, First Quantity Is Multiple
				{
					$extended_euclidean_algorithm_equation[firstquantity][value][multiple] += 
					$extended_euclidean_algorithm_equation[secondquantity][value][multiplyer] * 
					$extended_euclidean_algorithm_equation[secondquantity][value][rightexpansion][multiple];
					
					$extended_euclidean_algorithm_equation[secondquantity][value][multiple] =
					$extended_euclidean_algorithm_equation[secondquantity][value][multiplyer];
					
					$extended_euclidean_algorithm_equation[secondquantity][value][multiplyer] =
					$extended_euclidean_algorithm_equation[secondquantity][value][leftexpansion];
					
					unset($extended_euclidean_algorithm_equation[secondquantity][value][leftexpansion]);
					unset($extended_euclidean_algorithm_equation[secondquantity][value][rightexpansion]);
					
					$extended_euclidean_algorithm_equation[secondquantity][stage] = 'multiple';
				}
				
				if($extended_euclidean_algorithm_equation[firstquantity][stage] == 'expanded')
						// First Quantity is Expanded, Second Quantity Is Multiple
				{
					$extended_euclidean_algorithm_equation[secondquantity][value][multiple] += 
					$extended_euclidean_algorithm_equation[firstquantity][value][multiplyer] * 
					$extended_euclidean_algorithm_equation[firstquantity][value][rightexpansion][multiple];
					
					$extended_euclidean_algorithm_equation[firstquantity][value][multiple] =
					$extended_euclidean_algorithm_equation[firstquantity][value][multiplyer];
					
					$extended_euclidean_algorithm_equation[firstquantity][value][multiplyer] =
					$extended_euclidean_algorithm_equation[firstquantity][value][leftexpansion];
					
					unset($extended_euclidean_algorithm_equation[firstquantity][value][leftexpansion]);
					unset($extended_euclidean_algorithm_equation[firstquantity][value][rightexpansion]);
					
					$extended_euclidean_algorithm_equation[firstquantity][stage] = 'multiple';
				}
			}
			
			return $extended_euclidean_algorithm_equation;
		}
		
		public function ExtendedEuclideanAlgorithmDifferencesLeftSideExpansion($args)
		{
			$equation = $args[equation];
			$current_product = $args[currentproduct];
			$last_product = $args[lastproduct];
			$next_product = $args[nextproduct];
			
			$euclidean_algorithm_difference_args = array(
				'product'=>$current_product,
				'additive'=>$last_product,
			);
			
			$euclidean_algorithm_difference_results = $this->DiocletianEquationEuclideanAlgorithmDifference($euclidean_algorithm_difference_args);
			
			$multiplicand = $euclidean_algorithm_difference_results[multiplicand];
			
			$euclidean_algorithm_difference_args2 = array(
				'product'=>$next_product,
				'additive'=>$equation[secondquantity][value][multiplyer],
			);
			
			$euclidean_algorithm_difference_results2 = $this->DiocletianEquationEuclideanAlgorithmDifference($euclidean_algorithm_difference_args2);
			
			$multiplicand2 = $euclidean_algorithm_difference_results2[multiplicand];
			
			$equation[firstquantity][stage] = 'expanded';
			$equation[firstquantity][value][multiplyer] = $equation[firstquantity][value][multiple];
			unset($equation[firstquantity][value][multiple]);
			$equation[firstquantity][value][leftexpansion] = $next_product;
			$equation[firstquantity][value][rightexpansion] = array(
				'multiplyer'=>$equation[secondquantity][value][multiplyer],
				'multiple'=>$multiplicand2,
			);
			
			return $equation;
		}
		
		public function ExtendedEuclideanAlgorithmDifferencesRightSideExpansion($args)
		{
			$equation = $args[equation];
			$current_product = $args[currentproduct];
			$last_product = $args[lastproduct];
			$next_product = $args[nextproduct];
			
			$euclidean_algorithm_difference_args = array(
				'product'=>$current_product,
				'additive'=>$last_product,
			);
			
			$euclidean_algorithm_difference_results = $this->DiocletianEquationEuclideanAlgorithmDifference($euclidean_algorithm_difference_args);
			
			$multiplicand = $euclidean_algorithm_difference_results[multiplicand];
			
			$euclidean_algorithm_difference_args2 = array(
				'product'=>$next_product,
				'additive'=>$equation[firstquantity][value][multiplyer],
			);
			
			$euclidean_algorithm_difference_results2 = $this->DiocletianEquationEuclideanAlgorithmDifference($euclidean_algorithm_difference_args2);
			
			$multiplicand2 = $euclidean_algorithm_difference_results2[multiplicand];
			
			$equation[secondquantity][stage] = 'expanded';
			$equation[secondquantity][value][multiplyer] = $equation[secondquantity][value][multiple];
			unset($equation[secondquantity][value][multiple]);
			$equation[secondquantity][value][leftexpansion] = $next_product;
			$equation[secondquantity][value][rightexpansion] = array(
				'multiplyer'=>$equation[firstquantity][value][multiplyer],
				'multiple'=>$multiplicand2,
			);
			
			return $equation;
		}
		
		public function ExtendedEuclideanAlgorithmDifferencesDataStructure($args)
		{
			$first_quantity = $args[firstquantity];
			$second_quantity = $args[secondquantity];
			 
			$euclidean_algorithm_difference_args = array(
				'product'=>$first_quantity,
				'additive'=>$second_quantity,
			);
			
			$euclidean_algorithm_difference_results = $this->DiocletianEquationEuclideanAlgorithmDifference($euclidean_algorithm_difference_args);
			
			$multiplicand = $euclidean_algorithm_difference_results[multiplicand];
			
			$equation = array(
				'firstquantity'=>array(
					'stage'=>multiple,
					'value'=>array(
						'multiplyer'=>$first_quantity,
						'multiple'=>1,
					),
				),
				'secondquantity'=>array(
					'stage'=>multiple,
					'value'=>array(
						'multiplyer'=>$second_quantity,
						'multiple'=>$multiplicand,
					),
				),
			);
			
			return $equation;
		}
		
		public function DiocletianEquationEuclideanAlgorithmDifference($args)
		{
			$product = $args[product];
			$additive = $args[additive];
			
			$multiplicand = $product / $additive;
			$multiplicand_floored = floor($multiplicand);
			
			$extended_euclidean_algorithm_difference_results = array(
				'multiplicand'=>$multiplicand_floored,
			);
			
			return $extended_euclidean_algorithm_difference_results;
		}
		
		public function ExtendedEuclideanAlgorithmProducts($args)
		{
			$first_number = $args[firstnumber];
			$second_number = $args[secondnumber];
			
			$products = array();
			
			if($first_number < $second_number)
			{
				list($first_number, $second_number) = array($second_number, $first_number);
			}
			
			$more_products = TRUE;
			while($more_products)
			{
				$extended_euclidean_algorithm_products_args = array(
					'firstnumber'=>$first_number,
					'secondnumber'=>$second_number,
				);
				
				$extended_euclidean_algorithm_products_results = $this->ExtendedEuclideanAlgorithmProduct($extended_euclidean_algorithm_products_args);
				
				$products[] = $first_number;
				
				$first_number = $second_number;
				$second_number = $extended_euclidean_algorithm_products_results[addition];
				
				if($extended_euclidean_algorithm_products_results[addition] < 1)
				{
					$more_products = FALSE;
				}
			}
			
			return $products;
		}
		
		public function ExtendedEuclideanAlgorithmProduct($args)
		{
			$first_number = $args[firstnumber];
			$second_number = $args[secondnumber];
		
			$first_multiplyer = $first_number / $second_number;
			$first_multiplyer_floored = floor($first_multiplyer);
			
			$addition = $first_number - ($first_multiplyer_floored * $second_number);
			
			$extended_euclidean_algorithm_products_results = array(
				'multiplyer'=>$first_multiplyer_floored,
				'addition'=>$addition,
			);
			
			return $extended_euclidean_algorithm_products_results;
		}
		
		public function IsThisNumberPrime($args)
		{
			$alleged_prime = $args[allegedprime];
			
			$square_root_of_alleged_prime = sqrt($alleged_prime);
			$square_root_of_alleged_prime_integer = (int)$square_root_of_alleged_prime;
			
			for($i = $square_root_of_alleged_prime_integer; $i > 1; $i--)
			{
				$is_this_number_prime_args = array(
					'allegedprime'=>$i,
				);
				
				if($this->IsThisNumberPrime($is_this_number_prime_args))
				{
					$gcd_args = array(
						'firstnumber'=>$alleged_prime,
						'secondnumber'=>$i,
					);
					
					$gcd = $this->FindGreatestCommonDivisor($gcd_args);
					
					if($gcd != 1)
					{
						return FALSE;
					}
				}
			}
			
			return TRUE;
		}
		
		public function FindPrimeNumbers($args)
		{
			$max_prime = $args[maxprime];
			
			if($max_prime && is_numeric($max_prime))
			{
				$prime_order = $args[primeorder];
				
				if(!$prime_order)
				{
					$prime_order = 'Ascending';
				}
				
				$prime_order_function = 'FindPrimeNumbers' . $prime_order;
				if(method_exists($this, $prime_order_function))
				{
					return $this->$prime_order_function($args);
				}
			}
			
			return FALSE;
		}
		
		public function FindPrimeNumbersAscending($args)
		{
			$max_prime = $args[maxprime];
			$list_limit = $args[listlimit];
			
			if(!$list_limit)
			{
				$list_limit = 5;
			}
			
			$prime_numbers = array();
			
			for($i = 2; $i < $max_prime; $i++)
			{
				$is_this_number_prime_args = array(
					'allegedprime'=>$i,
				);
				
				if($this->IsThisNumberPrime($is_this_number_prime_args))
				{
					$prime_numbers[] = $i;
					
					if(count($prime_numbers) == $list_limit)
					{
						$i = $max_prime;
					}
				}
			}
			
			return ($prime_numbers);
		}
		
		public function FindPrimeNumbersDescending($args)
		{
			$max_prime = $args[maxprime];
			$list_limit = $args[listlimit];
			
			if(!$list_limit)
			{
				$list_limit = 5;
			}
			
			$prime_numbers = array();
			
			for($i = $max_prime; $i > 1; $i--)
			{
				$is_this_number_prime_args = array(
					'allegedprime'=>$i,
				);
				
				if($this->IsThisNumberPrime($is_this_number_prime_args))
				{
					$prime_numbers[] = $i;
					
					if(count($prime_numbers) == $list_limit)
					{
						$i = 0;
					}
				}
			}
			
			return ($prime_numbers);
		}
		
		public function CalculatePhi($args)
		{
			$firstnumber = $args[firstnumber];
			$secondnumber = $args[secondnumber];
			
			$phi = ($firstnumber - 1) * ($secondnumber - 1);
			
			return ($phi);
		}
		
		public function FindRelativelyPrimeNumbers($args)
		{
			$relatively_prime_number_order = $args[order];
			$relatively_prime_number_order_function = 'FindRelativelyPrimeNumbers' . $relatively_prime_number_order;
			
			if(method_exists($this, $relatively_prime_number_order_function))
			{
				$relatively_prime_number_order_function_args = array(
					'number'=>$args[number],
					'amounttofind'=>$args[amounttofind],
				);
				return $this->$relatively_prime_number_order_function($relatively_prime_number_order_function_args);
			}
			
			return FALSE;
		}
		
		public function FindRelativelyPrimeNumbersRandom($args)
		{
			return $this->FindRelativelyPrimeNumbersRandomAscending($args);
		}
		
		public function FindRelativelyPrimeNumbersRandomAscending($args)
		{
			$number = $args[number];
			$amount_to_find = $args[amounttofind];
			$amount_found = 0;
			$array_of_relatively_prime_numbers = array();
			print("Yo. FindRelativelyPrimeNumbersRandomAscending. ");
			$random_start_point = rand(2, $number);
			
			for($i = $random_start_point; $i < $number; $i++)
			{
				$gcd_args = array(
					'firstnumber'=>$number,
					'secondnumber'=>$i,
				);
				
				$gcd = $this->FindGreatestCommonDivisor($gcd_args);
				
				if($gcd == 1)
				{
					$array_of_relatively_prime_numbers[] = $i;
					$amount_found++;
					
					if($amount_found == $amount_to_find)
					{
						$i = $number;
					}
				}
			}
			
			return ($array_of_relatively_prime_numbers);
		}
		
		public function FindRelativelyPrimeNumbersRandomDescending($args)
		{
			$number = $args[number];
			$amount_to_find = $args[amounttofind];
			$amount_found = 0;
			$array_of_relatively_prime_numbers = array();
			
			$random_start_point = rand(2, $number);
			
			for($i = $random_start_point; $i > 1; $i--)
			{
				$gcd_args = array(
					'firstnumber'=>$number,
					'secondnumber'=>$i,
				);
				
				$gcd = $this->FindGreatestCommonDivisor($gcd_args);
				
				if($gcd == 1)
				{
					$array_of_relatively_prime_numbers[] = $i;
					$amount_found++;
					
					if($amount_found == $amount_to_find)
					{
						$i = 0;
					}
				}
			}
			
			return ($array_of_relatively_prime_numbers);
		}
		
		public function FindRelativelyPrimeNumbersAscending($args)
		{
			$number = $args[number];
			$amount_to_find = $args[amounttofind];
			$amount_found = 0;
			$array_of_relatively_prime_numbers = array();
			
			for($i = 2; $i < $number; $i++)
			{
				$gcd_args = array(
					'firstnumber'=>$number,
					'secondnumber'=>$i,
				);
				
				$gcd = $this->FindGreatestCommonDivisor($gcd_args);
				
				if($gcd == 1)
				{
					$array_of_relatively_prime_numbers[] = $i;
					$amount_found++;
					
					if($amount_found == $amount_to_find)
					{
						$i = $number;
					}
				}
			}
			
			return ($array_of_relatively_prime_numbers);
		}
		
		public function FindRelativelyPrimeNumbersDescending($args)
		{
			$number = $args[number];
			$amount_to_find = $args[amounttofind];
			$amount_found = 0;
			$array_of_relatively_prime_numbers = array();
			
			for($i = $number - 1; $i > 1; $i--)
			{
				$gcd_args = array(
					'firstnumber'=>$number,
					'secondnumber'=>$i,
				);
				
				$gcd = $this->FindGreatestCommonDivisor($gcd_args);
				
				if($gcd == 1)
				{
					$array_of_relatively_prime_numbers[] = $i;
					$amount_found++;
					
					if($amount_found == $amount_to_find)
					{
						$i = 0;
					}
				}
			}
			
			return ($array_of_relatively_prime_numbers);
		}
		
		// * FindGreatestCommonDivisor
		// Stein's Bitwise Algorithm
		
		public function FindGreatestCommonDivisor($args)
		{
			$firstnumber = $args[firstnumber];
			$secondnumber = $args[secondnumber];
			
			if($firstnumber == $secondnumber)
			{
				return $firstnumber;
			}
			
			if($firstnumber == 0)
			{
				return $secondnumber;
			}
			
			if($secondnumber == 0)
			{
				return $firstnumber;
			}
			
			$firstnumber_divided_by_two = $firstnumber / 2;
			$secondnumber_divided_by_two = $secondnumber / 2;
			
			if(($firstnumber_divided_by_two) == (int)($firstnumber_divided_by_two))		// firstnumber is even
			{
				$firstnumber_shifted = $firstnumber >> 1;
				
				if(($secondnumber_divided_by_two) != (int)($secondnumber_divided_by_two))	// second number is odd
				{
					$gcd_args = array(
						'firstnumber'=>$firstnumber_shifted,
						'secondnumber'=>$secondnumber,
					);
					return $this->FindGreatestCommonDivisor($gcd_args);
				}
				else		// secondnumber is even
				{
					$secondnumber_shifted = $secondnumber >> 1;
					
					$gcd_args = array(
						'firstnumber'=>$firstnumber_shifted,
						'secondnumber'=>$secondnumber_shifted,
					);
					return $this->FindGreatestCommonDivisor($gcd_args) << 1;
				}
			}
			
			if(($secondnumber_divided_by_two) == (int)($secondnumber_divided_by_two))		// secondnumber is odd
			{
				$secondnumber_shifted = $secondnumber >> 1;
				
				$gcd_args = array(
					'firstnumber'=>$firstnumber,
					'secondnumber'=>$secondnumber_shifted,
				);
				return $this->FindGreatestCommonDivisor($gcd_args);
			}
			
			if($firstnumber > $secondnumber)
			{
				$difference_bit_shifted = $firstnumber - $secondnumber >> 1;
				$gcd_args = array(
					'firstnumber'=>$difference_bit_shifted,
					'secondnumber'=>$secondnumber,
				);
				return $this->FindGreatestCommonDivisor($gcd_args);
			}
			
			$difference_bit_shifted = $secondnumber - $firstnumber >> 1;
			
			$gcd_args = array(
				'firstnumber'=>$difference_bit_shifted,
				'secondnumber'=>$firstnumber,
			);
			
			return $this->FindGreatestCommonDivisor($gcd_args);
		}
	}
	
?>