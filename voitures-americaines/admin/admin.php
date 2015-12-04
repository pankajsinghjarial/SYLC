<?php



require 'config/database.php';



if(!isset($_SESSION['gold_admin'])) {

   header('Location: login.php');

} else {
	header('Location: user_info.php');
}



$chart = mysql_query("SELECT COUNT(id) AS total_leads, created_at FROM leads GROUP BY MONTH(created_at), DAY(created_at)");

$chart_data = array();

$chart_dates = array();



while($row = mysql_fetch_assoc($chart)) {

   $chart_data[] = $row['total_leads'];

   $chart_dates[] = $row['created_at'];

}



/*echo '<pre>';

print_r($chart_data);

print_r($chart_dates);

echo '</pre>';

*/



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang='en' xml:lang='en' xmlns='http://www.w3.org/1999/xhtml'>

   <head>

      <meta content='text/html; charset=utf-8' http-equiv='Content-type' />

      <title>Syl Corporation</title>

      <link href="../stylesheets/admin.css" media="screen" rel="stylesheet" type="text/css" />

		<link type="text/css" href="../stylesheets/smoothness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />	

		

		 <script type="text/javascript" src="../javascripts/jquery-1.4.2.min.js"></script>

		<script type="text/javascript" src="../javascripts/jquery-ui-1.8.2.custom.min.js"></script>

      <script type="text/javascript" src="../javascripts/highcharts.js"></script>

      <script type="text/javascript">

         $(function () {

            function mysqlTimeStampToDate(timestamp) {

               var regex = /^([0-9]{2,4})-([0-1][0-9])-([0-3][0-9]) (?:([0-2][0-9]):([0-5][0-9]):([0-5][0-9]))?$/;

               var parts = timestamp.replace(regex,"$1 $2 $3 $4 $5 $6").split(' ');

               return Date.UTC(parts[0],parts[1]-1,parts[2]);

               //return new Date(parts[0],parts[1]-1,parts[2],parts[3],parts[4],parts[5]);

            }

            

            var chart_dates = ["<?= implode('", "', $chart_dates) ?>"];

            

            new Highcharts.Chart({

               chart: {

                 renderTo: 'graph',

                 defaultSeriesType: 'area',

                 zoomType: 'x'

               },

               title: {

                 text: ""

               },

               xAxis: {

                  title: {

                     text: "Date",

                   style: {

                      color: '#000'

                   }

                  },

                  type: "datetime"

               },

               yAxis: {

                 title: {

                   text: "Total User Subscribed",

                   style: {

                      color: '#000'

                   }

                 }

               },

               credits: {

                  enabled: false

               },

               tooltip: {

                  formatter: function() {

                     var date = new Date(this.x);

                     date.setDate(date.getDate());

                     date = (date.getMonth()+1) + '/' + date.getDate() + '/' + date.getFullYear();

                     

                     return '<b>'+

                        Highcharts.numberFormat(this.y, 0, null, '') +'</b> User  Registration<br/> on '+ date;

                  }

               },

               plotOptions: {

                  area: {

                     pointStart: 0,

                     marker: {

                        enabled: false,

                        symbol: 'circle',

                        radius: 2,

                        states: {

                           hover: {

                              enabled: true

                           }

                        }

                     }

                  }

               },

			   series: [{

					 name: 'User  Registration',



                  color: '#9d6337',



					// Define the data points. All series have a dummy year

					// of 2010/71 in order to be compared on the same x axis. Note

					// that in JavaScript, months start at 0 for January, 1 for February etc.

					data: [

					

					<?php 

					$count = count($chart_dates);

					for($i=0; $i<$count; $i++){

					$year = date(  "Y", strtotime( $chart_dates[$i] ) );

					$month = date(  "n", strtotime( $chart_dates[$i] ) );

					$month = $month-1;

					$day= date(  "j", strtotime( $chart_dates[$i] ) );

					

					?>

					[Date.UTC(<?php echo ($year.', '.$month.', '.$day); ?>),<?php echo $chart_data[$i] ?> ]<?php if($i!=$count) {?>,<?php } ?>

				

				<?php }?>						

						

					]

				}]



               /*series: [{

                  name: 'User  Registration',

                  color: '#9d6337',

                  pointStart: mysqlTimeStampToDate(chart_dates[0]),

                  pointInterval: (24 * 3600 * 1000),

                  data: [<?= implode(', ', $chart_data) ?>]

               }]*/

            });

            

            // Custom

            $(".column input").datepicker();

            $('#export').click(function (e) {

               e.preventDefault();

               var start = $('#date_start').val().split('/');

               var end = $('#date_end').val().split('/');

               

               // Add padded zeros

               for (var i=0; i < start.length; i++) {

                  if (start[i].length == 1) {

                     start[i] = '0' + start[i];

                  }

                  

                  if (end[i].length == 1) {

                     end[i] = '0' + end[i];

                  }

               }

               

               start = start[2] + '-' + start[0] + '-' + start[1] + ' 00:00:00';

               end = end[2] + '-' + end[0] + '-' + end[1] + ' 00:00:00';

               

               window.location = 'export.php?t=date&start='+ start + '&end='+ end;

            });

         });

      </script>

		

   </head>

   <body>

      <div id="wrapper">

         <div id="header">

            <h1>Admin Control Panel</h1>

         </div>

         

         <div id="tabs">

            <h2>Sign Ups</h2>

           

            <ul>

               <!--<li><a href="admin.php" class="active">Welcome</a></li>-->

               <li><a href="user_info.php">User Information</a></li>

			   <li><a href="change_password.php">Change Password</a></li>

			   <li><a href="logout.php" >Logout</a></li>

            </ul>

         </div>

         

         <div id="graph"></div>

         

         <div id="bulk">

            <h2>Export Bulk Data:</h2>

            <a href="export.php?t=all" class="submit">Export All Info</a>

            <a href="export.php?t=email" class="submit">Export All Emails Only</a>

         </div>

         

         <div id="timeframe">

            <h2>Export By Timeframe:</h2>

            

            <div class="column">

               <strong>Start Date:</strong>

               <input type="text" name="date_start" value="<?= date('n/j/Y') ?>" id="date_start" class="date" />

            </div>

            <div class="column">

               <strong>End Date:</strong>

               <input type="text" name="date_end" value="<?= date('n/j/Y', mktime(0, 0, 0, date("m"), date("d")+1, date("Y"))) ?>" id="date_end" class="date" />

            </div>

            <div class="column export">

               <a href="#" id="export" class="submit">Export</a>

            </div>

         </div>

      </div>

      

   

   </body>

</html>