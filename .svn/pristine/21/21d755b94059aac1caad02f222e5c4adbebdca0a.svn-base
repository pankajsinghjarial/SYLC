<?php

    if (getenv(HTTP_X_FORWARDED_FOR)) {
        $pipaddress = getenv(HTTP_X_FORWARDED_FOR);
        $ipaddress = getenv(REMOTE_ADDR);
        echo "Your Proxy IP address is : ".$pipaddress. " (via $ipaddress) " ;
    } else {
        $ipaddress = getenv(REMOTE_ADDR);
        echo "My IP address is : $ipaddress";
    }
    $country = getenv(GEOIP_COUNTRY_NAME);
    echo "<br />My Country : $country";
?>