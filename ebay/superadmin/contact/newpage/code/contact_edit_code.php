<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description   : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
$obj_setting 			= new common();
$obj 					= new validation();

#Code to Fetch seleted ID's data  
$fetchSetting 			= $obj_setting->read('contact_bid', 'id = '.$id);
$getSetting 			= $db->fetchNextObject($fetchSetting);
$id	 					= $getSetting->id;
$name	 				= $getSetting->name;
$email				= $getSetting->email;
$phone				= $getSetting->phone;
$code_postal				= $getSetting->code_postal;
$address				= $getSetting->address;
$message				= $getSetting->message;
$ville				= $getSetting->ville;
$pays				= $getSetting->pays;
$created				= $getSetting->created;


$current_bid	 				= $getSetting->current_bid;
$miximum_bid				= $getSetting->miximum_bid;
$logistique_pays				= $getSetting->logistique_pays;
$transport_terrestre				= $getSetting->transport_terrestre;
$transport_international				= $getSetting->transport_international;
$assurance_transport				= $getSetting->assurance_transport;
$frais_transitaire				= $getSetting->frais_transitaire;
$homologation_francisation				= $getSetting->homologation_francisation;
$administratives				= $getSetting->administratives;




$prix_total_ht	 				= $getSetting->prix_total_ht;
$taxe_de				= $getSetting->taxe_de;
$tva_franch				= $getSetting->tva_franch;
$prix_total_ttc				= $getSetting->prix_total_ttc;

$updateSetting 			= $obj_setting->update('contact_bid',array(status=>0),'id='.$id);

unset($obj_setting);
unset($obj);
			
?>