  
flag = 1;
function check(){
flag = 1;
msg="";
if(flag == 1){

	if(	document.getElementById( "name" ).value == '' || document.getElementById( "name" ).value == 'Your Name:'  ){
	//alert('1');
	msg+="Please enter your Name.\r\n";
	flag = 0;
	}	
	if(	document.getElementById( "phone" ).value == '' || document.getElementById( "phone" ).value == 'Your Phone:'){
	//alert('1');
	msg+="Please enter your Phone Number.\r\n";
	flag = 0;
	}else{
		if(!isNumber(document.getElementById('phone').value)){
			flag = 0;
			msg+="Please enter your Phone Number correctly.\r\n";
			
		}
		}
	
	if(document.getElementById('email').value == '' || document.getElementById('email').value == 'Email:'){
	flag = 0;
		msg+="Please enter your Email.\r\n";
	}else{
		if(!_mvalidateEmail(document.getElementById('email').value)){
			flag = 0;
			msg+="Please enter your Email correctly.\r\n";
			
		}
		}
	if(document.getElementById('gender').value == '' || document.getElementById('gender').value == 'Gender'){
	flag = 0;
		msg+="Please select your Gender.\r\n";
	}
	
	
	
	
}
//validate('form_subscription','email');
if(flag == 1){	
document.getElementById( "form_subscription" ).submit() ;
}
else{
alert(msg);
}

return false;
}



/**
* email validator http://www.white-hat-web-design.co.uk/articles/js-validation.php
* 
*/
var _mvalidateEmail = function (address) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    return reg.test(address);
};


function isNumber(n) {  return !isNaN(parseFloat(n)) && isFinite(n);}

function checkGender(gender) { 
	if(gender == 'male' || gender == 'female'){
	
		return true;
	
	}else{
		return false;
	}
	
	return false;
}

function validate(form_id,email) {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.forms[form_id].elements[email].value;
   if(reg.test(address) == false) {
     // alert('Invalid Email Address');
	 msg+="Please fill a valid email.\r\n";
     flag = 0;
   }
}


  
  // copyright 1999 Idocs, Inc. http://www.idocs.com
    // Distribute this script freely but keep this notice in place
    var numbersonly = function (myfield, e, dec) {
        var key;
        var keychar;

        if (window.event)
            key = window.event.keyCode;
        else if (e)
            key = e.which;
        else
            return true;
        keychar = String.fromCharCode(key);

        // control keys
        if ((key == null) || (key == 0) || (key == 8) ||
	    (key == 9) || (key == 13) || (key == 27))
            return true;

        // numbers
        else if ((("0123456789").indexOf(keychar) > -1))
            return true;

        // decimal point jump
        else if (dec && (keychar == ".")) {
            myfield.form.elements[dec].focus();
            return false;
        }
        else
            return false;
    }
	
	
	