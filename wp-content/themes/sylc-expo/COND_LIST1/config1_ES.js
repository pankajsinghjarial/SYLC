//var hide_empty_list=true; //uncomment this line to hide empty selection lists
var disable_empty_list=true; //uncomment this line to disable empty selection lists

var onclickaction="alert" //set to "alert" or "goto". Former is for debugging purposes, to tell you the value of the final selected list that will be used as the destination URL. Set to "goto" when below configuration is all set up as desired. 

var newwindow=0 //Open links in new window or not? 1=yes, 0=no.

/////DEFINE YOUR MENU LISTS and ITEMS below/////////////////

addListGroup("chainedmenu", "First-Select");

addOption("First-Select", "Seleccione una marca", "", 1); //HEADER OPTION
addList("First-Select", "Aston Martin", "Aston Martin", "Aston Martin");
addList("First-Select", "Bentley", "Bentley", "Bentley");
addList("First-Select", "Buick", "Buick", "Buick");
addList("First-Select", "Cadillac", "Cadillac", "Cadillac");
addList("First-Select", "Chevrolet", "Chevrolet", "Chevrolet");
addList("First-Select", "Dodge", "Dodge", "Dodge");
addList("First-Select", "Ford", "Ford", "Ford");
addList("First-Select", "GMC", "GMC", "GMC");
addList("First-Select", "HUMMER", "HUMMER", "HUMMER");
addList("First-Select", "Jaguar", "Jaguar", "Jaguar");
addList("First-Select", "Lincoln", "Lincoln", "Lincoln");
addList("First-Select", "Lotus", "Lotus", "Lotus");
addList("First-Select", "Nissan", "Nissan", "Nissan");
addList("First-Select", "Pontiac", "Pontiac", "Pontiac");
addList("First-Select", "Porsche", "Porsche", "Porsche");
addList("First-Select", "Rolls Royce", "Rolls Royce", "Rolls Royce");
addList("First-Select", "Toyota", "Toyota", "Toyota");

