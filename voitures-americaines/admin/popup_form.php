<?php  
extract($_GET);
extract($_POST);
if(!$_POST)
{
	$hiddenpop='';
}

require 'config/database.php';

$sel_query="Select * from leads where id='".$id."'";

$rs_sel=mysql_query($sel_query) or die(mysql_error());

$popup_details = (mysql_fetch_object($rs_sel));


?>

<script language="javascript" type="text/javascript">


function showadditional_fees(){
	document.getElementById("additional_fees").style.display='block' 
		
}

function showcaradditional_fees(index1){
	   
    if(document.getElementById('car_additional'+index1).style.display='none'){
	document.getElementById('car_additional'+index1).style.display='block';}
   
}

</script>

 <script type="text/javascript">
  function displayField(val){
		
		if(val=='e'){
			document.getElementById('e_id').style.display = 'block';
			document.getElementById('w_id').style.display = 'none';
		}else{
			document.getElementById('w_id').style.display = 'block';
			document.getElementById('e_id').style.display = 'none';
		}
  }
  
var Ccontent ='';
var count = parseInt(document.getElementById('KeywordCount').value);

function addKeywords() {
	var i = count+1;
	if(count<=4){
		document.getElementById("keyword_add_more_"+i).style.display = 'block';
		count = count + 1;
		if(count>1){
			document.getElementById("remove").style.visibility = 'visible';
			document.getElementById("KeywordCount").value = i;
		}
		
		
	}else{
		alert("Sorry you can only add total of 5 keywords set");
	}

}

function removeKeywords(){
	
	document.getElementById("keyword_add_more_"+count).style.display = 'none';
	count = count - 1;
	document.getElementById("KeywordCount").value = count;
	
	if(count==1){
		document.getElementById("remove").style.visibility = 'hidden';
	}
}

</script> 


 <script type="text/javascript">
<!--

