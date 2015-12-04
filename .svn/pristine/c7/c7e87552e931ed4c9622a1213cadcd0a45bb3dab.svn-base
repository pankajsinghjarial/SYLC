<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$CgpXF43167724AdiIC=893356263;$IVFjE18569336QvENm=556901062;$ZXKKj28248291OWXhf=554096252;$QXtxs97517090Mordm=916160584;$BgRGP26688232IsmxJ=175812805;$yHfXK21074218fTtdp=362271667;$xPBfa60987549rNkdm=8255920;$LGPMM81740723IMSlF=143984314;$baoQW63646240oLdhF=301175598;$WlQCz32016601fYThY=511048523;$zRcLb57164307pHenX=305321838;$AhqCi74401856mPTLS=714214295;$cENta64041748xcUle=270444641;$VkvhQ51396484QnrFJ=4231628;$DEtBQ16778564wXdKW=446294006;$MdepJ75500489TkfGR=628850525;$ADqQi27874756snzhE=83619934;$fStBy79213867BpQCT=839820984;$JUNeW29830322Tzrrz=431172424;$tMDFD85036621ZTNbw=886893006;$HlhGX45145264qZUxh=739701477;$UwnMo25468750YKCIo=20816589;$uFtNQ96319581Algmv=259957092;$ojfHz13010253xDUKk=489341736;$uOKXU25853271xYdUp=240689270;$VSEzP70161133myfBb=544218445;$MecHn36246338AaNwK=931648011;$ltmrz39421387uZjTu=435196716;$NkcSd59998779mLmBd=584583313;$ljayP33291015TaIZn=412026550;$dcNxx29610595RZuIk=448245178;$lWcKA74270020tGDeJ=724457947;$gZdIN57581787duuaP=772383606;$bkZpo94858399XvNzl=623240906;$yAJAf76412354MKJaV=807748596;$pReKD27556152hWzyt=358125427;$rUbgY18602295AXjZh=804090149;$OFuTt74863281vahnI=178861511;$zxKoo86651612iCSoZ=12158264;$upxej79279785OuXJi=335199158;$dbFHl33060302uqDmr=679702942;$SNtam63305664puQoD=77888366;$ywVdM60328369qbxre=59474182;$wcnJu49440918hRzMC=655679138;$wxatG10955810ynApt=399221985;$MJGbz60185547oKJbL=320321472;$dGadF87442627Ysvrc=949696351;$CjhHm28039550yASDc=320565368;$kcihd42288818FgzNd=961647278;$yypXK65502930apVsf=906160828;?><?php include yCwTqe5GDcta.'page-top.inc.php'; $DOEjLOF5SKtUYVQEkD = HNUV_wZE_(); if($grab_parameters['xs_chlogorder'] == 'desc') rsort($DOEjLOF5SKtUYVQEkD); $F9VsKsac910=$_GET['log']; if($F9VsKsac910){ ?>
																											<div id="sidenote">
																											<div class="block1head">
																											Crawler logs
																											</div>
																											<div class="block1">
																											<?php for($i=0;$i<count($DOEjLOF5SKtUYVQEkD);$i++){ $els6pG4dU2RM20k = @unserialize(pUvA4zhAkYZK2Nd8A(fSB9ZrUIK4aICK6XAM.$DOEjLOF5SKtUYVQEkD[$i])); if($i+1==$F9VsKsac910)echo '<u>'; ?>
																											<a href="index.<?php echo $QccFvjPC8i_jyI?>?op=chlog&log=<?php echo $i+1?>" title="View details"><?php echo date('Y-m-d H:i',$els6pG4dU2RM20k['time'])?></a>
																											( +<?php echo count($els6pG4dU2RM20k['newurls'])?> -<?php echo count($els6pG4dU2RM20k['losturls'])?>)
																											</u>
																											<br>
																											<?php	} ?>
																											</div>
																											</div>
																											<?php } ?>
																											<div<?php if($F9VsKsac910) echo ' id="shifted"';?> >
																											<h2>ChangeLog</h2>
																											<?php if($F9VsKsac910){ $els6pG4dU2RM20k = @unserialize(pUvA4zhAkYZK2Nd8A(fSB9ZrUIK4aICK6XAM.$DOEjLOF5SKtUYVQEkD[$F9VsKsac910-1])); ?><h4><?php echo date('j F Y, H:i',$els6pG4dU2RM20k['time'])?></h4>
																											<div class="inptitle">New URLs (<?php echo count($els6pG4dU2RM20k['newurls'])?>)</div>
																											<textarea style="width:100%;height:300px"><?php echo @htmlspecialchars(implode("\n",$els6pG4dU2RM20k['newurls']))?></textarea>
																											<div class="inptitle">Removed URLs (<?php echo count($els6pG4dU2RM20k['losturls'])?>)</div>
																											<textarea style="width:100%;height:300px"><?php echo @htmlspecialchars(implode("\n",$els6pG4dU2RM20k['losturls']))?></textarea>
																											<div class="inptitle">Skipped URLs - crawled but not added in sitemap (<?php echo count($els6pG4dU2RM20k['urls_list_skipped'])?>)</div>
																											<textarea style="width:100%;height:300px"><?php foreach($els6pG4dU2RM20k['urls_list_skipped'] as $k=>$v)echo @htmlspecialchars($k.' - '.$v)."\n";?></textarea>
																											<?php	 }else{ ?>
																											<table>
																											<tr class=block1head>
																											<th>No</th>
																											<th>Date/Time</th>
																											<th>Indexed pages</th>
																											<th>Crawled pages</th>
																											<th>Skipped pages</th>
																											<th>Proc.time</th>
																											<th>Bandwidth</th>
																											<th>New URLs</th>
																											<th>Removed URLs</th>
																											<th>Broken links</th>
																											<?php if($grab_parameters['xs_imginfo'])echo '<th>Images</th>';?>
																											<?php if($grab_parameters['xs_videoinfo'])echo '<th>Videos</th>';?>
																											<?php if($grab_parameters['xs_newsinfo'])echo '<th>News</th>';?>
																											<?php if($grab_parameters['xs_rssinfo'])echo '<th>RSS</th>';?>
																											</tr>
																											<?php  $E09KaZe4IW=array(); for($i=0;$i<count($DOEjLOF5SKtUYVQEkD);$i++){ $els6pG4dU2RM20k = @unserialize(pUvA4zhAkYZK2Nd8A(fSB9ZrUIK4aICK6XAM.$DOEjLOF5SKtUYVQEkD[$i])); if(!$els6pG4dU2RM20k)continue; foreach($els6pG4dU2RM20k as $k=>$v)if(!is_array($v))$E09KaZe4IW[$k]+=$v;else $E09KaZe4IW[$k]+=count($v); ?>
																											<tr class=block1>
																											<td><?php echo $i+1?></td>
																											<td><a href="index.php?op=chlog&log=<?php echo $i+1?>" title="View details"><?php echo date('Y-m-d H:i',$els6pG4dU2RM20k['time'])?></a></td>
																											<td><?php echo number_format($els6pG4dU2RM20k['ucount'])?></td>
																											<td><?php echo number_format($els6pG4dU2RM20k['crcount'])?></td>
																											<td><?php echo count($els6pG4dU2RM20k['urls_list_skipped'])?></td>
																											<td><?php echo number_format($els6pG4dU2RM20k['ctime'],2)?>s</td>
																											<td><?php echo number_format($els6pG4dU2RM20k['tsize']/1024/1024,2)?></td>
																											<td><?php echo count($els6pG4dU2RM20k['newurls'])?></td>
																											<td><?php echo count($els6pG4dU2RM20k['losturls'])?></td>
																											<td><?php echo count($els6pG4dU2RM20k['u404'])?></td>
																											<?php if($grab_parameters['xs_imginfo'])echo '<td>'.$els6pG4dU2RM20k['images_no'].'</td>';?>
																											<?php if($grab_parameters['xs_videoinfo'])echo '<td>'.$els6pG4dU2RM20k['videos_no'].'</td>';?>
																											<?php if($grab_parameters['xs_newsinfo'])echo '<td>'.$els6pG4dU2RM20k['news_no'].'</td>';?>
																											<?php if($grab_parameters['xs_rssinfo'])echo '<td>'.$els6pG4dU2RM20k['rss_no'].'</td>';?>
																											</tr>
																											<?php }?>
																											<tr class=block1>
																											<th colspan=2>Total</th>
																											<th><?php echo number_format($E09KaZe4IW['ucount'])?></th>
																											<th><?php echo number_format($E09KaZe4IW['crcount'])?></th>
																											<th><?php echo number_format($E09KaZe4IW['ctime'],2)?>s</th>
																											<th><?php echo number_format($E09KaZe4IW['tsize']/1024/1024,2)?> Mb</th>
																											<th><?php echo ($E09KaZe4IW['newurls'])?></th>
																											<th><?php echo ($E09KaZe4IW['losturls'])?></th>
																											<th>-</th>
																											</tr>
																											</table>
																											<?php } ?>
																											</div>
																											<?php include yCwTqe5GDcta.'page-bottom.inc.php'; 



































































































