  <div class="main_middle">
    <div class="middle">
     <div class="middle_two">
      <div class="middle_two_mid_announces"> <span class="annonces_bold" >Advance Search</span><br/><br/>
<div class="form">
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
			   
			   function changeSel(val){
					(function($){
						if( val != ''){
							 var sel2 = $('.year_a').find('option').remove().end();
							 $('.year_a').removeAttr('disabled');
							 $(sel2).append('<option value="">A</option>');
							 for(var i = 2013 ; i > val; i--){
								$(sel2).append('<option value="'+i+'">'+i+'</option>'); 
							 }
						}
						else{
							$('.year_a').attr('disabled','disabled');
						}	
					})(jQuery);
				}
			   
			   
              function formcheck(){
			  	 if(document.getElementById('manufacturer').value == ""){
				   alert("Please Select Make.");
				   return false;
				 }
			   }
           </script>
            <form action="<?php echo DEFAULT_URL?>/announces" method="post" onsubmit="return formcheck();">
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Marque:</td>
                  <td width="62%">
                  <div class="select_bg">
                  <select class="customStyleSelectBox" id="manufacturer" name="manufacturer" onchange="ajaxcall(this.value,'manufacturer','model','')">
                      <option value="" selected="selected">S&eacute;lectionner</option>
                      <option value="Buick">Buick</option>
                      <option value="Cadillac">Cadillac</option>
                      <option value="Chevrolet">Chevrolet</option>
                      <option value="Chrysler">Chrysler</option>
                      <option value="Dodge">Dodge</option>
                      <option value="Excalibur">Excalibur</option>
                      <option value="Ferrari">Ferrari</option>
                      <option value="Ford">Ford</option>
                      <option value="GMC">GMC</option>
                      <option value="Hummer">Hummer</option>
                      <option value="Mercedes-Benz">Mercedes-Benz</option>
                      <option value="Morgan">Morgan</option>
                      <option value="Plymouth">Plymouth</option>
                      <option value="Pontiac">Pontiac</option>
                      <option value="Porsche">Porsche</option>
                      <option value="Studebaker">Studebaker</option>
                      <option value="Toyota">Toyota</option>
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
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Ann&eacute;e:</td>
                  <td width="62%">
                  <div class="" id="year" style="position:relative" >
                  <select name="madeYear[]" class="combo_box year_de" onchange="changeSel(this.value)">
                    <option value="">De</option>
                            <?php for($i = date("Y",strtotime("+1 years")); $i > 1900; $i--){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }?>
                  </select>
                  <select name="madeYear[]" class="combo_box year_a" disabled="disabled">
                  <option value="">&Agrave;</option>
                          <?php for($i = date("Y",strtotime("+1 years")); $i > 1900; $i--){
							  echo '<option value="'.$i.'">'.$i.'</option>';
						  }?>
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
                      <option value="Less+than+1,000+miles">Moins de 1,000 miles</option>
                      <option value="Less+than+5,000+miles">Moins de 5,000 miles</option>
                      <option value="Less+than+7,500+miles">Moins de 7,500 miles</option>
                      <option value="Less+than+10,000+miles">Moins de 10,000 miles</option>
                      <option value="Less+than+20,000+miles">Moins de 20,000 miles</option>
                      <option value="Less+than+36,000+miles">Moins de 36,000 miles</option>
                      <option value="Less+than+50,000+miles">Moins de 50,000 miles</option>
                      <option value="Less+than+75,000+miles">Moins de 75,000 miles</option>
                      <option value="Less+than+100,000+miles">Moins de 100,000 miles</option>
                      <option value="Less+than+125,000+miles">Moins de 125,000 miles</option>
                      <option value="Less+than+150,000+miles">Moins de 150,000 miles</option>
                      <option value="Less+than+175,000+miles">Moins de 175,000 miles</option>
                      <option value="Less+than+200,000+miles">Moins de 200,000 miles</option>
                      <option value="200,000+miles+and+more">Plus de 200,000 miles </option>
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
                      <option value="Biodiesel">Biodiesel</option>
                      <option value="CNG">CNG</option>
                      <option value="Diesel">Diesel</option>
                      <option value="Electric">Electric</option>
                      <option value="Ethanol+-+FFV">Ethanol - FFV</option>
                      <option value="Gasoline">Gasoline</option>
                      <option value="Hybrid-Electric">Hybrid-Electric</option>
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
                  <select id="newPrice" name="bodyStyle" class="customStyleSelectBox">
                 	 <option value="">S&eacute;lectionner</option>
                     <option value="Convertible">Convertible</option>
                     <option value="Coupe">Coupe</option>
                     <option value="Hatchback">Hatchback</option>
                     <option value="Hearse">Hearse</option>
                     <option value="Limousine">Limousine</option>
                     <option value="Minivan,+Van">Minivan, Van</option>
                     <option value="Sedan">Sedan</option>
                     <option value="Wagon">Wagon</option>
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
                  <select id="newPrice" name="extColor" class="customStyleSelectBox">
                 	 <option value="">S&eacute;lectionner</option>
                     <option value="White">Blanc</option>
                     <option value="Blue">Bleu</option>
                     <option value="Burgundy">Bourgogne</option>
                     <option value="Tan">Bronzer</option>
                     <option value="Brown">Brun</option>
                     <option value="Gray">Gris</option>
                     <option value="Yellow">Jaune</option>
                     <option value="Black">Noir</option>
                     <option value="Gold">Or</option>
                     <option value="Orange">Orange</option>
                     <option value="Purple">Pourpre</option>
                     <option value="Silver">Pi&egrave;ces d'argent</option>
                     <option value="Red">Rouge</option>
                     <option value="Teal">Sarcelle</option>
                     <option value="Green">Vert</option>
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
                  <select id="newPrice" name="interColor" class="customStyleSelectBox">
                 	 <option value="">S&eacute;lectionner</option>
                     <option value="White">Blanc</option>
                     <option value="Blue">Bleu</option>
                     <option value="Burgundy">Bourgogne</option>
                     <option value="Tan">Bronzer</option>
                     <option value="Brown">Brun</option>
                     <option value="Gray">Gris</option>
                     <option value="Gold">Or</option>
                     <option value="Black">Noir</option>
                     <option value="Red">Rouge</option>
                     <option value="Teal">Sarcelle</option>
                     <option value="Green">Vert</option>
                  </select>
                  
                  </div>
                  </td>
                  <td width="21%"><span class="txt_btn"></span></td>
                </tr>
              </table>
              <table width="92%" border="0">
                <tr>
                  <td width="17%">Transmission:</td>
                  <td width="62%">
                  <div class="select_bg">
                      <select id="newPrice" name="transmission" class="customStyleSelectBox">
                           <option value="">S&eacute;lectionner</option>
                           <option value="Automatic">Automatic</option>
                           <option value="Manual">Manual</option>
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