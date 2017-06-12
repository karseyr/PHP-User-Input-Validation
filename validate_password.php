<?php
function validatePassword($password){
	//Begin basic testing
	if((strlen($password) < 8) || $password == null) {
		return 0;//Returns 0 if: password is too short (<8 characters)
	}
	if((strlen($password) > 48)) {
		return 0;//Returns 0 if: password is too short (<8 characters)
	}
	//End basic length tests
	
	//Begin more advanced testing
	
	if(preg_match('/[A-Z]/',$password) == (0 || false)){
		return 1;//Returns 1 if: password does NOT contain upper case letters
	}
	if(!preg_match('/[\d]/',$password) != (0 || false)){
		return 2;//Returns 2 if: password does NOT contain digits
	}
	if(preg_match('/[\W]/',$password) == (0 || false)){
		return 3;//Returns 3 if: password does NOT contain any special characters
	}
	return true;
}
?>