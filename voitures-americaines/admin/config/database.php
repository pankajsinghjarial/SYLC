<?php

require 'settings.php';

if (!mysql_connect($settings['hostname'], $settings['username'], $settings['password']) ||
    !mysql_select_db($settings['database'])) {
   die(sprintf("Could not connect to '%s' because: ", $settings['hostname'], mysql_error()));
}
