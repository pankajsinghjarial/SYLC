// form validation function

// var nameRegex = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;

function trim(str) {

  return str.replace(/^\s+|\s+$/g, '');

}




//school Form VAlidation..
function validSchoolForm(form){
  var school_name = trim(form.school_name.value);
   
   if(school_name == "") { 
    inlineMsg('school_name','Please enter school name.',2);
	return false;
  }
 
  return true;
}
function check_email(str){
            fieldValue = str;
            i=fieldValue.indexOf("@")
			j=fieldValue.indexOf(".",i)
			k=fieldValue.indexOf(",")
			kk=fieldValue.indexOf(" ")
			jj=fieldValue.lastIndexOf(".")+1
			len=fieldValue.length
		
			if ((i>0) && (j>(1+1)) && (k==-1) && (kk==-1) && (len-jj >=2) && (len-jj<=3)) 
			{
				/* Right Email Address  */
			}
			else
			{
				return true;
			}
		return false;
}

function validbusinessForm(form){
  var company 				= form.company.value;
  var address  				=form.address.value;
  var city  				= form.city.value;
  var state 				= form.state.value;
  var zip 				    = form.zip.value;
  
  var phone 				= form.phone.value;
  var website 				= form.website.value;
  
 if(company == "") {
    inlineMsg('company','Please Enter Your Company Name.',2);
	return false;
  }
 
if(address == "") {
    inlineMsg('address','Please Enter Your Street Address.',2);
	return false;
  }
 
 if(city == "") {
    inlineMsg('city','Please Enter Your City Name.',2);
	return false;
  }
  if(state == "") {
    inlineMsg('state','Please Enter Your State Name.',2);
	return false;
  }
  if(zip == "") {
    inlineMsg('zip','Please Enter Your Zip-Code.',2);
	return false;
  }
  if(!IsNumeric(zip) )
    {
	inlineMsg('zip','Please Enter Only Digits In Zip-Code Field.',2);
	return false;	
	}

 if(phone == "") {
    inlineMsg('phone','Please Enter Your Phone No.',2);
	return false;
  }
  
 if(!IsNumeric(phone) )
    {
	inlineMsg('phone','Please Enter Only Digits In Phone Field.',2);
	return false;	
	}
  
return true;
}
 function validPeopleForm(form){
  var f_name 				= form.f_name.value;
  var l_name 				= form.l_name.value;
  var address  				=form.address.value;
  var city  				= form.city.value;
  var state 				= form.state.value;
  var zip 				    = form.zip.value;
  var phone 				= form.phone.value;
  var website 				= form.website.value;
  
 if(f_name == "") {
    inlineMsg('f_name','Please Enter Your First Name.',2);
	return false;
  }
  if(l_name == "") {
    inlineMsg('l_name','Please Enter Your Last Name.',2);
	return false;
  } 
 
if(address == "") {
    inlineMsg('address','Please Enter Your Street Address.',2);
	return false;
  }
 
 if(city == "") {
    inlineMsg('city','Please Enter Your City Name.',2);
	return false;
  }
  if(state == "") {
    inlineMsg('state','Please Enter Your State Name.',2);
	return false;
  }
  if(zip == "") {
    inlineMsg('zip','Please Enter Your Zip-Code.',2);
	return false;
  }
  if(!IsNumeric(zip) )
    {
	inlineMsg('zip','Please Enter Only Digits In Zip-Code Field.',2);
	return false;	
	}

 if(phone == "") {
    inlineMsg('phone','Please Enter Your Phone No.',2);
	return false;
  }
  
 if(!IsNumeric(phone) )
    {
	inlineMsg('phone','Please Enter Only Digits In Phone Field.',2);
	return false;	
	}
  
return true;
} 


function valid_cvv_Form(form){
  var attechment 				= form.attechment.value;
  if(attechment == "") {
    inlineMsg('attechment','Please Attech Your CSV File.',2);
	return false;
  }
  
  if(!/(\.(csv))$/i.test(document.getElementById('attechment').value))
          {
          inlineMsg('attechment','Please Attech Only CSV File.',2);
	      return false;
          }	
  
return true;
}



<!------------------->
function show_business(id)
 {
  	 if(id==1)
	   document.getElementById('business_name').style.display='block';
	 else
	   document.getElementById('business_name').style.display='none'; 
 }

