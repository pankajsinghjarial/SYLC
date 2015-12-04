/*
Author: Robert Hashemian
http://www.hashemian.com/

You can use this code in any manner so long as the author's
name, Web address and this disclaimer is kept intact.
********************************************************
Usage Sample:

<script language="JavaScript">
TargetDate = "12/31/2020 5:00 AM";
BackColor = "palegreen";
ForeColor = "navy";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
FinishMessage = "It is finally here!";
</script>
*/

function calcage(secs, num1, num2) {
  s = ((Math.floor(secs/num1))%num2).toString();
  if (LeadingZero && s.length < 2)
    s = "0" + s;
  return "<b>" + s + "</b>";
}

function CountBack(secs) {
    var v = calcage(secs,86400,100000);
    if(v<0)v=0;
    document.getElementById("cntdwnday").innerHTML = v;
    v = calcage(secs,3600,24);
    if(v<0)v=0;
    document.getElementById("cntdwnhour").innerHTML = v;
    v = calcage(secs,60,60);
    if(v<0)v=0;
    document.getElementById("cntdwnmin").innerHTML = v;
    v = calcage(secs,1,60);
    if(v<0)v=0;
    document.getElementById("cntdwnsec").innerHTML = v;
    var to = secs+CountStepper;
    if(to<0){
        to=0;
        document.getElementById("banner_text").innerHTML = "LES VENTES FLASH sont terminer, s'il vous plaît revenir la prochaine fois";
        jQuery('#banner').removeClass('boutique-box3');
        jQuery('#banner').addClass('boutique-box4');
        //jQuery('#banner').attrRemove('style');
        CountActive = false;
        jQuery("#banner").unbind('click');
    }
    if (CountActive) setTimeout("CountBack(" + (to) + ")", SetTimeOutPeriod);
}

if (typeof(BackColor)=="undefined")
  BackColor = "white";
if (typeof(ForeColor)=="undefined")
  ForeColor= "black";
if (typeof(TargetDate)=="undefined")
  TargetDate = "12/31/2020 5:00 AM";
if (typeof(DisplayFormat)=="undefined")
  DisplayFormat = "%%D%% %%H%% %%M%% %%S%%";
if (typeof(CountActive)=="undefined")
  CountActive = true;
if (typeof(FinishMessage)=="undefined")
  FinishMessage = "";
if (typeof(CountStepper)!="number")
  CountStepper = -1;
if (typeof(LeadingZero)=="undefined")
  LeadingZero = true;


CountStepper = Math.ceil(CountStepper);
if (CountStepper == 0)
  CountActive = false;
var SetTimeOutPeriod = (Math.abs(CountStepper)-1)*1000 + 990;
//putspan(BackColor, ForeColor);
var dthen = new Date(TargetDate);
var dnow = new Date();
if(CountStepper>0)
  ddiff = new Date(dnow-dthen);
else
  ddiff = new Date(dthen-dnow);
if(ddiff<0)ddiff=0;
gsecs = Math.floor(ddiff.valueOf()/1000);
CountBack(gsecs);