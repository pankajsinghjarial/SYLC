<script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
<?php 
    $common->getExchangeRate();
	$rateid = $common->customQuery("select * from currency where id = 1");
	$rate = mysql_fetch_object($rateid);	
		
	if(isset($_POST['calci_submit'])){
		$usd_cost = $amt + $forfait;
		$eur_cost = $usd_cost * $common->exch_rate;
		//$amt = number_format($amt,2);
	}
?>
<style type="text/css">

.popup_cnt {
	width:100%;
	overflow:hidden;
	margin:0 auto;
}	
.popup_cnt01 {
	overflow:hidden;
}
.input_text {
	font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:right;  color:#333333;  padding:10px 23px 0 0;
	}
.input_text01 {
	font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:right;  color:#333333;  padding:4px 23px 0 0;
	}

.input_outer {
	width:284px;
	height:37px;
	background:url(../images/input_outer.jpg) no-repeat;
	border:none;
	margin:0 0 20px 0;
}
.input_outer input {
	width:265px;
	border:0px;
	color:#515151;
	font-size:13px;
	background:none;
	margin:9px 0 0 6px;
}
.input_outer select {
	width:265px;
	border:0px;
	color:#515151;
	font-size:13px;
	background:none;
	margin:9px 0 0 6px;
}

.submit_btn {
	background:url(../images/btn.jpg) no-repeat;
	border:none;
	width:169px;
	margin:5px 0 16px 0;
	height:50px;
	cursor:pointer;
}

#calc_error_sdasfsdf{
	display:block;
	position:absolute;
	right:0;
	top:6px;
}
#calc_error_sdasfsdf .err{
	border:#F00 solid 1px;
	font-size:14px;
	padding:3px;
	background-color:#F2F2F2;
	font-weight:bold;
}
#calc_error_sdasfsdfs .errs {
  background-color: #F2F2F2;
  border: 1px solid #FF0000;
  float: right;
  font-size: 14px;
  font-weight: bold;
  margin: -20px 29px 0 0;
  padding: 3px;
  width: 145px;
}


</style>

<script type="text/javascript">
	function onSubmitCheck(){
		var reg = /^\s*(\+|-)?((\d+(\.\d+)?)|(\.\d+))\s*$/;
		val = document.getElementById("car_amt").value;
		vals = document.getElementById("forfait").value;
		erro =0;
		if(!reg.test(val)) {
			document.getElementById("calc_error_sdasfsdf").innerHTML = "<div class='err'>SVP Entrer Un Prix</div>";
			$("#calc_error_sdasfsdf").show();
			erro =1;
			}

		if(vals == 'sele'){
			document.getElementById("calc_error_sdasfsdfs").innerHTML = "<div class='errs'>SVP Select Un Forfait</div>";
			$("#calc_error_sdasfsdfs").show();
			erro =1;
		}
		if(erro == 1)
		{
			return false;
		}
		else {
		return true;
		}
	}
</script>
<div class="popup_cnt">
      <div class="popup_cnt01">
      <form name="calci" id="calci" method="post" onsubmit="return onSubmitCheck();">
      	<table width="100%" cellpadding="0" cellspacing="0">
        <tr>
        <td width="36%"><div class="input_text">Prix du v&eacute;hicule:($)</div></td>
        <td width="64%"><div class="input_outer" style="position:relative;"> <input type="text" name="amt" id="car_amt" class="input_01"  value="<?php echo $amt; ?>" /><div id="calc_error_sdasfsdf" onmouseover="$(this).hide('slow');"></div>
        </div>
        	
        </td>
        </tr>
        <tr>
        <td ><div class="input_text">Forfait</div></td>
        <td ><div class="input_outer" style="position:relative;"> <select name="forfait" id='forfait'>
         <!--  <option value="sele">S'il vous plait s&eacute;lectionner</option>-->
        <option value="8000" <?php if($forfait == 8000){ ?> selected="selected" <?php }?>>expert $8000</option>
         <option value="10000" <?php if($forfait == 10000) { ?> selected="selected" <?php }?>>confort $10000</option>
          <option value="6000" <?php if($forfait == 6000){ ?> selected="selected" <?php }?>>Économie $6000</option>
          
        </select>
        <div id="calc_error_sdasfsdfs" onmouseover="$(this).hide('slow');"></div>
        </div></td>
        </tr>
     <?php /*?>   <tr>
        <td ><div class="input_text">Transport à domicile:($)</div></td>
        <td ><div class="input_outer">  <input type="text" name="domicile" id="domicile" disabled="disabled" class="input_01" value="<?php echo $rate->transp; ?>"/></div></td>
        </tr>
        <tr>
        <td ><div class="input_text">Commission:($)</div></td>
        <td ><div class="input_outer">  <input type="text" name="commission" id="commission" disabled="disabled" class="input_01" value="<?php echo $rate->com; ?>"/></div></td>
        </tr> <?php */?>
        <tr>
        <td ><div class="input_text">Taux d'&eacute;change (USD en EUR):</div></td>
        <td ><div class="input_outer"><input type="text" name="exchange" id="exchange" disabled="disabled" class="input_01" value="<?php echo $common->exch_rate; ?>"/></div></td>
        </tr>
        <tr>
        <td ></td>
        <td ><input name="calci_submit" type="submit" class="submit_btn" value="." /></td>
        </tr>
        <tr>
        <td ><div class="input_text01">Prix final en USD($):</div></td>
        <td ><div class="input_outer"> <input name="" type="text" class="input_01" disabled="disabled" value="<?php echo number_format($usd_cost,2); ?>"    /></div></td>
        </tr>
        <tr>
        <td ><div class="input_text01">Prix final en EUR(&euro;):</div></td>
        <td ><div class="input_outer"> <input name="" type="text" class="input_01" disabled="disabled" value="<?php echo number_format($eur_cost,2); ?>"    /></div></td>
        </tr>
      </table>
      </form>
      </div>
    </div>

<?php /*?><div class="qui_txt_area">
<form name="calci" id="calci" method="post">
    <label for="transport">Enter Amout:($)</label>
	<input type="text" name="amt" id="amt" class="input_text"  value="<?php echo $amt; ?>" /><br />

    <label for="transport">Transport par bateau:($)</label>
    <input type="text" name="transport" id="transport" disabled="disabled" class="input_text" value="<?php echo $rate->boat; ?>"/><br />

    <label for="domicile">Transport à domicile:($)</label>
    <input type="text" name="domicile" id="domicile" disabled="disabled" class="input_text" value="<?php echo $rate->transp; ?>"/><br />

    <label for="commission">Commission:($)</label>
    <input type="text" name="commission" id="commission" disabled="disabled" class="input_text" value="<?php echo $rate->com; ?>"/><br />
    
    <label for="exchange">Exchange Rate (USD to EUR):</label>
    <input type="text" name="exchange" id="exchange" disabled="disabled" class="input_text" value="<?php echo $common->exch_rate; ?>"/><br />
    
    <input type="submit" name="calci_submit" value="." class="form-submit" /><br />
    
    <label for="doller">Final Cost In USD($):</label>
   	<?php echo " ".$usd_cost; ?><br />

    <label for="euro">Final Cost In EUR(&euro;):</label>
    <?php echo " ".$eur_cost; ?>
</form>

</div><?php */?>