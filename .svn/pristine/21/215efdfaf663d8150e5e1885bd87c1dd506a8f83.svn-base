// JavaScript Document

  

                		

function checkForm(){

//alert("hello");

	var errorMsg = "";

	var returnVal  = true;

	if(document.getElementById('name').value == "Nom"){

		//alert("hello");

		errorMsg += "S'il vous pla\u00EEt Entrer votre Nom\n";

		returnVal = false;

	}
	       
		
	var newname = document.getElementById('name').value;
	
	if(newname==' ' || newname=='  ' || newname=='   '|| newname=='    '|| newname=='     '|| newname=='      '|| newname=='       '|| newname=='        ') {
	
	
	//var rx = /^\S+$/;
	//if (rx.test(newname) == false){
	  
 
		errorMsg += "S'il vous pla\u00EEt  Entrer valide Nom\n";

		returnVal = false;

	   }
	
	/*if(document.getElementById('fname').value == "Prenom"){

	errorMsg += "S'il vous pla\u00EEt  entrer votre Prenom\n";

	returnVal = false;

}*/
	
	

	if(document.getElementById('email').value == "Email"){

		errorMsg += "S'il vous pla\u00EEt Entrez votre Email\n";

		returnVal = false;

	}else{

		if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('email').value))){

			errorMsg += "S'il vous pla\u00EEt entrer une adresse valide\n";

			returnVal = false;

		}

	}
	
	

	if(document.getElementById('phone').value == "Numero de telephone"){

		errorMsg += "S'il vous pla\u00EEt entrer votre telephone\n";

		returnVal = false;

	}else {

var newphone = document.getElementById('phone').value;
	
	if(newphone.match(/\ /)) {
 
		errorMsg += "S'il vous pla\u00EEt  entrer valide telephone\n";

		returnVal = false;

	   }
	}
	

	if(document.getElementById('firstlevel').value == "Choisissez une marque"){

		errorMsg += "S'il vous pla\u00EEt  Entrez Marque de Voiture\n";

		returnVal = false;

	}

	if(document.getElementById('model').value == "Choisissez un model"){

		errorMsg += "S'il vous pla\u00EEt  Entrez Modele\n";

		returnVal = false;

	}

	

	if(document.getElementById('year').value == "Annee"){

		errorMsg += "S'il vous pla\u00EEt  Entrez Annee\n";

		returnVal = false;

	}

	
var newyear = document.getElementById('year').value;
	
	if(newyear.match(/\ /)) {
 
		errorMsg += "S'il vous pla\u00EEt  Entrer valide Annee\n";

		returnVal = false;

	   }
	
	
	if(document.getElementById('service').value == "Pays d`importation"){

		errorMsg += "S'il vous pla\u00EEt  Entrez Service\n";

		returnVal = false;

	}
	
	if(document.getElementById('service').value == ' '){

		errorMsg += "S'il vous pla\u00EEt  Entrer valide Service\n";

		returnVal = false;

	}

	/*
var newservice = document.getElementById('service').value;
	
	if(newservice.match(/\ /)) {
 
		errorMsg += "S'il vous pla\u00EEt  Entrez Service\n";
		//errorMsg += "S'il vous pla\u00EEt  entrer valide Service\n";
		returnVal = false;

	   }
*/	

	

	

	

	if(errorMsg!=""){

		alert("== S'il vous pla\u00EEt corriger erreurs suivantes==\n"+errorMsg);

	}

return returnVal;

	

}




function checkFormAdmin(){

	//alert("hello");

		var errorMsg = "";

		var returnVal  = true;

		if(document.getElementById('name').value == "Name"){

			//alert("hello");

			errorMsg += "Please enter your name\n";

			returnVal = false;

		}
		       
			
		var newname = document.getElementById('name').value;
		
		if(newname==' ' || newname=='  ' || newname=='   '|| newname=='    '|| newname=='     '|| newname=='      '|| newname=='       '|| newname=='        ') {
		
		
		//var rx = /^\S+$/;
		//if (rx.test(newname) == false){
		  
	 
			errorMsg += "Please enter a valid name\n";

			returnVal = false;

		   }
		
		/*if(document.getElementById('fname').value == "Prenom"){

		errorMsg += "S'il vous pla\u00EEt  entrer votre Prenom\n";

		returnVal = false;

	}*/
		
		

		if(document.getElementById('email').value == "Email"){

			errorMsg += "Please Enter your Email\n";

			returnVal = false;

		}else{

			if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('email').value))){

				errorMsg += "Please enter a valid Email address\n";

				returnVal = false;

			}

		}
		
		

		if(document.getElementById('phone').value == "Telephone number"){

			errorMsg += "Please enter your phone\n";

			returnVal = false;

		}else {

	var newphone = document.getElementById('phone').value;
		
		if(newphone.match(/\ /)) {
	 
			errorMsg += "Please enter a valid phone\n";

			returnVal = false;

		   }
		}
		

		if(document.getElementById('firstlevel').value == "Choose a brand"){

			errorMsg += "Please Enter Brand Car\n";

			returnVal = false;

		}

		if(document.getElementById('model').value == "Choose a model"){

			errorMsg += "Please Enter Model\n";

			returnVal = false;

		}

		

		if(document.getElementById('year').value == "Year"){

			errorMsg += "Please Enter Year\n";

			returnVal = false;

		}

		
	var newyear = document.getElementById('year').value;
		
		if(newyear.match(/\ /)) {
	 
			errorMsg += "Please Enter a valid Year\n";

			returnVal = false;

		   }
		
		
		if(document.getElementById('service').value == "Country of import"){

			errorMsg += "Please Enter Country of import\n";

			returnVal = false;

		}
		
		if(document.getElementById('service').value == ' '){

			errorMsg += "Please Enter a valid Country of import\n";

			returnVal = false;

		}

		/*
	var newservice = document.getElementById('service').value;
		
		if(newservice.match(/\ /)) {
	 
			errorMsg += "S'il vous pla\u00EEt  Entrez Service\n";
			//errorMsg += "S'il vous pla\u00EEt  entrer valide Service\n";
			returnVal = false;

		   }
	*/	

		

		

		

		if(errorMsg!=""){

			alert("==Please correct the following errors==\n"+errorMsg);

		}

	return returnVal;

		

	}




function chkNumeric(strString){

	var strValidChars = "0123456789-";

	var strChar;

    var blnResult = true;

    if (strString.length == 0) return false;



    //  test strString consists of valid characters listed above

   for (i = 0; i < strString.length && blnResult == true; i++){

	strChar = strString.charAt(i);

	if (strValidChars.indexOf(strChar) == -1){

		blnResult = false;

    }

   }

   return blnResult;

}

        



         



      