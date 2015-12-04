<?php
//===========================================================================
//* --    ~~                Crafty Syntax Live Help                ~~    -- *
//===========================================================================
//           URL:   http://www.craftysyntax.com/    EMAIL: livehelp@craftysyntax.com
//         Copyright (C) 2003-2012 Eric Gerdes   (http://www.craftysyntax.com )
// ----------------------------------------------------------------------------
// Please check http://www.craftysyntax.com/ or REGISTER your program for updates
// --------------------------------------------------------------------------
// NOTICE: Do NOT remove the copyright and/or license information any files. 
//         doing so will automatically terminate your rights to use program.
//         If you change the program you MUST clause your changes and note
//         that the original program is Crafty Syntax Live help or you will 
//         also be terminating your rights to use program and any segment 
//         of it.        
// --------------------------------------------------------------------------
// LICENSE:
//     This program is free software; you can redistribute it and/or
//     modify it under the terms of the GNU General Public License
//     as published by the Free Software Foundation; 
//     This program is distributed in the hope that it will be useful,
//     but WITHOUT ANY WARRANTY; without even the implied warranty of
//     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//     GNU General Public License for more details.
//
//     You should have received a copy of the GNU General Public License
//     along with this program in a file named LICENSE.txt .
//===========================================================================
// P3P should work to tell IE not to block cookies:
//Header("P3P: CP=\"ALL DSP COR NID CURa OUR STP PUR\""); 

// Requests directly to livehelp_js.php so not create a session.
// sessions are created with requests to image.php:
 $ghost_session = true;
require_once("visitor_common.php");
 
// backwards compatability (renamed because of modsecurity)
if(!(empty($UNTRUSTED['cmd']))){ $UNTRUSTED['what'] = $UNTRUSTED['cmd']; }
  
// if we are using a relative path to the domain we want the path to
// be somthing like WEBPATH = '/livehelp/'; 
// we do this by getting the full domain and then removing that from the 
// webpath so for example http://www.yourwebsite.com/livehelp/ becomes /livehelp/
if(!(empty($UNTRUSTED['relative']))){
	 // get the domain..
	 $domainname_a = explode("/",$CSLH_Config['webpath']);
	 if(empty($domainname_a[2])) $domainname_a[2] = $domainname_a[0];
   $domainname = "http://" . $domainname_a[2];
   if ( isset($UNTRUSTED['secure']) || ((isset($_SERVER["HTTPS"] ) && stristr($_SERVER["HTTPS"], "on"))) ){
    ?>var WEBPATH = "<?php echo str_replace($domainname,"",$CSLH_Config['s_webpath']); ?>";<?php
    $WEBPATH = str_replace($domainname,"",$CSLH_Config['s_webpath']);
   } else {
    ?>var WEBPATH = "<?php echo str_replace($domainname,"",$CSLH_Config['webpath']); ?>";<?php
    $WEBPATH = str_replace($domainname,"",$CSLH_Config['webpath']);  
   } 
// see if we are in SSL if so use secure Path:
} else {	
 if ( isset($UNTRUSTED['secure']) || ((isset($_SERVER["HTTPS"] ) && stristr($_SERVER["HTTPS"], "on"))) ){
   print "var WEBPATH = \"" . $CSLH_Config['s_webpath'] . "\"; ";
   $WEBPATH = $CSLH_Config['s_webpath'];     
 } else {
   print "var WEBPATH = \"" . $CSLH_Config['webpath'] . "\"; "; 
   $WEBPATH = $CSLH_Config['webpath'];
 }
}
 
if(!(empty($UNTRUSTED['frameparent'])))
  $parentdot = "parent.";
else
  $parentdot = "";

// get defaultdepartment:
if(!(empty($UNTRUSTED['website']))){
  $sqlquery = "SELECT defaultdepartment FROM livehelp_websites WHERE id='".intval($UNTRUSTED['website'])."'";	
} else {
	$UNTRUSTED['website'] = 0;
	$sqlquery = "SELECT defaultdepartment FROM livehelp_websites  LIMIT 1";	
}
$people2 = $mydatabase->query($sqlquery);
$row2 = $people2->fetchRow(DB_FETCHMODE_ASSOC);
$defaultdepartment = $row2['defaultdepartment'];

  
// get department information...
$where="";
if(empty($UNTRUSTED['department'])){ $UNTRUSTED['department']=0; } else { $UNTRUSTED['department'] = intval($UNTRUSTED['department']); }
if($UNTRUSTED['department']!=0){ $where = " WHERE recno=". intval($UNTRUSTED['department']); }
else {  $where = " WHERE recno=$defaultdepartment "; }

$sqlquery = "SELECT creditline,theme,recno FROM livehelp_departments $where ";
$data_d = $mydatabase->query($sqlquery);  
$department_a = $data_d->fetchRow(DB_FETCHMODE_ORDERED);
$creditline  = $department_a[0];
$theme  = $department_a[1];
$department  = $department_a[2];

// get defualt window size information:
if(!(empty($UNTRUSTED['winwidth']))){ $winwidth = intval($UNTRUSTED['winwidth']); }  
if(!(empty($UNTRUSTED['winheight']))){ $winheight = intval($UNTRUSTED['winheight']); }  
if(!(empty($UNTRUSTED['creditline']))){ $creditline = substr($UNTRUSTED['creditline'], 0, 1); } 

$usetable="Y";
if(!(empty($UNTRUSTED['usetable']))){
	 $usetable = $UNTRUSTED['usetable']; 
   if($usetable=="Y"){ $usetable="Y"; } else { $usetable="N"; }
}  

 
include("themes/$theme/windowsize.php");
 
$xy = $creditline;

if(empty($winwidth)){ $winwidth = 600; }  
if(empty($winheight)){ $winheight = 450; }  
if( ($theme =="bubble_window") && ($winwidth<620)){$winwidth =620;}
 
?>

//-----------------------------------------------------------------
// File: livehelp.js : generated for department : <?php echo $department; ?>

