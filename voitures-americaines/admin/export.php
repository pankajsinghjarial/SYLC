<?php

require 'config/database.php';

$type = (isset($_GET['t'])) ? $_GET['t'] : 'all';

$results = array();
$headers = array();
      
switch ($type) {
   case 'date':
      $filename   = 'custom_lead.csv';
      $describe   = mysql_query('describe leads');
      $start      = mysql_real_escape_string($_GET['start']);
      $end        = mysql_real_escape_string($_GET['end']);
      $leads      = mysql_query(sprintf('SELECT * FROM leads WHERE created_at >= "%s" AND created_at <= "%s" ORDER BY id ASC', $start, $end));
      
      while($row = mysql_fetch_assoc($describe)) {
         $headers[] = $row['Field'];
      }

      // Join all headers
      $results[] = implode(',', $headers);

      // Get all leads
      while($lead = mysql_fetch_assoc($leads)) {
         $results[] = implode(',', $lead);
      }
      break;
      
   case 'email':
      $filename   = 'emails.csv';
      $emails     = mysql_query('SELECT email FROM leads ORDER BY id ASC');
      
      // Shortcut for header
      $results[] = 'email';

      // Get all leads
      while($email = mysql_fetch_assoc($emails)) {
         $results[] = $email['email'];
      }
      break;
      
   case 'all':
      $filename   = 'leads.csv';
      $describe   = mysql_query('describe leads');
      $leads      = mysql_query('SELECT * FROM leads ORDER BY id ASC');
      
      while($row = mysql_fetch_assoc($describe)) {
         $headers[] = $row['Field'];
      }

      // Join all headers
      $results[] = implode(',', $headers);

      // Get all leads
      while($lead = mysql_fetch_assoc($leads)) {
         $results[] = implode(',', $lead);
      }
      break;
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'. $filename .'"');

$csv_result = implode("\n", $results);
echo $csv_result;