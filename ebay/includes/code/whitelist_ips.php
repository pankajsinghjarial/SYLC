<?php
 //$_SERVER['REMOTE_ADDR'] = '72.20.36.133';


    // bypass visitor page.
    if (strpos($_SERVER['PHP_SELF'], "visitor") == true || strpos($_SERVER['PHP_SELF'], "index_enquiry.php") == true || strpos($_SERVER['PHP_SELF'], "superadmin") == true) return true;
    
    // ip address already checked.
    $pastdate = mktime(0,0,0,1,1,1970);
    setcookie("geoip","",$pastdate);
    setcookie("geoipCountry","",$pastdate);
    
    
    $blockedCounntries = array('US');
    
    //echo $_SERVER['REMOTE_ADDR']; die;
    if(getCookies('geoip') != $_SERVER['REMOTE_ADDR'] ) { 
        
        $cookiesTime = time()+60*60*24*30*12;
        
        //$your_key = '74dcb5749d1841fc2b42accb11b704e0dfd2dd0f4683e44ab14576613fb3315f';
        //
        //$ip = $_SERVER['REMOTE_ADDR']; //'3.255.255.255';
        //$url = "http://api.ipinfodb.com/v3/ip-country/?key=$your_key&ip=$ip&format=json";
        //     
        //$d = file_get_contents($url);
        //$data = json_decode($d , true);
        $data  = null;
        $info = null;
        
        include("GeoIp/geoip.inc");

        
        $gi = geoip_open("GeoIp/GeoIP.dat", GEOIP_STANDARD);
        $ip = getenv("REMOTE_ADDR");
        $conuntry_code = geoip_country_code_by_addr($gi, $ip);
        if( $conuntry_code ) {
            $data['statusCode'] = 'OK';
            $data['countryCode'] = $conuntry_code;
        }
        geoip_close($gi);

        
        if($data['statusCode'] == 'OK') {
            $countryCode = $data['countryCode'];
            setcookie("geoipCountry", $data['countryCode'], $cookiesTime);
            setcookie("geoip", $ip, $cookiesTime);
           // echo $data['countryCode'];
            if( in_array($data['countryCode'], $blockedCounntries)) {
                if( !whilteListIp( $ip ) ) {
                    header( 'Location: '. DEFAULT_URL .'/visitor.php' ) ;
                }
            }
        }
        
    }
    else if(in_array(getCookies('geoipCountry'), $blockedCounntries)) {
       
        if( !whilteListIp( getCookies('geoip') ) ) {
             header( 'Location: '. DEFAULT_URL .'/visitor.php' ) ;
        }
    }
    
    
    function whilteListIp( $ipAddress ) {
            $query = mysql_query("SELECT id  FROM `whitelist_ips` WHERE trim(`ip_address`) =  '$ipAddress'" );
            if( mysql_num_rows($query) <= 0 ) {
                return false;
            }
            return true;
    }
    
    
    function getCookies( $key ) {
        return ( !empty( $_COOKIE[$key] ) ) ? $_COOKIE[$key] : null;
    }
    

?>