//      - This is the client side Javascript file to control the 
//        image shown on the clients website. It should be called
//        on the clients HTML page as a javascript include such as:
//        script src="http://yourwebsite.com/livehelp/livehelp_js.php"
//        This js file will show the image of online.gif if an operator
//        is online otherwise it will show offline.gif . Also a 
//        second image is placed on the site as a control image 
//        where the width of the image controls the actions made by 
//        the operator to the poor little visitor..  
// 
//-----------------------------------------------------------------

// GLOBALS..
//------------
// This is the control image where the width of it controls the 
// actions made by the operator. 
cscontrol_<?php echo $department; ?>= new Image;
popcontrol_<?php echo $department; ?>= new Image;
popcontrol_<?php echo $department; ?>2= new Image;
popcontrol_<?php echo $department; ?>3= new Image;

keyhundreds_<?php echo $department; ?>= new Image;
keytens_<?php echo $department; ?>= new Image;
keyones_<?php echo $department; ?>= new Image;

keyhundreds_<?php echo $department; ?>_value= 0;
keytens_<?php echo $department; ?>_value= 0;
keyones_<?php echo $department; ?>_value= 0;
   
place_<?php echo $department; ?> =1;

// this is a flag to control if the image is set on the page 
// yet or not..
var csloaded_<?php echo $department; ?> = false;

// just to make sure that people do not just open up the page 
// and leave it open the requests timeout after 99 requests.
<?php if(empty($UNTRUSTED['pingtimes'])){ $UNTRUSTED['pingtimes'] = 12; } ?>
var csTimeout_<?php echo $department; ?> = <?php echo intval($UNTRUSTED['pingtimes']); ?>;

// The id of the page request. 
var csID_<?php echo $department; ?> = null;

// if the operator requests a chat we only want to open one window reguardless of department:
var openLiveHelpalready = false;
var openDHTMLalready = false;
var openDHTMLlayer = false;

var ismac = navigator.platform.indexOf('Mac');
// ismac =1;  // for debugging mac
<?php    
    $query = "SELECT idnum FROM livehelp_autoinvite WHERE isactive='Y' LIMIT 1";
    $data = $mydatabase->query($query);
    if($data->numrows() !=0){
      $row = $data->fetchRow(DB_FETCHMODE_ORDERED);
      $layerid = $row[0];
    } else {
    	$layerid = 0;
    } 
            
   $sqlquery = "SELECT user_id,status,sessiondata FROM livehelp_users WHERE sessionid='".$identity['SESSIONID']."'";
   $data = $mydatabase->query($sqlquery);    
   if($data->numrows() !=0){
    $visitor = $data->fetchRow(DB_FETCHMODE_ORDERED);
    $user_id = $visitor[0];
    $status = $visitor[1];
    $sessiondata = $visitor[2];
    $datapairs = explode("&",$sessiondata);
    $datamessage="";
    for($l=0;$l<count($datapairs);$l++){
        $dataset = explode("=",$datapairs[$l]);
        if( (!(empty($dataset[1])) && ($dataset[0] == "invite"))){
             $layerid = $dataset[1];
        }
    }
   }    
print "\n var defaultlayer = $layerid; \n";       
?>    

///////////////////////////////////////////////////////////////
// BEGIN INCLUDED LIBRARY HIDE / SHOW
// detect browser 

NS4 = (document.layers) ? 1 : 0; 
IE4 = (document.all) ? 1 : 0; 
// W3C stands for the W3C standard 
W3C = (document.getElementById) ? 1 : 0;   

function makeVisible ( name ) { 
  var ele; 

  if ( W3C ) { 
    ele = document.getElementById(name); 
  } else if ( NS4 ) { 
    ele = document.layers[name]; 
  } else { // IE4 
    ele = document.all[name]; 
  } 

  if ( NS4 ) { 
    ele.visibility = "show"; 
  } else {  // IE4 & W3C & Mozilla 
    ele.style.visibility = "visible"; 
    ele.style.display = "inline"; 
  } 
} 

function makeInvisible ( name ) { 
  if (W3C) { 
    document.getElementById(name).style.visibility = "hidden"; 
    document.getElementById(name).style.display = "none"; 
  } else if (NS4) { 
    document.layers[name].visibility = "hide"; 
  } else { 
    document.all[name].style.visibility = "hidden"; 
    document.all[name].style.style.display = "none"; 
  } 
} 

//END INCLUDED LIBRARY HIDE / SHOW
////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////
// BEGIN INCLUDED LIBRARY XHTML
var xmlhttp = false; 
var XMLHTTP_supported = false;

 
function gettHTTPreqobj(){
	try { 
	xmlhttp = new XMLHttpRequest(); 
 } catch (e1) { 
 	 try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); 
   } catch (e2) { 
     try { 
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
     } catch (e3) { 
    xmlhttp = false; 
   } 
  } 
 }
 return xmlhttp;
}
 
function loadXMLHTTP() { 
     // account for cache..
     randu=Math.round(Math.random()*99);
     // load a test page page:
     loadOK('xmlhttp.php?whattodo=ping&rand='+ randu); 
} 

