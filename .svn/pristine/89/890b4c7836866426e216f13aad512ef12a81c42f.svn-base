<?php
// unzip a rar file with same name
function unrar($rarfile)
{
		$rar_file = rar_open($rarfile) or die("Can't open Rar archive");
		$entries = rar_list($rar_file);
		
		foreach ($entries as $entry) {
			echo 'Filename: ' . $entry->getName() . "\n";
			echo 'Packed size: ' . $entry->getPackedSize() . "\n";
			echo 'Unpacked size: ' . $entry->getUnpackedSize() . "\n";
		
			$entry->extract('D:/usr/lioncube/');
		}
		rar_close($rar_file);
}

// unzip a zip file with same name but if file or folder already exists with same name then it will not overwrite
function unzip($zipfile)
{
	$zip = zip_open($zipfile);

	while ($zip_entry = zip_read($zip))    {
		zip_entry_open($zip, $zip_entry);
		if (substr(zip_entry_name($zip_entry), -1) == '/') {
			$zdir = substr(zip_entry_name($zip_entry), 0, -1);
			if (file_exists($zdir)) {
				trigger_error('Directory "<b>' . $zdir . '</b>" exists', E_USER_ERROR);
				return false;
			}
			mkdir($zdir);
		}
		else {
			$name = zip_entry_name($zip_entry);
			if (file_exists($name)) {
				trigger_error('File "<b>' . $name . '</b>" exists', E_USER_ERROR);
				return false;
			}
			$fopen = fopen($name, "w");
			fwrite($fopen, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)), zip_entry_filesize($zip_entry));
		}
		zip_entry_close($zip_entry);
	}
	zip_close($zip);
	return true;
}

// unzip a zip file using shell command in backund
function unzipShell($zip_file, $src_dir, $extract_dir)
{
	 copy($src_dir . "/" . $zip_file, $extract_dir . "/" . $zip_file);
	 chdir($extract_dir);
	 shell_exec("unzip $zip_file");
}

// make the zip file of specified path  after making zip send output to browser to save zip file
function makezip($zipname,$ad_dir)
{
	  $zipfilename = $zipname;
	  $zip_subfolder = '';
	  $ad_dir = $ad_dir;
	  // form is posted, handle it   
	  $zipfile = new zipfile();
	
	  // generate _settings into zip file
	  //$zipfile ->addFile( stripcslashes( $settings ), $zip_subfolder . '/_settings.php' );
	
	  if ($handle = opendir($ad_dir)) {
		 while (false !== ($file = readdir($handle))) {
			if (!is_dir($file) && $file != "." && $file != ".." ) {
			  $f_tmp = @fopen( $ad_dir . '/' . $file, 'r');
	
			  if($f_tmp){
				$dump_buffer=fread( $f_tmp, filesize($ad_dir . '/' . $file));
				$zipfile -> addFile($dump_buffer, $zip_subfolder . '/' . $file);
				fclose( $f_tmp );
			  }
			}
		 }  
	
	  $dump_buffer = $zipfile -> file();
	  
	  // write the file to disk:
	  $file_pointer = fopen($zipfilename, 'w');
	  if($file_pointer){
		fwrite( $file_pointer, $dump_buffer, strlen($dump_buffer) );
		fclose( $file_pointer );
	  }
	  // response zip archive to browser:
	  header('Pragma: public');
	  header('Content-type: application/zip');
	  header('Content-length: ' . strlen($dump_buffer));
	  header('Content-Disposition: attachment; filename="'.$zipfilename.'"');
	  echo  $dump_buffer;
	}
}