function popup_form_validation(){
	  
  	var abc = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  	var letters = /^[0-9a-zA-Z]+$/; 
  	if((document.getElementById("fname_pop").value=='') )
  	{
  	    alert("Please Enter Nom");
  		 return false;
  	}

  	if((document.getElementById("lname_pop").value=='') )
  	{
  	    alert("Please Enter Prenom");
  		 return false;
  	}
  	
  	if((document.getElementById("add_pop").value=='') )
   	{
   	    alert("Please Enter Address");
   		 return false;
   	}

     if((document.getElementById("city_pop").value=='') )
   	{
   	    alert("Please Enter City");
   		 return false;
   	}

     if((document.getElementById("phone_pop").value=='') )
   	{
   	    alert("Please Enter Telephone");
   		 return false;
   	}
     if (isNaN(document.getElementById("phone_pop").value))
   	{
   		alert("Phone Should be Numeric");
   		 
   			return false;
   	}

   
     if((document.getElementById("country_pop").value=='') )
    	{
    	    alert("Please Enter Country");
    		 return false;
    	}

     
     
   /*  if((document.getElementById("email_pop").value.length<1) || (document.getElementById("email_pop").value=='Email:'))
  	{
  	
  		alert("Please Enter Email");
  		return false;
  	}
          else if(!abc.test(document.getElementById("email_pop").value))
  	{
  		alert("Invalid Email");
  		return false;
  	}*/

 
    if((document.getElementById("postcode_pop").value==''))
  	{
  		alert("Please Enter Postcode");
  		
  			return false;
  	}
  	if (isNaN(document.getElementById("postcode_pop").value))
  	{
  		alert("Postcode Should be Numeric");
  		 
  			return false;
  	}
  

  	 if((document.getElementById("admin_date_pop").value=='') )
    	{
    	    alert("Please Enter Date");
    		 return false;
    	}



  	 if((document.getElementById("proforma_pop").value=='') )
 	{
 	    alert("Please Enter proforma");
 		 return false;
 	}

  	 if((document.getElementById("service_pop").value=='') )
    	{
    	    alert("Please Enter Final Destination");
    		 return false;
    	}
 	
  	if((document.getElementById("quantity_pop[]").value=='') )
	{
	    alert("Please Enter Quantity of Car");
		 return false;
	}

  	if((document.getElementById("brand_pop[]").value=='') )
	{
	    alert("Please Enter Car Brand");
		 return false;
	}

  	if((document.getElementById("model_pop[]").value=='') )
	{
	    alert("Please Enter Car Model");
		 return false;
	}
	
  	if((document.getElementById("year_pop[]").value=='') )
	{
	    alert("Please Enter Year of Car");
		 return false;
	}
  	if((document.getElementById("cardesc_pop[]").value=='') )
	{
	    alert("Please Enter Car Description");
		 return false;
	}
  	if (!isNaN(document.getElementById("cardesc_pop[]").value))
  	{
  		alert("Please Enter Characters In Car Description");
  		 
  			return false;
  	}
	
  	if((document.getElementById("serial_pop[]").value=='') )
	{
	    alert("Please Enter Car Serial#");
		 return false;
	}
  	if((document.getElementById("color_pop[]").value=='') )
	{
	    alert("Please Enter Color of Car");
		 return false;
	}
  	if((document.getElementById("price_pop[]").value=='') )
	{
	    alert("Please Enter Price of Car");
		 return false;
	}

  	if (isNaN(document.getElementById("price_pop[]").value))
  	{
  		alert("Please Enter Price of Car In Numeric only");
  		 
  			return false;
  	}
  	if((document.getElementById("transport_pop[]").value=='') )
	{
	    alert("Please Enter Transport Fees of Car");
		 return false;
	}

  	if (isNaN(document.getElementById("transport_pop[]").value))
  	{
  		alert("Please Enter Transport Fees of Car In Numeric only");
  		 
  			return false;
  	}
  	
	if((document.getElementById("shipping_pop[]").value=='') )
	{
	    alert("Please Enter Shipping Fees of Car");
		 return false;
	}

	if (isNaN(document.getElementById("shipping_pop[]").value))
  	{
  		alert("Please Enter Shipping Fees of Car In Numeric only");
  		 
  			return false;
  	}
	
	if((document.getElementById("commission_pop[]").value=='') )
	{
	    alert("Please Enter Commission Fees of Car");
		 return false;
	}

	if (isNaN(document.getElementById("commission_pop[]").value))
  	{
  		alert("Please Enter Commission Fees of Car In Numeric only");
  		 
  			return false;
  	}

  		
  }


