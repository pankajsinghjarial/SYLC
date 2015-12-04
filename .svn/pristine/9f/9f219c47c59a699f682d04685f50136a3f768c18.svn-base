<? $file = '/home/sylcexpo/public_html/voitures-americaines/gallery/'.$_GET['file'];
header("Content-type: application/force-download");
header("Content-Transfer-Encoding: Binary");
header("Content-length: ".filesize($file));
header("Content-disposition: attachment; filename=\"".$_GET['file']."\"");
readfile($file);
exit;
