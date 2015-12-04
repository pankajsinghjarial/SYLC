<?php

function getCurrentTimestamp()

{

	$timestamp = mktime(date("h"), date("i"), date("s"), date("m"), date("d"), date("Y"));

	return $timestamp;

}



function getformate($Timestamp)

{

global $db;

$sql=mysql_query('select `time` from settings where id=1');

$data=mysql_fetch_array($sql);

$format=$data['time'];	

$requiredFormat = set_time($Timestamp,$format);

return $requiredFormat;

}



function set_time($Timestamp,$format)

 {

  if($format=='one')

    return $requiredFormat = date("m-d-Y h:i:s A",$Timestamp);

  else if($format=='two')

    return $requiredFormat = date("d-m-Y h:i:s A",$Timestamp);	

  else if($format=='thr')

    return $requiredFormat = date("Y-m-d h:i:s A",$Timestamp);	

  else if($format=='four')

    return $requiredFormat = date("Y-d-m h:i:s A",$Timestamp);	

   else if($format=='five')

    return $requiredFormat = date("F j, Y, g:i a",$Timestamp);			

 }

function getTodayDate()

{

	$date_take 			= date("m-d-Y");

	$dateObj 			= new Date_Time_Calc($date_take, "m-d-Y");

	$currentDateStamp	= $dateObj->date_time_stamp;

	//$timestamp = mktime(0 , 0 , 0 , date("n"), date("j"), date("Y"));

	return $currentDateStamp;

}

function getRequiredTimestamp($datechange)

{

	// Format MM-DD-YYYY

	//$dateChangeArr = explode("-",$datechange);

	//$timestamp = mktime(0,0,0,$dateChangeArr[0],$dateChangeArr[1],$dateChangeArr[2]);

	$dateObj 	= new Date_Time_Calc($datechange, "m-d-Y");

	$timestamp	= $dateObj->date_time_stamp;

	return $timestamp;

}

function getRequiredDateFormat($dateTimestamp)

{

	if($dateTimestamp != "" && $dateTimestamp != 0)

		$requiredFormat = date("m-d-Y h:i:s A",$dateTimestamp);

	else	

		$requiredFormat = "";

		return $requiredFormat;	

}

function getRequiredDateFormat1($dateTimestamp)

{

	if($dateTimestamp != "" && $dateTimestamp != 0)

		$requiredFormat = date("m-d-Y",$dateTimestamp);

	else	

		$requiredFormat = "";

	

	return $requiredFormat;	

}



function getRequiredTime($h,$min,$period)

{

	if($h == "" && $min == ""){

		$timestamp = mktime(0,0,0,0,0,0);

	}else{

		if($period == "PM" || $period == "pm"){

			$h =  $h + 12;

		}

		//echo $h." ".$min." ==> ";

		$timestamp = mktime($h,$min,0,0,0,0);

		return $timestamp;

	}

	

}



function getRequiredTimeFormat($Timestamp)

{

	if($Timestamp != "" && $Timestamp != 0)

		$requiredFormat = date("H-i",$Timestamp);

	else	

		$requiredFormat = "";

	

	return $requiredFormat;	

}

function getTimeNonZero($Timestamp)

{

	if($Timestamp != "" && $Timestamp != 0)

		$requiredFormat = date("G-i",$Timestamp);

	else	

		$requiredFormat = "";

	

	return $requiredFormat;	

}

/* ADD BY : Rajeev Achra

   function return only hours from a time stamp*/

function getTimeHour($Timestamp)

{

	if($Timestamp != "" && $Timestamp != 0)

		$requiredFormat = date("H",$Timestamp);

	else	

		$requiredFormat = "";

	

	return $requiredFormat;	

}

/* ADD BY : Rajeev Achra

   function return only Mint from a time stamp*/

function getTimeMint($Timestamp)

{

	if($Timestamp != "" && $Timestamp != 0)

		$requiredFormat = date("i",$Timestamp);

	else	

		$requiredFormat = "";

	

	return $requiredFormat;	

}

/* ADD BY : Rajeev Achra

   function return only non leading ZERO hours from a time stamp*/

function getNonZeroTimeHour($Timestamp)

{

	if($Timestamp != "" && $Timestamp != 0)

		$requiredFormat = date("G",$Timestamp);

	else	

		$requiredFormat = "";

	

	return $requiredFormat;	

}



function getRequiredTimeStmp($h,$min)

{

	if($h == "" && $min == ""){

		$timestamp = mktime(0,0,0,0,0,0);

	}

	else{

		//echo $h." ".$min." ==> ";

		$timestamp = @mktime($h,$min,0,0,0,0);

		return $timestamp;

	}

	

}

//function to f=get next day datetamp

function getNextdayDate()

{

	$timestamp = mktime(0 , 0 , 0 , date("m"), date("d")+1, date("Y"));

	return $timestamp;

}

//function to get time in 12 hour format

function getNonMilitaryTimeFormat($Timestamp)

{

	if($Timestamp != "" && $Timestamp != 0)

		$requiredFormat = date("h-i",$Timestamp);

	else	

		$requiredFormat = "";

	

	return $requiredFormat;	

}

function getRequiredTimeStampHour($h,$min,$period,$m,$d,$y)

{

	if($h == "" && $min == ""){

		$timestamp = mktime(0,0,0,date($m), date($d), date($y));

	}else{

		if($period == "PM" || $period == "pm"){

			$h =  $h + 12;

		}

				

		$timestamp = mktime($h,$min,0,date($m), date($d), date($y));

		return $timestamp;

	}
}
	function getMonthName(){	
	 /* create array so we can name months */ 
        $monthName = array(1=> "January", "February", "March", 
            "April", "May", "June", "July", "August", 
            "September", "October", "November", "December");        
 
        /* make month selector */ 
       
        for($currentMonth = 1; $currentMonth <= 12; $currentMonth++) 
        { 
            echo "<option value=\"".intval($currentMonth)."\">" . $monthName[$currentMonth] . "</option>"; 
        }          
	
	}
	
	function getDay(){	
	
        for($currentDay=1; $currentDay <= 31; $currentDay++) 
        { 
            echo "<option value=\"$currentDay\">$currentDay</option>"; 
        }       
	
	}
	function getYear(){
		for($i=date("Y"); $i <= date("Y")+5; $i++) 
        { 
            echo "<option value=\"$i\">$i</option>"; 
        }	
	}

	function getSpecificYearRange($start,$end){
		for($i=$start; $i <= $end; $start++) 
        { 
            echo "<option value=\"$start\">$start</option>"; 
        }	
	}

?>