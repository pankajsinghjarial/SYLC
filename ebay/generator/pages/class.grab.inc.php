<?php // This file is protected by copyright law and provided under license. Reverse engineering of this file is strictly prohibited.




































































































$wrfMn12820739uRXkg=67004486;$zzYVW27817077nuvcL=650039032;$PkUbz87637635yMyEm=747231781;$NMYpE93844910DfNrB=15176483;$GUasy83001404ZLWAS=607966889;$imuQE46669617ezSsn=184196747;$YQKXV21412048INccY=897959809;$otcuH88791199vIfmW=407849823;$ziMxt15369567Leqbq=867960541;$hrJdv62709656ksYJs=935885712;$zHcrS87373963gpRjd=767719086;$LIdfD80924988OKMzp=20054412;$DUjoc79925232IYswH=846985443;$Kyvsi75937195MwLUf=907105927;$NMLBr15523376wYReY=356509613;$TPdOL70246277mQqJB=849790253;$ytrOr96668396OxQRy=545041596;$WUkRK86352234aviNz=97857391;$vpTEO75860291SjcDQ=663331391;$Dpchv56755066XwzRF=899057343;$kWmZt65599060FxWre=961128998;$PYywu93954773dEVGW=506140106;$KaeZT88384705HyyRM=689184418;$xiTtq40451355XjtAH=167855682;$pCQFv76717224qUxET=97247650;$petLz98744812ZzreH=133954071;$ZnuCA53096619GpIgr=434068695;$fTZyv21335144mliUF=654185272;$qgubu40022888dryMK=950397553;$qNoTn10722351qVEFy=979299286;$ATGOn59996033ZmqBH=896984223;$RmjzL89406433PAWAV=360046112;$OUsDo45516052KKIcv=523578705;$pzsLx99887391HkzqE=45175750;$PIwiv19082946tqjYw=79930999;$oALSD64665222njgEo=284438202;$oCuCE93196717kYwGH=814791107;$KkYwp96239930tlWLr=328583465;$aPZaJ20357360zJfkX=979909028;$yLhWH37111511AazKm=427361542;$QpWKg93064881FLgiO=825034760;$TEBTD89779969qVeAP=830522431;$ZPdhx63819275HLlFs=599918305;$xqCvR96745301DpFaC=788816132;$LvQja45120544mqabo=554309662;$Facag80507508WaXmc=551992645;$kOaXx59468689jZBax=937958832;$wFORl63566589xKRnv=369801971;$KIymH39363708hEgJh=2615814;$aYBsT68422547IQtRk=491994110;?><?php class SiteCrawler { var $U05VXyMC9XS_b = array(); function F8eE_Rqcrb(&$a, $VJrkoghoW, $hCqPL8RwlB, $NCzIEhBxs5f, $fjEvozDHHFDc3M3CP6e, $kD52SIPb2Kr_e = '') { global $grab_parameters; $i64kV7HwR5y = parse_url($fjEvozDHHFDc3M3CP6e); if($i64kV7HwR5y['scheme'] && substr($a, 0, 2) == '//') 
																														 $a = $i64kV7HwR5y['scheme'].':'.$a; $QmKaHsN_mnHEfYSpTEg = @parse_url($a); if($QmKaHsN_mnHEfYSpTEg['scheme'] && ($QmKaHsN_mnHEfYSpTEg['scheme']!='http')&& ($QmKaHsN_mnHEfYSpTEg['scheme']!='https')) { $O2Mt183Pc1Aha = 1; }else { $a = str_replace(':80/', '/', $a); if($a[0]=='?')$a = preg_replace('#^([^\?]*?)([^/\?]*?)(\?.*)?$#','$2',$VJrkoghoW).$a; if($grab_parameters['xs_inc_ajax'] && strstr($a,'#!')){ $NCzIEhBxs5f = preg_replace('#\#.*$#', '', $NCzIEhBxs5f); if($a[0] != '/' && !strstr($a,':/')) $a = $NCzIEhBxs5f . preg_replace('#^([^\#]*?/)?([^/\#]*)?(\#.*)?$#', '$2', $VJrkoghoW).$a; } if(preg_match('#^https?(:|&\#58;)#is',$a)){ if(preg_match('#://[^/]*$#is',$a)) 
																														 $a .= '/'; } else if($a&&$a[0]=='/')$a = $hCqPL8RwlB.$a; else $a = $NCzIEhBxs5f.$a; $a=str_replace('/./','/',$a); if(substr($a,-2) == '..')$a.='/'; if(strstr($a,'../')){ preg_match('#(.*?:.*?//.*?)(/.*)$#',$a,$aa); 
																														 do{ $ap = $aa[2]; $aa[2] = preg_replace('#/?[^/]*/\.\.#','',$ap,1); }while($aa[2]!=$ap); $a = $aa[1].$aa[2]; } $a = preg_replace('#/\./#','/',$a); $a = str_replace('&#38;','&',$a); $a = str_replace('&#038;','&',$a); $a = str_replace('&amp;','&',$a); $a = preg_replace('#\#'.($grab_parameters['xs_inc_ajax']?'[^\!]':'').'.*$#','',$a); $a = preg_replace('#^([^\?]*[^/\:]/)/+#','\\1',$a); $a = preg_replace('#[\r\n]+#s','',$a); $O2Mt183Pc1Aha = (strtolower(substr($a,0,strlen($fjEvozDHHFDc3M3CP6e)) ) != strtolower($fjEvozDHHFDc3M3CP6e)) ? 1 : 0; if($O2Mt183Pc1Aha && $kD52SIPb2Kr_e) { $JcUJ6noUPUWESUgG = $this->eufpjMrwNSVr($kD52SIPb2Kr_e); if($JcUJ6noUPUWESUgG && preg_match('#('.$JcUJ6noUPUWESUgG.')#', $a)) $O2Mt183Pc1Aha = 2; } } fTr9xtaaPTXU("<br/>($a - $O2Mt183Pc1Aha - $VJrkoghoW - $NCzIEhBxs5f - $hCqPL8RwlB)<br>\n",2); return $O2Mt183Pc1Aha; } function eufpjMrwNSVr($dX97bmcNDOSGUSPL){ if(!isset($U05VXyMC9XS_b[$dX97bmcNDOSGUSPL])){ $U05VXyMC9XS_b[$dX97bmcNDOSGUSPL] = trim($dX97bmcNDOSGUSPL) ? preg_replace("#\s*[\r\n]+\s*#",'|', (strstr($s=trim($dX97bmcNDOSGUSPL),'*')?$s:preg_quote($s,'#'))) : ''; } return $U05VXyMC9XS_b[$dX97bmcNDOSGUSPL]; } function AdSeH3KPw4($MY9uRPqbKXzuC,&$urls_completed) { global $grab_parameters,$J951dqGyd9Mj; error_reporting(E_ALL&~E_NOTICE); @set_time_limit($grab_parameters['xs_exec_time']); if($MY9uRPqbKXzuC['bgexec']) { ignore_user_abort(true); } register_shutdown_function('HuD2wJN0EuqGM6r'); if(function_exists('ini_set')) { @ini_set("zlib.output_compression", 0); @ini_set("output_buffering", 0); } $LG9QHtb6yK6qR5InZ = explode(" ",microtime()); $Xm5TKOzcDly01EH2 = $LG9QHtb6yK6qR5InZ[0]+$LG9QHtb6yK6qR5InZ[1]; $starttime = $euVHgD2C1lt = time(); $Zwf4bxMTE8xK8E = $nettime = 0; $q5ANtD3FURVI = $MY9uRPqbKXzuC['initurl']; $hoWmvn1cTy_GjGL = $MY9uRPqbKXzuC['maxpg']>0 ? $MY9uRPqbKXzuC['maxpg'] : 1E10; $CjkPFJQ1MJyQxogX = $MY9uRPqbKXzuC['maxdepth'] ? $MY9uRPqbKXzuC['maxdepth'] : -1; $nU8Mj5ZUWIEjvw = $MY9uRPqbKXzuC['progress_callback']; $ICDtF9k5qRIaFX = $this->eufpjMrwNSVr($grab_parameters['xs_excl_urls']); $PftdNZ9fEP0Z1yoaR = $this->eufpjMrwNSVr($grab_parameters['xs_incl_urls']); $ZxN8MjZW3uwPfqCTY = $U_QkBfcAHSK3Jphne = array(); $iFfOUCk1sFztqp = preg_split('#[\r\n]+#', $grab_parameters['xs_ind_attr']); $r2uxsHQ7o = '#200'.($grab_parameters['xs_allow_httpcode']?'|'.$grab_parameters['xs_allow_httpcode']:'').'#'; if($grab_parameters['xs_memsave']) { if(!file_exists(Jh02oPSmnHw)) mkdir(Jh02oPSmnHw, 0777); else if($MY9uRPqbKXzuC['resume']=='') G99nA35xjYQh(Jh02oPSmnHw, '.txt'); } foreach($iFfOUCk1sFztqp as $ia) if($ia) { $is = explode(',', $ia); if($is[0][0]=='$') $T9jmfo_y7aKsyLu0 = substr($is[0], 1); else $T9jmfo_y7aKsyLu0 = str_replace(array('\\^', '\\$'), array('^','$'), preg_quote($is[0],'#')); $U_QkBfcAHSK3Jphne[] = $T9jmfo_y7aKsyLu0; $ZxN8MjZW3uwPfqCTY[str_replace(array('^','$'),array('',''),$is[0])] =  array('lm' => $is[1], 'f' => $is[2], 'p' => $is[3]); } if($U_QkBfcAHSK3Jphne) $bEoirRlORmPAWbBHF = implode('|',$U_QkBfcAHSK3Jphne); $KCZQduSVvXZZGY28 = parse_url($q5ANtD3FURVI); if(!$KCZQduSVvXZZGY28['path']){$q5ANtD3FURVI.='/';$KCZQduSVvXZZGY28 = parse_url($q5ANtD3FURVI);} $H2Ce2a0HmFxl = $J951dqGyd9Mj->fetch($q5ANtD3FURVI,0,true);// the first request is to skip session id 
																														 $ZrV0VdSRuUd1C2bTbu = !preg_match($r2uxsHQ7o,$H2Ce2a0HmFxl['code']); if($ZrV0VdSRuUd1C2bTbu) { $ZrV0VdSRuUd1C2bTbu = ''; foreach($H2Ce2a0HmFxl['headers'] as $k=>$v) $ZrV0VdSRuUd1C2bTbu .= $k.': '.$v.'<br />'; return array( 'errmsg'=>'<b>There was an error while retrieving the URL specified:</b> '.$q5ANtD3FURVI.''. ($H2Ce2a0HmFxl['errormsg']?'<br><b>Error message:</b> '.$H2Ce2a0HmFxl['errormsg']:''). '<br><b>HTTP Code:</b><br>'.$H2Ce2a0HmFxl['protoline']. '<br><b>HTTP headers:</b><br>'.$ZrV0VdSRuUd1C2bTbu. '<br><b>HTTP output:</b><br>'.$H2Ce2a0HmFxl['content'] , ); } $q5ANtD3FURVI = $H2Ce2a0HmFxl['last_url']; $urls_completed = array(); $urls_ext = array(); $urls_404 = array(); $hCqPL8RwlB = $KCZQduSVvXZZGY28['scheme'].'://'.$KCZQduSVvXZZGY28['host'].((!$KCZQduSVvXZZGY28['port'] || ($KCZQduSVvXZZGY28['port']=='80'))?'':(':'.$KCZQduSVvXZZGY28['port'])); 
																														 $pn = $tsize = $retrno = $XIlk3ZqbSYG = $x1Nsplkpc2Kdk5W = 0; $fjEvozDHHFDc3M3CP6e = RT9GXtyabs__A($hCqPL8RwlB.'/', Hl4O6cWdjqldW6($KCZQduSVvXZZGY28['path'])); $Qv8G6NWw9S0ZcPxVV = parse_url($fjEvozDHHFDc3M3CP6e); $YWmYVMCd_Z1Jkw = preg_replace('#^.+://[^/]+#', '', $fjEvozDHHFDc3M3CP6e); 
																														 $LwRunzk9c_gIARHp = $J951dqGyd9Mj->fetch($q5ANtD3FURVI,0,true,true); $d1gUNMW50DG = str_replace($fjEvozDHHFDc3M3CP6e,'',$q5ANtD3FURVI); $urls_list_full = array($d1gUNMW50DG=>1); if(!$d1gUNMW50DG)$d1gUNMW50DG=''; $urls_list = array($d1gUNMW50DG=>1); $urls_list2 = $urls_list_skipped = array(); $foaeXizKT_CpOLBpUxK = array(); $links_level = 0; $rPpV2duBzldWXxW3Mr = $ref_links = $ref_links2 = array(); $UCLXWT4Aa = 0; $C4eNpUO4wlSz1ZekLcc = $hoWmvn1cTy_GjGL; if(!$grab_parameters['xs_progupdate'])$grab_parameters['xs_progupdate'] = 20; if(isset($grab_parameters['xs_robotstxt']) && $grab_parameters['xs_robotstxt']) { $rCRb02h4n8Q = $J951dqGyd9Mj->fetch($hCqPL8RwlB.'/robots.txt'); if($hCqPL8RwlB.'/' != $fjEvozDHHFDc3M3CP6e) { $VlDIpY74Sn = $J951dqGyd9Mj->fetch($fjEvozDHHFDc3M3CP6e.'robots.txt'); $rCRb02h4n8Q['content']  .= "\n".$VlDIpY74Sn['content']; } $ra=preg_split('#user-agent:\s*#im',$rCRb02h4n8Q['content']); $t7fVZsI8scAQ=array(); for($i=1;$i<count($ra);$i++){ preg_match('#^(\S+)(.*)$#s',$ra[$i],$NyaN_Hy_i); if($NyaN_Hy_i[1]=='*'||strstr($NyaN_Hy_i[1],'google')){ preg_match_all('#^disallow:\s*(\S*)#im',$NyaN_Hy_i[2],$rm); for($pi=0;$pi<count($rm[1]);$pi++) if($rm[1][$pi]) $t7fVZsI8scAQ[] =  str_replace('\\$','$', str_replace('\\*','.*', preg_quote($rm[1][$pi],'#') )); } } for($i=0;$i<count($t7fVZsI8scAQ);$i+=200) $k2mbaYG7Adhhp0nn[]=implode('|', array_slice($t7fVZsI8scAQ, $i,200)); }else $k2mbaYG7Adhhp0nn = array(); if($grab_parameters['xs_inc_ajax']) $grab_parameters['xs_proto_skip'] = str_replace( '\#', '\#[^\!]', $grab_parameters['xs_proto_skip']); $GemKMfObNXtkeAmJ = $grab_parameters['xs_exc_skip']!='\\.()'; $chfKQ2jb8QOC = $grab_parameters['xs_inc_skip']!='\\.()'; $grab_parameters['xs_inc_skip'] .= '$'; $grab_parameters['xs_exc_skip'] .= '$'; if($grab_parameters['xs_debug']) { $_GET['ddbg']=1; PvFdgEcx0laOpBsp(); } $dr1lN9apl = 0; $u0pk35zQbvIj4 = array(); $url_ind = 0; $cnu = 1; $pf = cVhR96lmkjBRF(fSB9ZrUIK4aICK6XAM.hE3J3lTm1xrJcz5CHD,'w');fclose($pf); $hf9XRbEeY5Kx6GFPKr = false; if($MY9uRPqbKXzuC['resume']!=''){ $AfrvOmU2Ccm9JZj = @W4Xzu7_XRKxGlHA(pUvA4zhAkYZK2Nd8A(fSB9ZrUIK4aICK6XAM.t_LlD5p6PQKvgvIZpP9)); if($AfrvOmU2Ccm9JZj) { $hf9XRbEeY5Kx6GFPKr = true; echo 'Resuming the last session (last updated: '.date('Y-m-d H:i:s',$AfrvOmU2Ccm9JZj['time']).')'."\n"; extract($AfrvOmU2Ccm9JZj); $Xm5TKOzcDly01EH2-=$ctime; $dr1lN9apl = $ctime; unset($AfrvOmU2Ccm9JZj); } } $UDWzqkbDps6LuIKb = 0; if(!$hf9XRbEeY5Kx6GFPKr){ if($grab_parameters['xs_moreurls']){ $mu = preg_split('#[\r\n]+#', $grab_parameters['xs_moreurls']); foreach($mu as $EzWAzoc3QpSqUg){ $EzWAzoc3QpSqUg = str_replace($fjEvozDHHFDc3M3CP6e, '', $EzWAzoc3QpSqUg); if(!strstr($EzWAzoc3QpSqUg, '://')) 
																														 $urls_list[$EzWAzoc3QpSqUg]++; } } if($grab_parameters['xs_prev_sm_base']){ global $IzwUzdzdmh6HP5om5Bi; $qyrBCAYqEMp = basename($grab_parameters['xs_smname']); $IzwUzdzdmh6HP5om5Bi->QxoEWBD1O1qswq3ii = ($grab_parameters['xs_compress']==1) ? '.gz' : ''; $LlGyBWOGj6 = $IzwUzdzdmh6HP5om5Bi->JAvBiMmjzH($qyrBCAYqEMp, 0, $fjEvozDHHFDc3M3CP6e); if(!$grab_parameters['xs_prev_sm_base_min'] ||  (count($LlGyBWOGj6)>$grab_parameters['xs_prev_sm_base_min'])) { $urls_list = array_merge($urls_list, $LlGyBWOGj6); } unset($LlGyBWOGj6); } $UDWzqkbDps6LuIKb = count($urls_list); $urls_list_full = $urls_list; $cnu = count($urls_list); } $ZmiKZZ6x4mdoNJaJt = explode('|', $grab_parameters['xs_force_inc']); sleep(1); @xnDpYg7WwA0(fSB9ZrUIK4aICK6XAM.hE3J3lTm1xrJcz5CHD); if($urls_list) do { list($VJrkoghoW, $CmZLfMuLMSEZIiTevcX) = each($urls_list); $uq8LJ8X9g0o = ($CmZLfMuLMSEZIiTevcX>0 && $CmZLfMuLMSEZIiTevcX<1) ? $CmZLfMuLMSEZIiTevcX : 0; $url_ind++; fTr9xtaaPTXU("\n[ $url_ind - $VJrkoghoW, $CmZLfMuLMSEZIiTevcX] \n"); unset($urls_list[$VJrkoghoW]); $BGKIqn_HME = fGokyqo8tR33zzFafi3($VJrkoghoW); $X_IPKKFKnD7KIHm1wu = false; $elNljYZlpLLDN = ''; $H2Ce2a0HmFxl = array(); $cn = ''; if(isset($foaeXizKT_CpOLBpUxK[$VJrkoghoW])) $VJrkoghoW=$foaeXizKT_CpOLBpUxK[$VJrkoghoW]; $f = $GemKMfObNXtkeAmJ && preg_match('#'.$grab_parameters['xs_exc_skip'].'#i',$VJrkoghoW); if($ICDtF9k5qRIaFX&&!$f)$f=$f||preg_match('#('.$ICDtF9k5qRIaFX.')#',$VJrkoghoW); if($k2mbaYG7Adhhp0nn&&!$f) foreach($k2mbaYG7Adhhp0nn as $bm) { $f = $f||preg_match('#^('.$bm.')#',$YWmYVMCd_Z1Jkw.$VJrkoghoW); } $f2 = false; if(!$f) { $f2 = $chfKQ2jb8QOC && preg_match('#'.$grab_parameters['xs_inc_skip'].'#i',$VJrkoghoW); if($PftdNZ9fEP0Z1yoaR&&!$f2) $f2 = $f2||(preg_match('#('.$PftdNZ9fEP0Z1yoaR.')#',$VJrkoghoW)); if($grab_parameters['xs_parse_only'] && !$f2 && $VJrkoghoW!='/') { $f2 = $f2 || !preg_match('#'.str_replace(' ', '|', preg_quote($grab_parameters['xs_parse_only'],'#')).'#',$VJrkoghoW); } } do{ $CMZfyKXzIg6kFN = count($urls_list)+count($urls_list2)+count($urls_completed);         $f3 = $ZmiKZZ6x4mdoNJaJt[2] && ( ($C4eNpUO4wlSz1ZekLcc*$ZmiKZZ6x4mdoNJaJt[2]+1000)< ($sWXwYhEBFg-$url_ind-$UDWzqkbDps6LuIKb)); if(!$f && !$f2) { $YPbrrsyP5iHhPWM9NQQ = ($ZmiKZZ6x4mdoNJaJt[1] &&  ( (($ctime>$ZmiKZZ6x4mdoNJaJt[0]) && ($pn>$hoWmvn1cTy_GjGL*$ZmiKZZ6x4mdoNJaJt[1])) || $f3));	 $UHng1R6Q0JJCH1rjl = ($ZmiKZZ6x4mdoNJaJt[3] && $hoWmvn1cTy_GjGL && (($CMZfyKXzIg6kFN>$hoWmvn1cTy_GjGL*$ZmiKZZ6x4mdoNJaJt[3]))); if($ZmiKZZ6x4mdoNJaJt[3] && $hoWmvn1cTy_GjGL && (($pn>$hoWmvn1cTy_GjGL*$ZmiKZZ6x4mdoNJaJt[3]))){ $urls_list=$urls_list2=array(); $cnu=0; } if($CjkPFJQ1MJyQxogX<=0 || $links_level<$CjkPFJQ1MJyQxogX) { $ShrtkcgbX = RT9GXtyabs__A($fjEvozDHHFDc3M3CP6e, $VJrkoghoW); fTr9xtaaPTXU("<h4> { $ShrtkcgbX } </h4>\n"); $dFOsOrGrftDYFF=0; $FHkOOpdqGU9J4Ak=array_sum(explode(' ', microtime())); $XIlk3ZqbSYG++; do { $H2Ce2a0HmFxl = $J951dqGyd9Mj->fetch($ShrtkcgbX, 0, 0); $_to = $H2Ce2a0HmFxl['flags']['socket_timeout']; if($_to && ($Qv8G6NWw9S0ZcPxVV['host']!=$H2Ce2a0HmFxl['purl']['host'])){ $H2Ce2a0HmFxl['flags']['error'] = 'Host doesn\'t match'; } $UIPYmw0UFeGY = (intval($H2Ce2a0HmFxl['code'] == 400)); $fMwzFU9kjTU = (intval($H2Ce2a0HmFxl['code'] == 403)); if( !$H2Ce2a0HmFxl['flags']['error'] &&  (($UIPYmw0UFeGY||$fMwzFU9kjTU)||!$H2Ce2a0HmFxl['code'] || $_to) ) { $dFOsOrGrftDYFF++; $sl = $grab_parameters['xs_delay_ms']?$grab_parameters['xs_delay_ms']:1; if(($_to) && $grab_parameters['xs_timeout_break']){ fTr9xtaaPTXU("<p> # TIMEOUT - $_to #</p>\n"); if($dFOsOrGrftDYFF==3){ if(strstr($_to,'read') ){ fTr9xtaaPTXU("<p> read200 break?</p>\n"); break ; } if($x1Nsplkpc2Kdk5W++>5) { $nipU07LHK6q = "Too many timeouts detected"; break 2; } fTr9xtaaPTXU("<p> # MULTI TIMEOUT - BREAK #</p>\n"); $sl = 60;	    			 $dFOsOrGrftDYFF = 0; } } fTr9xtaaPTXU("<p> # RETRY - ".$H2Ce2a0HmFxl['code']." - ".(intval($H2Ce2a0HmFxl['code']))." - ".$H2Ce2a0HmFxl['flags']['error']."#</p>\n"); sleep($_sl); } else  break; }while($dFOsOrGrftDYFF<3); $JxsQWbvuZdjq9Bnq = array_sum(explode(' ', microtime()))-$FHkOOpdqGU9J4Ak; $nettime+=$JxsQWbvuZdjq9Bnq; fTr9xtaaPTXU("<hr>\n[[[ ".$H2Ce2a0HmFxl['code']." ]]] - ".number_format($JxsQWbvuZdjq9Bnq,2)."s (".number_format($J951dqGyd9Mj->HtFBZd5BGx4HvWf,2).' + '.number_format($J951dqGyd9Mj->nZ2n3dJmP_TiQ,2).")\n".var_export($H2Ce2a0HmFxl['headers'],1)); $eX2N9ADyfLy6Jg9 = is_array($H2Ce2a0HmFxl['headers']) ? strtolower($H2Ce2a0HmFxl['headers']['content-type']) : ''; $JfRC0egNhxmTca = strstr($eX2N9ADyfLy6Jg9,'text/html') || strstr($eX2N9ADyfLy6Jg9,'/xhtml') || !$eX2N9ADyfLy6Jg9; if($eX2N9ADyfLy6Jg9 && !$JfRC0egNhxmTca && (!$grab_parameters['xs_parse_swf'] || !strstr($eX2N9ADyfLy6Jg9, 'shockwave-flash')) ){ if(!$YPbrrsyP5iHhPWM9NQQ){ $elNljYZlpLLDN = $eX2N9ADyfLy6Jg9; continue; } } $ZReTakA51rGrDby = array(); if($H2Ce2a0HmFxl['code']==404){ if($links_level>0) if(!$grab_parameters['xs_chlog_list_max'] || count($urls_404) < $grab_parameters['xs_chlog_list_max']) { $urls_404[]=array($VJrkoghoW,$ref_links2[$VJrkoghoW]); } } $cn = $H2Ce2a0HmFxl['content']; $tsize+=strlen($cn); if($grab_parameters['xs_canonical']) if(($ShrtkcgbX == $H2Ce2a0HmFxl['last_url']) && preg_match('#<link[^>]*rel="canonical"[^>]href="([^>]*?)"#is', $cn, $C8YeeJvXHpz7ff)){ $H2Ce2a0HmFxl['last_url'] = $C8YeeJvXHpz7ff[1]; } $VTQP1ue8oY1PvdK = preg_replace('#^.*?'.preg_quote($fjEvozDHHFDc3M3CP6e,'#').'#','',$H2Ce2a0HmFxl['last_url']); if(($ShrtkcgbX != $H2Ce2a0HmFxl['last_url']) && ($ShrtkcgbX != $H2Ce2a0HmFxl['last_url'].'/')) { $foaeXizKT_CpOLBpUxK[$VJrkoghoW]=$H2Ce2a0HmFxl['last_url']; $io=$VJrkoghoW; if(!$urls_list_full[$VTQP1ue8oY1PvdK]) { $urls_list2[$VTQP1ue8oY1PvdK]++; if(count($ref_links[$VTQP1ue8oY1PvdK])<max(1,intval($grab_parameters['xs_maxref']))) $ref_links[$VTQP1ue8oY1PvdK][] = $VJrkoghoW; } $elNljYZlpLLDN = 'lu'; if(!$YPbrrsyP5iHhPWM9NQQ)continue; } if($r2uxsHQ7o && !preg_match($r2uxsHQ7o,$H2Ce2a0HmFxl['code'])){ $elNljYZlpLLDN = $H2Ce2a0HmFxl['code']; continue; } $retrno++; if($PHpqjsuRpz25Ou = preg_replace('#<!--(\[if IE\]>|.*?-->)#is', '',$cn)) $cn = $PHpqjsuRpz25Ou; preg_match('#<base[^>]*?href=[\'"](.*?)[\'"]#is',$cn,$bm); if(isset($bm[1])&&$bm[1]) $NCzIEhBxs5f = Hl4O6cWdjqldW6($bm[1].(preg_match('#//.*/#',$bm[1])?'-':'/-')); 
																														 else $NCzIEhBxs5f = Hl4O6cWdjqldW6($fjEvozDHHFDc3M3CP6e.$VJrkoghoW); if($YPbrrsyP5iHhPWM9NQQ||$UHng1R6Q0JJCH1rjl) { $JfRC0egNhxmTca = false; } if(strstr($eX2N9ADyfLy6Jg9, 'shockwave-flash') && $grab_parameters['xs_parse_swf']) { include_once yCwTqe5GDcta.'class.pfile.inc.php'; $am = new SWFParser(); $am->h8i3gNivayoQQtqpLY($cn); $fDfweZzwnbqVpWJD9 = $am->D1tXUjHdde7g1(); }else if($JfRC0egNhxmTca) { $K4v1BKjLwk2MbkhbF = $grab_parameters['xs_utf8_enc'] ? 'isu':'is'; preg_match_all('#<(?:a|area|go)\s(?:[^>]*?\s)?href\s*=\s*(?:"([^"]*)|\'([^\']*)|([^\s\"\\\\>]+)).*?>#is'.$K4v1BKjLwk2MbkhbF, $cn, $am);
																														
																														
																														preg_match_all('#<i?frame\s[^>]*?src\s*=\s*["\']?(.*?)("|>|\')#is', $cn, $Am1CLOE5I);
																														
																														preg_match_all('#<meta\s[^>]*http-equiv\s*=\s*"?refresh[^>]*URL\s*=\s*["\']?(.*?)("|>|\'[>\s])#'.$K4v1BKjLwk2MbkhbF, $cn, $yQTjPXCGcUnHW);
																														
																														if($grab_parameters['xs_parse_swf'])
																														
																														preg_match_all('#<object[^>]*application/x-shockwave-flash[^>]*data\s*=\s*["\']([^"\'>]+).*?>#'.$K4v1BKjLwk2MbkhbF, $cn, $fDfweZzwnbqVpWJD9);
																														
																														else $fDfweZzwnbqVpWJD9 = array(array(),array());
																														
																														
																														$ZReTakA51rGrDby = array();
																														
																														for($i=0;$i<count($am[1]);$i++)
																														
																														{
																														
																														if( !preg_match('#rel=["\']nofollow#i', $am[0][$i]) ) 
																														
																														$ZReTakA51rGrDby[] = $am[1][$i];
																														
																														}
																														
																														$ZReTakA51rGrDby = @array_merge(
																														
																														$ZReTakA51rGrDby,
																														
																														
																														$am[2],$am[3],  
																														
																														$Am1CLOE5I[1],$yQTjPXCGcUnHW[1],
																														
																														$fDfweZzwnbqVpWJD9[1]);
																														
																														}
																														
																														$ZReTakA51rGrDby = array_unique($ZReTakA51rGrDby);
																														
																														
																														
																														$nn = $nt = 0;
																														
																														reset($ZReTakA51rGrDby);
																														
																														if(preg_match('#<meta name="robots" content="[^"]*?nofollow#is',$cn))
																														
																														$ZReTakA51rGrDby = array();
																														
																														if(!$u0pk35zQbvIj4['charset']){
																														
																														if(preg_match('#<meta\s+http-equiv="content-type"[^>]*?charset=([^">]*)"#is',$cn, $jmTPqK4UHmexxwYuYDf))
																														
																														$u0pk35zQbvIj4['charset'] = $jmTPqK4UHmexxwYuYDf[1];
																														
																														}
																														
																														foreach($ZReTakA51rGrDby as $i=>$ll)
																														
																														if($ll)
																														
																														{                    
																														
																														$a = $sa = trim($ll);
																														
																														
																														if($grab_parameters['xs_proto_skip'] && 
																														
																														(preg_match('#^'.$grab_parameters['xs_proto_skip'].'#i',$a)||
																														
																														($GemKMfObNXtkeAmJ && preg_match('#'.$grab_parameters['xs_exc_skip'].'#i',$a))||
																														
																														preg_match('#^'.$grab_parameters['xs_proto_skip'].'#i',function_exists('html_entity_decode')?html_entity_decode($a):$a)
																														
																														))
																														
																														continue;
																														
																														
																														if(strlen($a) > 2048) continue;
																														
																														$O2Mt183Pc1Aha = $this->F8eE_Rqcrb($a, $VJrkoghoW, $hCqPL8RwlB, $NCzIEhBxs5f, $fjEvozDHHFDc3M3CP6e);
																														
																														if($O2Mt183Pc1Aha == 1)
																														
																														{
																														
																														if($grab_parameters['xs_extlinks'] &&
																														
																														(!$grab_parameters['xs_extlinks_excl'] || !preg_match('#'.$this->eufpjMrwNSVr($grab_parameters['xs_extlinks_excl']).'#',$a)) &&
																														
																														(!$grab_parameters['xs_ext_max'] || (count($urls_ext)<$grab_parameters['xs_ext_max']))
																														
																														)
																														
																														{
																														
																														if(!$urls_ext[$a] && 
																														
																														(!$grab_parameters['xs_ext_skip'] || 
																														
																														!preg_match('#'.$grab_parameters['xs_ext_skip'].'#',$a)
																														
																														)
																														
																														)
																														
																														$urls_ext[$a] = $ShrtkcgbX;
																														
																														}
																														
																														continue;
																														
																														}
																														
																														$VTQP1ue8oY1PvdK = $O2Mt183Pc1Aha ? $a : substr($a,strlen($fjEvozDHHFDc3M3CP6e));
																														
																														$VTQP1ue8oY1PvdK = str_replace(' ', '%20', $VTQP1ue8oY1PvdK);
																														
																														if($grab_parameters['xs_cleanurls'])
																														
																														$VTQP1ue8oY1PvdK = @preg_replace($grab_parameters['xs_cleanurls'],'',$VTQP1ue8oY1PvdK);
																														
																														if($grab_parameters['xs_cleanpar'])
																														
																														{
																														
																														do {
																														
																														$Kl6oIfEwKD_U = $VTQP1ue8oY1PvdK;
																														
																														$VTQP1ue8oY1PvdK = @preg_replace('#[\\?\\&]('.$grab_parameters['xs_cleanpar'].')=[a-z0-9\-\.\_\=\/]+$#i','',$VTQP1ue8oY1PvdK);
																														
																														$VTQP1ue8oY1PvdK = @preg_replace('#([\\?\\&])('.$grab_parameters['xs_cleanpar'].')=[a-z0-9\-\.\_\=\/]+&#i','$1',$VTQP1ue8oY1PvdK);
																														
																														}while($VTQP1ue8oY1PvdK != $Kl6oIfEwKD_U);
																														
																														}
																														
																														if($urls_list_full[$VTQP1ue8oY1PvdK] || ($VTQP1ue8oY1PvdK == $VJrkoghoW))
																														
																														continue;
																														
																														if($grab_parameters['xs_exclude_check'])
																														
																														{
																														
																														$_f=$_f2=false;
																														
																														$_f=$ICDtF9k5qRIaFX&&preg_match('#('.$ICDtF9k5qRIaFX.')#',$VTQP1ue8oY1PvdK);
																														
																														if($k2mbaYG7Adhhp0nn&&!$_f)
																														
																														foreach($k2mbaYG7Adhhp0nn as $bm)
																														
																														$_f = $_f||preg_match('#^('.$bm.')#',$YWmYVMCd_Z1Jkw.$VTQP1ue8oY1PvdK);
																														
																														
																														
																														if($_f)continue;
																														
																														}
																														
																														fTr9xtaaPTXU("<u>[$VTQP1ue8oY1PvdK]</u><br>\n",3);//exit;
																														
																														$urls_list2[$VTQP1ue8oY1PvdK]++;
																														
																														if($grab_parameters['xs_maxref'] && count($ref_links[$VTQP1ue8oY1PvdK])<$grab_parameters['xs_maxref'])
																														
																														$ref_links[$VTQP1ue8oY1PvdK][] = $VJrkoghoW;
																														
																														$nt++;
																														
																														}
																														
																														unset($ZReTakA51rGrDby);
																														
																														}
																														
																														}
																														
																														
																														
																														if($grab_parameters['xs_incl_only'] && !$f)
																														
																														$f = $f || !preg_match('#'.str_replace(' ', '|', preg_quote($grab_parameters['xs_incl_only'],'#')).'#',$fjEvozDHHFDc3M3CP6e.$VJrkoghoW);
																														
																														if(!$f) {
																														
																														$f = $f||preg_match('#<meta name="robots" content="[^"]*?noindex#is',$cn);
																														
																														if($f)$elNljYZlpLLDN = 'mrob';
																														
																														}
																														
																														if(!$f)
																														
																														{
																														
																														$PoGqwMsoB = array(
																														
																														
																														'link'=>preg_replace('#//+$#','/', preg_replace('#^([^/\:\?]/)/+#','\\1',$fjEvozDHHFDc3M3CP6e.$VJrkoghoW))
																														
																														);
																														
																														if($grab_parameters['xs_makehtml']||$grab_parameters['xs_makeror']||$grab_parameters['xs_rssinfo'])
																														
																														{
																														
																														preg_match('#<title>([^<]*?)</title>#is', $H2Ce2a0HmFxl['content'], $pUrCgVuyLqY6_hjcC0);
																														
																														$PoGqwMsoB['t'] = strip_tags($pUrCgVuyLqY6_hjcC0[1]);
																														
																														}
																														
																														if($grab_parameters['xs_metadesc'])
																														
																														{
																														
																														preg_match('#<meta\s[^>]*(?:http-equiv|name)\s*=\s*"?description[^>]*content\s*=\s*["]?([^>\"]*)#is', $cn, $PQ88kZzO1uRFvk);
																														
																														if($PQ88kZzO1uRFvk[1])
																														
																														$PoGqwMsoB['d'] = $PQ88kZzO1uRFvk[1];
																														
																														}
																														
																														if($grab_parameters['xs_makeror']||$grab_parameters['xs_autopriority'])
																														
																														$PoGqwMsoB['o'] = max(0,$links_level);
																														
																														if($uq8LJ8X9g0o)
																														
																														$PoGqwMsoB['p'] = $uq8LJ8X9g0o;
																														
																														if(preg_match('#('.$bEoirRlORmPAWbBHF.')#',$fjEvozDHHFDc3M3CP6e.$VJrkoghoW,$kCPGNzrIjuQgkoxBRP))
																														
																														{
																														
																														$PoGqwMsoB['clm'] = $ZxN8MjZW3uwPfqCTY[$kCPGNzrIjuQgkoxBRP[1]]['lm'];
																														
																														$PoGqwMsoB['f'] = $ZxN8MjZW3uwPfqCTY[$kCPGNzrIjuQgkoxBRP[1]]['f'];
																														
																														$PoGqwMsoB['p'] = $ZxN8MjZW3uwPfqCTY[$kCPGNzrIjuQgkoxBRP[1]]['p'];
																														
																														}
																														
																														
																														
																														
																														
																														if($grab_parameters['xs_lastmod_notparsed'] && $f2)
																														
																														{
																														
																														$H2Ce2a0HmFxl = $J951dqGyd9Mj->fetch($ShrtkcgbX, 0, 1, false, "", array('req'=>'HEAD'));
																														
																														
																														}
																														
																														if(!$PoGqwMsoB['lm'] && isset($H2Ce2a0HmFxl['headers']['last-modified']))
																														
																														$PoGqwMsoB['lm']=$H2Ce2a0HmFxl['headers']['last-modified'];
																														
																														fTr9xtaaPTXU("\n((include ".$PoGqwMsoB['link']."))<br />\n");
																														
																														$X_IPKKFKnD7KIHm1wu = true;
																														
																														if($grab_parameters['xs_memsave'])
																														
																														{
																														
																														FRy4YMXr_PT($BGKIqn_HME, $PoGqwMsoB);
																														
																														$urls_completed[] = $BGKIqn_HME;
																														
																														}else
																														
																														$urls_completed[] = serialize($PoGqwMsoB);
																														
																														$C4eNpUO4wlSz1ZekLcc = $hoWmvn1cTy_GjGL - count($urls_completed);
																														
																														}
																														
																														}while(false);// zerowhile
																														
																														if($url_ind>=$cnu)
																														
																														{
																														
																														unset($urls_list);
																														
																														$url_ind = 0;
																														
																														$urls_list = $urls_list2;
																														
																														$urls_list_full = array_merge($urls_list_full,$urls_list);
																														
																														$cnu = count($urls_list);
																														
																														unset($ref_links2);
																														
																														$ref_links2 = $ref_links;
																														
																														unset($ref_links); unset($urls_list2);
																														
																														$ref_links = array();
																														
																														$urls_list2 = array();
																														
																														$links_level++;
																														
																														fTr9xtaaPTXU("\n<br>NEXT LEVEL:$links_level<br />\n");
																														
																														}
																														
																														if(!$X_IPKKFKnD7KIHm1wu){
																														
																														
																														fTr9xtaaPTXU("\n({skipped ".$VJrkoghoW."})<br />\n");
																														
																														if(!$grab_parameters['xs_chlog_list_max'] ||
																														
																														count($urls_list_skipped) < $grab_parameters['xs_chlog_list_max']) {
																														
																														$urls_list_skipped[$VJrkoghoW]=$elNljYZlpLLDN;
																														
																														}
																														
																														}
																														
																														$pn++;
																														
																														$LG9QHtb6yK6qR5InZ=explode(" ",microtime());
																														
																														$ctime = $LG9QHtb6yK6qR5InZ[0]+$LG9QHtb6yK6qR5InZ[1] - $Xm5TKOzcDly01EH2;
																														
																														W5mf7Y9Huk0KaQU6();
																														
																														$pl=min($cnu-$url_ind,$C4eNpUO4wlSz1ZekLcc);
																														
																														if( ($cnu==$url_ind || $pl==0||$pn==1 || ($pn%$grab_parameters['xs_progupdate'])==0)
																														
																														|| ($ctime - $urKftSsitV6UKM > 5)
																														
																														|| count($urls_completed)>=$hoWmvn1cTy_GjGL)
																														
																														{
																														
																														
																														$urKftSsitV6UKM = $tKVE8xlfmzSWy;
																														
																														if(strstr($LwRunzk9c_gIARHp['content'],'header'))break;
																														
																														global $m8;
																														
																														$mu = function_exists('memory_get_usage') ? memory_get_usage() : '-';
																														
																														$Zwf4bxMTE8xK8E = max($Zwf4bxMTE8xK8E, $mu);
																														
																														if($mu>$m8+1000000){
																														
																														$m8 = $mu;
																														
																														$cc = ' style="color:red"';
																														
																														}else $cc='';
																														
																														if(intval($mu))
																														
																														$mu = number_format($mu/1024,1).' Kb';
																														
																														fTr9xtaaPTXU("\n(<span".$cc.">memory".($cc?' up':'').": $mu</span>)<br>\n");
																														
																														$JidfgefUv4J = (count($urls_completed)>=$hoWmvn1cTy_GjGL) || ($url_ind>=$cnu);
																														
																														$progpar = array(
																														
																														$ctime, // 0. running time
																														
																														str_replace($q5ANtD3FURVI, '', $VJrkoghoW),  // 1. current URL
																														
																														$pl,                    // 2. urls left
																														
																														$pn,                    // 3. processed urls
																														
																														$tsize,                 // 4. bandwidth usage
																														
																														$links_level,           // 5. depth level
																														
																														$mu,                    // 6. memory usage
																														
																														count($urls_completed), // 7. added in sitemap
																														
																														count($urls_list2),     // 8. in the queue
																														
																														$nettime,	// 9. network time
																														
																														$JxsQWbvuZdjq9Bnq, // 10. last net time
																														
																														);
																														
																														if($MY9uRPqbKXzuC['bgexec']){
																														
																														if(time()-$rgUMQZOC8>5){
																														
																														$rgUMQZOC8 = time();
																														
																														m0HngeVPuiULaXDb(w7NW0sRCh2KBF74Bo,wJu5NxAjkFkQBpMse($progpar));
																														
																														}
																														
																														}
																														
																														if($nU8Mj5ZUWIEjvw && !$f)
																														
																														$nU8Mj5ZUWIEjvw($progpar);
																														
																														
																														}else
																														
																														{
																														
																														$nU8Mj5ZUWIEjvw(array('cmd'=>'ping', 'bg' => $MY9uRPqbKXzuC['bgexec']));
																														
																														}
																														
																														if(!$nipU07LHK6q) {
																														
																														if($nipU07LHK6q = file_exists($e1WQ3uEw36W8=fSB9ZrUIK4aICK6XAM.hE3J3lTm1xrJcz5CHD)){
																														
																														if(!@xnDpYg7WwA0($e1WQ3uEw36W8))
																														
																														$nipU07LHK6q=0;
																														
																														}
																														
																														}
																														
																														if($grab_parameters['xs_exec_time'] && 
																														
																														((time()-$euVHgD2C1lt) > $grab_parameters['xs_exec_time']) ){
																														
																														$nipU07LHK6q = 'Time limit exceeded - '.($grab_parameters['xs_exec_time']).' - '.(time()-$euVHgD2C1lt);
																														
																														}
																														
																														if($grab_parameters['xs_savestate_time']>0 &&
																														
																														( 
																														
																														($ctime-$dr1lN9apl>$grab_parameters['xs_savestate_time'])
																														
																														|| $JidfgefUv4J
																														
																														|| $nipU07LHK6q
																														
																														)
																														
																														)
																														
																														{
																														
																														$dr1lN9apl = $ctime;
																														
																														fTr9xtaaPTXU("(saving dump)<br />\n");
																														
																														$AfrvOmU2Ccm9JZj = compact('url_ind',
																														
																														'urls_list','urls_list2','cnu',
																														
																														'ref_links','ref_links2',
																														
																														'urls_list_full','urls_completed',
																														
																														'urls_404',
																														
																														'nt','tsize','pn','links_level','ctime', 'urls_ext',
																														
																														'starttime', 'retrno', 'nettime', 'urls_list_skipped',
																														
																														'imlist', 'progpar', 'runstate'
																														
																														);
																														
																														$AfrvOmU2Ccm9JZj['time']=time();
																														
																														$it9ClCc0l=wJu5NxAjkFkQBpMse($AfrvOmU2Ccm9JZj);
																														
																														m0HngeVPuiULaXDb(t_LlD5p6PQKvgvIZpP9,$it9ClCc0l);
																														
																														unset($AfrvOmU2Ccm9JZj);
																														
																														unset($it9ClCc0l);
																														
																														}
																														
																														if($grab_parameters['xs_delay_req'] && $grab_parameters['xs_delay_ms'] &&
																														
																														(($XIlk3ZqbSYG%$grab_parameters['xs_delay_req'])==0))
																														
																														{
																														
																														sleep($grab_parameters['xs_delay_ms']);
																														
																														}
																														
																														}while(!$JidfgefUv4J && !$nipU07LHK6q);
																														
																														fTr9xtaaPTXU("\n\n<br><br>Crawling completed<br>\n");
																														
																														if($_GET['ddbgexit'])exit;
																														
																														return array(
																														
																														'u404'=>$urls_404,
																														
																														'starttime'=>$starttime,
																														
																														'topmu' => $Zwf4bxMTE8xK8E,
																														
																														'ctime'=>$ctime,
																														
																														'tsize'=>$tsize,
																														
																														'retrno' => $retrno,
																														
																														'nettime' => $nettime,
																														
																														'errmsg'=>'',
																														
																														'initurl'=>$q5ANtD3FURVI,
																														
																														'initdir'=>$fjEvozDHHFDc3M3CP6e,
																														
																														'ucount'=>count($urls_completed),
																														
																														'crcount'=>$pn,
																														
																														'time'=>time(),
																														
																														'params'=>$MY9uRPqbKXzuC,
																														
																														'interrupt'=>$nipU07LHK6q,
																														
																														'runstate' => $u0pk35zQbvIj4,
																														
																														'urls_ext'=>$urls_ext,
																														
																														'urls_list_skipped' => $urls_list_skipped,
																														
																														'max_reached' => count($urls_completed)>=$hoWmvn1cTy_GjGL
																														
																														);
																														
																														}
																														
																														}
																														
																														$ndwxwUINtLIx81E = new SiteCrawler();
																														
																														function HuD2wJN0EuqGM6r(){
																														
																														@xnDpYg7WwA0(fSB9ZrUIK4aICK6XAM.UGhOmnuNjG2fj);
																														
																														if(@file_exists(fSB9ZrUIK4aICK6XAM.w7NW0sRCh2KBF74Bo))
																														
																														@rename(fSB9ZrUIK4aICK6XAM.w7NW0sRCh2KBF74Bo,fSB9ZrUIK4aICK6XAM.UGhOmnuNjG2fj);
																														
																														}
																														
																														



































































































