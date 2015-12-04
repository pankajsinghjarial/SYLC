//var hide_empty_list=true; //uncomment this line to hide empty selection lists
var disable_empty_list=true; //uncomment this line to disable empty selection lists

var onclickaction="alert" //set to "alert" or "goto". Former is for debugging purposes, to tell you the value of the final selected list that will be used as the destination URL. Set to "goto" when below configuration is all set up as desired. 

var newwindow=0 //Open links in new window or not? 1=yes, 0=no.

/////DEFINE YOUR MENU LISTS and ITEMS below/////////////////

addListGroup("chainedmenu", "First-Select");

addOption("First-Select", "Type de voiture", "", 1); //HEADER OPTION
addList("First-Select", "Voitures occasions", "Voitures occasions", "Voitures occasions");
addList("First-Select", "Classic Cars", "Classic Cars", "Classic Cars");




//ASTON MARTIN
addOption("Voitures occasions", "Quel un site ?", "", 1); //HEADER OPTION
addList("Voitures occasions", "Autotrader", "Autotrader", "Autotrader");
addList("Voitures occasions", "Cars.com", "Cars.com", "Cars.com");
addList("Voitures occasions", "Ebay Motors", "Ebay Motors", "Ebay Motors");
addList("Voitures occasions", "AOL Autos", "AOL Autos", "AOL Autos");
addList("Voitures occasions", "EveryCarlisted", "EveryCarlisted", "EveryCarlisted");


//ASTON MARTIN
addOption("Classic Cars", "Quel un site ?", "", 1); //HEADER OPTION
addList("Classic Cars", "AutaBuy", "AutaBuy", "AutaBuy");
addList("Classic Cars", "Autotrader Classics", "Autotrader Classics", "Autotrader Classics");
addList("Classic Cars", "Florida Muscle Cars", "Florida Muscle Cars", "Florida Muscle Cars");
addList("Classic Cars", "Deels on Wheels", "Deels on Wheels", "Deels on Wheels");
addList("Classic Cars", "Fraser Dante", "Fraser Dante", "Fraser Dante");