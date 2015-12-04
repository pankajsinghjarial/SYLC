<?php
$common_object = new common();


/*************************************************************************************************************

#Coder         : Manoj Pandit

*************************************************************************************************************/

$full_data = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Slyc Newslatter</title>
</head>

<body>
		<div style="width:600px; margin:auto; text-align:center" >
		<table style="width:600px; margin:auto" width="600" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td><a href="#"><img src="http://seobranddev.com/sylc/img/menu1_01.gif" alt=" " style="display:block; border:0;" ></a></td>
						<td><a href="#"><img src="http://seobranddev.com/sylc/img/menu1_02.gif" alt=" " style="display:block; border:0;" ></a></td>
						<td><a href="#"><img src="http://seobranddev.com/sylc/img/menu1_03.gif" alt=" " style="display:block; border:0;" ></a></td>
						<td><a href="#"><img src="http://seobranddev.com/sylc/img/menu1_04.gif" alt=" " style="display:block; border:0;" ></a></td>
						<td><a href="#"><img src="http://seobranddev.com/sylc/img/menu1_05.gif" alt=" " style="display:block; border:0;" ></a></td>
						<td><a href="#"><img src="http://seobranddev.com/sylc/img/menu1_06.gif" alt=" " style="display:block; border:0;" ></a></td>
						<td><a href="#"><img src="http://seobranddev.com/sylc/img/menu1_07.gif" alt=" " style="display:block; border:0;" ></a></td>
						<td><a href="#"><img src="http://seobranddev.com/sylc/img/menu1_08.gif" alt=" " style="display:block; border:0;" ></a></td>
						<td><a href="#"><img src="http://seobranddev.com/sylc/img/menu1_09.gif" alt=" " style="display:block; border:0;" ></a></td>
					</tr>
				</table>
			</td>
		</tr>';
			$news_banner_image='';
			
			
			
			$dynamic_editor_text = $common_object->getNameById(TBL_BANNER_TEMPLATE,"id=1");
			$news_banner_image=$dynamic_editor_text->banner_image;
			
		//banner
		$full_data .= '<tr>
			<td>
				<img src="'.DEFAULT_ADMIN_URL.'/images/banner_template/'.$news_banner_image.'" alt=" " style="display:block; border:0px;width:600px;" >
			</td>
		</tr>';
		//banner
		
		
		$full_data .= '<tr>
			<td style="height:20px;" height="20"> 	</td>
		</tr>
		
		
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0" style="background: #555555; width:600px;" width="600">
					<tr>
						<td width="300" style="width:300px; text-align:left; color:#fff; font-size:18px; padding-top:5px; padding-bottom:5px; padding-left:5px">
						Les affaires du moment</td>
						<td width="300" style="width:300px; text-align:right; color:#fff; font-size:14px;  padding-top:5px; padding-bottom:5px; padding-right:5px;">
						<a href="http://www.sylc-export.com/inventaire/" style="color:#fff;">VIEW ALL</a></td>
					</tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0">
					<tr><td style="height:10px" headers="10px;"></td></tr>
				</table>
			</td>
		</tr>';
		
			$i = 1;
			$all_new_models = $common_object->read(TBL__HTMLTEMPLATE,"publish=1",'');
			while($new_models = mysql_fetch_object($all_new_models)) {
			if($i == 1 || $i%3 == 1){
			$full_data .= '<tr><td >
					<table cellpadding="0" cellspacing="0" style="width:600px;" width="600">
						<tr>';
			}
				$full_data .= '<td>
								<table cellpadding="2" cellspacing="2" style="width:190px; border:1px #e2e2e2 solid" width="190">
									<tr>
										<td>
											<img src="'.DEFAULT_ADMIN_URL.'/images/htmltemplate/'.$new_models->image.'" alt=" " style="display:block; border:0;width:188px;height:128px;">
										</td>
									</tr>
									<tr>
										<td style="font-family:Arial; font-size:18px; text-align:center; color:#000; height:40px;" headers="40">';
										$full_data .= $new_models->title;
										$full_data .= '</td>
									</tr>

									<tr>
										<td style="border-top: 1px #e4e4e4 solid; height:40px;">
											<table cellpadding="0" cellspacing="0">
												<tr>
													<td style="font-family:Arial; font-size:18px; text-align:left; color:#000;  font-size:20px; color:#cf0000; padding-left:5px ;width:90px" width="90">';
													$full_data .= "$".$new_models->price;
													$full_data .= '</td>
													<td style="font-family:Arial; font-size:18px; color:#000; width:90px;" width="90" align="right">
													<a href="'.$new_models->details_url.'"><img src="http://seobranddev.com/sylc/img/detaild.gif" alt=" " style="display:block; border:0;" ></a></td>
												</tr>
											</table>
										</td>
									</tr>

								</table>
							</td>';
						if($i%3 != 0 && $i == mysql_num_rows($all_new_models)){
							$full_data .= '<td>
								<table style="width:190px;" width="190">
									<tr>
										<td>
										</td>
									</tr>
									<tr>
										<td style="font-family:Arial; font-size:18px; text-align:center; color:#000; height:40px;" headers="40">
										</td>
									</tr>

									<tr>
										<td style="height:40px;">
											<table cellpadding="0" cellspacing="0">
												<tr>
													<td style="font-family:Arial; font-size:18px; text-align:left; color:#000;  font-size:20px; color:#cf0000; padding-left:5px ;width:90px" width="90"></td>
													<td style="font-family:Arial; font-size:18px; color:#000; width:90px;" width="90" align="right"></td>
												</tr>
											</table>
										</td>
									</tr>

								</table>
							</td>';
						}
				if($i == 3 || $i%3 == 0 || $i == mysql_num_rows($all_new_models)){
					$full_data .= '</tr>
					</table>
					</td></tr>
					<tr>
						<td>
							<table>
								<tr><td height="5" style="height:5px;"></td></tr>
							</table>
						</td>
					</tr>';
				
				}
				$i++;
		}
		$htmlpage = $common_object->read(TBL__HTMLPAGE,"publish=1",'');
		while($html_content = mysql_fetch_object($htmlpage)) {
		//print_r($html_content);
		
		$full_data .= $html_content->middle_text;
		$full_data .='<tr>
		<td>
		<table>
		<tr><td height="5" style="height:5px;"></td></tr>
		</table>
		</td>
		</tr>';
		$full_data .= $html_content->footer_above_text;
		$full_data .='<tr>
		<td>
		<table>
		<tr><td height="10" style="height:10px;"></td></tr>
		</table>
		</td>
		</tr>';
		$full_data .= $html_content->footer_text;
		}
		$full_data .='<tr>
			<td>
				<table>
					<tr><td height="20" style="height:20px;"></td></tr>
				</table>
			</td>
		</tr>

		<!-- footer for social -->
		
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0" style="width:600px; background: #2f2f2f; border-top:1px #000000 solid; border-bottom:1px #c8c8c8 solid;" width="600" bgcolor="2f2f2f" >
					<tr>
						<td width="180" height="50" style="width:180px; height:50px;">
							<table cellpadding="0" cellspacing="0" style="width:160px;" width="160" align="center">
							<tr>
								<td><a href="#"><img src="http://seobranddev.com/sylc/img/facebook.gif" alt=" " style="display:block; border:0px;"></a></td>
								<td><a href="#"><img src="http://seobranddev.com/sylc/img/tweeter.gif" alt=" " style="display:block; border:0px;"></a></td>
								<td><a href="#"><img src="http://seobranddev.com/sylc/img/google.gif" alt=" " style="display:block; border:0px;"></a></td>
								<td><a href="#"><img src="http://seobranddev.com/sylc/img/pintrest.gif" alt=" " style="display:block; border:0px;"></a></td>
							</tr>
							</table>
						</td>
						
						<td width="420" style="width:420px; text-align:right">
							<table cellpadding="0" cellspacing="0" style="width:410px;" align="right">
								<tr>
									<td width="220" style="width:220px;">
										<table cellpadding="0" cellspacing="0" align="right" >
											<tr>
												<td><img src="http://seobranddev.com/sylc/img/telephone.gif" alt=" " style="display:block; border:0"></td>
												<td style=" text-align:right; padding-left:10px"><a href="callto:01.76.63.32.16"  style="color: #c5c5c5; text-decoration: none;">(Fr) 01.76.63.32.16</a></td>
											</tr>
										</table>
									</td>
									
									<td width="220" style="width:220px;">
										<table cellpadding="0" cellspacing="0" align="right" >
											<tr>
												<td><img src="http://seobranddev.com/sylc/img/mail.gif" alt=" " style="display:block; border:0"></td>
												<td style=" text-align:right; padding-right:10px;  padding-left:5px"><a href="mailto:info@sylc-export.com"  style="color: #c5c5c5; text-decoration: none;">info@sylc-export.com</a></td>
											</tr>
										</table>
									</td>

									
									
								</tr>
							</table>
						</td>
						
					</tr>	
				</table>
			</td>
		</tr>
		
		<!-- footer 2 start -->
		
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0" style="width:600px; border-top:1px #707070 solid;" width="600px;">
					<tr>
						<td style="background: #bdbdbd; text-align: center; padding-top: 15px; padding-bottom:15px; font-size: 11px; color: #2c2c2c;">
						Hollywood, FL 33020 | Numero Francais:<a href="callto:01.76.63.32.16" style="color: #2c2c2c; text-decoration: none;"> 01.76.63.32.16
		</a><br>Droits d&#39;auteur © <a href="www.SYLC.com" style="color: #2c2c2c; text-decoration: none;">SYLC.com</a>. 
		Tous droits réservés 
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
		
		
	</table>

</div>
</body>

</html>';
			//echo $full_data;

?>