function loadOK(fragment_url) { 
	  xmlhttp = gettHTTPreqobj();
    xmlhttp.open("GET", fragment_url, true); 
    xmlhttp.onreadystatechange = function() { 
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
       isok = xmlhttp.responseText;
       if(isok == "OK")
          XMLHTTP_supported = true;   
          checkXMLHTTP();
     } 
    } 
    try { xmlhttp.send(null); } catch(whocares){}
}


 // XMLHTTP ----------------------------------------------------------------- 
 function oXMLHTTPStateHandler() { 
     // only if req shows "loaded" 
     if(typeof oXMLHTTP!='undefined') { 
        if( oXMLHTTP.readyState==4 ) {         // 4="completed" 
          if( oXMLHTTP.status==200 ) {         // 'OK Operation successful                
               try { 
                 resultingtext = oXMLHTTP.responseText;
               } catch(e) { 
                 resultingtext ="error=1;";
               }
               ExecRes(unescape(resultingtext)); 
               delete oXMLHTTP; 
               oXMLHTTP=false;
               //DEBUG:SetStatus('Response received... Now Processing',0); 
            } else { 
            	return false;
               //DEBUG:alert( "There was a problem receiving the data.\n" 
               //         +"Please wait a few moments and try again.\n" 
               //         +"If the problem persists, please contact us.\n" 
               //  +oXMLHTTP.getAllResponseHeaders() 
               //       ); 
             }   
           }
         } 
      } 
  
 // Submit POST data to server and retrieve results 
 function PostForm(sURL, sPostData) { 
         oXMLHTTP = gettHTTPreqobj(); 
         if( typeof(oXMLHTTP)!="object" ) return false; 
         
         oXMLHTTP.onreadystatechange = oXMLHTTPStateHandler; 
         try { 
            oXMLHTTP.open("POST", sURL, true); 
         } catch(er) { 
            //DEBUG: alert( "Error opening XML channel\n"+er.description ); 
            return false; 
         }    
         oXMLHTTP.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
         try { oXMLHTTP.send(sPostData); } catch(whocares){}
         return true; 
      }  
      
 // Submit GET data to server and retrieve results 
 function GETForm(sURL) { 

         oXMLHTTP = gettHTTPreqobj();          
         if( typeof(oXMLHTTP)!="object" ) return false;          
         oXMLHTTP.onreadystatechange = oXMLHTTPStateHandler; 
         try { 
            oXMLHTTP.open("GET", sURL, true); 
         } catch(er) { 
            //DEBUG: alert( "Error opening XML channel\n"+er.description ); 
            return false; 
         }    
         try { oXMLHTTP.send(null); } catch(whocares){}
         return true; 
      }
 
 
      
// getting started:
xmlhttp = gettHTTPreqobj();
          
//END INCLUDED LIBRARY xmlhttp
////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////    
 

//END INCLUDED LIBRARY
////////////////////////////////////////////////////////////////

function wherecslhisdue_<?php echo $department; ?>(){
  var layerdoesnotexist_<?php echo $department; ?> = 0;
  var looking = 'tp://www.craf'+'tysynt'+'ax.c'+'om';
  var maccrap = '';
  var layerinvitecrap =  '<div id="layerinvite_<?php echo $department; ?>" style="position:absolute; z-index:99992; visibility:hidden; display:none; top:-400px; left:-400px; width:400px; height:400px;"></div>';
	 
	   	 
  var x_<?php echo $department; ?>=document.getElementById("craftysyntax_<?php echo $department; ?>");
  if(x_<?php echo $department; ?>){
    
  } else {
    var x_<?php echo $department; ?>=document.getElementById("craftysyntax");
    if(!(x_<?php echo $department; ?>=document.getElementById("craftysyntax"))){
    	  layerdoesnotexist_<?php echo $department; ?> = 1;
    	  x_<?php echo $department; ?> = 0; 
    }
  }
  if(layerdoesnotexist_<?php echo $department; ?> != 1){
    var y_<?php echo $department; ?> = x_<?php echo $department; ?>.innerHTML; 
  } else {
    var y_<?php echo $department; ?> = looking;   	
  }
  
// macs do not see images in cache:
if (ismac > -1) {
	randu=Math.round(Math.random()*9999);
  maccrap = '<div id=imagesfordumbmac_<?php echo $department; ?> style=display:none><img id="imageformac_<?php echo $department; ?>" name="imageformac_<?php echo $department; ?>" src="' + WEBPATH + 'images/blank.gif" border="0"><img id="imageformac_<?php echo $department; ?>_one" name="imageformac_<?php echo $department; ?>_one" src="' + WEBPATH + 'images/blank.gif" border="0"><img id="imageformac_<?php echo $department; ?>_ten" name="imageformac_<?php echo $department; ?>_ten" src="' + WEBPATH + 'images/blank.gif" border="0"><img id="imageformac_<?php echo $department; ?>_hun" name="imageformac_<?php echo $department; ?>_hun" src="' + WEBPATH + 'images/blank.gif" border="0"></div>';
}
	 
	 
<?php  if(empty($UNTRUSTED['dynamic'])){   ?>
 		 
 if (y_<?php echo $department; ?>.indexOf(looking)!=-1) { 
	     
  } else {

<?php } ?>

 		<?php if($usetable=="Y"){ ?>
 	   var newHTML =  '<table cellpadding=0 cellspacing=0 border=0><tr><td valign=top align=center><a name="chatRef" href="javascript:openLiveHelp(<?php echo $UNTRUSTED['department']; ?>)" onclick="javascript:csTimeout_<?php echo $department; ?>=0;"><img name="csIcon" src="' + urltohelpimage_<?php echo $department; ?> + '" alt="Live Help" border="0"></a></td></tr>';
 	   newHTML =  newHTML + '<tr><td valign=top align=center><'+'a hr'+'ef="ht'+'tp://w'+'ww.c'+'raft'+'ysynt'+'ax.com?ut'+'m_'+'so'+'ur'+'ce'+'=po'+'we'+'re'+'db'+'y&'+'ut'+'m_'+'cam'+'pa'+'ig'+'n=p'+'ow'+'er'+'ed'+'by" nam" alt="Craf'+'ty Syn'+'tax Li'+'ve He'+'lp" ta'+'rget="_bl'+'ank"><img src='+ urltocslhimage_<?php echo $department; ?> +' border=0 STYLE="margin-top:4px;"></a></td></tr>';
 	   newHTML = newHTML + '</table>';
 	   
    <?php } else { ?>
 	    var newHTML =  '<a name="chatRef" href="javascript:openLiveHelp(<?php echo intval($UNTRUSTED['department']); ?>)" onclick="javascript:csTimeout_<?php echo $department; ?>=0;"><img name="csIcon" src="' + urltohelpimage_<?php echo $department; ?> + '" alt="Live Help" border="0"></a>';
 	     newHTML =  newHTML + '<br clear="both"><'+'a hr'+'ef="ht'+'tp://w'+'ww.c'+'raft'+'ysynt'+'ax.com?ut'+'m_'+'so'+'ur'+'ce'+'=po'+'we'+'re'+'db'+'y&'+'ut'+'m_'+'cam'+'pa'+'ig'+'n=p'+'ow'+'er'+'ed'+'by" nam" alt="Craf'+'ty Syn'+'tax Li'+'ve He'+'lp" ta'+'rget="_bl'+'ank"><img src='+ urltocslhimage_<?php echo $department; ?> +' border=0 STYLE="margin-top:4px;"></a>';

    <?php } ?>
 
   if(layerdoesnotexist_<?php echo $department; ?> != 1){
     x_<?php echo $department; ?>.innerHTML = newHTML + layerinvitecrap + maccrap; 
   }
 
 
 <?php  if(empty($UNTRUSTED['dynamic'])){   ?>    
  }
  <?php } else { ?> 
 
    if(layerdoesnotexist_<?php echo $department; ?> == 1){
       alert('Crafty Sytnax Live Help Error: DIV layer with the id of: craftysyntax_<?php echo $department; ?> does not exist. This is needed order to put the live help icon on your page. please add <DIV id=craftysyntax_<?php echo $department; ?> > [[your javascript for your live help ]]  </div> around your live help code');
    }
  <?php }  ?>  
 
 
 }

 
