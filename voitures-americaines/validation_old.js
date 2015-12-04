// JavaScript Document

  

                		

function checkForm(){

//alert("hello");

	var errorMsg = "";

	var returnVal  = true;

	if(document.getElementById('name').value == "Nom"){

		//alert("hello");

		errorMsg += "S'il vous pla\u00EEt entrer votre Nom\n";

		returnVal = false;

	}

var newname = document.getElementById('name').value;
	
	if(newname.match(/\ /)) {
 
		errorMsg += "S'il vous pla\u00EEt  entrer valide Nom\n";

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

	/*if(document.getElementById('service').value == "Service"){

		errorMsg += "S'il vous pla\u00EEt  Entrez Service\n";

		returnVal = false;

	}
*/
	

	

	

	

	

	if(errorMsg!=""){

		alert("== S'il vous pla\u00EEt corriger erreurs suivantes==\n"+errorMsg);

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

        



         



      