function validServiceForm(form){
	var service_name = trim(form.service_name.value);
		if(service_name == "") { 
         inlineMsg('service_name','Please enter service name.',2);
	   return false;
   }
  return true;
	}

//Login Form Validation

function validLoginForm(form) {

  var user_name = trim(form.user_name.value);

  var password = trim(form.password.value);

 

  if(user_name == "") { 

    inlineMsg('user_name','Please enter User Name.',2);

	return false;

  }

 

  if(password == "") {

    inlineMsg('password','Please Enter Password.',2);

    return false;

  }

  return true;

}
//form validation for Emp add
function validProjectAddForm(form)
{
	
	var name = trim(form.name.value);
	var category = trim(form.category.value);
	var progress = trim(form.progress.value);
	var due_date = trim(form.due_date.value);
	var soft_length= form.soft_length.value;
   var desi_length= form.desi_length.value;
   var test_length= form.test_length.value;
	
	if(name == "") {

    inlineMsg('name','Please Enter Employee Name.',2);

    return false;

  }
if(category == "") {

    inlineMsg('category','Please Select Category.',2);

    return false;

  }
  
  if(progress == "") {

    inlineMsg('progress','Please Select Progress.',2);

    return false;

  }
  if(due_date == "") {

    inlineMsg('due_date','Please Select Due Date.',2);

    return false;

  }
  
  

 	var check=0;
    for(var i=1; i<=soft_length ; i++)
	    {
		 //alert(document.getElementById('assigned_soft_'+i).value);
		 if(document.getElementById('assigned_soft_'+i).checked==true)
		      {
			  check=1;
		      break;
			  }
		}
		
if(check==0)		
{
alert("Please Select Software Engineer");	
 //inlineMsg('soft_length','Please Select Software Engineer.',2);
return false;
}
check=0;
    for(var i=1; i<=desi_length ; i++)
	    {
		 //alert(document.getElementById('assigned_soft_'+i).value);
		 if(document.getElementById('assigned_desi_'+i).checked==true)
		      {
			  check=1;
		      break;
			  }
		}		

if(check==0)		
{
alert("Please Select Web Designer");
 //inlineMsg('desi_length','Please Select Web Designer.',2);
return false;
}

 check=0;
    for(var i=1; i<=test_length ; i++)
	    {
		 //alert(document.getElementById('assigned_soft_'+i).value);
		 if(document.getElementById('assigned_test_'+i).checked==true)
		      {
			  check=1;
		      break;
			  }
		}				

if(check==0)		
{
alert("Please Select Tester");
// inlineMsg('test_length','Please Select Tester.',2);
return false;
}

var aggigned_hidden='';

for(var i=1; i<=soft_length ; i++)
	    {
		 //alert(document.getElementById('assigned_soft_'+i).value);
		 if(document.getElementById('assigned_soft_'+i).checked==true)
		      {
			  if(aggigned_hidden=='')
			     aggigned_hidden =document.getElementById('assigned_soft_'+i).value;
		      else
			      aggigned_hidden = aggigned_hidden+','+document.getElementById('assigned_soft_'+i).value;
			  }
		}
		
		
for(var i=1; i<=desi_length ; i++)
	    {
		 //alert(document.getElementById('assigned_soft_'+i).value);
		 if(document.getElementById('assigned_desi_'+i).checked==true)
		      {
			  
		     aggigned_hidden = aggigned_hidden+','+document.getElementById('assigned_desi_'+i).value;
			  }
		}	
		
for(var i=1; i<=test_length ; i++)
	    {
		 //alert(document.getElementById('assigned_soft_'+i).value);
		 if(document.getElementById('assigned_test_'+i).checked==true)
		      {
			  
		     aggigned_hidden = aggigned_hidden+','+document.getElementById('assigned_test_'+i).value;
			 
			  }
		}				

document.getElementById('aggigned_commeties').value=aggigned_hidden;




  return true;

}
//Add Form Validation 
function validAddForm(form) {

  var project_name = trim(form.project_name.value);

  var assgined_id = trim(form.assgined_id.value);
  var duration = trim(form.duration.value);

  var desc = trim(form.desc.value);

 

  if(project_name == "") { 

    inlineMsg('project_name','Please Enter Project Name.',2);

	return false;

  }

 

  if(assgined_id == "") {

    inlineMsg('assgined_id','Please Enter Assgined By.',2);

    return false;

  }
  if(duration == "") {

    inlineMsg('duration','Please Enter Duration.',2);

    return false;

  }
  if(desc == "") {

    inlineMsg('desc','Please Enter Description.',2);

    return false;

  }

  return true;

}
//Add Emp form validation
function validAddEmpForm(form) {

  var name = trim(form.name.value);

  var admin = trim(form.admin.value);
  var password = trim(form.password.value);

  var designation = trim(form.designation.value);
  var shift = trim(form.shift.value);
  var file_photo = trim(form.file_photo.value);

 

  if(name == "") { 

    inlineMsg('name','Please Enter Employee Name.',2);

	return false;

  }

 

  if(admin == "") {

    inlineMsg('admin','Please Enter Employee Email.',2);

    return false;

  }
  if(password == "") {

    inlineMsg('password','Please Enter Password.',2);

    return false;

  }
  if(designation == "") {

    inlineMsg('designation','Please Select Designation.',2);

    return false;

  }
  if(shift == "") {

    inlineMsg('shift','Please Select Shift.',2);

    return false;

  }

  return true;

}

