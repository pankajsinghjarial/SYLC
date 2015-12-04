<?php
/**************************************************************************
 * Shows the details of a department as a <TR> row in HTML.
 * 
 * @param  array $row     associative array of values for the department.
 * @param  int   $update  flag for if this is an update or not set to 1 if it is an update
 *
 * @global array  $CSLH_Config array of configuration vars.
 * @global string $bgcolor     current background color.
 * @global array  $UNTRUSTED 
 * @global array  $lang        array of language words. 
 */
function  showdetails($row,$update){
 Global $color_background,$color_alt1,$color_alt2,$CSLH_Config,$bgcolor,$mydatabase,$UNTRUSTED,$lang;
 
if($row['requirename'] == "N"){
 $needname_s_y  = ""; 
 $needname_s_n  = " CHECKED ";  
} else {
 $needname_s_y  = " CHECKED "; 
 $needname_s_n  = "";  	
}

if($row['emailfun'] == "N"){
 $emailfun_s_y  = ""; 
 $emailfun_s_n  = " CHECKED ";  
} else {
 $emailfun_s_y  = " CHECKED "; 
 $emailfun_s_n  = "";  	
}

if($row['dbfun'] == "N"){
 $dbfun_s_y  = ""; 
 $dbfun_s_n  = " CHECKED ";  
} else {
 $dbfun_s_y  = " CHECKED "; 
 $dbfun_s_n  = "";  	
}




if($row['leaveamessage'] == "no"){
$leaveamessage_s_n = " CHECKED ";
$leaveamessage_s_y = "";
} else {
$leaveamessage_s_n = "";
$leaveamessage_s_y = " CHECKED ";	
}

if($row['smiles'] == "Y"){
$smiles_n = " ";	
$smiles_y = " CHECKED ";	
} else {
$smiles_n = " CHECKED ";	
$smiles_y = " ";	
}

$credit_w = "";
$credit_l = "";
$credit_n = "";
$credit_z = "";
$credit_y = "";

if(($row['creditline'] == "W") || ($row['creditline'] == "") ){ $credit_w = " CHECKED "; } 
if($row['creditline'] == "L"){ $credit_l = " CHECKED "; }
if($row['creditline'] == "N"){ $credit_n = " CHECKED "; }
if($row['creditline'] == "Z"){ $credit_z = " CHECKED "; }
if($row['creditline'] == "Y"){ $credit_y = " CHECKED "; }
 
?>
  <tr><td colspan=3>
    <SCRIPT type="text/javascript">
  		
  	function refreshit(){
  			changedepartment.edit.value=<?php echo $UNTRUSTED['edit']?>;
  			changedepartment.setdefault.value='Y';
  		changedepartment.submit()
  	
  	}
  		</SCRIPT>
  <FORM ACTION=departments.php name=changedepartment METHOD=POST>
  	<input type=hidden name=edit value="">
  	<input type=hidden name=setdefault value="N">
   <?php if(!(empty($UNTRUSTED['website']))){ print "<input type=hidden name=website value=".$UNTRUSTED['website'].">"; } ?>
 
 <?php if($update ==1){ ?>
   <input type=hidden name=updateit value=<?php echo $UNTRUSTED['edit']?>>
 <?php } else { ?>
   <h2><?php echo $lang['txt42']; ?></h2>
   <input type=hidden name=createit value=yes>
   <input type=hidden name=templatedep value=<?php echo $row['recno']; ?>>
 <?php } ?>



 
	
<SCRIPT type="text/javascript">

 
function changemidbackground(what){
	document.changedepartment.midbackgroundexample.src= what;
	document.changedepartment.midbackground.value= what;
 
}

function changebotbackground(what){
	document.changedepartment.botbackgroundexample.src= what;
	document.changedepartment.botbackground.value= what;
 
}

function topgraphic(what){
	if(what == 1){
		document.changedepartment.topframeheight.value=35;		
		document.changedepartment.topbackexample.src='header_images/linedback.gif';
		document.changedepartment.topbackground.value='header_images/linedback.gif';
	}
	if(what == 2){
			document.changedepartment.topframeheight.value=40;		
		document.changedepartment.topbackexample.src='header_images/grayback.gif';
		document.changedepartment.topbackground.value='header_images/grayback.gif';	
	}
	if(what == 3){
		document.changedepartment.topframeheight.value=60;		
		document.changedepartment.topbackexample.src='header_images/eyestop.gif';
		document.changedepartment.topbackground.value='header_images/eyestop.gif';
	}	
	if(what == 4){
		document.changedepartment.topframeheight.value=70;		
		document.changedepartment.topbackexample.src='header_images/companyname.gif';
		document.changedepartment.topbackground.value='header_images/companyname.gif';
	}			
	if(what == 5){
		document.changedepartment.topframeheight.value=70;		
		document.changedepartment.topbackexample.src='header_images/topclouds.gif';
		document.changedepartment.topbackground.value='header_images/topclouds.gif';
	}			
	if(what == 6){ 
		document.changedepartment.topframeheight.value=75;		
		document.changedepartment.topbackexample.src='header_images/customersupport.png';
		document.changedepartment.topbackground.value='header_images/customersupport.png';
	}		
		
}
 
</SCRIPT>  


<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b>Language:</b></td></tr></table>
 <table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 </td></tr></table>
 <b>Language:</b><select name=dep_speaklanguage>
 <option value="">Default</option>
<?php
// get list of installed langages..
$dir = "lang/";
$handle=opendir($dir);
	while($file=readdir($handle)){
	if (preg_match("/lang/",$file))
		{
		if ( (is_file("$dir/$file") && ($file!="lang-.php")))
			{
			$language = str_replace("lang-","",$file);
			$language = str_replace(".php","",$language);
			?><option value=<?php echo $language; ?> <?php if ($row['speaklanguage'] == $language){ print " SELECTED "; } ?> ><?php echo $language; ?> </option><?php
			}
		}
	}
?>
</select>
 <br><br> 

 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b><?php echo $lang['txt43']; ?></b></td></tr></table>
 <table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 <?php echo $lang['txt44']; ?>
 </td></tr></table>
 <b><?php echo $lang['txt44']; ?></b><input type=text size=55 name=nameof value="<?php echo $row['nameof']; ?>">
 <br><br> 
 
 
 
 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b><?php echo $lang['txt164']; ?>:</b>
 </td></tr></table>
 <table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt165']; ?>
 <br>
 <ul>
 <li><a href=javascript:topgraphic(1)>Original </a>  
 <li><a href=javascript:topgraphic(2)>Gray </a>  
 <li><a href=javascript:topgraphic(3)>Blue Eyes </a>  
 <li><a href=javascript:topgraphic(4)>Company Name </a> (Example) 
 <li><a href=javascript:topgraphic(5)>Clouds </a> (Example) 
 <li><a href=javascript:topgraphic(6)>Customer Support </a>  
 </ul>
 <b>Header logo images uploaded into <b>header_images</b><br>
 	   <SCRIPT type="text/javascript">
 	function updatehead(){ 		 		 
 		 document.changedepartment.topbackground.value = document.changedepartment.choosenhead.value;
 		 document.changedepartment.topbackexample.src=document.changedepartment.topbackground.value;
 		 if(document.changedepartment.topbackground.value=='header_images/customersupport.png'){ 
 		 		document.changedepartment.topframeheight.value=75;
 		 }
 		 if(document.changedepartment.topbackground.value=='header_images/topclouds.png'){ 
 		 		document.changedepartment.topframeheight.value=70;
 		 }
 		 if(document.changedepartment.topbackground.value=='header_images/companyname.png'){ 
 		 		document.changedepartment.topframeheight.value=70;
 		 }
 		 if(document.changedepartment.topbackground.value=='header_images/eyestop.png'){ 
 		 		document.changedepartment.topframeheight.value=60;
 		 }
 		 if(document.changedepartment.topbackground.value=='header_images/grayback.png'){ 
 		 		document.changedepartment.topframeheight.value=40;
 		 }
 		 if(document.changedepartment.topbackground.value=='header_images/linedback.png'){ 
 		 		document.changedepartment.topframeheight.value=35;
 		 } 		  		  		  		 
 		 
 	}
 	
 
 	 	
 	</SCRIPT>
  <a href=http://www.craftysyntax.com/templates.php?d=<?php echo $CSLH_Config['directoryid'] ?> target=_blank>DOWNLOAD MORE HEADER IMAGES</a><br>
  
  uploaded images in "<b>header_images/</b>"  ( simply upload more images in the directory to add to this list)<br>
   
  <b>Select an Image:</b> <select name=choosenhead onchange=updatehead()>
  	<option value=<?php echo $row['topbackground']; ?>><?php echo $row['topbackground']; ?></option>
<?php
 // get list of installed langages..
$dir = "header_images/";
$handle=opendir($dir);
$k=0;
	while($file=readdir($handle)){ 
		if (is_file("$dir/$file") )
			{
				$k++;
			?><option value="<?php print "header_images/". $file; ?>" ><?php echo $file; ?></option><?php
       }		
	}
?>
</select>
 
 </td></tr></table> 
 <SCRIPT type="text/javascript">
 
 function	changebackcolor(id){
   	msgWindow = open('colorchange.php?id='+id,'colorimages','width=500,height=300,toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars=yes','POPUP');
	if (msgWindow.opener == null){
		msgWindow.opener = self;
	}
	if (msgWindow.opener.myform == null){
        msgWindow.opener.myform = document.sendform;
	}
	msgWindow.focus();

 }
 
 </SCRIPT>
 <table><tr><td>
 <img src=<?php echo $row['topbackground']; ?> name=topbackexample>
</td>
<td>
 	<DIV id=topbackcolorexample class=topbackcolorexample style="width:100px; height:100px; background:<?php echo $row['topbackcolor']; ?>;"><br><br></DIV>
</td>
</tr></table>
 <br>
 <b>Top background Color:</b> <input type=text size=8 name=topbackcolor value="<?php echo $row['topbackcolor']; ?>">[<a href=javascript:changebackcolor(1)>change</a>]<br>
 <b>Top background Image:</b> <?php echo $CSLH_Config['webpath']; ?><input type=text size=55 name=topbackground value="<?php echo $row['topbackground']; ?>">
 <br><br> 
 (<font color=#990000>NOTE: after changing the top header image BE SURE TO CHANGE the "Height of top frame:" value to the
height of the header image selected or your header image may become cut off. </font>)
 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b><?php echo $lang['txt162']; ?>:</b>
 </td></tr></table>
 <table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 <?php echo $lang['txt163']; ?>:
 </td></tr></table> 
 <?php echo $lang['txt162']; ?>:
   <select name=topframeheight>
   <?php
   for($i=30;$i<155;$i=$i+1){
     print "<option value=$i";
     if($i==$row['topframeheight'])
       print " SELECTED ";
     print ">$i</option>";	
   }
   ?>
   </select>
 <br><br>
 
 
 
 

 
 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Department Theme:</b>
</td></tr></table>

<table width=100% bgcolor=<?php echo $color_background;?>><tr><td valign=top>
The theme used for the department:
</td></tr></table>
<table><tr><td width=150 valign=top>
<b>Theme:</b>:
<select name=new_theme onchange="refreshit()">
 
<?php
// get list of installed themes
$dir = "themes/";
$handle=opendir($dir);
	while($file=readdir($handle)){
		if ( (is_dir("$dir/$file") && ($file!="." && $file!="..") ))
			{
			$theme_name =  $file; 
			?><option value=<?php echo $theme_name; ?> <?php if ($row['theme'] == $theme_name){ print " SELECTED "; } ?> ><?php echo $theme_name; ?> </option><?php
			}
	}
?>
</select>

</td><td><b>Theme Color Options:</b><br>
<?php 
  include "themes/".$row['theme']."/theme-options.php";
  
  // chatbox background:
  
  if(!(empty($midbackcolor_value))){
  	if(empty($row['midbackcolor'])){ $row['midbackcolor'] = $midbackcolor_value; }
        print "<b>middle chat box color and background:</b><br>\n\n";
 
        print "<table><tr><td><DIV id=midbackgroundexampleDIV class=midbackgroundexampleDIV style=\"width:200px; height:100px;\" > <img src=".$row['midbackground']." width=200 height=100 name=midbackgroundexample></DIV><br>\n\n";   
        print "</td><td><DIV id=examplemidbackcolor class=examplemidbackcolor style=\"width:200px; height:100px; background:".$row['midbackcolor'].";\"><pre>\n\n\n\n\n\n\n\n</pre></DIV></td></tr></table> \n\n";
        print "<b>background color:<input type=text name=midbackcolor size=8 value=\"".$row['midbackcolor']."\">[<a href=javascript:changebackcolor(4) onclick=changemidbackground('images/blank.gif');>change</a>]<br>\n\n";   
       for($i=0;$i<count($midbackground_types);$i++){
         print "<a href=javascript:changemidbackground('".$midbackground_types[$i]."');>".$midbackground_types[$i]."</a><br>";
       }  
       print "<b>Background Image:</b><input type=text value=".$row['midbackground']." size=40 name=midbackground>";
      
  }
  print "<br><a href=javascript:<br>";
  // Page background:
 
   if(!(empty($botbackcolor_value))){
  	if(empty($row['botbackcolor'])){ $row['botbackcolor'] = $botbackcolor_value; }
        print "<b>Window box color and background:</b><br>";
 
        print "<table><tr><td><DIV id=botbackgroundexampleDIV class=botbackgroundexampleDIV style=\"width:200px; height:100px;\" > <img src=".$row['botbackground']." width=200 height=100 name=botbackgroundexample></DIV></td>\n\n";
        print "<td><DIV id=examplebotbackcolor class=examplebotbackcolor style=\"width:200px; height:100px; background:".$row['botbackcolor'].";\"><img src=images/blank.gif width=200 height=100 border=0></DIV></td></tr></table><br>\n\n"; 
        print "<b>background color:<input type=text name=botbackcolor size=8 value=\"".$row['botbackcolor']."\">[<a href=javascript:changebackcolor(6) onclick=changebotbackground('images/blank.gif');>change</a>]<br>\n\n";    
       for($i=0;$i<count($botbackground_types);$i++){
         print "<a href=javascript:changebotbackground('".$botbackground_types[$i]."');>".$botbackground_types[$i]."</a><br>";
       }  
       print "<b>Background Image:</b><input type=text value=".$row['botbackground']." size=40 name=botbackground>";
      
  }
         
 ?>
 


</td></tr></table> 
 
 
 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b><?php echo $lang['txt45']; ?></b>
 </td></tr></table>
 <?php echo $lang['txt46']; ?>
 <?php
 $query = "SELECT * FROM livehelp_modules ";
 $data_tab = $mydatabase->query($query);
 print "<table>";
 print "<tr bgcolor=DDDDDD>";
 print "<td><b>Shown as a tab</b></td>";
 print "<td><b>" . $lang['txt47'] . "</b></td>"; 
 print "<td width=250><b>" . $lang['title'] . "</b></td>";  
 print "<td><b>" . $lang['txt48'] . "</b></td>";   
 print "</tr>";
 while($row_tab = $data_tab->fetchRow(DB_FETCHMODE_ASSOC)){
  if($bgcolor=="$color_alt2"){ $bgcolor="$color_alt1"; } else { $bgcolor="$color_alt2"; }
  $sql = "SELECT * FROM livehelp_modules_dep WHERE departmentid=". intval($UNTRUSTED['edit'])." and modid=" . intval($row_tab['id']);
  $tmp = $mydatabase->query($sql);
  if( ($UNTRUSTED['edit'] == "") && ( ($row_tab['id']==1) || ($row_tab['id']==2) )){
   $sql = "SELECT * FROM livehelp_modules_dep";
   $tmp = $mydatabase->query($sql); 
  }
  $row2 = $tmp->fetchRow(DB_FETCHMODE_ASSOC);
  if(($row2['isactive'] == "Y") ) { $isselected = " CHECKED "; } else { $isselected = "  "; }
  if($row2['defaultset'] == "Y"){ $isdefault = " CHECKED "; } else { $isdefault = " "; }
  if($UNTRUSTED['edit'] == ""){
  	 if($row_tab['id']==2)
       $isdefault = " CHECKED ";
     else
      $isdefault = " ";
      $row2['ordernum'] = $row_tab['id'];
  }
  print "<tr>";
  print "<td><input type=checkbox name=modules_" . $row_tab['id'] . " value=Y $isselected></td>";
  print "<td><input type=text size=3 name=modules_ord_" . $row_tab['id'] . " value=\"" . $row2['ordernum'] . "\"> </td>";
  print "<td bgcolor=$bgcolor><b>" . $row_tab['name'] . "</b></td>";  
  print "<td align=center><input type=checkbox name=modules_def_". $row_tab['id'] . " value=Y $isdefault></td>";
  print " </tr>\n";
 }
 print "</table><br>";
 
 print $lang['txt103'] . ": ";
 print "<select name=timeout>";
 print "<option value=30 ";
   if ($row['timeout'] == 30) print " SELECTED ";
   print "> 1 minute </option>\n"; 
   print "<option value=60 ";
   if ($row['timeout'] == 60) print " SELECTED ";
   print "> 2 minutes </option>\n";
   print "<option value=150 ";
   if ($row['timeout'] == 150) print " SELECTED ";
   print "> 5 minutes </option>\n";
   print "<option value=300 ";
   if ($row['timeout'] == 300) print " SELECTED ";
   print "> 10 minutes </option>\n";
   print "<option value=450 ";
   if ($row['timeout'] == 450) print " SELECTED ";
   print "> 15 minutes </option>\n";
   print "<option value=600 ";
   if ($row['timeout'] == 600) print " SELECTED ";
   print "> 20 minutes </option>\n";
   print "<option value=750 ";
   if ($row['timeout'] == 750) print " SELECTED ";
   print "> 25 minutes </option>\n";  
              
 print "</select><br><input type=submit value=\"". $lang['UPDATE'] . "\"><br>";
 $fieldid = 0;
 ?>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt54']; ?></b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['askname']; ?></b>
</td></tr></table>
<br>
<b><?php echo $lang['txt54']; ?></b><?php echo $lang['YES']; ?> <input type=radio name=requirename value=Y  <?php echo $needname_s_y; ?>  > <?php echo $lang['NO']; ?> <input type=radio name=requirename value=N <?php echo $needname_s_n; ?> ><br>


 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b><?php echo $lang['txt106']; ?></b>
 </td></tr></table>
 <table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 <?php echo $lang['txt107']; ?>
 </td></tr></table>
 <table border=1>
 <tr bgcolor=DDDDDD>
   <td><b><?php echo $lang['txt47']; ?></td>
   <td><b><?php echo $lang['isrequired']; ?></b></td>
   <td><b>Type</b></td>
   <td><b><?php echo $lang['title']; ?></b></td>
   <td><b><?php echo $lang['options']; ?></b></td>
 </tr>
 <?php
  $query = "SELECT * FROM livehelp_questions WHERE module='livehelp' AND  department='".$row['recno']."' ORDER by ordering ";
  $data_questions = $mydatabase->query($query);
  while($row_questions = $data_questions->fetchRow(DB_FETCHMODE_ASSOC)){  
 ?>
  <tr>
   <td><input name=questions_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_ordering type=text size=3 value="<?php echo $row_questions['ordering']; ?>"></td>
   <td align=center><input name=questions_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_required type=checkbox  value="Y" <?php if ($row_questions['required'] == "Y") echo ' CHECKED '; ?>></td>

   <td>
   <?php if ($row_questions['fieldtype'] != "username"){ ?>
   <select name=questions_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_fieldtype>
       <option value=<?php echo $row_questions['fieldtype']; ?>><?php echo $row_questions['fieldtype']; ?></option>
       <option value=<?php echo $row_questions['fieldtype']; ?>>--------</option>
       <option value=textfield>Text Field</option>
       <option value=textarea>Text Area</option>
       <option value=dropmenu>Dropmenu</option>
       <option value=radio>Radio Buttons</option>                     
       <option value=email>E-mail</option>   
       <option value=checkboxes>Checkboxes</option>
   </select>
   <?php } else { ?>
     <input type=hidden name=questions_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_fieldtype value=username><b>Username</b>
   <?php } ?>
   </td>
   <td><textarea cols=23 rows=4 name=questions_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_headertext><?php echo htmlspecialchars($row_questions['headertext']); ?></textarea></td>
   <td><textarea cols=23 rows=4 name=questions_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_options><?php echo htmlspecialchars($row_questions['options']); ?></textarea></td>
   <td>  
   <?php if ( ($update==1) && ($row_questions['fieldtype'] != "username") ){ ?>   
   <a href=departments.php?edit=<?php echo $row['recno']; ?>&removeq=<?php echo $row_questions['id']; ?>  onClick="return confirm('<?php echo $lang['areyousure']; ?>')"><font color=990000>Delete</font>   
   <?php } ?>
   </td>
 </tr>
<?php } ?>
 <tr bgcolor=DDDDDD><td colspan=5>New Question:</td></tr>
  <tr>
   <td><input name=questions_<?php echo $row['recno']; ?>_-1_ordering type=text size=3 value="1"></td>
   <td align=center><input name=questions_<?php echo $row['recno']; ?>_-1_required type=checkbox value="Y" ></td>

   <td><select name=questions_<?php echo $row['recno']; ?>_-1_fieldtype>
       <option value=textfield>Text Field</option>
       <option value=textarea>Text Area</option>
       <option value=dropmenu>Dropmenu</option>
       <option value=radio>Radio Buttons</option>                     
       <option value=email>email</option>       
       <option value=checkboxes>Checkboxes</option>
        </select></td>
   <td><textarea cols=23 rows=4 name=questions_<?php echo $row['recno']; ?>_-1_headertext></textarea></td>
   <td><textarea cols=23 rows=4 name=questions_<?php echo $row['recno']; ?>_-1_options></textarea></td>
   <td>&nbsp;</td>
 </tr> 
 </table>
 <br><input type=submit value="<?php echo $lang['UPDATE']; ?>"><br>
 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b><?php echo $lang['txt49']; ?></b>
 </td></tr></table>
 <table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 <?php echo $lang['online_image']; ?><br>
    <SCRIPT type="text/javascript">
 	function updateonline(){ 		 		 
 		 document.changedepartment.onlineimage.value = document.changedepartment.chooseenonline.value;
 		 document.changedepartment.onlineimageis.src=document.changedepartment.onlineimage.value;
 	}
 	</SCRIPT>
  <a href=http://www.craftysyntax.com/onoff.php?d=<?php echo $CSLH_Config['directoryid'] ?> target=_blank>DOWNLOAD MORE ONLINE OFFLINE IMAGES</a><br>
   uploaded images in "<b>onoff_images/</b>"to choose from: (simply upload more images in the directory with <i>online</i> in the file name to add to this list)<br>
   
   <select name=chooseenonline onchange=updateonline()>
  	<option value=<?php echo $row['onlineimage']; ?>><?php echo $row['onlineimage']; ?></option>
<?php
 // get list of installed langages..
$dir = "onoff_images/";
$handle=opendir($dir);
$k=0;
	while($file=readdir($handle)){
	if (preg_match("/online/i", $file))  
		{
		if (is_file("$dir/$file") )
			{
				$k++;
			?><option value="<?php print "onoff_images/". $file; ?>" ><?php echo $file; ?></option><?php
       }
		}
	}
?>
</select>
 	</td></tr></table>
 <img src=<?php echo $CSLH_Config['webpath']; ?><?php echo $row['onlineimage']; ?> name=onlineimageis><br>
 <b>http/s:</b> <?php echo $CSLH_Config['webpath']; ?><input type=text size=55 name=onlineimage value="<?php echo $row['onlineimage']; ?>"><br>
 <br>

 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b><?php echo $lang['txt50']; ?></b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['offline_image']; ?><br>
    <SCRIPT type="text/javascript">
 	function updateoffline(){ 		 		 
 		 document.changedepartment.offlineimage.value = document.changedepartment.chooseenffnline.value;
 		 document.changedepartment.offlineimageis.src=document.changedepartment.offlineimage.value;
 	}
 	</SCRIPT>
  <a href=http://www.craftysyntax.com/onoff.php?d=<?php echo $CSLH_Config['directoryid'] ?> target=_blank>DOWNLOAD MORE ONLINE OFFLINE IMAGES</a><br>
  uploaded images in "<b>onoff_images/</b>"to choose from: (simply upload more images in the directory with <i>offline</i> in the file name to add to this list)<br>
   
   <select name=chooseenffnline onchange=updateoffline()>
  	<option value=<?php echo $row['offlineimage']; ?>><?php echo $row['offlineimage']; ?></option>
<?php
 // get list of installed langages..
$dir = "onoff_images/";
$handle=opendir($dir);
$k=0;
	while($file=readdir($handle)){
	if (preg_match("/offline/i", $file))  
		{
		if (is_file("$dir/$file") )
			{
				$k++;
			?><option value="<?php print "onoff_images/". $file; ?>" ><?php echo $file; ?></option><?php
       }
		}
	}
?>
</select>
 </td></tr></table>
<img src=<?php echo $row['offlineimage']; ?> name=offlineimageis ><br>
 <b>http/s:</b> <?php echo $CSLH_Config['webpath']; ?><input type=text size=45 name=offlineimage value="<?php echo $row['offlineimage']; ?>"><br><br>
<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt55']; ?></b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['hide_icon']; ?></b>
</td></tr></table>

<b><?php echo $lang['txt55']; ?></b> <?php echo $lang['NO']; ?> <input type=radio name=leaveamessage value=YES  <?php echo $leaveamessage_s_y; ?>  > <?php echo $lang['YES']; ?> <input type=radio name=leaveamessage value=no   <?php echo $leaveamessage_s_n; ?> >

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt57']; ?></b>
</td></tr></table>

<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt58']; ?>
</td></tr></table>
<textarea name=whilewait rows=7 cols=40><?php echo htmlspecialchars($row['whilewait']); ?></textarea><br>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt59']; ?></b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['opening_message']; ?></b>
</td></tr></table>
<?php echo $lang['txt60']; ?><br>
<textarea name=opening rows=7 cols=40><?php echo htmlspecialchars($row['opening']); ?></textarea><br>


<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['busymess']; ?></b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt171']; ?> </b>
</td></tr></table>
<?php echo $lang['busymess']; ?><br>
<SCRIPT type="text/javascript">
	function changebus(num){
		 if (num ==1){
		   document.changedepartment.busymess.value='LEAVEMESSAGE';
		 	}
		 
		 if(num ==2){
		   document.changedepartment.busymess.value='<blockquote>Sorry all operators are currently helping other clients and are unable to provide Live support at this time.<br>Would you like to continue to wait for an operator or leave a message?<br><table width=450><tr><td><a href=livehelp.php?page=livehelp.php&department=[department]&tab=1 target=_top><font size=+1>Continue to wait</font></a></td><td align=center><b>or</b></td><td><a href=leavemessage.php?department=[department]><font size=+1>Leave A Message</a></td></tr></table><blockquote>';
		 }
	}
	</SCRIPT>
<br> If you wish to by-pass the busy message and go directly to leave a message option
	set this to "<b>LEAVEMESSAGE</b>"  
	or <a href="javascript:changebus(1)">Click here</a><br>
  If you wish to give the visitor an option to either wait longer
  or leave a message <a href="javascript:changebus(2);">Click here</a><br>
<br>
<textarea name=busymess rows=7 cols=40><?php echo htmlspecialchars($row['busymess']); ?></textarea><br>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt61']; ?></b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['offline_mess']; ?> </b>
</td></tr></table>
<?php echo $lang['txt61']; ?><br>
<textarea name=offline rows=7 cols=40><?php echo htmlspecialchars($row['offline']); ?></textarea><br>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b><?php echo $lang['txt141']; ?></b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['txt142']; ?>
</td></tr></table>
<textarea name=leavetxt rows=7 cols=40><?php echo htmlspecialchars($row['leavetxt']); ?></textarea><br>

<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Leave a message E-mail Options:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
	Some servers disable "mail" function in php for "security" issues .. 
	if so you can opt to no have the option to use mail in this department.
	You can also opt to record messages in the database or not. 
</td></tr></table>

<b>Enable e-mail functions</b> <?php echo $lang['NO']; ?> <input type=radio name=emailfun value=N  <?php echo $emailfun_s_n; ?>  > <?php echo $lang['YES']; ?> <input type=radio name=emailfun value=Y   <?php echo $emailfun_s_y; ?> >
<b>Enable Database recording functions</b> <?php echo $lang['NO']; ?> <input type=radio name=dbfun value=N  <?php echo $dbfun_s_n; ?>  > <?php echo $lang['YES']; ?> <input type=radio name=dbfun value=Y  <?php echo $dbfun_s_y; ?> >


<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['emailtxt']; ?></b>
</td></tr></table>
<b><?php echo $lang['email']; ?></b><input type=text size=25 name=messageemail value="<?php echo $row['messageemail']; ?>"><br>


 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b><?php echo $lang['txt111']; ?></b>
 </td></tr></table>
 <table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
 <?php echo $lang['txt112']; ?>
 </td></tr></table>
 <table border=1>
 <tr bgcolor=DDDDDD>
   <td><b><?php echo $lang['txt47']; ?></td>
   <td><b><?php echo $lang['isrequired']; ?></b></td>
   <td><b>Type</b></td>
   <td><b><?php echo $lang['title']; ?></b></td>
   <td><b><?php echo $lang['options']; ?></b></td>  
 </tr>
 <?php
  $query = "SELECT * FROM livehelp_questions WHERE module='leavemessage' AND  department='".$row['recno']."' ORDER by ordering ";
  $data_questions = $mydatabase->query($query);
  while($row_questions = $data_questions->fetchRow(DB_FETCHMODE_ASSOC)){  
 ?>
  <tr>
   <td><input name=leavemessage_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_ordering type=text size=3 value="<?php echo $row_questions['ordering']; ?>"></td>
   <td align=center><input name=leavemessage_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_required type=checkbox  value="Y" <?php if ($row_questions['required'] == "Y") echo ' CHECKED '; ?>></td>

   <td>
   <?php if ($row_questions['fieldtype'] != "username"){ ?>
   <select name=leavemessage_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_fieldtype>
       <option value=<?php echo $row_questions['fieldtype']; ?>><?php echo $row_questions['fieldtype']; ?></option>
       <option value=<?php echo $row_questions['fieldtype']; ?>>--------</option>
       <option value=textfield>Text Field</option>
       <option value=textarea>Text Area</option>
       <option value=dropmenu>Dropmenu</option>
       <option value=radio>Radio Buttons</option>                     
       <option value=email>E-mail</option>   
       <option value=checkboxes>Checkboxes</option>    
       <option value=subject_textfield>Subject Line: Text Field</option>
       <option value=subject_dropmenu>Subject Line: Dropmenu</option>    
   </select>
   <?php } else { ?>
     <input type=hidden name=leavemessage_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_fieldtype value=username><b>Username</b>
   <?php } ?>
   </td>
   <td><textarea cols=23 rows=4 name=leavemessage_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_headertext><?php echo htmlspecialchars($row_questions['headertext']); ?></textarea></td>
   <td><textarea cols=23 rows=4 name=leavemessage_<?php echo $row['recno']; ?>_<?php echo $row_questions['id']; ?>_options><?php echo htmlspecialchars($row_questions['options']); ?></textarea></td>
   <td>  
   <?php if ( ($update==1) && ($row_questions['fieldtype'] != "username") ){ ?>   
   <a href=departments.php?edit=<?php echo $row['recno']; ?>&removecq=<?php echo $row_questions['id']; ?>  onClick="return confirm('<?php echo $lang['areyousure']; ?>')"><font color=990000>Delete</font>   
   <?php } ?>
   </td>
 </tr>
<?php } ?>
 <tr bgcolor=DDDDDD><td colspan=5>New Question:</td></tr>
  <tr>
   <td><input name=leavemessage_<?php echo $row['recno']; ?>_-1_ordering type=text size=3 value="1"></td>
   <td align=center><input name=leavemessage_<?php echo $row['recno']; ?>_-1_required type=checkbox  value="Y"></td>

   <td><select name=leavemessage_<?php echo $row['recno']; ?>_-1_fieldtype>
       <option value=textfield>Text Field</option>
       <option value=textarea>Text Area</option>
       <option value=dropmenu>Dropmenu</option>
       <option value=radio>Radio Buttons</option>                     
       <option value=email>email</option>       
       <option value=checkboxes>Checkboxes</option> 
       <option value=subject_textfield>Subject Line: Text Field</option>
       <option value=subject_dropmenu>Subject Line: Dropmenu</option>      
        </select></td>
   <td><textarea cols=23 rows=4 name=leavemessage_<?php echo $row['recno']; ?>_-1_headertext></textarea></td>
   <td><textarea cols=23 rows=4 name=leavemessage_<?php echo $row['recno']; ?>_-1_options></textarea></td>
   <td>&nbsp;</td>
 </tr> 
 </table>
 <br><input type=submit value="<?php echo $lang['UPDATE']; ?>"><br>
  <br><br>
  
 <table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
 <b>Chat Features/ Extras:</b>
 </td></tr></table>
   
 <b>Allow smilies <img src=chat_smiles/icon_smile.gif> ? </b> <?php echo $lang['YES']; ?> <input type=radio name=smiles value=Y  <?php echo $smiles_y; ?>  > <?php echo $lang['NO']; ?> <input type=radio name=smiles value=N   <?php echo $smiles_n; ?> >
 <br><br> 
 
 
 

 
<table width=100% bgcolor=<?php echo $color_alt1;?>><tr><td>
<b>Credit:</b>
</td></tr></table>
<table width=100% bgcolor=<?php echo $color_background;?>><tr><td>
<?php echo $lang['credit']; ?> </b>
</td></tr></table>
<b>Credit:</b><br>
<input type=radio name=creditline value=L  <?php echo $credit_l ?>  > <img src=images/livehelp.gif><br>
<input type=radio name=creditline value=W  <?php echo $credit_w ?>  > <img src=images/livehelp2.gif><br>
<input type=radio name=creditline value=Y  <?php echo $credit_y ?>  > <img src=images/livehelp4.gif><br>
<input type=radio name=creditline value=Z  <?php echo $credit_z ?>  > <img src=images/livehelp5.gif><br>

<input type=radio name=creditline value=L  <?php echo $credit_n ?>  onclick=showbuy()> <b>(none)</b> (REQUIRES CRAFTY SYNTAX UN-BRANDED NO-Backlinks)<img src=images/blank.gif><br>
<SCRIPT type="text/javascript" SRC="javascript/hideshow.js"></SCRIPT>
<SCRIPT type="text/javascript">
function showbuy(){
	makeVisible ('buyunbranded');
}
 
</SCRIPT>
<div id="buyunbranded" STYLE="display:none">
	<table border=1 STYLE="border-style: dashed">
<tr><td> 
	 <blockquote>
 
Client Site Unbranding Server Lifetime-License:<br>
<br>
    For one Crafty Syntax Live Help Server installation (all operators)<br>
    All future updates of this option are included<br>
    Can be used with any (future) version of Crafty Syntax Live Help<br>
<br>
Key Features:  
    Remove (or change) the Crafty Syntax Live Help Backlink from the customer side chat window<br>
    Remove the Crafty Syntax Live Help Backlink from all emails sent by Crafty Syntax Live Help<br>
    Remove the Crafty Syntax Live Help Backlink from all Overlay boxes<br>
    Removes the Crafty Syntax Live Help "Donation" page that opens up every 10th login.<br>
<a href=http://www.craftysyntax.com/unbranded.php target=_blank><font size=+1>CLICK HERE TO ORDER NOW !! </font></a>	 	
	 	
	 	
	 	
	</blockquote>
</td></tr></table>
	
</div>
<?php if($update ==1){ ?>
<input type=submit value="<?php echo $lang['UPDATE']; ?>">
<?php } else { ?>
<input type=submit value="<?php echo $lang['CREATE']; ?>">
<?php }?>
</form>
</td></tr>
<?php  	
}
?>