//FORD MUSTANG
addOption("Ford", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Ford", "Mustang V6", "Mustang V6", "Ford-stang V6");
addList("Ford", "Mustang V6 cab", "Mustang V6 cab", "Ford-stang V6 cab");
addList("Ford", "Mustang GT", "Mustang GT", "Ford-stang GT");
addList("Ford", "Mustang GT cab", "Mustang GT cab", "Ford-stang GT cab"); //END OF THIS NODE


addOption("Ford-stang V6", "Seleccione", "", 1); //HEADER OPTION
addList("Ford-stang V6", "Compra inmediata", "Compra inmediata");
addList("Ford-stang V6", "Compra 6 meses", "Compra 6 meses");
addList("Ford-stang V6", "Compra 1 año", "Compra 1 año");

addOption("Ford-stang V6 cab", "Seleccione", "", 1); //HEADER OPTION
addList("Ford-stang V6 cab", "Compra inmediata", "Compra inmediata");
addList("Ford-stang V6 cab", "Compra 6 meses", "Compra 6 meses");
addList("Ford-stang V6 cab","Compra 1 año", "Compra 1 año");

addOption("Ford-stang GT", "Seleccione","", 1); //HEADER OPTION
addOption("Ford-stang GT", "Compra inmediata", "Compra inmediata");
addOption("Ford-stang GT", "Compra 6 meses", "Compra 6 meses");
addOption("Ford-stang GT", "Compra 1 año", "Compra 1 año");

addOption("Ford-stang GT cab","Seleccione", "", 1); //HEADER OPTION
addOption("Ford-stang GT cab","Compra inmediata", "Compra inmediata");
addOption("Ford-stang GT cab", "Compra 6 meses", "Compra 6 meses");
addOption("Ford-stang GT cab", "Compra 1 año", "Compra 1 año");




//ASTON MARTIN
addOption("Aston Martin", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Aston Martin", "DB7", "DB7", "Aston Martin-DB7");
addList("Aston Martin", "DB7 Volante", "DB7 Volante", "Aston Martin-DB7 Volante");
addList("Aston Martin", "DB9", "DB9", "Aston Martin-DB9");
addList("Aston Martin", "DB9 Volante", "DB9 Volante", "Aston Martin-DB9 Volante");
addList("Aston Martin", "Vintage", "Vintage", "Aston Martin-Vintage");
addList("Ford", "Ver comentarios", "Ver comentarios", "zz");

addOption("Aston Martin-DB7", "Seleccione", "", 1); //HEADER OPTION
addOption("Aston Martin-DB7", "Compra inmediata", "Compra inmediata");
addOption("Aston Martin-DB7",  "Compra 6 meses", "Compra 6 meses");
addOption("Aston Martin-DB7", "Compra 1 año", "Compra 1 año");

addOption("Aston Martin-DB7 Volante", "Seleccione", "", 1); //HEADER OPTION
addOption("Aston Martin-DB7 Volante", "Compra inmediata", "Compra inmediata");
addOption("Aston Martin-DB7 Volante", "Compra 6 meses", "Compra 6 meses");
addOption("Aston Martin-DB7 Volante", "Compra 1 año", "Compra 1 año");

addOption("Aston Martin-DB9", "Seleccione","", 1); //HEADER OPTION
addOption("Aston Martin-DB9", "Compra inmediata", "Compra inmediata");
addOption("Aston Martin-DB9", "Compra 6 meses", "Compra 6 meses");
addOption("Aston Martin-DB9", "Compra 1 año", "Compra 1 año");

addOption("Aston Martin-DB9 Volante", "Seleccione", "", 1); //HEADER OPTION
addOption("Aston Martin-DB9 Volante", "Compra inmediata", "Compra inmediata");
addOption("Aston Martin-DB9 Volante", "Compra 6 meses", "Compra 6 meses");
addOption("Aston Martin-DB9 Volante", "Compra 1 año", "Compra 1 año");

addOption("Aston Martin-Vintage","Seleccione", "", 1); //HEADER OPTION
addOption("Aston Martin-Vintage", "Compra inmediata", "Compra inmediata");
addOption("Aston Martin-Vintage", "Compra 6 meses", "Compra 6 meses");
addOption("Aston Martin-Vintage", "Compra 1 año", "Compra 1 año");


addOption("zz", "Seleccione", "", 1); //HEADER OPTION
addOption("zz", "Compra inmediata", "Compra inmediata");
addOption("zz", "Compra 6 meses", "Compra 6 meses");
addOption("zz", "Compra 1 año", "Compra 1 año");


//BENTLEY
addOption("Bentley", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Bentley", "Continental GT", "Continental GT", "Cont-GT");
addList("Bentley", "Continental GT speed", "Continental GT spped", "Cont-GT S");
addList("Bentley", "Continental GTC", "Continental GTC", "Cont-GTC");
addList("Bentley", "Continental GTC speed", "Continental GTC speed", "Cont-GTC S"); //END OF THIS NODE
addList("Bentley", "Ver comentarios", "Ver comentarios", "11");

addOption("Cont-GT", "Seleccione", "", 1); //HEADER OPTION
addOption("Cont-GT", "Compra inmediata", "Compra inmediata");
addOption("Cont-GT", "Compra 6 meses", "Compra 6 meses");
addOption("Cont-GT", "Compra 1 año", "Compra 1 año");


addOption("Cont-GT S", "Seleccione", "", 1); //HEADER OPTION
addOption("Cont-GT S", "Compra inmediata", "Compra inmediata");
addOption("Cont-GT S", "Compra 6 meses", "Compra 6 meses");
addOption("Cont-GT S", "Compra 1 año", "Compra 1 año");


addOption("Cont-GTC", "Seleccione", "", 1); //HEADER OPTION
addOption("Cont-GTC", "Compra inmediata", "Compra inmediata");
addOption("Cont-GTC", "Compra 6 meses", "Compra 6 meses");
addOption("Cont-GTC", "Compra 1 año", "Compra 1 año");


addOption("Cont-GTC S", "Seleccione", "", 1); //HEADER OPTION
addOption("Cont-GTC S", "Compra inmediata", "Compra inmediata");
addOption("Cont-GTC S", "Compra 6 meses", "Compra 6 meses");
addOption("Cont-GTC S","Compra 1 año", "Compra 1 año");

addOption("11", "Seleccione","", 1); //HEADER OPTION
addList("11", "Achat immediat", "Autres Modeles Achat immediat");
addOption("11", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("11", "Compra 1 año", "Compra 1 año");


//BUICK
addOption("Buick", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Buick", "Enclave CX", "Enclave CX", "Enc-CX");
addList("Buick", "Enclave CXL1", "Enclave CXL 1", "Enc");
addList("Buick", "Enclave CXL2", "Enclave CXL2", "Enc-CXL2");
addList("Buick", "Lacrosse CX", "Lacrosse CX", "Lac-CX3");
addList("Buick", "Lacrosse CXL", "Lacrosse CXL", "Lac-CXL3");
addList("Buick", "Lacrosse CXS", "Lacrosse CXS", "Lac-CXS3"); 
addList("Buick", "Ver comentarios", "Ver comentarios", "33");

addOption("Enc-CX", "Seleccione", "", 1); //HEADER OPTION
addOption("Enc-CX","Compra inmediata", "Compra inmediata");
addOption("Enc-CX",  "Compra 6 meses", "Compra 6 meses");
addOption("Enc-CX", "Compra 1 año", "Compra 1 año");


addOption("Enc", "Seleccione", "", 1); //HEADER OPTION
addList("Enc", "Compra inmediata", "Compra inmediata");
addList("Enc",  "Compra 6 meses", "Compra 6 meses");
addList("Enc","Compra 1 año", "Compra 1 año");


addOption("Enc-CXL2", "Seleccione", "", 1); //HEADER OPTION
addOption("Enc-CXL2", "Compra inmediata", "Compra inmediata");
addOption("Enc-CXL2",  "Compra 6 meses", "Compra 6 meses");
addOption("Enc-CXL2","Compra 1 año", "Compra 1 año");


addOption("Lac-CX3", "Seleccione", "", 1); //HEADER OPTION
addOption("Lac-CX3","Compra inmediata", "Compra inmediata");
addOption("Lac-CX3",  "Compra 6 meses", "Compra 6 meses");
addOption("Lac-CX3", "Compra 1 año", "Compra 1 año");


addOption("Lac-CXL3", "Seleccione", "", 1); //HEADER OPTION
addOption("Lac-CXL3", "Compra inmediata", "Compra inmediata");
addOption("Lac-CXL3",  "Compra 6 meses", "Compra 6 meses");
addOption("Lac-CXL3", "Compra 1 año", "Compra 1 año");

addOption("Lac-CXS3", "Seleccione", "", 1); //HEADER OPTION
addOption("Lac-CXS3", "Compra inmediata", "Compra inmediata");
addOption("Lac-CXS3",  "Compra 6 meses", "Compra 6 meses");
addOption("Lac-CXS3", "Compra 1 año", "Compra 1 año");

addOption("33", "Seleccione", "", 1); //HEADER OPTION
addList("33", "Compra inmediata", "Compra inmediata");
addOption("33",  "Compra 6 meses", "Compra 6 meses");
addOption("33", "Compra 1 año", "Compra 1 año");

//CADILLAC
addOption("Cadillac", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Cadillac", "Escalade Base 4WD", "Escalade Base 4WD", "Esc-Base");
addList("Cadillac", "Escalade ESV 4WD", "Escalade ESV 4WD", "Esc-ESV");
addList("Cadillac", "Escalade EXT 4WD", "Escalade EXT 4WD", "Esc-EXT"); 
addList("Cadillac", "Ver comentarios", "Ver comentarios", "44");

addOption("Esc-Base", "Seleccione", "", 1); //HEADER OPTION
addList("Esc-Base", "Compra inmediata", "Compra inmediata");
addOption("Esc-Base",  "Compra 6 meses", "Compra 6 meses");
addOption("Esc-Base", "Compra 1 año", "Compra 1 año");

addList("Esc-ESV", "Seleccione", "", 1); //HEADER OPTION
addOption("Esc-ESV", "Compra inmediata", "Compra inmediata");
addOption("Esc-ESV",  "Compra 6 meses", "Compra 6 meses");
addOption("Esc-ESV", "Compra 1 año", "Compra 1 año");
addOption("Esc-ESV","Compra 1 año", "Compra 1 año");

addList("Esc-EXT", "Seleccione", "", 1); //HEADER OPTION
addOption("Esc-EXT", "Compra inmediata", "Compra inmediata");
addOption("Esc-EXT",  "Compra 6 meses", "Compra 6 meses");
addOption("Esc-EXT","Compra 1 año", "Compra 1 año");

addOption("44", "Seleccione", "", 1); //HEADER OPTION
addList("44", "Compra inmediata", "Compra inmediata");
addOption("44", "Compra 6 meses", "Compra 6 meses");
addOption("44", "Compra 1 año", "Compra 1 año");

//CHEVY
addOption("Chevrolet", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Chevrolet", "Avalanche LT3 4WD", "Avalanche LT3 4WD", "Ava-LT3"); 
addList("Chevrolet", "Avalanche LTZ 4WD", "Avalanche LTZ 4WD", "Ava-LTZ");
addList("Chevrolet", "Camaro LT", "Camaro LT", "Cam-LT");
addList("Chevrolet", "Camaro 2SS", "Camaro 2SS", "Cam-2SS");
addList("Chevrolet", "Tahoe LT3 4WD", "Tahoe LT3 4WD", "Tah-LT3");
addList("Chevrolet", "Tahoe LTZ 4WD", "Tahoe LTZ 4WD", "Tah-LTZ"); 
addList("Chevrolet", "Silverado 4WD", "Silvardo 4WD", "Sil"); 
addList("Chevrolet", "Ver comentarios", "Ver comentarios", "55");

addOption("Ava-LT3", "Seleccione", "", 1); //HEADER OPTION
addList("Ava-LT3", "Compra inmediata", "Compra inmediata");
addOption("Ava-LT3", "Compra 6 meses", "Compra 6 meses");
addOption("Ava-LT3", "Compra 1 año", "Compra 1 año");

addList("Ava-LTZ", "Seleccione", "", 1); //HEADER OPTION
addOption("Ava-LTZ", "Compra inmediata", "Compra inmediata");
addOption("Ava-LTZ", "Compra 6 meses", "Compra 6 meses");
addOption("Ava-LTZ", "Compra 1 año", "Compra 1 año");

addList("Cam-LT", "Seleccione", "", 1); //HEADER OPTION
addOption("Cam-LT", "Compra inmediata", "Compra inmediata");
addOption("Cam-LT", "Compra 6 meses", "Compra 6 meses");
addOption("Cam-LT", "Compra 1 año", "Compra 1 año");

addList("Cam-2SS", "Seleccione", "", 1); //HEADER OPTION
addOption("Cam-2SS", "Compra inmediata", "Compra inmediata");
addOption("Cam-2SS", "Compra 6 meses", "Compra 6 meses");
addOption("Cam-2SS", "Compra 1 año", "Compra 1 año");

addList("Tah-LT3", "Seleccione", "", 1); //HEADER OPTION
addOption("Tah-LT3", "Compra inmediata", "Compra inmediata");
addOption("Tah-LT3", "Compra 6 meses", "Compra 6 meses");
addOption("Tah-LT3", "Compra 1 año", "Compra 1 año");

addList("Tah-LTZ", "Seleccione", "", 1); //HEADER OPTION
addOption("Tah-LTZ", "Compra inmediata", "Compra inmediata");
addOption("Tah-LTZ", "Compra 6 meses", "Compra 6 meses");
addOption("Tah-LTZ", "Compra 1 año", "Compra 1 año");

addList("Sil", "Seleccione", "", 1); //HEADER OPTION
addOption("Sil", "Compra inmediata", "Compra inmediata");
addOption("Sil", "Compra 6 meses", "Compra 6 meses");
addOption("Sil", "Compra 1 año", "Compra 1 año");

addOption("55", "Seleccione", "", 1); //HEADER OPTION
addList("55", "Compra inmediata", "Compra inmediata");
addOption("55", "Compra 6 meses", "Compra 6 meses");
addOption("55", "Compra 1 año", "Compra 1 año");


//DODGE
addOption("Dodge", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Dodge", "Challenger SRT8", "Challenger SRT8", "Chal"); 
addList("Dodge", "Charger R/T", "Charger R/T", "Char-RT");
addList("Dodge", "Charger SRT 8", "Charger SRT 8", "Char-srt8");
addList("Dodge", "Ram 1500 Sport 5.7 L", "Ram 1500 Sport 5.7 L", "Ram-spo");
addList("Dodge", "Ram 1500 Laramie 5.7L", "Ram 1500 Laramie 5.7L", "Ram-Lar");
addList("Dodge", "Ver comentarios", "Ver comentarios","77");

addOption("Chal", "Seleccione", "", 1); //HEADER OPTION
addList("Chal", "Compra inmediata", "Compra inmediata");
addOption("Chal", "Compra 6 meses", "Compra 6 meses");
addOption("Chal", "Compra 1 año", "Compra 1 año");

addList("Char-RT", "Seleccione", "", 1); //HEADER OPTION
addOption("Char-RT", "Achat immediat", "Avalanche LTZ 4WD Achat immediat");
addOption("Char-RT","Compra 6 meses", "Compra 6 meses");
addOption("Char-RT", "Compra 1 año", "Compra 1 año");

addList("Char-srt8", "Seleccione","", 1); //HEADER OPTION
addOption("Char-srt8", "Compra inmediata", "Compra inmediata");
addOption("Char-srt8","Compra 6 meses", "Compra 6 meses");
addOption("Char-srt8", "Compra 1 año", "Compra 1 año");

addList("Ram-spo", "Seleccione el modelo",  "", 1); //HEADER OPTION
addOption("Ram-spo", "Compra inmediata", "Compra inmediata");
addOption("Ram-spo", "Compra 6 meses", "Compra 6 meses");
addOption("Ram-spo", "Compra 1 año", "Compra 1 año");

addList("Ram-Lar", "Seleccione", "", 1); //HEADER OPTION
addOption("Ram-Lar", "Compra inmediata", "Compra inmediata");
addOption("Ram-Lar", "Compra 6 meses", "Compra 6 meses");
addOption("Ram-Lar", "Compra 1 año", "Compra 1 año");

addOption("77", "Seleccione", "", 1); //HEADER OPTION
addList("77", "Compra inmediata", "Compra inmediata");
addOption("77", "Compra 6 meses", "Compra 6 meses");
addOption("77", "Compra 1 año", "Compra 1 año");

//GMC
addOption("GMC", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("GMC", "Denali", "Denali", "Dena"); 
addList("GMC", "Yukon", "Yukon", "Yukon");
addList("GMC", "Ver comentarios", "Ver comentarios", "66");

addOption("Dena", "Seleccione", "", 1); //HEADER OPTION
addList("Dena", "Compra inmediata", "Compra inmediata");
addOption("Dena", "Compra 6 meses", "Compra 6 meses");
addOption("Dena", "Compra 1 año", "Compra 1 año");

addList("Yukon", "Seleccione", "", 1); //HEADER OPTION
addOption("Yukon", "Compra inmediata", "Compra inmediata");
addOption("Yukon", "Compra 6 meses", "Compra 6 meses");
addOption("Yukon", "Compra 1 año", "Compra 1 año");

addOption("66", "Seleccione", "", 1); //HEADER OPTION
addList("66", "Compra inmediata", "Compra inmediata");
addOption("66", "Compra 6 meses", "Compra 6 meses");
addOption("66", "Compra 1 año", "Compra 1 año");

//HUMMER
addOption("HUMMER", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("HUMMER", "H1", "H1", "H1"); 
addList("HUMMER", "H2", "H2", "H2");
addList("HUMMER", "H3", "H3", "H3");
addList("HUMMER", "Ver comentarios", "Ver comentarios", "hh");


addOption("H1", "Seleccione", "", 1); //HEADER OPTION
addList("H1", "Compra inmediata", "Compra inmediata");
addOption("H1", "Compra 6 meses", "Compra 6 meses");
addOption("H1", "Compra 1 año", "Compra 1 año");

addList("H2", "Seleccione", "", 1); //HEADER OPTION
addOption("H2", "Compra inmediata", "Compra inmediata");
addOption("H2", "Compra 6 meses", "Compra 6 meses");
addOption("H2", "Compra 1 año", "Compra 1 año");

addList("H3", "Seleccione", "", 1); //HEADER OPTION
addOption("H3", "Compra inmediata", "Compra inmediata");
addOption("H3", "Compra 6 meses", "Compra 6 meses");
addOption("H3", "Compra 1 año", "Compra 1 año");

addOption("hh", "Seleccione", "", 1); //HEADER OPTION
addList("hh", "Compra inmediata", "Compra inmediata");
addOption("hh", "Compra 6 meses", "Compra 6 meses");
addOption("hh", "Compra 1 año", "Compra 1 año");

//JAGUAR
addOption("Jaguar", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Jaguar", "XJ", "XJ", "XJ"); 
addList("Jaguar", "XK", "XK", "XK");
addList("Jaguar", "XF", "XF", "XF");
addList("Jaguar", "Ver comentarios", "Ver comentarios","gg");


addOption("XJ", "Seleccione", "", 1); //HEADER OPTION
addList("XJ", "Compra inmediata", "Compra inmediata");
addOption("XJ", "Compra 6 meses", "Compra 6 meses");
addOption("XJ", "Compra 1 año", "Compra 1 año");

addList("XK", "Seleccione", "", 1); //HEADER OPTION
addOption("XK", "Compra inmediata", "Compra inmediata");
addOption("XK", "Compra 6 meses", "Compra 6 meses");
addOption("XK", "Compra 1 año", "Compra 1 año");

addList("XF", "Seleccione", "", 1); //HEADER OPTION
addOption("XF", "Compra inmediata", "Compra inmediata");
addOption("XF", "Compra 6 meses", "Compra 6 meses");
addOption("XF", "Compra 1 año", "Compra 1 año");

addOption("gg", "Seleccione", "", 1); //HEADER OPTION
addList("gg", "Compra inmediata", "Compra inmediata");
addOption("gg", "Compra 6 meses", "Compra 6 meses");
addOption("gg", "Compra 1 año", "Compra 1 año");

//LINCOLN
addOption("Lincoln", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Lincoln", "MKX", "MKX", "MKX"); 
addList("Lincoln", "Navigator", "Navigator", "Navi");
addList("Lincoln", "Town Car", "Town Car", "TC");
addList("Lincoln", "Ver comentarios", "Ver comentarios", "ff");

addOption("MKX", "Seleccione", "", 1); //HEADER OPTION
addList("MKX", "Compra inmediata", "Compra inmediata");
addOption("MKX", "Compra 6 meses", "Compra 6 meses");
addOption("MKX", "Compra 1 año", "Compra 1 año");

addList("Navi", "Seleccione", "", 1); //HEADER OPTION
addOption("Navi", "Compra inmediata", "Compra inmediata");
addOption("Navi", "Compra 6 meses", "Compra 6 meses");
addOption("Navi", "Compra 1 año", "Compra 1 año");

addList("TC", "Seleccione", "", 1); //HEADER OPTION
addOption("TC", "Compra inmediata", "Compra inmediata");
addOption("TC","Compra 6 meses", "Compra 6 meses");
addOption("TC", "Compra 1 año", "Compra 1 año");

addOption("ff", "Seleccione","", 1); //HEADER OPTION
addList("ff", "Compra inmediata", "Compra inmediata");
addOption("ff", "Compra 6 meses", "Compra 6 meses");
addOption("ff", "Compra 1 año", "Compra 1 año");


//LOTUS
addOption("Lotus", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Lotus", "Elise", "Elise", "Elise"); 
addList("Lotus", "Exige", "Exige", "Exige");
addList("Lotus", "Europa", "Europa", "Europa");
addList("Lotus", "Ver comentarios", "Ver comentarios", "ee");

addOption("Elise", "Seleccione", "", 1); //HEADER OPTION
addList("Elise", "Compra inmediata", "Compra inmediata");
addOption("Elise", "Compra 6 meses", "Compra 6 meses");
addOption("Elise","Compra 1 año", "Compra 1 año");

addList("Exige", "Seleccione", "", 1); //HEADER OPTION
addOption("Exige","Compra inmediata", "Compra inmediata");
addOption("Exige", "Compra 6 meses", "Compra 6 meses");
addOption("Exige", "Compra 1 año", "Compra 1 año");

addList("Europa", "Seleccione", "", 1); //HEADER OPTION
addOption("Europa", "Compra inmediata", "Compra inmediata");
addOption("Europa", "Compra 6 meses", "Compra 6 meses");
addOption("Europa", "Compra 1 año", "Compra 1 año");

addOption("ee", "Seleccione", "", 1); //HEADER OPTION
addList("ee", "Compra inmediata", "Compra inmediata");
addOption("ee", "Compra 6 meses", "Compra 6 meses");
addOption("ee", "Compra 1 año", "Compra 1 año");

//NISSAN
addOption("Nissan", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Nissan", "GTR", "GTR", "GTR"); 
addList("Nissan", "Ver comentarios", "Ver comentarios","VC");

addOption("GTR", "Seleccione", "", 1); //HEADER OPTION
addList("GTR","Compra inmediata", "Compra inmediata");
addOption("GTR", "Compra 6 meses", "Compra 6 meses");
addOption("GTR", "Compra 1 año", "Compra 1 año");

addOption("VC", "Seleccione", "", 1); //HEADER OPTION
addList("VC", "Compra inmediata", "Compra inmediata");
addOption("VC", "Compra 6 meses", "Compra 6 meses");
addOption("VC", "Compra 1 año", "Compra 1 año");

//PONTIAC
addOption("Pontiac", "Seleccione el modelo", "", 1); //HEADER OPTION
addList("Pontiac", "Solstice", "Solstice", "Solstice"); 
addList("Pontiac", "Ver comentarios", "Ver comentarios", "aa");

addOption("Solstice", "Seleccione", "", 1); //HEADER OPTION
addList("Solstice", "Compra inmediata", "Compra inmediata");
addOption("Solstice", "Compra 6 meses", "Compra 6 meses");
addOption("Solstice", "Compra 1 año", "Compra 1 año");

addOption("aa", "Seleccione", "", 1); //HEADER OPTION
addList("aa", "Compra inmediata", "Compra inmediata");
addOption("aa", "Compra 6 meses", "Compra 6 meses");
addOption("aa", "Compra 1 año", "Compra 1 año");

//PORSCHE
addOption("Porsche", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Porsche", "911", "911", "911"); 
addList("Porsche", "911 cab", "911 cab", "911 cab"); 
addList("Porsche", "911 C2S", "911 C2S", "911 C2S");
addList("Porsche", "911 C2S cab", "911 C2S cab", "911 C2S cab"); 
addList("Porsche", "911 C4S", "911 C4S", "911 C4S");
addList("Porsche", "911 C4S cab", "911 C4S cab", "911 C4S cab"); 
addList("Porsche", "911 Turbo", "911 Turbo", "911 Turbo");
addList("Porsche", "911 Turbo cab", "911 Turbo cab", "911 Turbo cab"); 
addList("Porsche", "Ver comentarios", "Ver comentarios", "bb");

addOption("911 cab","Seleccione","", 1); //HEADER OPTION
addList("911 cab", "Compra inmediata", "Compra inmediata");
addOption("911 cab", "Compra 6 meses", "Compra 6 meses");
addOption("911 cab", "Compra 1 año", "Compra 1 año");

addOption("911", "Seleccione", "", 1); //HEADER OPTION
addList("911", "Compra inmediata", "Compra inmediata");
addOption("911",  "Compra 6 meses", "Compra 6 meses");
addOption("911", "Compra 1 año", "Compra 1 año");

addOption("911 C2S", "Seleccione", "", 1); //HEADER OPTION
addList("911 C2S", "Compra inmediata", "Compra inmediata");
addOption("911 C2S",  "Compra 6 meses", "Compra 6 meses");
addOption("911 C2S","Compra 1 año", "Compra 1 año");

addOption("911 C2S cab", "Seleccione", "", 1); //HEADER OPTION
addList("911 C2S cab", "Compra inmediata", "Compra inmediata");
addOption("911 C2S cab",  "Compra 6 meses", "Compra 6 meses");
addOption("911 C2S cab", "Compra 1 año", "Compra 1 año");

addOption("911 C4S", "Seleccione", "", 1); //HEADER OPTION
addList("911 C4S", "Compra inmediata", "Compra inmediata");
addOption("911 C4S",  "Compra 6 meses", "Compra 6 meses");
addOption("911 C4S", "Compra 1 año", "Compra 1 año");

addOption("911 C4S cab","Seleccione", "", 1); //HEADER OPTION
addList("911 C4S cab", "Compra inmediata", "Compra inmediata");
addOption("911 C4S cab",  "Compra 6 meses", "Compra 6 meses");
addOption("911 C4S cab", "Compra 1 año", "Compra 1 año");

addOption("911 Turbo", "Seleccione", "", 1); //HEADER OPTION
addList("911 Turbo",  "Compra inmediata", "Compra inmediata");
addOption("911 Turbo", "Compra 6 meses", "Compra 6 meses");
addOption("911 Turbo", "Compra 1 año", "Compra 1 año");

addOption("911 Turbo cab", "Seleccione", "", 1); //HEADER OPTION
addList("911 Turbo cab",  "Compra inmediata", "Compra inmediata");
addOption("911 Turbo cab", "Compra 6 meses", "Compra 6 meses");
addOption("911 Turbo cab", "Compra 1 año", "Compra 1 año");

addOption("bb", "Seleccione","", 1); //HEADER OPTION
addList("bb",  "Compra inmediata", "Compra inmediata");
addOption("bb","Compra 6 meses", "Compra 6 meses");
addOption("bb", "Compra 1 año", "Compra 1 año");

//ROLLS ROYCE
addOption("Rolls Royce", "Seleccione el modelo",  "", 1); //HEADER OPTION
addList("Rolls Royce", "Phantom", "Phantom", "Phantom"); 
addList("Rolls Royce", "Ghost", "Ghost", "Ghost"); 
addList("Rolls Royce", "Ver comentarios", "Ver comentarios", "cc");

addOption("Phantom", "Seleccione", "", 1); //HEADER OPTION
addList("Phantom", "Compra inmediata", "Compra inmediata");
addOption("Phantom","Compra 6 meses", "Compra 6 meses");
addOption("Phantom", "Compra 1 año", "Compra 1 año");

addOption("Ghost", "Seleccione", "", 1); //HEADER OPTION
addList("Ghost",  "Compra inmediata", "Compra inmediata");
addOption("Ghost", "Compra 6 meses", "Compra 6 meses");
addOption("Ghost", "Compra 1 año", "Compra 1 año");

addOption("cc", "Seleccione","", 1); //HEADER OPTION
addList("cc",  "Compra inmediata", "Compra inmediata");
addOption("cc", "Compra 6 meses", "Compra 6 meses");
addOption("cc", "Compra 1 año", "Compra 1 año");

//TOYOTA
addOption("Toyota", "Seleccione el modelo", "", 1); //HEADER OPTION
addList("Toyota", "FJ Cruiser", "FJ Cruiser", "FJ Cruiser"); 
addList("Toyota", "TUNDRA", "TUNDRA", "TUNDRA"); 
addList("Toyota", "Ver comentarios", "Ver comentarios", "dd");

addOption("FJ Cruiser", "Seleccione", "", 1); //HEADER OPTION
addList("FJ Cruiser", "Compra inmediata", "Compra inmediata");
addOption("FJ Cruiser", "Compra 6 meses", "Compra 6 meses");
addOption("FJ Cruiser", "Compra 1 año", "Compra 1 año");

addOption("TUNDRA", "Seleccione", "", 1); //HEADER OPTION
addList("TUNDRA", "Compra inmediata", "Compra inmediata");
addOption("TUNDRA", "Compra 6 meses", "Compra 6 meses");
addOption("TUNDRA", "Compra 1 año", "Compra 1 año");

addOption("dd", "Seleccione", "", 1); //HEADER OPTION
addList("dd", "Compra inmediata", "Compra inmediata");
addOption("dd", "Compra 6 meses", "Compra 6 meses");
addOption("dd", "Compra 1 año", "Compra 1 año");