//Category Form VAlidation..

function validCategoryForm(form){

  var category_name = trim(form.category_name.value);

  var category_access_by = trim(form.category_access_by.value);

   

   if(category_name == "") { 

    inlineMsg('category_name','Please enter Category name.',2);

	return false;

  }

 

  if(category_access_by == "") {

    inlineMsg('category_access_by','Please select access level.',2);

    return false;

  }

  

  return true;

}
function validSocialevenForm(form){
  var socialevent_name = trim(form.socialevent_name.value);
  var socialevent_fee  = trim(form.socialevent_fee.value);
  var startDate        = trim(form.startDate.value);
  var endDate 		   = trim(form.endDate.value);
  var socialevent_description 		   = trim(form.socialevent_description.value);
  var stime1=document.getElementsByName('startTime[]');
  var etime1=document.getElementsByName('endTime[]');
 
 if(socialevent_name == "") {

    inlineMsg('socialevent_name','Please fill social event.',2);

    return false;

  }
 if(socialevent_fee == "") {
    inlineMsg('socialevent_fee','Please fill social event fee.',2);
    return false;
  }
 if(!isFloat(socialevent_fee)) {
    inlineMsg('socialevent_fee','Please fill correct social event fee.',2);
    return false;
  } 

 if(stime1[0].value > etime1[0].value)
    {
	 alert('Please select correct time');
	 return false;
	}
 else  if(stime1[0].value == etime1[0].value)
		{	
		  if(stime1[1].value > etime1[1].value)
			{
			 alert('Please enter correct time');
			 return false;
			}
		}				
  if(startDate=='')
    {
	inlineMsg('startDate','Please fill start date.',2);
    return false;
	}
  if(endDate=='')
    {
	inlineMsg('endDate','Please fill end date.',2);

    return false;
	}	
 if(socialevent_description=='')
    {
	inlineMsg('socialevent_description2','Please fill description.',2);

    return false;
	}		
 
return true;
}

//Article Form Validation...

function validArticleForm(form){

	var article_name = trim(form.article_name.value);

     
	 var article_access_by = trim(form.article_access_by.value);
	

  if(article_name == "") { 

    inlineMsg('article_name','Please enter Article Name.',20);

	return false;

  }

  
   if(article_access_by == "") { 

    inlineMsg('article_access_by','Please Select Article Acess.',2);

	return false;

  }

  return true;

}



//News Form Validation...

function validNewsForm(form){

	 var news_title = trim(form.news_title.value);

      var news_access_by = trim(form.news_access_by.value);

	

  if(news_title == "") { 

    inlineMsg('news_title','Please enter News Title.',2);

	return false;

  }
  
  if(news_access_by == "") { 

    inlineMsg('news_access_by','Please enter News Access.',2);

	return false;

  }

  
  return true;

}

function validStingDayMonth(id)

{

	tempString = id.split("");

	if(tempString[0]=='0')

   	id = tempString[1];

	return id;

}

// validFeeForm

