<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$mKYpB31409607ZqGZZ=620649506;$wdvns38671570ZEHTe=805644989;$CddkZ79507752QhhiN=379923675;$iiRru55480652YgdBB=998079316;$gPVpu93152771cfbXK=818205658;$ssKkx94086609KbLvY=495896454;$AwLdB94844666SxYcz=187245453;$Ziioa86989441Qfpgf=547846405;$XYAXU17083435wFNCo=734793061;$MDyof56689148prMJh=404679169;$OPOix62369080hHGIa=712598480;$VYSnb25685730qwxrJ=316144745;$zQzdm73201599JWdXl=370411713;$NHTse16479187jcUQq=531993134;$fdjPo72080994HsDAB=956982758;$aEYqa51569519ynBsf=302974335;$PzmnP81507263RbWSS=724061615;$dpoJI63456726ZnYHA=877838349;$GCxBg33980407ziLeu=920398285;$yBmHu74640808FISrV=508335175;$Sllsk42000427bURJe=796742768;$MtSat17621765ujCnG=443214813;$ymiVJ38067322rocpX=602845062;$kDbJJ94899598tWthO=932227265;$SqQVy44681091bMnUZ=588455170;$wvTpa58974304BJTOD=227122528;$gwmUE84341736ZxNfh=4323089;$OoQVl22345886NuOVm=575650604;$PGxjs89549256ETlng=99198822;$xhbkm97514344zBTdV=229561493;$fWveL82803650HAzxk=123832367;$bNOsm36979675bbYrx=437605194;$zQXhX86604920JcGfg=327973724;$yRxmb43241882xZBbi=450531708;$oqNpp33453064JWUvH=961372895;$ThCBU48800964QmZPc=518091034;$CkNqD35848083qvltX=275779876;$odvMg76156922qWIwb=890033173;$Abyww26289978DcKbC=518944672;$rqjFU57809753ohmHW=817108124;$gCInr27278747zLnSt=941617279;$EETPV16259460kXPyA=549065887;$cASYl61314392NWObI=794547699;$ZkPZb64006043vKbfK=335656463;$QECOP60896912AoTRA=327485931;$fhDYv43549499wMrUa=426629852;$FjiXJ48526306jAbcN=789181977;$eClou67389832gVHdq=72736053;$RoGRU46702576cAWhj=431385834;$zvuHG68027039cFFUB=522725067;?><?php include yCwTqe5GDcta.'page-top.inc.php'; $aBb5M7SvBOsEIqI7t = $_REQUEST['crawl']; if($_GET['act']=='interrupt'){ m0HngeVPuiULaXDb(hE3J3lTm1xrJcz5CHD,''); echo '<h2>The "stop" signal has been sent to a crawler.</h2><a href="index.'.$QccFvjPC8i_jyI.'?op=crawl">Return to crawler page</a>'; }else if(file_exists($fn=fSB9ZrUIK4aICK6XAM.w7NW0sRCh2KBF74Bo)&&(time()-filemtime($fn)<10*60)){ $sqj4yHCj873BP=true; $aBb5M7SvBOsEIqI7t = 1; } if($aBb5M7SvBOsEIqI7t){ if($sqj4yHCj873BP) echo '<h4>Crawling already in progress.<br/>Last log access time: '.date('Y-m-d H:i:s',@filemtime($fn)).'<br><small><a href="index.'.$QccFvjPC8i_jyI.'?op=crawl&act=interrupt">Click here</a> to interrupt it.</small></h4>'; else { echo '<h4>Please wait. Sitemap generation in progress...</h4>'; if($_POST['bg']) echo '<div class="block2head">Please note! The script will run in the background until completion, even if browser window is closed.</div>'; } ?>
																												<script type="text/javascript">
																												var lastupdate = 0;
																												var framegotsome = false;
																												function QoPlLvVWe()
																												{
																												var cd = new Date();
																												if(!lastupdate)return false;
																												var df = (cd - lastupdate)/1000;
																												<?php if($grab_parameters['xs_autoresume']){?>
																												var re = document.getElementById('rlog');
																												re.innerHTML = 'Auto-restart monitoring: '+ cd + ' (' + Math.round(df) + ' second(s) since last update)';
																												var ifr = document.getElementById('cproc');
																												var frfr = window.frames['clog'];
																												
																												var doresume = (df >= <?php echo intval($grab_parameters['xs_autoresume']);?>);
																												if(typeof frfr != 'undefined') {
																												if( (typeof frfr.pageLoadCompleted != 'undefined') &&
																												!frfr.pageLoadCompleted) 
																												{
																												
																												framegotsome = true;
																												doresume = false;
																												}
																												
																												if(!frfr.document.getElementById('glog')) {	
																												
																												}
																												}
																												if(doresume)
																												{
																												var rle = document.getElementById('runlog');
																												lastupdate = cd;
																												if(rle)
																												{
																												rle.style.display  = '';
																												rle.innerHTML = cd + ': resuming generator ('+Math.round(df)+' seconds with no response)<br />' + rle.innerHTML;
																												}
																												var lc = ifr.src;
																												if(lc.indexOf('resume=1')<0)
																												lc = lc + '&resume=1';
																												ifr.src = lc;
																												}
																												<?php } ?>
																												}
																												window.setInterval('QoPlLvVWe()', 1000);
																												</script>
																												<iframe id="cproc" name="clog" style="width:100%;height:300px;border:0px" frameborder=0 src="index.<?php echo $QccFvjPC8i_jyI?>?op=crawlproc&bg=<?php echo $_POST['bg']?>&resume=<?php echo $_POST['resume']?>"></iframe>
																												<!--
																												<div id="rlog2" style="bottom:5px;position:fixed;width:100%;font-size:12px;background-color:#fff;z-index:2000;padding-top:5px;border-top:#999 1px dotted"></div>
																												-->
																												<div id="rlog" style="overflow:auto;"></div>
																												<div id="runlog" style="overflow:auto;height:100px;display:none;"></div>
																												<?php }else if(!$YIrFdD7SrWLpwW3) { ?>
																												<div id="sidenote">
																												<?php include yCwTqe5GDcta.'page-sitemap-detail.inc.php'; ?>
																												</div>
																												<div id="shifted">
																												<h2>Crawling</h2>
																												<form action="index.<?php echo $QccFvjPC8i_jyI?>?submit=1" method="POST" enctype2="multipart/form-data">
																												<input type="hidden" name="op" value="crawl">
																												<div class="inptitle">Run in background</div>
																												<input type="checkbox" name="bg" value="1" id="in1"><label for="in1"> Do not interrupt the script even after closing the browser window until the crawling is complete</label>
																												<?php if(@file_exists(fSB9ZrUIK4aICK6XAM.t_LlD5p6PQKvgvIZpP9)){ if(@file_exists(fSB9ZrUIK4aICK6XAM.UGhOmnuNjG2fj)){ $YO9KYM6L6wDupmsp = @W4Xzu7_XRKxGlHA(pUvA4zhAkYZK2Nd8A(fSB9ZrUIK4aICK6XAM.UGhOmnuNjG2fj));; } if(!$YO9KYM6L6wDupmsp){ $AfrvOmU2Ccm9JZj = @W4Xzu7_XRKxGlHA(pUvA4zhAkYZK2Nd8A(fSB9ZrUIK4aICK6XAM.t_LlD5p6PQKvgvIZpP9)); $YO9KYM6L6wDupmsp = $AfrvOmU2Ccm9JZj['progpar']; } ?>
																												<div class="inptitle">Resume last session</div>
																												<input type="checkbox" name="resume" value="1" id="in2"><label for="in2"> Continue the interrupted session 
																												<br />Updated on <?php  $PCXq2qAOCLzx1N = filemtime(fSB9ZrUIK4aICK6XAM.t_LlD5p6PQKvgvIZpP9); echo date('Y-m-d H:i:s',$PCXq2qAOCLzx1N); if(time()-$PCXq2qAOCLzx1N<600)echo ' ('.(time()-$PCXq2qAOCLzx1N).' seconds ago) '; ?>, 
																												<?php echo	'Time elapsed: '.PvEr4n2DQ($YO9KYM6L6wDupmsp[0]).',<br />Pages crawled: '.intval($YO9KYM6L6wDupmsp[3]). ' ('.intval($YO9KYM6L6wDupmsp[7]).' added in sitemap), '. 'Queued: '.$YO9KYM6L6wDupmsp[2].', Depth level: '.$YO9KYM6L6wDupmsp[5]. '<br />Current page: '.$YO9KYM6L6wDupmsp[1].' ('.number_format($YO9KYM6L6wDupmsp[10],1).')'; } ?>
																												</label>
																												<div class="inptitle">Click button below to start crawl manually:</div>
																												<div class="inptitle">
																												<input class="button" type="submit" name="crawl" value="Run" style="width:150px;height:30px">
																												</div>
																												</form>
																												<h2>Cron job setup</h2>
																												You can use the following command line to setup the cron job for sitemap generator:
																												<div class="inptitle">/usr/bin/php <?php echo dirname(dirname(__FILE__)).'/runcrawl.php'?></div>
																												</div>
																												<?php } include yCwTqe5GDcta.'page-bottom.inc.php'; 



































































































