<?php
/**
 * Timezone Setting
 */
date_default_timezone_set('America/Chicago');

/**
  * Enable Sessions
  */
if(!session_id()) session_start();

/** 
 * Sandbox Mode - TRUE/FALSE
 */
$sandbox = FALSE;
$domain = $sandbox ? 'https://api-3t.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';

/**
 * Enable error reporting if running in sandbox mode.
 */
if($sandbox)
{
	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
}

/**
 * API Credentials
 */
$api_version = '95.0';
$application_id = $sandbox ? 'APP-80W284485P519543T' : '';	// Only required for Adaptive Payments.  You get your Live ID when your application is approved by PayPal.
$developer_account_email = 'DEVELOPER_EMAIL_ADDRESS';		// This is what you use to sign in to http://developer.paypal.com.  Only required for Adaptive Payments.
$api_username = $sandbox ? '104dv_api1.dothejob.org' : 'yoann.attia_api1.sylc-export.com';
$api_password = $sandbox ? '1367576916' : 'XMSLTH7AMJ22KJNY';
$api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31AkG0G.Rms63hWvcUUhMPJbjM6MyQ' : 'AFcWxV21C7fd0v3bYYYRCpSSRl31AZwc4ew90hpDKDEg2zs4.EQCsLAg';
$payflow_username = $sandbox ? 'SANDBOX_USERNAME' : 'LIVE_USERNAME';
$payflow_password = $sandbox ? 'SANDBOX_PASSWORD' : 'LIVE_PASSWORD';
$payflow_vendor = $sandbox ? 'SANDBOX_VENDOR' : 'LIVE_VENDOR';
$payflow_partner = $sandbox ? 'SANDBOX_PARTNER' : 'LIVE_PARTNER';

/**
 * Third Party User Values
 * These can be setup here or within each caller directly when setting up the PayPal object.
 */
$api_subject = '';	// If making calls on behalf a third party, their PayPal email address or account ID goes here.
$device_id = '';
$device_ip_address = $_SERVER['REMOTE_ADDR'];
?>