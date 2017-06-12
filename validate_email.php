<?php
function validateEmail($email){
	//Begin basic testing
	if(strpos($email,'@') !== strrpos($email,'@') || strpos($email,'@') === false || strrpos($email,'@') === false){
		return 0;//Returns 0 if: Email contains >1 @ symbol or no @ symbol
	}
	if(strpos($email,'.') !== strrpos($email,'.') || strpos($email,'.') === false || strrpos($email,'.') === false){
		return 1;//Returns 1 if: Email contains >1 period or no period
	}
	if(strlen($email) < 7) {
		return 2;//Returns 2 if: email is too short (<7 characters).  Shortest possible email: a@b.cd (as no single letter TLDs exist for email use)
	}
	//End basic contain tests
	
	//Begin more advanced testing
	
	if(strpos($email,'@') > strpos($email,'.')){
		return 3;//Returns 3 if: @ symbol is in the tld area.  Example: input "abc.@de" would return 3
	}
	if(strpos($email, '.') > (strlen($email) - 3)){
		return 4;//Returns 4 if: the top level domain (TLD) is <2 characters (as no single letter TLDs exist for email use)
	}
	if((strpos($email,'@')+1) == strpos($email,'.')){
		return 5;//Returns 5 if: no domain is present.  Example: input "abc@.de" would return 5
	}
	return true;
}
?>