function validFeeForm(form){

	 var fee_title = trim(form.fee_title.value);

     var fee_amount= trim(form.fee_amount.value);

	 var fee_start_date= trim(form.fee_start_date.value);

	 var fee_valid_date= trim(form.fee_valid_date.value);

	 var todayDate= trim(form.todayDate.value);

	 var dateValidation= trim(form.dateValidation.value);

		

  if(fee_title == "") { 

    inlineMsg('fee_title','Please enter Fee Title.',2);

	return false;

  }

  

  if(fee_amount == "") { 

    inlineMsg('fee_amount','Please enter Fee Amount.',2);

	return false;

  }

if(dateValidation=='Yes' && fee_start_date!="" && checkDate(todayDate,fee_start_date)!= true )

 {

  	inlineMsg('fee_start_date','Start Date cant be less than to Current date .',2);

		return false;

  }

  

  if(fee_valid_date!="" && checkDate(fee_start_date,fee_valid_date)!= true )

 {

	inlineMsg('fee_valid_date','End Date cant be less than to Start date .',2);

	return false;

	}

  return true;

}



function IsNumeric(strString)

   //  check for valid numeric strings	

   {

   var strValidChars = "0123456789.-";

   var strChar;

   var blnResult = true;



   if (strString.length == 0) return false;



   //  test strString consists of valid characters listed above

   for (i = 0; i < strString.length && blnResult == true; i++)

      {

      strChar = strString.charAt(i);

      if (strValidChars.indexOf(strChar) == -1)

         {

         blnResult = false;

         }

      }

   return blnResult;

   }

//Check float number
function isFloat(strString)
   //  check for valid float number
{
   var strValidChars = "0123456789.";
   var strChar;
   var blnResult = true;
   if (strString.length == 0) return false;
   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         blnResult = false;
         }
      }
   return blnResult;
} 
// START OF MESSAGE SCRIPT //



var MSGTIMER = 60;

var MSGSPEED = 5;

var MSGOFFSET = 3;

var MSGHIDE = 3;



// build out the divs, set attributes and call the fade function //

function inlineMsg(target,string,autohide) {

  var msg;

  var msgcontent;

  if(!document.getElementById('msg')) {

    msg = document.createElement('div');

    msg.id = 'msg';

    msgcontent = document.createElement('div');

    msgcontent.id = 'msgcontent';

    document.body.appendChild(msg);

    msg.appendChild(msgcontent);

    msg.style.filter = 'alpha(opacity=0)';

    msg.style.opacity = 0;

    msg.alpha = 0;

  } else {

    msg = document.getElementById('msg');

    msgcontent = document.getElementById('msgcontent');

  }

  msgcontent.innerHTML = string;

  msg.style.display = 'block';

  var msgheight = msg.offsetHeight;

  var targetdiv = document.getElementById(target);

  targetdiv.focus();

  var targetheight = targetdiv.offsetHeight;

  var targetwidth = targetdiv.offsetWidth;

  var topposition = topPosition(targetdiv) - ((msgheight - targetheight) / 2);

  var leftposition = leftPosition(targetdiv) + targetwidth + MSGOFFSET;

  msg.style.top = topposition + 'px';

  msg.style.left = leftposition + 'px';

  clearInterval(msg.timer);

  msg.timer = setInterval("fadeMsg(1)", MSGTIMER);

  if(!autohide) {

    autohide = MSGHIDE;  

  }

  window.setTimeout("hideMsg()", (autohide * 2000));

}



// hide the form alert //

function hideMsg(msg) {

  var msg = document.getElementById('msg');

  if(!msg.timer) {

    msg.timer = setInterval("fadeMsg(0)", MSGTIMER);

  }

}



// face the message box //

function fadeMsg(flag) {

  if(flag == null) {

    flag = 1;

  }

  var msg = document.getElementById('msg');

  var value;

  if(flag == 1) {

    value = msg.alpha + MSGSPEED;

  } else {

    value = msg.alpha - MSGSPEED;

  }

  msg.alpha = value;

  msg.style.opacity = (value / 100);

  msg.style.filter = 'alpha(opacity=' + value + ')';

  if(value >= 99) {

    clearInterval(msg.timer);

    msg.timer = null;

  } else if(value <= 1) {

    msg.style.display = "none";

    clearInterval(msg.timer);

  }

}



// calculate the position of the element in relation to the left of the browser //

