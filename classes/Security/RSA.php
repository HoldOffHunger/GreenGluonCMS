<?php

		/* RSA CLASS */
		/*
		
			* Dependencies:
				Math/NumberTheory
		
		*/

	class RSA
	{
		public function __construct()
		{
			$number_theory = new NumberTheory();
			$this->number_theory = $number_theory;
		}
		
		public function RSASetup($args)
		{
			$first_prime = $args[firstprime];
			$second_prime = $args[secondprime];
			// firstpublic number is Phi(firstprime * secondprime)
			$second_public_number = $args[secondpublicnumber];
			$validate_prime_numbers = $args[validateprimenumbers];
			
			$validation_results = TRUE;
			
			if($validate_prime_numbers)
			{
				$validate_prime_numbers_args = array(
					'firstprime'=>$first_prime,
					'secondprime'=>$second_prime,
				);
				
				if(!$this->RSASetupValidatePrimes($validate_prime_numbers_args))
				{
					$validation_results = FALSE;
				}
			}
			
			if($validation_results)
			{
					// RSA: Stage 1 -- Calculate Public Encryption Keys
				
				if(!$second_public_number)
				{
					$rsa_encryption_setup_step_one_args = array(
						'firstprime'=>$first_prime,
						'secondprime'=>$second_prime,
						'publicnumberstofind'=>$args[publicnumberstofind],
						'publicnumbersorder'=>$args[publicnumbersorder],
					);
					
					return($this->RSASetupStep1($rsa_encryption_setup_step_one_args));
				}
				else
				
					// RSA: Stage 2 -- Calculate Private Decryption Key
				
				{
					$rsa_encryption_setup_step_two_args = array(
						'firstprime'=>$first_prime,
						'secondprime'=>$second_prime,
						'secondpublicnumber'=>$second_public_number,
					);
					
					return($this->RSASetupStep2($rsa_encryption_setup_step_two_args));
				}
			}
			else
			{
					// RSA: Stage 0 -- Invalid Prime Numbers
					
				$returned_arguments = array(
					'rsastage'=>0,
				);
				
				return($returned_arguments);
			}
		}
		
		public function RSASetupStep1($args)
		{
			$first_prime = $args[firstprime];
			$second_prime = $args[secondprime];
			$public_numbers_to_find = $args[publicnumberstofind];
			$public_numbers_order = $args[publicnumbersorder];
			
			if(!$public_numbers_order)
			{
				$public_numbers_order = 'Ascending';
			}
			
			$first_public_number = $first_prime * $second_prime;
			
			$calculate_phi_args = array(
				'firstnumber'=>$first_prime,
				'secondnumber'=>$second_prime,
			);
			
			$phi_of_multiple = $this->number_theory->CalculatePhi($calculate_phi_args);
			
			$relatively_prime_to_phi_args = array(
				'number'=>$phi_of_multiple,
				'amounttofind'=>$public_numbers_to_find,
				'order'=>$public_numbers_order,
			);
			
			$relatively_prime_numbers_to_phi_of_multiple = $this->number_theory->FindRelativelyPrimeNumbers($relatively_prime_to_phi_args);
			
			$returned_arguments = array(
				'rsastage'=>1,
				'firstpublicnumber'=>$first_public_number,
				'availablesecondpublicnumbers'=>$relatively_prime_numbers_to_phi_of_multiple,
			);
			
			return($returned_arguments);
		}
		
		public function RSASetupStep2($args)
		{
			$first_prime = $args[firstprime];
			$second_prime = $args[secondprime];
			$second_public_number = $args[secondpublicnumber];
			
			$first_public_number = $first_prime * $second_prime;
			
			$calculate_phi_args = array(
				'firstnumber'=>$first_prime,
				'secondnumber'=>$second_prime,
			);
			
			$phi_of_multiple = $this->number_theory->CalculatePhi($calculate_phi_args);
			
			$extended_euclidean_algorithm_products_args = array(
				'firstnumber'=>$phi_of_multiple,
				'secondnumber'=>$second_public_number,
			);
			
			$extended_euclidean_algorithm_products_results = $this->number_theory->ExtendedEuclideanAlgorithmProducts($extended_euclidean_algorithm_products_args);
			
			$extended_euclidean_algorithm_differences_args = array(
				'products'=>$extended_euclidean_algorithm_products_results,
				'sum'=>1,
			);
			
			$extended_euclidean_algorithm_differences_results = $this->number_theory->ExtendedEuclideanAlgorithmDifferences($extended_euclidean_algorithm_differences_args);
			
			$private_key = 0;
			
			if($extended_euclidean_algorithm_differences_results[firstquantity][value][multiplyer] == $second_public_number)
			{
				$private_key = $extended_euclidean_algorithm_differences_results[firstquantity][value][multiple];
			}
			if($extended_euclidean_algorithm_differences_results[firstquantity][value][multiple] == $second_public_number)
			{
				$private_key = $extended_euclidean_algorithm_differences_results[firstquantity][value][multiplyer];
			}
			if($extended_euclidean_algorithm_differences_results[secondquantity][value][multiplyer] == $second_public_number)
			{
				$private_key = $extended_euclidean_algorithm_differences_results[secondquantity][value][multiple];
				$private_key *= -1;
				$largest_product = $extended_euclidean_algorithm_products_results[0];
				$private_key += $largest_product;
			}
			if($extended_euclidean_algorithm_differences_results[secondquantity][value][multiple] == $second_public_number)
			{
				$private_key = $extended_euclidean_algorithm_differences_results[secondquantity][value][multiplyer];
				$private_key *= -1;
				$largest_product = $extended_euclidean_algorithm_products_results[0];
				$private_key += $largest_product;
			}
			
			$returned_arguments = array(
				'firstpublicnumber'=>$first_public_number,
				'secondpublicnumber'=>$second_public_number,
				'privatekey'=>$private_key,
				'rsastage'=>2,
			);
			
			return($returned_arguments);
		}
		
		public function RSAEncryption($args)
		{
			$message = $args[message];
			$first_public_key = $args[firstpublickey];
			$second_public_key = $args[secondpublickey];
			
			$rsa_pow_mod_combo_args = array(
				'message'=>$message,
				'pow'=>$second_public_key,
				'mod'=>$first_public_key,
			);
			
			$rsa_pow_mod_combo_results = $this->RSAPowModCombo($rsa_pow_mod_combo_args);
			
			$returned_arguments = array(
				'encryptedmessage'=>$rsa_pow_mod_combo_results[message_pow_modded],
			);
			
			return($returned_arguments);
		}
		
		public function RSADecryption($args)
		{
			$message = $args[message];
			$first_public_key = $args[firstpublickey];
			$private_key = $args[privatekey];
			
			$rsa_pow_mod_combo_args = array(
				'message'=>$message,
				'pow'=>$private_key,
				'mod'=>$first_public_key,
			);
			
			$rsa_pow_mod_combo_results = $this->RSAPowModCombo($rsa_pow_mod_combo_args);
			
			$returned_arguments = array(
				'decryptedmessage'=>$rsa_pow_mod_combo_results[message_pow_modded],
			);
			
			return($returned_arguments);
		}
		
		public function RSANonReputableEncryption($args)
		{
			$senders_private_number = $args[sendersprivatenumber];
			$senders_first_public_number = $args[sendersfirstpublicnumber];
			$receivers_first_public_number = $args[receiversfirstpublicnumber];
			$receivers_second_public_number = $args[receiverssecondpublicnumber];
			$message = $args[message];
			
			$rsa_pow_mod_combo_args = array(
				'message'=>$message,
				'pow'=>$senders_private_number,
				'mod'=>$senders_first_public_number,
			);
			
			$rsa_pow_mod_combo_results = $this->RSAPowModCombo($rsa_pow_mod_combo_args);
			
			$rsa_pow_mod_combo_args = array(
				'message'=>$rsa_pow_mod_combo_results[message_pow_modded],
				'pow'=>$receivers_second_public_number,
				'mod'=>$receivers_first_public_number,
			);
			
			$rsa_pow_mod_combo_second_results = $this->RSAPowModCombo($rsa_pow_mod_combo_args);
			
			$rsa_encryption_results = array(
				'encryptedmessage'=>$rsa_pow_mod_combo_second_results[message_pow_modded],
			);
			
			return $rsa_encryption_results;
		}
		
		public function RSANonReputableDecryption($args)
		{
			$receivers_private_number = $args[receiversprivatenumber];
			$receivers_first_public_number = $args[receiversfirstpublicnumber];
			$senders_first_public_number = $args[sendersfirstpublicnumber];
			$senders_second_public_number = $args[senderssecondpublicnumber];
			$message = $args[message];
			
			$rsa_pow_mod_combo_args = array(
				'message'=>$message,
				'pow'=>$receivers_private_number,
				'mod'=>$receivers_first_public_number,
			);
			
			$rsa_pow_mod_combo_results = $this->RSAPowModCombo($rsa_pow_mod_combo_args);
			
			$rsa_pow_mod_combo_second_args = array(
				'message'=>$rsa_pow_mod_combo_results[message_pow_modded],
				'pow'=>$senders_second_public_number,
				'mod'=>$senders_first_public_number,
			);
			
			$rsa_pow_mod_combo_second_results = $this->RSAPowModCombo($rsa_pow_mod_combo_second_args);
			
			$rsa_decryption_results = array(
				'decryptedmessage'=>$rsa_pow_mod_combo_second_results[message_pow_modded],
			);
			
			return $rsa_decryption_results;
		}
		
		public function RSAPowModCombo($args)
		{
			$message = $args[message];
			$pow = $args[pow];
			$mod = $args[mod];
			
			$message_pow_modded = $message;
			
			$message_pow_modded = bcpow($message_pow_modded, $pow);
			$message_pow_modded = bcmod($message_pow_modded, $mod);
			
			$rsa_pow_mod_combo_results = array(
				'message_pow_modded'=>$message_pow_modded,
			);
			
			return $rsa_pow_mod_combo_results;
		}
		
		public function RSASetupValidatePrimes($args)
		{
			$first_prime = $args[firstprime];
			$second_prime = $args[secondprime];
			
			$prime_test_args = array(
				'allegedprime'=>$first_prime,
			);
			
			if(!$this->number_theory->IsThisNumberPrime($prime_test_args))
			{
				return FALSE;
			}
			else
			{
				$prime_test_args = array(
					'allegedprime'=>$second_prime,
				);
				
				if(!$this->number_theory->IsThisNumberPrime($prime_test_args))
				{
					return FALSE;
				}
			}
			
			return TRUE;
		}
	}
	
?>