//-----------------------------------------------------------------
// loop though checking the image for updates from operators.
function csrepeat_<?php echo $department; ?>()
{
 
     // if the request has timed out do not do anything.
     if (csTimeout_<?php echo $department; ?> < 1){     
       	return;
     } else {
       csTimeout_<?php echo $department; ?>--;

        // update image for requests from operator. 
       csgetimage_<?php echo $department; ?>();     

       // do it again. 
       setTimeout('csrepeat_<?php echo $department; ?>()', 10000);
     }
}	

//-----------------------------------------------------------------
// Update the control image. This is the image that the operators 
// use to communitate with the visitor. 
function csgetimage_<?php echo $department; ?>()
{	 
 
	 // set a number to identify this page .
	 csID_<?php echo $department; ?>=Math.round(Math.random()*9999);
	 randu=Math.round(Math.random()*9999);
   cscontrol_<?php echo $department; ?> = new Image;
	 
   locationvar = '' + <?php echo $parentdot; ?>document.location;
   locationvar = locationvar.replace(new RegExp("[^A-Za-z0-9_)\+\^{}~( ',\.\&\%=/\\?#:-]","g"),"");
   locationvar = locationvar.replace(new RegExp("=[a-z0-9]{32}","g"),"x=1");
   locationvar = locationvar.replace(new RegExp("[\.]","g"),"--dot--");
   locationvar = locationvar.replace(new RegExp("http://","g"),"");
   locationvar = locationvar.replace(new RegExp("https://","g"),"");   
   locationvar = locationvar.substr(0,250);
   var_title = '' + <?php echo $parentdot; ?>document.title;
   var_title = var_title.replace(new RegExp("[^A-Za-z0-9_)\+\^{}~( ',\.\&\%=/\\?#:-]","g"),"");
   var_title = var_title.substr(0,100);
   var_referrer = '' + <?php echo $parentdot; ?>document.referrer;
   var_referrer = var_referrer.replace(new RegExp("[^A-Za-z0-9_)\+\^{}~( ',\.\&\%=/\\?#:-]","g"),"");
   var_referrer = var_referrer.replace(new RegExp("=[a-z0-9]{32}","g"),"x=1"); 
   var_referrer = var_referrer.replace(new RegExp("[\.]","g"),"--dot--");
   var_referrer = var_referrer.replace(new RegExp("http://","g"),"");
   var_referrer = var_referrer.replace(new RegExp("https://","g"),"");      
   var_referrer = var_referrer.substr(0,250);
   
<?php
  if((!empty($UNTRUSTED['filter']))){
?>      
var locationvar_array=locationvar.split("?");
locationvar = locationvar_array[0];
var var_referrer_array=var_referrer.split("?");
var_referrer = var_referrer_array[0];
var_title = "";
<?php
  } 
 ?>
	 var u_<?php echo $department; ?> = WEBPATH + 'image.php?' + 
					'what=userstat' + 
					'&page=' + escape(locationvar) + 
					'&randu=' + randu +
					'&pageid=' + csID_<?php echo $department; ?> +
					'&department=' + <?php echo intval($UNTRUSTED['department']); ?> +
					'&cslhVISITOR=' + '<?php echo $identity['SESSIONID']; ?>' +
					'&title=' + escape(var_title) + 
					'&referer=' + escape(var_referrer) + 					
					'<?php echo $querystringadd; ?>';
     //	 alert(u_<?php echo $department; ?>);
	 if (ismac > -1){
       document.getElementById("imageformac_<?php echo $department; ?>").src= u_<?php echo $department; ?>;
       document.getElementById("imageformac_<?php echo $department; ?>").onload = cslookatimage_<?php echo $department; ?>;
    } else {
       cscontrol_<?php echo $department; ?>.src = u_<?php echo $department; ?>;
       cscontrol_<?php echo $department; ?>.onload = cslookatimage_<?php echo $department; ?>;
    }      	
}



// looks at the size of the control image and if the width is 55 
// then open the chat.
//-----------------------------------------------------------------
function cslookatimage_<?php echo $department; ?>(){

	if(typeof(cscontrol_<?php echo $department; ?>) == 'undefined' ){
    return; 
  }  

	if (ismac > -1){
     w_<?php echo $department; ?> = document.getElementById("imageformac_<?php echo $department; ?>").width;
  } else {
     w_<?php echo $department; ?> = cscontrol_<?php echo $department; ?>.width;        
  }
  
    // if the browser is dumb:
    if((ismac > -1) && (w_<?php echo $department; ?> == 0)){
      makeVisible('imagesfordumbmac_<?php echo $department; ?>');     
      w_<?php echo $department; ?> = document.getElementById("imageformac_<?php echo $department; ?>").width;
      makeInvisible('imagesfordumbmac_<?php echo $department; ?>');         
    }
  
 
      // pop up window:
      if ((w_<?php echo $department; ?> == 55) && (openLiveHelpalready != 1)) {
  		  openWantsToChat_<?php echo intval($UNTRUSTED['department']); ?>();
		    openLiveHelpalready = 1;
	    } 
 
      // layer invite:
	    if ((w_<?php echo $department; ?> == 25) && !(openDHTMLalready)) {    
  		   loadKey_<?php echo intval($UNTRUSTED['department']); ?>();
	    } 	        	        
    
      delete cscontrol_<?php echo $department; ?>;
      cscontrol_<?php echo $department; ?> = new Image;
}


