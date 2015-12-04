<?php
// Recursive function to delete a complete directory structure by anoop
function unlinkRecursive($dir, $deleteRootToo)
{
    if(!$dh = @opendir($dir))
    {
        return;
    }
    while (false !== ($obj = readdir($dh)))
    {
        if($obj == '.' || $obj == '..')
        {
            continue;
        }

        if (!@unlink($dir . '/' . $obj))
        {
            unlinkRecursive($dir.'/'.$obj, true);
        }
    }

    closedir($dh);
   
    if ($deleteRootToo)
    {
        @rmdir($dir);
    }
   
    return;
} 

//function for send a message on phone to agent  coded by anil
function sendMobileMessage($cellNo,$seviceProvider,$subject='',$msg='')
  {
   	$msg=substr($msg,0,159);
    $to=$agentCellNo."@".$seviceProvider;
	$succ=mail($to,$subject,$msg);
   	if($succ)
     {
     	return true;
     }
   else
     {
      	return false;
     }  
  }	 	
?>