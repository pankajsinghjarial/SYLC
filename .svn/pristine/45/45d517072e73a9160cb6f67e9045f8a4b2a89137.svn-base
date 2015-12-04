<script type="text/javascript" src="/javascripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/javascripts/jquery.validator.js"></script>
<script type="text/javascript" src="/javascripts/droplet/jquery.droplet.js"></script>
<script type="text/javascript" src="/javascripts/core.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17736154-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script src="http://www.mypoints.com/d/js/ptrack_1_0.js"></script> 
<script type="text/javascript">
  MyPoints.setMPCookieName("MP_TRACK");
  MyPoints.setMPCookieExpHours("48");
  MyPoints.setVIDParamName("vid");
  MyPoints.landing();
</script>

<?php
function currentFile() {
   $break = Explode('/', $_SERVER["SCRIPT_NAME"]);
   $pfile = $break[count($break) - 1]; 
   return $pfile;
}
?>


<?php if(!(currentFile() == "thankyou.php")) : ?>
   
   <iframe src='http://pixel.fetchback.com/serve/fb/pdc?cat=&name=landing&sid=3238'
   scrolling='no' width='1' height='1' marginheight='0' marginwidth='0' frameborder='0'></iframe>
   
<?php else : ?>

   <iframe src='https://pixel.fetchback.com/serve/fb/pdc?cat=&name=success&sid=3238'
   scrolling='no' width='1' height='1' marginheight='0' marginwidth='0' frameborder='0'></iframe>

<?php endif; ?>