//-----------------------------------------------------------------
// opens live help
function openLiveHelp(department)
{
  if(openDHTMLlayer == 1){
    makeInvisible('layerinvite_<?php echo intval($UNTRUSTED['department']); ?>');
  }  

  openDHTMLlayer = 0;  
  openDHTMLalready = true;  
  csTimeout_<?php echo $department; ?>=0; 
  <?php if ($identity['COOKIE_SET'] == "Y") { ?>	
    window.open(WEBPATH + 'livehelp.php?department=' + department + '&website=<?php echo intval($UNTRUSTED['website']); ?>&cslhVISITOR=<?php echo $identity['SESSIONID']; ?><?php echo $querystringadd; ?>', 'chat54050872', 'width=<?php echo $winwidth; ?>,height=<?php echo $winheight; ?>,menubar=no,scrollbars=1,resizable=1');
  <?php } else { ?>
    window.open(WEBPATH + 'livehelp.php?department=' + department + '&website=<?php echo intval($UNTRUSTED['website']); ?>&<?php echo $querystringadd; ?>', 'chat54050872', 'width=<?php echo $winwidth; ?>,height=<?php echo $winheight; ?>,menubar=no,scrollbars=1,resizable=1');
  <?php } ?>
}

function getKeys_<?php echo intval($UNTRUSTED['department']); ?>(){
  	if (ismac > -1){
      w3_<?php echo $department; ?> = document.getElementById("imageformac_<?php echo $department; ?>_hun").width;
      w2_<?php echo $department; ?> = document.getElementById("imageformac_<?php echo $department; ?>_ten").width;
      w1_<?php echo $department; ?> = document.getElementById("imageformac_<?php echo $department; ?>_one").width;
      
      if(w1_<?php echo $department; ?> == 0){
        makeVisible('imagesfordumbmac_<?php echo $department; ?>'); 
        w1_<?php echo $department; ?> = document.getElementById("imageformac_<?php echo $department; ?>_one").width;
        makeInvisible('imagesfordumbmac_<?php echo $department; ?>');         
      }

      if(w2_<?php echo $department; ?> == 0){
        makeVisible('imagesfordumbmac_<?php echo $department; ?>'); 
        w2_<?php echo $department; ?> = document.getElementById("imageformac_<?php echo $department; ?>_ten").width;
        makeInvisible('imagesfordumbmac_<?php echo $department; ?>');         
      }

      if(w3_<?php echo $department; ?> == 0){
        makeVisible('imagesfordumbmac_<?php echo $department; ?>'); 
        w3_<?php echo $department; ?> = document.getElementById("imageformac_<?php echo $department; ?>_hun").width;
        makeInvisible('imagesfordumbmac_<?php echo $department; ?>');         
      }              
            
    } else {
      w3_<?php echo $department; ?> = keyhundreds_<?php echo $department; ?>.width;  
      w2_<?php echo $department; ?> = keytens_<?php echo $department; ?>.width;  
      w1_<?php echo $department; ?> = keyones_<?php echo $department; ?>.width;              
    }      
 
    if(w1_<?php echo $department; ?><100) w1_<?php echo $department; ?> = 100;
    if(w2_<?php echo $department; ?><100) w2_<?php echo $department; ?> = 100;
    if(w3_<?php echo $department; ?><100) w3_<?php echo $department; ?> = 100;    
   // alert('w1='+w1+'w2='+w2+'w3='+w3);
    
    total = ((w3_<?php echo $department; ?>-100)*100) + ((w2_<?php echo $department; ?>-100)*10) + (w1_<?php echo $department; ?>-100);
    
   // alert(total);
    openDHTML_<?php echo intval($UNTRUSTED['department']); ?>(total);    
}