// unzip a zip file with same name and if file or folder already exists with same name then you have option to overwrite or not overwrite that
//$create_zip_name_dir=true means code will create a subdirectory with the same name as main directory
// means if u are unziping abcd.zip then directory structure will be abcd/abcd/subfolders and files
//$create_zip_name_dir=false means directory structure will be same as zip 
// thsi is perfect function anoop
function unzipnew($src_file, $dest_dir=false, $create_zip_name_dir=true, $overwrite=true,$delzip=true)
{
  if ($zip = zip_open($src_file))
  {
    if ($zip)
    {
	  $splitter = ($create_zip_name_dir === true) ? "." : "/";
      if ($dest_dir === false) $dest_dir = substr($src_file, 0, strrpos($src_file, $splitter))."/";
	 // else $dest_dir = $desdir."/";
     
      // Create the directories to the destination dir if they don't already exist
      create_dirs($dest_dir);

      // For every file in the zip-packet
      while ($zip_entry = zip_read($zip))
      {
        // Now we're going to create the directories in the destination directories
        // If the file is not in the root dir
        $pos_last_slash = strrpos(zip_entry_name($zip_entry), "/");
        if ($pos_last_slash !== false)
        {
          // Create the directory where the zip-entry should be saved (with a "/" at the end)
          create_dirs($dest_dir.substr(zip_entry_name($zip_entry), 0, $pos_last_slash+1));
        }
        // Open the entry
        if (zip_entry_open($zip,$zip_entry,"r"))
        {
         
          // The name of the file to save on the disk
          $file_name = $dest_dir.zip_entry_name($zip_entry);
          // Check if the files should be overwritten or not
          if ($overwrite === true || $overwrite === false && !is_file($file_name))
          {
            // Get the content of the zip entry
            $fstream = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            file_put_contents($file_name, $fstream );
            // Set the rights
            chmod($file_name, 0777);
            echo "save: ".$file_name."<br />";
          }
          // Close the entry
          zip_entry_close($zip_entry);
        }      
      }
      // Close the zip-file
      zip_close($zip);
	  if($delzip) { unlink($src_file); }
    }
  }
  else
  {
    return false;
  }
  return true;
}

/** * This function creates recursive directories if it doesn't already exist
 * * @param String  The path that should be created *  * @return  void */
function create_dirs($path)
{
  if (!is_dir($path))
  {
    $directory_path = "";
    $directories = explode("/",$path);
    array_pop($directories);
   
    foreach($directories as $directory)
    {
      $directory_path .= $directory."/";
      if (!is_dir($directory_path))
      {
        mkdir($directory_path);
        chmod($directory_path, 0777);
      }
    }
  }
}


function unpackZip($dir,$file) {
   if ($zip = zip_open($dir.$file.'.zip')) {
     if ($zip) {
       mkdir($dir.$file);
     chmod($dir.$file, 0777);
       while ($zip_entry = zip_read($zip)) {
         if (zip_entry_open($zip,$zip_entry,"r")) {
           $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
           $dir_name = dirname(zip_entry_name($zip_entry));
           if ($dir_name != ".") {
             $dir_op = $dir.$file."/";
               foreach ( explode("/",$dir_name) as $k) {
                 $dir_op = $dir_op . $k;
                 if (is_file($dir_op)) unlink($dir_op);
                 if (!is_dir($dir_op)) mkdir($dir_op);
            chmod($dir_op, 0777);
                 $dir_op = $dir_op . "/" ;
                 }
               }
           $fp=fopen($dir.$file."/".zip_entry_name($zip_entry),"w+");
        chmod($dir.$file."/".zip_entry_name($zip_entry), 0777);
           fwrite($fp,$buf);

           fclose($fp);

           zip_entry_close($zip_entry);
       } else
           return false;
       }
       zip_close($zip);
     }
  } else
     return false;

  return true;
}

function browse($dir) {
global $filenames;
    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && is_file($dir.'/'.$file)) {
                $filenames[] = $dir.'/'.$file;
            }
            else if ($file != "." && $file != ".." && is_dir($dir.'/'.$file)) {
                browse($dir.'/'.$file);
            }
        }
        closedir($handle);
    }
    return $filenames;
}

function forceDownload($archiveName) {
$headerInfo = '';
 
if(ini_get('zlib.output_compression')) {
	ini_set('zlib.output_compression', 'Off');
}

// Security checks
if( $archiveName == "" ) {
	echo "<html><title>Public Photo Directory - Download </title><body><BR><B>ERROR:</B> The download file was NOT SPECIFIED.</body></html>";
	exit;
} 
elseif ( ! file_exists( $archiveName ) ) {
	echo "<html><title>Public Photo Directory - Download </title><body><BR><B>ERROR:</B> File not found.</body></html>";
	exit;
}

//header("Pragma: public");
//header("Expires: 0");
//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//header("Cache-Control: private",false);
header("Content-Type: application/zip");
header("Content-Disposition: attachment; filename=".basename($archiveName));
//header("Content-Transfer-Encoding: binary");
//header("Content-Length: ".filesize($archiveName));
readfile("$archiveName");

}
?>