<?php

	trait CryptographicFunctions {
		public function SetHashingAlgorithms()
		{
			$this->SelectableValue = array();
			
			foreach (hash_algos() as $hash_algorithm)
			{
				$hash_algorithm_title = ucfirst($hash_algorithm);
				
				$this->SelectableValue[] = array(
					'optionvalue'=>$hash_algorithm,
					'optiontitle'=>$hash_algorithm_title,
					'optionmouseover'=>'Run this script with the ' . $hash_algorithm_title . ' Hashing Algorithm.',
				);
			}
			
			return TRUE;
		}
		
		public function SetSelectableMHashValues()
		{
			$this->SelectableValue = array();
			
			$array_of_mhash_hashes = array(
				'MHASH_CRC32'=>MHASH_CRC32,
				'MHASH_MD5'=>MHASH_MD5,
				'MHASH_SHA1'=>MHASH_SHA1,
				'MHASH_HAVAL256'=>MHASH_HAVAL256,
				'MHASH_RIPEMD160'=>MHASH_RIPEMD160,
				'MHASH_TIGER'=>MHASH_TIGER,
				'MHASH_GOST'=>MHASH_GOST,
				'MHASH_CRC32B'=>MHASH_CRC32B,
				'MHASH_HAVAL224'=>MHASH_HAVAL224,
				'MHASH_HAVAL192'=>MHASH_HAVAL192,
				'MHASH_HAVAL160'=>MHASH_HAVAL160,
				'MHASH_HAVAL128'=>MHASH_HAVAL128,
				'MHASH_TIGER128'=>MHASH_TIGER128,
				'MHASH_TIGER160'=>MHASH_TIGER160,
				'MHASH_MD4'=>MHASH_MD4,
				'MHASH_SHA256'=>MHASH_SHA256,
				'MHASH_ADLER32'=>MHASH_ADLER32,
				'MHASH_SHA224'=>MHASH_SHA224,
				'MHASH_SHA512'=>MHASH_SHA512,
				'MHASH_SHA384'=>MHASH_SHA384,
				'MHASH_WHIRLPOOL'=>MHASH_WHIRLPOOL,
				'MHASH_RIPEMD128'=>MHASH_RIPEMD128,
				'MHASH_RIPEMD256'=>MHASH_RIPEMD256,
				'MHASH_RIPEMD320'=>MHASH_RIPEMD320,
				'MHASH_SNEFRU256'=>MHASH_SNEFRU256,
				'MHASH_MD2'=>MHASH_MD2,
				'MHASH_FNV132'=>MHASH_FNV132,
				'MHASH_FNV1A32'=>MHASH_FNV1A32,
				'MHASH_FNV164'=>MHASH_FNV164,
				'MHASH_FNV1A64'=>MHASH_FNV1A64,
				'MHASH_JOAAT'=>MHASH_JOAAT,
			);
			
			foreach ($array_of_mhash_hashes as $mhash_key => $mhash_value)
			{
				$this->SelectableValue[] = array(
					'optionvalue'=>$mhash_value,
					'optiontitle'=>$mhash_key,
					'optionmouseover'=>'Run this script with the ' . $mhash_key . ' Hashing Algorithm.',
				);
			}
			
			return TRUE;
		}
	}

?>