function leftPosition(target) {

  var left = 0;

  if(target.offsetParent) {

    while(1) {

      left += target.offsetLeft;

      if(!target.offsetParent) {

        break;

      }

      target = target.offsetParent;

    }

  } else if(target.x) {

    left += target.x;

  }

  return left;

}



// calculate the position of the element in relation to the top of the browser window //

function topPosition(target) {

  var top = 0;

  if(target.offsetParent) {

    while(1) {

      top += target.offsetTop;

      if(!target.offsetParent) {

        break;

      }

      target = target.offsetParent;

    }

  } else if(target.y) {

    top += target.y;

  }

  return top;

}



// preload the arrow //

if(document.images) {

  arrow = new Image(7,80); 

  arrow.src = "msg_arrow.gif"; 

}





//common.js by anoop





/******************************************

Code : Vinod Suthar	

Common JS function 

********************************************/

/*Function to check the CheckBox is Selcted or not..*/

function isChecked(isitchecked){

	

	if (isitchecked == true){

		document.frm_hidden.boxchecked.value++;

	}

	else {

		document.frm_hidden.boxchecked.value--;

	}

}//Function Ends





/*function to Check UnCheck the checkBox*/

function selectCheckUncheck(id,targetTotal,checkBoxName)

{

 	//var totalRow = document.getElementById(targetTotal).value;

	var totalRow = document.getElementsByName("select[]").length;

	//var totalRowId = document.getElementById("select").value;

	alert(totalRow);

	if(id.checked==true)

		for(i=1;i<=totalRow;i++)

			document.getElementById(checkBoxName+i).checked = true;

	else

		for(i=1;i<=totalRow;i++)

			document.getElementById(checkBoxName+i).checked = false;

	

}/*Function Ends....*/



/*Copy date from one Object to another Object */

function getResembleData(source,desctination)

{

	var str= document.getElementById(source).value;

	document.getElementById(desctination).value = str;

}



//Check Date Function 

function checkDate(sourceDate,targetDate)

{

	 var dtCh= "-";

var minYear=1900;

var maxYear=2100;

			

			var pos1=targetDate.indexOf('-')

			var pos2=targetDate.indexOf(dtCh,pos1+1)

			var strMonth=validStingDayMonth(targetDate.substring(0,pos1))

			

			var strDay=validStingDayMonth(targetDate.substring(pos1+1,pos2))

			var strYear=targetDate.substring(pos2+1)

			

			

			var pos1Today=sourceDate.indexOf('-')

			var pos2Today=sourceDate.indexOf(dtCh,pos1Today+1)

			var strMonthToday=validStingDayMonth(sourceDate.substring(0,pos1Today))

			var strDayToday=validStingDayMonth(sourceDate.substring(pos1Today+1,pos2Today))

			var strYearToday=sourceDate.substring(pos2Today+1)

			

			if((parseInt(strYear)<parseInt(strYearToday)) || (parseInt(strYear)==parseInt(strYearToday) && parseInt(strMonth) < parseInt(strMonthToday) ) || ( (parseInt(strYear)==parseInt(strYearToday)) && (parseInt(strMonth) == parseInt(strMonthToday)) && parseInt(strDay) <  parseInt(strDayToday)  ))

			{

				return false;

			}else{ return true;}	

}



//Number Validation 

function numberOnly(field){

		

	var fieldVal = document.getElementById(field).value;

	var phoneRegex = /^[0-9]+(([\- ][0-9 ])?[0-9]*)*$/;

	if(!fieldVal.match(phoneRegex)) {

		document.getElementById(field).value="";

	  inlineMsg(field,'Only numbers Allowed.',2);

	  

	  return false;

  } return true;

	}
/* Validation form of Brands */
function validBrandsForm(form){
  var brandName   = form.brand_name.value;
  var subCategory = form.sub_category.value;
 if(brandName == "") {
    inlineMsg('brand_name','Please Enter Brand Name.',2);
	return false;
  }
  if(subCategory == "") {
    inlineMsg('sub_category','Please Select Category From List.',2);
	return false;
  }
 return true;
}
/* Validation form of Certification */
function validCertificationForm(form){
  var certificationName   = form.certification_name.value;
 if(certificationName == "") {
    inlineMsg('certification_name','Please Enter Certification Name.',2);
	return false;
  }
 return true;
}