//-----------------------------------------------------------------
// gets primary key of layerinvite sent using 3 images.. could use XML HTTP
// but this is more compatable...
function loadKey_<?php echo intval($UNTRUSTED['department']); ?>(){  
   
	 randu=Math.round(Math.random()*9999);

	 if(place_<?php echo $department; ?> == 3){
	 var u3_<?php echo $department; ?> = WEBPATH + 'image.php?' + 
					'what=getlayerinvite&whatplace=hundreds' + 
					'&randu=' + randu +
					'&department=' + <?php echo intval($UNTRUSTED['department']); ?> +
					'&cslhVISITOR=' + '<?php echo $identity['SESSIONID']; ?>' +
					'<?php echo $querystringadd; ?>';
      if (ismac > -1){
       document.getElementById("imageformac_<?php echo $department; ?>_hun").src= u3_<?php echo $department; ?>;
       document.getElementById("imageformac_<?php echo $department; ?>_hun").onload = getKeys_<?php echo intval($UNTRUSTED['department']); ?>;       
      } else {
       keyhundreds_<?php echo $department; ?>.src = u3_<?php echo $department; ?>;
       keyhundreds_<?php echo $department; ?>.onload = getKeys_<?php echo intval($UNTRUSTED['department']); ?>; }
    }			
	 if(place_<?php echo $department; ?> == 2){
	 	    place_<?php echo $department; ?> = 3;
	 var u2_<?php echo $department; ?> = WEBPATH + 'image.php?' + 
					'what=getlayerinvite&whatplace=tens' + 
					'&randu=' + randu +
					'&department=' + <?php echo intval($UNTRUSTED['department']); ?> +
					'&cslhVISITOR=' + '<?php echo $identity['SESSIONID']; ?>' +
					'<?php echo $querystringadd; ?>';
      if (ismac > -1){
       document.getElementById("imageformac_<?php echo $department; ?>_ten").src= u2_<?php echo $department; ?>;
       document.getElementById("imageformac_<?php echo $department; ?>_ten").onload = loadKey_<?php echo intval($UNTRUSTED['department']); ?>;       
      } else {
       keytens_<?php echo $department; ?>.src = u2_<?php echo $department; ?>;
       keytens_<?php echo $department; ?>.onload = loadKey_<?php echo intval($UNTRUSTED['department']); ?>;      
      }
    }    								   
	 if(place_<?php echo $department; ?> == 1){
	     place_<?php echo $department; ?> = 2;	
	    var u1_<?php echo $department; ?> = WEBPATH + 'image.php?' + 
					'what=getlayerinvite&whatplace=ones' + 
					'&randu=' + randu +
					'&department=' + <?php echo intval($UNTRUSTED['department']); ?> +
					'&cslhVISITOR=' + '<?php echo $identity['SESSIONID']; ?>' +
					'<?php echo $querystringadd; ?>';
      if (ismac > -1){
       document.getElementById("imageformac_<?php echo $department; ?>_one").src= u1_<?php echo $department; ?>;
       document.getElementById("imageformac_<?php echo $department; ?>_one").onload = loadKey_<?php echo intval($UNTRUSTED['department']); ?>;       
      } else {
       keyones_<?php echo $department; ?>.src = u1_<?php echo $department; ?>;
       keyones_<?php echo $department; ?>.onload = loadKey_<?php echo intval($UNTRUSTED['department']); ?>;      
      }
    }
}
//-----------------------------------------------------------------
// opens DHTML help
function openDHTML_<?php echo intval($UNTRUSTED['department']); ?>(total)
{ 
  var html = '';
		     
  <?php
   $urlreplace =  $WEBPATH . "livehelp.php?department=". intval($UNTRUSTED['department']) ."&website=". intval($UNTRUSTED['website']) ."&resizewidth=500&resizeheight=350";

   $sqlquery = "SELECT layerid,imagename,imagemap FROM livehelp_layerinvites";
   $layers = $mydatabase->query($sqlquery);  
   while($invite = $layers->fetchRow(DB_FETCHMODE_ORDERED)){
   	  print "if (total == ".$invite[0].")\n";
   	  	 $imagemapof = str_replace("openLiveHelp()","openLiveHelp(".$UNTRUSTED['department'].")",$invite[2]);
   	  	 $imagemapof = str_replace("'","\"",$imagemapof);
         $imagemapof = preg_replace("/\r\n/","",$imagemapof);
         $imagemapof = preg_replace("/\n/","",$imagemapof);      
         $imagemapof = str_replace("openLiveHelp_force()",$urlreplace,$imagemapof);
   	     print "    html = '<img src=' + WEBPATH + 'layer_invites/". $invite[1]."  border=0 usemap=#myimagemap></a>". $imagemapof ."'\n";   	  
   }
  ?>
  //alert(html);
  makeVisible('layerinvite_<?php echo intval($UNTRUSTED['department']); ?>');
  var w_<?php echo $department; ?>=document.getElementById('layerinvite_<?php echo intval($UNTRUSTED['department']); ?>');
  w_<?php echo $department; ?>.innerHTML = html; 
 
	 var u_<?php echo $department; ?> = WEBPATH + 'image.php?' + 
					'what=changestat' + 
					'&towhat=invited' +
					'&cslhVISITOR=' + '<?php echo $identity['SESSIONID']; ?>' +
					'<?php echo $querystringadd; ?>';
	 popcontrol_<?php echo $department; ?>2.src = u_<?php echo $department; ?>;	
	 stillopen = 1;
 
   setTimeout('moveDHTML_<?php echo intval($UNTRUSTED['department']); ?>()', 9);
	 openDHTMLalready = true;
	 openDHTMLlayer = true;
}

//-----------------------------------------------------------------
// opens DHTML help
function closeDHTML()
{ 
	makeInvisible('layerinvite_<?php echo intval($UNTRUSTED['department']); ?>');
	openDHTMLlayer = 0;
	stillopen = 0;
	
	var u4_<?php echo $department; ?> = WEBPATH + 'image.php?' + 
					'what=changestat' + 
					'&towhat=stopped' +
					'&cslhVISITOR=' + '<?php echo $identity['SESSIONID']; ?>' +
					'<?php echo $querystringadd; ?>';
  popcontrol_<?php echo $department; ?>3.src = u4_<?php echo $department; ?>;	
	 	 
}

//-----------------------------------------------------------------
// opens DHTML help
function moveDHTML_<?php echo intval($UNTRUSTED['department']); ?>()
{ 
  if(stillopen==1){
   if(navigator.appName.indexOf("Netscape") != -1){
    myWidth	=   window.pageXOffset;
    myHeight	= window.pageYOffset
   } else {
    myWidth	=  document.body.scrollLeft;
    myHeight	=  document.body.scrollTop;
  }
   
   slidingDiv = document.getElementById('layerinvite_<?php echo intval($UNTRUSTED['department']); ?>');
     
   gox = parseInt(slidingDiv.style.left);
   goy = parseInt(slidingDiv.style.top);
   
 //  alert('x:'+gox);
 //  alert('y:'+goy);   
   <?php
   	 $floatxy = explode("|",$CSLH_Config['floatxy']);
   	 $floatx =$floatxy[0];
   	 $floaty =$floatxy[1];
   	    	 
   if(empty($floatx)){ $floatx = 200; }
   if(empty($floaty)){ $floaty = 160; }   
   ?>
   // done 3 times to move 3 times faster:
   if(gox < myWidth+<?php echo intval($floatx); ?>){ gox++; }
   if(gox > myWidth+<?php echo intval($floatx); ?>){ gox--; }         
   if(goy < myHeight+<?php echo intval($floaty); ?>){ goy++; }
   if(goy > myHeight+<?php echo intval($floaty); ?>){ goy--; }  
   
   if(gox < myWidth+<?php echo intval($floatx); ?>){ gox++; }
   if(gox > myWidth+<?php echo intval($floatx); ?>){ gox--; }   
   if(goy < myHeight+<?php echo intval($floaty); ?>){ goy++; }
   if(goy > myHeight+<?php echo intval($floaty); ?>){ goy--; } 

   if(gox < myWidth+<?php echo intval($floatx); ?>){ gox++; }
   if(gox > myWidth+<?php echo intval($floatx); ?>){ gox--; }   
   if(goy < myHeight+<?php echo intval($floaty); ?>){ goy++; }
   if(goy > myHeight+<?php echo intval($floaty); ?>){ goy--; }  
         
//   alert('x:'+gox);
//   alert('y:'+goy);   
    
   slidingDiv.style.left = gox + "px";
   slidingDiv.style.top = goy + "px";
   
   if(goy!= parseInt(myWidth+<?php echo intval($floatx); ?>) ) 
      setTimeout('moveDHTML_<?php echo intval($UNTRUSTED['department']); ?>()', 7);   
   else
      setTimeout('moveDHTML_<?php echo intval($UNTRUSTED['department']); ?>()', 9000);      
  }
}

