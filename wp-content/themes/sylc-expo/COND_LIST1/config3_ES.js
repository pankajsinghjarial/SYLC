//var hide_empty_list=true; //uncomment this line to hide empty selection lists
var disable_empty_list=true; //uncomment this line to disable empty selection lists

var onclickaction="alert" //set to "alert" or "goto". Former is for debugging purposes, to tell you the value of the final selected list that will be used as the destination URL. Set to "goto" when below configuration is all set up as desired. 

var newwindow=0 //Open links in new window or not? 1=yes, 0=no.

/////DEFINE YOUR MENU LISTS and ITEMS below/////////////////

addListGroup("chainedmenu", "First-Select");

addOption("First-Select", "Seleccione una marca", "", 1); //HEADER OPTION


addList("First-Select", "Buick", "Recher_Nuevo.html", "Buick");
addList("First-Select", "Chevrolet", "Recher_Nuevo.html", "Chevrolet");
addList("First-Select", "Chrysler",  "Recher_Nuevo.html", "Chrysler");
addList("First-Select", "Dodge",  "Recher_Nuevo.html", "Dodge");
addList("First-Select", "Ford", "Recher_Nuevo.html", "Ford");
addList("First-Select", "Toyota", "Recher_Nuevo.html", "Toyota");

//FORD MUSTANG
addOption("Ford", "Seleccione el modelo", "", 1); //HEADER OPTION
addList("Ford", "GT", "Recher_News_GT_ES.html");
addList("Ford", "Mustang v6", "Recher_News_Mustangv6_ES.html");
addList("Ford", "Mustang GT", "Recher_News_Mustanggt_ES.html");
addList("Ford", "Shelby", "Recher_News_shelby_ES.html");
addList("Ford", "F-150", "Recher_News_F150_ES.html");//END OF THIS NODE


addOption("Buick", "Seleccione el modelo", "", 1); //HEADER OPTION
addList("Buick", "Enclave", "Recher_News_Buick_ES.html");


addOption("Chevrolet", "Seleccione el modelo", "", 1); //HEADER OPTION
addList("Chevrolet", "Avalanche", "Recher_News_Avalanche_ES.html");
addList("Chevrolet", "Camaro", "Recher_News_Camaro_ES.html");
addList("Chevrolet", "Corvette", "Recher_News_Corvette_ES.html");
addList("Chevrolet", "Tahoe", "Recher_News_Tahoe_ES.html");

addOption("Chrysler", "Seleccione el modelo", "", 1); //HEADER OPTION
addOption("Chrysler", "Town&Country", "Recher_News_TC_ES.html");

addOption("Dodge", "Seleccione el modelo", "", 1); //HEADER OPTION
addOption("Dodge", "Challenger", "Recher_News_Chal_ES.html");
addOption("Dodge", "Charger", "Recher_News_Char_ES.html");
addOption("Dodge", "Ram", "Recher_News_Ram_ES.html");

addOption("Toyota", "Seleccione el modelo", "", 1); //HEADER OPTION
addList("Toyota", "Tundra", "Recher_News_Tundra_ES.html"); 


a
