  <div class="main_middle">
    <div class="middle">
     <div class="middle_two">
      <div class="middle_two_mid_announces"> <span class="annonces_bold" >Advance Search</span><br/><br/>
<div class="form">
            <?php /*?><script type="text/javascript">
			   function ajaxcall(val,attribute,name,manufac)
			   { 
			   var divname = "#"+name;
				 jQuery.ajax({
					  type: "POST",
					  url: "<?php echo DEFAULT_URL?>/ajax.php",
					  data: { value: val, attr : attribute, manufact : manufac,class : 'customStyleSelectBox'},
					  dataType: "html",
					  success: function(data) {
						jQuery(divname).html("");
						jQuery(divname).append(data);
					  }
				});
			   }
			   
			   
              function formcheck(){
			  	 if(document.getElementById('manufacturer').value == ""){
				   alert("Please Select Make.");
				   return false;
				 }
			   }
           </script><?php */?>
           <script type="text/javascript">
			   function ajaxcall(val,attribute,name,manufac){ 
			  	 var divname = "#"+name;
				  jQuery(divname).html('<p style="position: absolute; top: 10px; left: 30px;"><img width="72" height="15" src="<?php echo DEFAULT_URL?>/images/loading.gif"></p>');
				 jQuery.ajax({
					  type: "POST",
					  url: "<?php echo DEFAULT_URL?>/ajax_new.php",
					  data: { value: val, attr : attribute, manufact : manufac,class : 'customStyleSelectBox'},
					  dataType: "html",
					  success: function(data) {
						jQuery(divname).html("");
						jQuery(divname).append(data);
					  }
				});
			   }
			   
			   
              function formcheck(){
			  	 if(document.getElementById('manufacturer').value == ""){
				   alert("Please Select Make.");
				   return false;
				 }
			   }
           </script>
            <?php /*?><form action="<?php echo DEFAULT_URL?>/search-result" method="post" onsubmit="return formcheck();"><?php */?>
            <form action="<?php echo DEFAULT_URL?>/announces" method="post" onsubmit="return formcheck();">
            <table width="92%" border="0">
                <?php /*?><tr>
                  <td width="17%">Nom:</td>
                  <td width="62%">
                  <div class="input_bg">
                 	<input type="text" name="fullName" id="fullName" style="width:303px;" />
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr><?php */?>
              </table>
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Marque:</td>
                  <td width="62%">
                  <div class="select_bg">
                  <select class="customStyleSelectBox" id="manufacturer" name="manufacturer" onchange="ajaxcall(this.value,'manufacturer','model','')">
                      <option value="" selected="selected">S&eacute;lectionner</option>
                      <option value="Aston+Martin">Aston Martin</option>
                      <option value="Buick">Buick</option>
                      <option value="Cadillac">Cadillac</option>
                      <option value="Chevrolet">Chevrolet</option>
                      <option value="Chrysler">Chrysler</option>
                      <option value="Dodge">Dodge</option>
                      <option value="Excalibur">Excalibur</option>
                      <option value="Ferrari">Ferrari</option>
                      <option value="Ford">Ford</option>
                      <option value="General+Motor+Corp.">General Motor Corp.</option>
                      <option value="GMC">GMC</option>
                      <option value="Hummer">Hummer</option>
                      <option value="Mercedes-Benz">Mercedes-Benz</option>
                      <option value="Morgan">Morgan</option>
                      <option value="Plymouth">Plymouth</option>
                      <option value="Pontiac">Pontiac</option>
                      <option value="Porsche">Porsche</option>
                      <option value="Studebaker">Studebaker</option>
                      <option value="Toyota">Toyota</option>
                      
						<?php /*while($mnafrow = mysql_fetch_object($manf)) { ?>
                        <option value="<?php echo $mnafrow->value_id; ?>"><?php echo $mnafrow->value; ?></option>
                        <?php } */?>
                 </select>
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Mod&eacute;le:</td>
                  <td width="62%">
                  <div class="select_bg" id="model" style="position:relative" >
                     <select class="customStyleSelectBox" name="model">
                       <option value="" selected="selected">S&eacute;lectionne</option>
                     </select>
                    </div>
                  <?php /*?><div class="select_bg" id="model">
                  <select class="customStyleSelectBox" name="model">
                      <option value="" selected="selected">S&eacute;lectionner</option>
                    <?php while($mnafrow = mysql_fetch_object($manf)) { ?>
                    <option value=""><?php echo $mnafrow->value; ?></option>
					<?php } ?>
                 </select>
                  </div><?php */?>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Ann&eacute;e:</td>
                  <td width="62%">
                  <div class="select_bg" id="year" style="position:relative" >
                  <select class="customStyleSelectBox" name="madeYear" onchange="ajaxcall(this.value,'madeYear','model')">
                      <option value="" selected="selected">S&eacute;lectionner</option>
                               </select>
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Prix:</td>
                  <td width="62%">
                    <div class="select_bg">
                      <select id="newPrice" name="price" class="customStyleSelectBox">
                        <option value="">S&eacute;lectionner</option>
                        <option value="0~10">Upto - $10,000</option>
                        <option value="10~20">$10,000 - $20,000</option>
                        <option value="20~30">$20,000 - $30,000</option>
                        <option value="30~40">$30,000 - $40,000</option>
                        <option value="40~50">$40,000 - $50,000</option>
                        <option value="50~100">$50,000 - $100,000</option>
                        <option value="100~10000">$100,000 - Above</option>
                        <?php /*?><option value="1000">$1,000</option>
                        <option value="2000">$2,000</option>
                        <option value="3000">$3,000</option>
                        <option value="4000">$4,000</option>
                        <option value="5000">$5,000</option>
                        <option value="6000">$6,000</option>
                        <option value="7000">$7,000</option>
                        <option value="8000">$8,000</option>
                        <option value="9000">$9,000</option>
                        <option value="10000">$10,000</option>
                        <option value="11000">$11,000</option>
                        <option value="12000">$12,000</option>
                        <option value="13000">$13,000</option>
                        <option value="14000">$14,000</option>
                        <option value="15000">$15,000</option>
                        <option value="16000">$16,000</option>
                        <option value="17000">$17,000</option>
                        <option value="18000">$18,000</option>
                        <option value="19000">$19,000</option>
                        <option value="20000">$20,000</option>
                        <option value="21000">$21,000</option>
                        <option value="22000">$22,000</option>
                        <option value="23000">$23,000</option>
                        <option value="24000">$24,000</option>
                        <option value="25000">$25,000</option>
                        <option value="30000">$30,000</option>
                        <option value="35000">$35,000</option>
                        <option value="40000">$40,000</option>
                        <option value="45000">$45,000</option>
                        <option value="50000">$50,000</option>
                        <option value="55000">$55,000</option>
                        <option value="60000">$60,000</option>
                        <option value="65000">$65,000</option>
                        <option value="70000">$70,000</option>
                        <option value="75000">$75,000</option>
                        <option value="80000">$80,000</option>
                        <option value="85000">$85,000</option>
                        <option value="90000">$90,000</option>
                        <option value="95000">$95,000</option>
                        <option value="100000">$100,000</option><?php */?>
                      </select>
                    </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              
              
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Kilom&eacute;trage:</td>
                  <td width="62%">
                  <div class="select_bg">
                  <select id="newPrice" name="mileage" class="customStyleSelectBox">
                      <option value="">S&eacute;lectionner</option>
                      <option value="0-100">0-100</option>
                      <option value="100-250">100-250</option>
                      <option value="250-500">250-500</option>
                      <option value="500-1000">500-1000</option>
                      <option value="1000"> >1000</option>
                   </select>
                  
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              
              <table width="92%" border="0">
                <tr>
                  <td width="17%">carburant:</td>
                  <td width="62%">
                  <div class="select_bg">
                   <?php $fuel = $search->attributevalue('fuel'); 
				 ?>
                  <select id="newPrice" name="fuel" class="customStyleSelectBox">
			  <option value="">S&eacute;lectionner</option>
          <?php
			
			foreach($fuel as $key=>$fuels)
			{
			?>
             <option value="<?php echo $key ?>"><?php echo $fuels ?></option>
            <?php } ?>
			  </select>
                  
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Cat&eacute;gorie:</td>
                  <td width="62%">
                  <div class="select_bg">
                   <?php $fuel = $search->attributevalue('bodyStyle'); 
				 ?>
                  <select id="newPrice" name="fuel" class="customStyleSelectBox">
			  <option value="">S&eacute;lectionner</option>
          <?php
			
			foreach($fuel as $key=>$fuels)
			{
			?>
             <option value="<?php echo $key ?>"><?php echo $fuels ?></option>
            <?php } ?>
			  </select>
                  
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Couleur Ext&eacute;rieure:</td>
                  <td width="62%">
                  <div class="select_bg">
                   <?php $fuel = $search->attributevalue('extColor'); 
				 ?>
                  <select id="newPrice" name="fuel" class="customStyleSelectBox">
			  <option value="">S&eacute;lectionner</option>
          <?php
			
			foreach($fuel as $key=>$fuels)
			{
			?>
             <option value="<?php echo $key ?>"><?php echo $fuels ?></option>
            <?php } ?>
			  </select>
                  
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Couleur Int&eacute;rieure:</td>
                  <td width="62%">
                  <div class="select_bg">
                   <?php $fuel = $search->attributevalue('interColor'); 
				 ?>
                  <select id="newPrice" name="fuel" class="customStyleSelectBox">
			  <option value="">S&eacute;lectionner</option>
          <?php
			
			foreach($fuel as $key=>$fuels)
			{
			?>
             <option value="<?php echo $key ?>"><?php echo $fuels ?></option>
            <?php } ?>
			  </select>
                  
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Motoprop:</td>
                  <td width="62%">
                  <div class="select_bg">
                   <?php $fuel = $search->attributevalue('drivetrain'); 
				 ?>
                  <select id="newPrice" name="fuel" class="customStyleSelectBox">
			  <option value="">S&eacute;lectionner</option>
          <?php
			
			foreach($fuel as $key=>$fuels)
			{
			?>
             <option value="<?php echo $key ?>"><?php echo $fuels ?></option>
            <?php } ?>
			  </select>
                  
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Portes:</td>
                  <td width="62%">
                  <div class="select_bg">
                   <?php $fuel = $search->attributevalue('doors'); 
				 ?>
                  <select id="newPrice" name="fuel" class="customStyleSelectBox">
			  <option value="">S&eacute;lectionner</option>
          <?php
			
			foreach($fuel as $key=>$fuels)
			{
			?>
             <option value="<?php echo $key ?>"><?php echo $fuels ?></option>
            <?php } ?>
			  </select>
                  
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Empattement:</td>
                  <td width="62%">
                  <div class="select_bg">
                   <?php $fuel = $search->attributevalue('wheelbase'); 
				 ?>
                  <select id="newPrice" name="fuel" class="customStyleSelectBox">
			  <option value="">S&eacute;lectionner</option>
          <?php
			
			foreach($fuel as $key=>$fuels)
			{
			?>
             <option value="<?php echo $key ?>"><?php echo $fuels ?></option>
            <?php } ?>
			  </select>
                  
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Locomotive:</td>
                  <td width="62%">
                  <div class="select_bg">
                   <?php $fuel = $search->attributevalue('engine'); 
				 ?>
                  <select id="newPrice" name="fuel" class="customStyleSelectBox">
			  <option value="">S&eacute;lectionner</option>
          <?php
			
			foreach($fuel as $key=>$fuels)
			{
			?>
             <option value="<?php echo $fuels ?>"><?php echo $fuels ?></option>
            <?php } ?>
			  </select>
                  
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              
                            
              <table width="92%" border="0">
                <tr>
                  <td width="17%"></td>
                  <td width="62%" valign="middle">
                  <input type="hidden" name="submit" value="sub_home" />
                  <input name="" type="image" src="<?php echo DEFAULT_URL ?>/images/recherche_btn.png" />
                  </td>
                  <td width="21%"></td>
                </tr>
              </table>
              
              </form>
              
              
            </div>      
<div class="clear"></div>
</div>
 <?php  include(LIST_ROOT."/includes/views/sidebar.php"); ?>
</div>
 <?php  include(LIST_ROOT."/includes/views/bottom_strip.php"); ?>
</div></div>