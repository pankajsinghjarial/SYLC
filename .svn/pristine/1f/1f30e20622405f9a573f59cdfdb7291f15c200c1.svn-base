<?php

set_include_path(dirname(__FILE__));

include 'config/database.php';

if (!isset($_SESSION['gold_admin'])) {
   header('Location: login.php');
} else {
   header('Location: admin.php');
}