//-----------------------------------------------------------------
// The Operator wants to chat with the visitor about something. 
function openWantsToChat_<?php echo intval($UNTRUSTED['department']); ?>()
{  
  // ok we asked them .. now lets not ask them again for awhile...


   locationvar = '' + <?php echo $parentdot; ?>document.location;
   locationvar = locationvar.replace(new RegExp("[^A-Za-z0-9_)\+\^{}~( ',\.\&\%=/\\?#:-]","g"),"");
   locationvar = locationvar.replace(new RegExp("=[a-z0-9]{32}","g"),"x=1");
   locationvar = locationvar.replace(new RegExp("[\.]","g"),"--dot--");   
   locationvar = locationvar.replace(new RegExp("http://","g"),"");
   locationvar = locationvar.replace(new RegExp("https://","g"),"");
   locationvar = locationvar.substr(0,250);
   var_title = '' + <?php echo $parentdot; ?>document.title;
   var_title = var_title.replace(new RegExp("[^A-Za-z0-9_)\+\^{}~( ',\.\&\%=/\\?#:-]","g"),"");
   var_title = var_title.substr(0,100);
   var_referrer = '' + <?php echo $parentdot; ?>document.referrer;
   var_referrer = var_referrer.replace(new RegExp("[^A-Za-z0-9_)\+\^{}~( ',\.\&\%=/\\?#:-]","g"),"");
   var_referrer = var_referrer.replace(new RegExp("=[a-z0-9]{32}","g"),"x=1");
   var_referrer = var_referrer.replace(new RegExp("[\.]","g"),"--dot--");  
   var_referrer = var_referrer.replace(new RegExp("http://","g"),"");
   var_referrer = var_referrer.replace(new RegExp("https://","g"),"");      
   
   var_referrer = var_referrer.substr(0,250);
<?php
  if((!empty($UNTRUSTED['filter']))){
?>      
var locationvar_array=locationvar.split("?");
locationvar = locationvar_array[0];
var var_referrer_array=var_referrer.split("?");
var_referrer = var_referrer_array[0];
var_title = "";
<?php
  } 
 ?>   
  var u_<?php echo $department; ?> = WEBPATH + 'image.php?' + 
					'what=browse' + 
					'&page=' + escape(locationvar) + 
					'&title=' + escape(var_title) + 
					'&referer=' + escape(var_referrer) + 
					'&pageid=' + csID_<?php echo $department; ?> +
					'&department=' + <?php echo intval($UNTRUSTED['department']); ?> +
					'&cslhVISITOR=' + '<?php echo $identity['SESSIONID']; ?>' +
					'<?php echo $querystringadd; ?>';
  cscontrol_<?php echo $department; ?>.src = u_<?php echo $department; ?>;  

  // open the window.. 
  window.open(WEBPATH + 'livehelp.php?what=chatinsession&department=<?php echo intval($UNTRUSTED['department']); ?>&website=<?php echo intval($UNTRUSTED['website']); ?>&cslhVISITOR=<?php echo $identity['SESSIONID']; ?><?php echo $querystringadd; ?>', 'chat54050872', 'width=<?php echo $winwidth; ?>,height=<?php echo $winheight; ?>,menubar=no,scrollbars=1,resizable=1');
}

<?php 
 if(!(isset($UNTRUSTED['what']))) { $UNTRUSTED['what'] = ""; }


 // see if anyone is online.. 
 $sqlquery = "SELECT * 
           FROM livehelp_users,livehelp_operator_departments 
           WHERE livehelp_users.user_id=livehelp_operator_departments.user_id 
              AND livehelp_users.isonline='Y' 
              AND livehelp_users.isoperator='Y' "; 
 if (intval($UNTRUSTED['department']) != 0) 
 $sqlquery .= "AND livehelp_operator_departments.department=". intval($UNTRUSTED['department']); 
  $data = $mydatabase->query($sqlquery); 
 if($data->numrows() == 0)
   $noonehome = true;
 else
   $noonehome = false;
    
 
  if(empty($UNTRUSTED['force'])){ 
	  $urlreplace =  "javascript:openLiveHelp(".$UNTRUSTED['department'].")";    
    $target = "";
  } else { 
	  $urlreplace =  $WEBPATH . "livehelp.php?department=". intval($UNTRUSTED['department']) . "&website=". intval($UNTRUSTED['website']) . "&resizewidth=500&resizeheight=350";
    $target = " target=_blank ";
  }

	?>
   locationvar = '' + <?php echo $parentdot; ?>document.location;
   locationvar = locationvar.replace(new RegExp("[^A-Za-z0-9_)\+\^{}~( ',\.\&\%=/\\?#:-]","g"),"");
   locationvar = locationvar.replace(new RegExp("=[a-z0-9]{32}","g"),"x=1");
   locationvar = locationvar.replace(new RegExp("[\.]","g"),"--dot--");   
   locationvar = locationvar.replace(new RegExp("http://","g"),"");
   locationvar = locationvar.replace(new RegExp("https://","g"),"");   
   locationvar = locationvar.substr(0,250);
   var_title = '' + <?php echo $parentdot; ?>document.title;   
   var_title = var_title.replace(new RegExp("[^A-Za-z0-9_)\+\^{}~( ',\.\&\%=/\\?#:-]","g"),"");
   var_title = var_title.substr(0,100);
   var_referrer = '' + <?php echo $parentdot; ?>document.referrer;
   var_referrer = var_referrer.replace(new RegExp("[^A-Za-z0-9_)\+\^{}~( ',\.\&\%=/\\?#:-]","g"),"");
   var_referrer = var_referrer.replace(new RegExp("=[a-z0-9]{32}","g"),"x=1");
   var_referrer = var_referrer.replace(new RegExp("[\.]","g"),"--dot--");  
   var_referrer = var_referrer.replace(new RegExp("http://","g"),"");
   var_referrer = var_referrer.replace(new RegExp("https://","g"),"");         
   var_referrer = var_referrer.substr(0,250);