//-->
</script> 
  
  



      <!--strat Popup-->
  <div class="inline">
    <div id="inline_content">

    
   <form action="mail.php" class="contactForm" name="pop" method="post" onsubmit="return popup_form_validation();">
                       <?php /*?> <h2><span><img src="images/fancy_close.png" class="close" alt=" " /></span></h2><?php */?> 
                        <div class="popup_iner">
                        
                          <ul>
                            <li>
                            <label>Nom : </label>
                              <input class="input_pop" name="fname_pop" id="fname_pop" value="<?php echo $popup_details->name;?>"  type="text" />
                            </li>
                            <li>
                            <label>Prenom : </label>
                              <input class="input_pop" name="lname_pop" id="lname_pop" value="<?php echo $popup_details->first_name;?>" type="text" />
                            </li>
                            
                             <li>
                            <label>Adresse : </label>
                              <input class="input_pop"  name="add_pop" id="add_pop" value=""  type="text" />
                            </li>
                            
                             <li>
                            <label>Ville/Province(état) : </label>
                              <input class="input_pop"  name="city_pop" id="city_pop" value=""  type="text" />
                            </li>
                            
                            
                            <li>
          					<input class="input_pop" name="email_pop" id="email_pop" value="<?php echo $popup_details->email;?>"  type="hidden" />
                            </li>
                            
                            <li>
                            <label>Numero de telephone : </label>
                              <input class="input_pop"  name="phone_pop" id="phone_pop" value="<?php echo $popup_details->phone;?>"  type="text" />
                              
                            </li>
                           <li>
                            <label>Pays : </label>
                              <input class="input_pop"  name="country_pop" id="country_pop" value=""  type="text" />
                            </li>
                            
                              <li>
                            <label>Code postal : </label>
                              <input class="input_pop"  name="postcode_pop" id="postcode_pop" value=""  type="text" />
                            </li>
                            
                             <li>
                            <label>Date : </label>
                              <input class="input_pop"  name="admin_date_pop" id="admin_date_pop" value=""  type="text" />
                            </li>
                            <?php /*?>
                             <li>
                            <label>Year : </label>
                              <input class="input_pop"  name="admin_year_pop" id="admin_year_pop" value="<?php echo $popup_details->year;?>"  type="text" />
                            </li><?php */?>
                            
                              <li>
                            <label>Facture : </label>
                              <input class="input_pop"  name="proforma_pop" id="proforma_pop" value=""  type="text" />
                            </li>
                              <li>
                            <label>Destination finale : </label>
                              <input class="input_pop"  name="service_pop" id="service_pop" value="<?php echo $popup_details->service;?>"  type="text" />
                            </li>
                            
                            
                             </ul>
                             
                             
                             <!-- Additional car -->   
          
          
            <?php 
                 $keywordsData = array('jobPostingSkill'=>0);


			
			  for($i=1;$i<=5;$i++)
				{
			?>
            <table class="tableWhd" width="100%" border="0" cellspacing="0" cellpadding="0" id="keyword_add_more_<?php echo $i;?>" <?php if($i<=count($keywordsData)){?>style="display:block;"<?php }else{?>style="display:none;"<?php }?>>
              <?php if($i==1){?>
              <tr>
                <td class="table_hd"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="258%" style="text-align:left;background: none repeat scroll 0 0 #333333;font: bold 15px/18px arial;padding: 5px">Informations du véhicule</th>
               
                    </tr>
                  </table></td>
              </tr>
              <?php }?>
              
              <?php if($i > 1){?>
              <tr>
                <td class="table_hd"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="258%" style="text-align:left;background: none repeat scroll 0 0 #333333;font: bold 15px/18px arial;padding: 5px">Fill Additional car information :</th>
               
                    </tr>
                  </table></td>
              </tr>
              <?php }?>
              
              <tr>
                <td class="table_row border_bottom" style="padding-top: 6px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td  width="100%">   
                      
                   
                            <label>Quantité : </label>
                              <input class="input_pop"  name="quantity_pop[]" id="quantity_pop[]" value=""  type="text" />
                         
                              <label>Marque : </label>
                              <input class="input_pop"  name="brand_pop[]" id="brand_pop[]" <?php if($i==1){?> value="<?php $brand1 = $popup_details->car_brand1;$car_brand1 = explode(',', $brand1); echo $car_brand1[0];?>" <?php }else {?>value=""<?php }?>  type="text" />
                              
                              <label>Modèle : </label>
                              <input class="input_pop"  name="model_pop[]" id="model_pop[]" <?php if($i==1){?> value="<?php $model1 = $popup_details->car_model1;$car_model1 = explode(',', $model1); echo $car_model1[0];?>" <?php }else {?>value=""<?php }?>  type="text" />
                            
                            <label>Année : </label>
                              <input class="input_pop"  name="year_pop[]" id="year_pop[]" <?php if($i==1){?> value="<?php $year1 = $popup_details->year;$car_year = explode(',', $year1); echo $car_year[0];?>" <?php }else {?>value=""<?php }?> type="text" />
                       
                            
                            
                            <label>Description de l'Auto : </label>
                              <input class="input_pop"  name="cardesc_pop[]" id="cardesc_pop[]" value=""  type="text" />
                            
                            <label>No de série(vin#) : </label>
                              <input class="input_pop"  name="serial_pop[]" id="serial_pop[]" value=""  type="text" />
                           
                            <label>Couleur : </label>
                              <input class="input_pop"  name="color_pop[]" id="color_pop[]" value=""  type="text" />
                            
                            <label>Prix : </label>
                              <input class="input_pop"  name="price_pop[]" id="price_pop[]" value=""  type="text" />
                            
                            <label>Frais de transport : </label>
                              <input class="input_pop"  name="transport_pop[]" id="transport_pop[]" value=""  type="text" />
                            
                            <label>Frais d'expédition : </label>
                              <input class="input_pop"  name="shipping_pop[]" id="shipping_pop[]" value=""  type="text" />
                            
                            <label>Commission : </label>
                              <input class="input_pop"  name="commission_pop[]" id="commission_pop[]" value=""  type="text" />
                           
                          <input type="button" name="additional_fees" style="margin-bottom: 10px;" value="Rajouter un frais" onclick="showcaradditional_fees(<?php echo $i?>)"/>         
                           
                            
                            <div style="display: none;padding-top: 5px;" id="car_additional<?php echo $i?>">
                            <label>Description des frais : </label>
                              <input class="input_pop"  name="additionalchanges_pop[]" id="additionalchanges_pop[]" value=""  type="text" />
                           
                            <label>Montant : </label>
                              <input class="input_pop"  name="additionalcharges_pop[]" id="additionalcharges_pop[]" value=""  type="text"/>
                         </div>
                       
                     </td>
                     
                    </tr>
                  </table></td>
              </tr>
            </table>
            <?php }?>
            
            
        <div class="add_remove_btns"><input type="button" style="margin-left: 110px;"  name="add_additional_car" value="Rajouter un véhicule" onclick="addKeywords()"/><input type="button" style="float:right;visibility: hidden;margin-left: 5px;" name="remove" value="Remove" id="remove" onclick="removeKeywords()"/></div>
            <input type="hidden" value="1" id="KeywordCount" name="data[Resume][count]"><br/><br/><br/>
    
     <!-- Fees(fedex,doc fees ,bank fees)  --> 
   

           
             <div align="left"><input type="button" name="fees_feedex" value="Frais(Fedex, frais doc, frais bancaires)"/></div>
                          
                       <ul>
                       
                      <li><br/>
                            <label>Description des frais : </label>
                              <input class="input_pop"  name="fees_desc" id="fees_desc" value=""  type="text" />
                            </li>
                            
                         <li>
                            <label>Montant : </label>
                              <input class="input_pop"  name="fees_amount" id="fees_amount" value=""  type="text" />
                            </li>
                       
                       <br/>
                       <li>
                              
                              <input type="button" name="additional_fees" value="Rajouter un frais" onclick="showadditional_fees()"/>
                            </li><br/>
                       
                       </ul>
                       
                       
                       <!-- Additional fees  -->                
                     
        
                       <ul id="additional_fees" style="display: none;">
                       
                       
                       <li>
                            <label>Description des frais : </label>
                              <input class="input_pop"  name="add_fees_desc" id="add_fees_desc" value=""  type="text" />
                            </li>
                            
                         <li>
                            <label>Montant : </label>
                              <input class="input_pop"  name="add_fees_amount" id="add_fees_amount" value=""  type="text" />
                            </li>
                       
                           
                         </ul><br/>
                         
                            <ul>  
    
                            
                            
                          
                            <li>
                                <input type="hidden" name="idformail" value="<?php echo $id;?>">
                            <input type="hidden" name="hiddenpop" value="hiddenformvalue">
                              <input type="submit" name="submit" value="Envoyer la facture"/>
                            </li>
                          </ul>
    
                        </div>
                      </form>
      
              
                      
    </div>
  </div>
  <!--end Poup-->
   
