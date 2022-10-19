<?php 
/* validating password input*/
function chechTags($data){
	strip_tags($data);
}
										function uploadCsv($filename,$maxsize=(1024*10)){

											$fname=$_FILES[$filename]['name'];
											$size=$_FILES[$filename]['size'];
											$temp=$_FILES[$filename]['tmp_name'];
										      $fileXtension=pathinfo($fname,PATHINFO_EXTENSION);
										     if($fileXtension!="csv"){
										     	throw new Exception("Invalid file format,CSV file format expected!");
										     	
										     	
										     }elseif($size>$maxsize){
										     	throw new Exception("File size too large, file size must be less or equal to ".$maxsize);
										     	

										     }else{
				
										      return $temp;
										     
										     }

										 }
//this check size of the photo
function validatePhoto($file,$maxsize=(1024*1024*5)){
		$mb=$maxsize/1024;
											$fname=$_FILES[$file]['name'];
											$size=$_FILES[$file]['size'];
											
											$temp=$_FILES[$file]['tmp_name'];
										      $fileXtension=pathinfo($fname,PATHINFO_EXTENSION);
										   
										     if( $fileXtension!='jpg' && $fileXtension!='png') {
										     	throw new Exception("Invalid file format, png or jpg file type expected!");
										     	
										     	
										     }
										     elseif($size>$maxsize){

										throw new Exception(floor($size/1024)." File size too large, file size must be less or equal to ".floor($mb). " MB");
										     	

										     }else{
				
										      return $temp;
										     
										     }

										 }


		function validateHour($value){
			if(!is_integer($value)){
				throw new Exception("Invalid input for Hour, Integer type Expected");
				
			}
			return $value;
		}



		function validateMin($value){
			if(!is_integer($value)){
				 throw new Exception( "Invalid minutes type Integer expected!");
				
			}else if($value>59){
				throw new Exception( "Minutes can not be greater than 59");
		
			}
			return $value;
		}

		

		function validateSec($value){
			if(!is_int($value)){
				 throw new Exception( "Invalid seconds type Integer expected!");
				
			}else if($value>59){
				throw new Exception( "Seconds can not be greater than 59");
		
			} return $value;
		}
		function TimeZeroCheck($hour, $min,$sec){
			if($hour==0 && $min==0 && $sec==0){
				throw new Exception("Hour, Minutes and Seconds can not be all Zero");
				
			}
		}


function intChecker($value, $msg){
				if(!is_int($value)){
					throw new Exception("Invalid".$msg." Input type , Integer expected!");
					
				}
				return $value;
		}

















?>