<?php
  if((!empty($UNTRUSTED['filter']))){
?>      
var locationvar_array=locationvar.split("?");
locationvar = locationvar_array[0];
var var_referrer_array=var_referrer.split("?");
var_referrer = var_referrer_array[0];
var_title = "";
<?php
  } 
 ?>   
 
<?php
if(empty($UNTRUSTED['what'])){ $UNTRUSTED['what'] = "nada"; }
if(empty($leaveamessage)){ $leaveamessage = "YES"; }
?>

	var urltohelpimage_<?php echo $department; ?> = WEBPATH + 'image.php?what=getstate&department=<?php echo intval($UNTRUSTED['department']); ?>&nowis=<?php echo date("YmdHis");  ?>&cslhVISITOR=<?php echo $identity['SESSIONID']; ?>' + 
					'&page=' + escape(locationvar) + 					
					'&referer=' + escape(var_referrer) + 					
					'&title=' + escape(var_title) + 
<?php if($UNTRUSTED['what'] =="hidden"){ echo "'&hide=Y + "; } ?>
					'&leaveamessage=' + '<?php echo $leaveamessage; ?>' + 			 
					'<?php echo $querystringadd; ?>';
					
  var urltocslhimage_<?php echo $department; ?> = WEBPATH + 'image.php?what=getcredit&department=<?php echo  intval($UNTRUSTED['department']); ?>&nowis=<?php echo date("YmdHis");  ?>&cslhVISITOR=<?php echo  $identity['SESSIONID']; ?>' + 
					'&xy=' + '<?php echo substr($xy, 0, 1);?>' + 
					'&page=' + escape(locationvar) + 
					'&referer=' + escape(var_referrer) +					
					'&title=' + escape(var_title) + 
<?php if($UNTRUSTED['what'] =="hidden"){ echo "'&hide=Y + "; } ?>
					'&leaveamessage=' + '<?php echo $leaveamessage; ?>' + 							
					'<?php echo $querystringadd; ?>';
					
					
 
<?php

 if(empty($UNTRUSTED['dynamic'])){   	
   
   if(!(empty($UNTRUSTED['eo']))){
   ?>						 
    document.write('<a name="chatRef" href="<?php echo $urlreplace; ?>" <?php echo $target; ?> onclick="javascript:csTimeout_<?php echo $department; ?>=0;"><img name="csIcon" src="' + urltohelpimage_<?php echo $department; ?> + '" alt="Live Help" border="0"></a>');
  <?php } else { ?>  
  	<?php if($usetable=="Y"){ ?>
    document.write('<table border="0" cellspacing="0" cellpadding="0"><tr><td align="center" valign="top">');
   <?php } ?>
    document.write('<a name="chatRef" href="<?php echo $urlreplace; ?>" <?php echo $target; ?> onclick="javascript:csTimeout_<?php echo $department; ?>=0;"><img name="csIcon" src="' + urltohelpimage_<?php echo $department; ?> + '" alt="Live Help" border="0"></a>');
  	<?php if($usetable=="Y"){ ?>
    document.write('</td></tr><tr><td align="center" valign="top">');
   <?php } ?>
   
    document.write('<'+'a hr'+'ef="ht'+'tp://w'+'ww.c'+'raft'+'ysynt'+'ax.com?ut'+'m_'+'so'+'ur'+'ce'+'=po'+'we'+'re'+'db'+'y&'+'ut'+'m_'+'cam'+'pa'+'ig'+'n=p'+'ow'+'er'+'ed'+'by" nam" alt="Craf'+'ty Syn'+'tax Li'+'ve He'+'lp" ta'+'rget="_bl'+'ank"><img src='+ urltocslhimage_<?php echo $department; ?> +' border=0 STYLE="margin-top:4px;"></a>');
  
   <?php if($usetable=="Y"){ ?>    
    document.write('</td></tr></table>');
   <?php } ?>    
  <?php } ?>

<?php } ?>

// macs do not see images in cache:
if (ismac > -1) {
	randu=Math.round(Math.random()*9999);
  document.write('<div id="imagesfordumbmac_<?php echo $department; ?>" style="position:absolute; display:none; visibility:hidden;">');
  document.write('<img id="imageformac_<?php echo $department; ?>" name="imageformac_<?php echo $department; ?>" src="' + WEBPATH + 'images/blank.gif" border="0"><img id="imageformac_<?php echo $department; ?>_one" name="imageformac_<?php echo $department; ?>_one" src="' + WEBPATH + 'images/blank.gif" border="0"><img id="imageformac_<?php echo $department; ?>_ten" name="imageformac_<?php echo $department; ?>_ten" src="' + WEBPATH + 'images/blank.gif" border="0"><img id="imageformac_<?php echo $department; ?>_hun" name="imageformac_<?php echo $department; ?>_hun" src="' + WEBPATH + 'images/blank.gif" border="0">');
  document.write('</div>');
}

// Layer invite DIV:
	randu=Math.round(Math.random()*777);
  document.write('<div id="layerinvite_<?php echo $department; ?>" style="position:absolute; z-index:99992; visibility:hidden; display:none; top:-400px; left:-400px; width:400px; height:400px;"></div>');


<?php 
 

 if($noonehome){ ?>
   setTimeout('csgetimage_<?php echo $department; ?>()', 4000); 	
<?php } else { ?>
   setTimeout('csrepeat_<?php echo $department; ?>()', 8000);
<?php } 

 
?>
 setTimeout('wherecslhisdue_<?php echo $department; ?>()', 2000);   
 