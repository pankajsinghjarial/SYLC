//var hide_empty_list=true; //uncomment this line to hide empty selection lists
var disable_empty_list=true; //uncomment this line to disable empty selection lists

var onclickaction="alert" //set to "alert" or "goto". Former is for debugging purposes, to tell you the value of the final selected list that will be used as the destination URL. Set to "goto" when below configuration is all set up as desired. 

var newwindow=0 //Open links in new window or not? 1=yes, 0=no.

/////DEFINE YOUR MENU LISTS and ITEMS below/////////////////

addListGroup("chainedmenu", "First-Select");

addOption("First-Select", "Choisissez une marque", "", 1); //HEADER OPTION
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
addOption("Ford", "Choisissez un model", "", 1); //HEADER OPTION
addList("Ford", "Mustang V6", "Mustang V6", "Ford-stang V6");
addList("Ford", "Mustang V6 cab", "Mustang V6 cab", "Ford-stang V6 cab");
addList("Ford", "Mustang GT", "Mustang GT", "Ford-stang GT");
addList("Ford", "Mustang GT cab", "Mustang GT cab", "Ford-stang GT cab"); //END OF THIS NODE


addOption("Ford-stang V6", "Select an item", "", 1); //HEADER OPTION
addList("Ford-stang V6", "Achat immediat", "Achat immediat");
addList("Ford-stang V6", "Achat 6 mois", "Ford Mustang  V6 Achat 6 mois");
addList("Ford-stang V6", "Achat 1 an", "Ford Mustang  V6 Achat 1 an");

addOption("Ford-stang V6 cab", "Select an item", "", 1); //HEADER OPTION
addList("Ford-stang V6 cab", "Achat immediat", "Ford Mustang  V6 cab Achat immediat");
addList("Ford-stang V6 cab", "Achat 6 mois", "Ford Mustang  V6 cab Achat 6 mois");
addList("Ford-stang V6 cab", "Achat 1 an", "Ford Mustang  V6 cab Achat 1 an");

addOption("Ford-stang GT", "Select an item", "", 1); //HEADER OPTION
addOption("Ford-stang GT", "immediat", "Ford Mustang  Gt Achat immediat");
addOption("Ford-stang GT", "6 mois", "Ford Mustang  Gt Achat 6 mois");
addOption("Ford-stang GT", "1 an", "Ford Mustang  Gt Achat 1 an");

addOption("Ford-stang GT cab", "Select an item", "", 1); //HEADER OPTION
addOption("Ford-stang GT cab", "immediat", "Ford Mustang  Gt cab Achat immediat");
addOption("Ford-stang GT cab", "6 mois", "Ford Mustang  Gt cab Achat 6 mois");
addOption("Ford-stang GT cab", "1 an", "Ford Mustang  Gt cab Achat 1 an");




//ASTON MARTIN
addOption("Aston Martin", "Choisissez un model", "", 1); //HEADER OPTION
addList("Aston Martin", "DB7", "DB7", "Aston Martin-DB7");
addList("Aston Martin", "DB7 Volante", "DB7 Volante", "Aston Martin-DB7 Volante");
addList("Aston Martin", "DB9", "DB9", "Aston Martin-DB9");
addList("Aston Martin", "DB9 Volante", "DB9 Volante", "Aston Martin-DB9 Volante");
addList("Aston Martin", "Vintage", "Vintage", "Aston Martin-Vintage");
addList("Ford", "Voir commentaires", "Voir commentaires", "zz");

addOption("Aston Martin-DB7", "Select an item", "", 1); //HEADER OPTION
addOption("Aston Martin-DB7", "immediat", "Aston Martin DB7 Achat immediat");
addOption("Aston Martin-DB7", "6 mois", "Aston Martin DB7 Achat 6 mois");
addOption("Aston Martin-DB7", "1 an", "Aston Martin DB7 Achat 1 an");

addOption("Aston Martin-DB7 Volante", "Select an item", "", 1); //HEADER OPTION
addOption("Aston Martin-DB7 Volante", "immediat", "Aston Martin DB7 Volante Achat immediat");
addOption("Aston Martin-DB7 Volante", "6 mois", "Aston Martin DB7 Volante Achat 6 mois");
addOption("Aston Martin-DB7 Volante", "1 an", "Aston Martin DB7 Volante Achat 1 an");

addOption("Aston Martin-DB9", "Select an item", "", 1); //HEADER OPTION
addOption("Aston Martin-DB9", "immediat", "Aston Martin DB9 Achat immediat");
addOption("Aston Martin-DB9", "6 mois", "Aston Martin DB9 Achat 6 mois");
addOption("Aston Martin-DB9", "1 an", "Aston Martin DB9 Achat 1 an");

addOption("Aston Martin-DB9 Volante", "Select an item", "", 1); //HEADER OPTION
addOption("Aston Martin-DB9 Volante", "immediat", "Aston Martin DB9 Volante Achat immediat");
addOption("Aston Martin-DB9 Volante", "6 mois", "Aston Martin DB9 Volante Achat 6 mois");
addOption("Aston Martin-DB9 Volante", "1 an", "Aston Martin DB9 Volante Achat 1 an");

addOption("Aston Martin-Vintage", "Select an item", "", 1); //HEADER OPTION
addOption("Aston Martin-Vintage", "immediat", "Aston Martin DB9 Volante Achat immediat");
addOption("Aston Martin-Vintage", "6 mois", "Aston Martin DB9 Volante Achat 6 mois");
addOption("Aston Martin-Vintage", "1 an", "Aston Martin Vintage Achat 1 an");

addOption("zz", "Select an item", "", 1); //HEADER OPTION
addOption("zz", "Achat immediat", "Autres Modeles Achat immediat");
addOption("zz", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("zz", "Achat 1 an", "Autres Modeles Achat 1 an");

//BENTLEY
addOption("Bentley", "Choisissez un model", "", 1); //HEADER OPTION
addList("Bentley", "Continental GT", "Continental GT", "Cont-GT");
addList("Bentley", "Continental GT speed", "Continental GT spped", "Cont-GT S");
addList("Bentley", "Continental GTC", "Continental GTC", "Cont-GTC");
addList("Bentley", "Continental GTC speed", "Continental GTC speed", "Cont-GTC S"); //END OF THIS NODE
addList("Bentley", "Voir commentaires", "Voir commentaires", "11");

addOption("Cont-GT", "Select an item", "", 1); //HEADER OPTION
addOption("Cont-GT", "Achat immediat", "Continental GT Achat immediat");
addOption("Cont-GT", "Achat 6 mois", "Continental GT Achat 6 mois");
addOption("Cont-GT", "Achat 1 an", "Continental GT Achat 1 an");

addOption("Cont-GT S", "Select an item", "", 1); //HEADER OPTION
addOption("Cont-GT S", "Achat immediat", "Continental GT speed Achat immediat");
addOption("Cont-GT S", "Achat 6 mois", "Continental GT speed 6 mois");
addOption("Cont-GT S", "Achat 1 an", "Continental GT speed Achat 1 an");

addOption("Cont-GTC", "Select an item", "", 1); //HEADER OPTION
addOption("Cont-GTC", "immediat", "Continental GTC Achat immediat");
addOption("Cont-GTC", "6 mois", "Continental GTC Achat 6 mois");
addOption("Cont-GTC", "1 an", "Continental GTC Achat 1 an");

addOption("Cont-GTC S", "Select an item", "", 1); //HEADER OPTION
addOption("Cont-GTC S", "immediat", "Continental GTC speed Achat immediat");
addOption("Cont-GTC S", "6 mois", "Continental GTC speed Achat 6 mois");
addOption("Cont-GTC S", "1 an", "Continental GTC speed Achat 1 an");

addOption("11", "Select an item", "", 1); //HEADER OPTION
addList("11", "Achat immediat", "Autres Modeles Achat immediat");
addOption("11", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("11", "Achat 1 an", "Autres Modeles Achat 1 an");

//BUICK
addOption("Buick", "Choisissez un model", "", 1); //HEADER OPTION
addList("Buick", "Enclave CX", "Enclave CX", "Enc-CX");
addList("Buick", "Enclave CXL1", "Enclave CXL 1", "Enc");
addList("Buick", "Enclave CXL2", "Enclave CXL2", "Enc-CXL2");
addList("Buick", "Lacrosse CX", "Lacrosse CX", "Lac-CX3");
addList("Buick", "Lacrosse CXL", "Lacrosse CXL", "Lac-CXL3");
addList("Buick", "Lacrosse CXS", "Lacrosse CXS", "Lac-CXS3"); 
addList("Buick", "Voir commentaires", "Voir commentaires", "33");

addOption("Enc-CX", "Select an item", "", 1); //HEADER OPTION
addOption("Enc-CX", "Achat immediat", "Enclave CX Achat immediat");
addOption("Enc-CX", "Achat 6 mois", "Enclave CX Achat 6 mois");
addOption("Enc-CX", "Achat 1 an", "Enclave CX Achat 1 an");

addOption("Enc", "Select an item", "", 1); //HEADER OPTION
addList("Enc", "Achat immediat", "Enclave CXL1 Achat immediat");
addList("Enc", "Achat 6 mois", "Enclave CXL1 6 mois");
addList("Enc", "Achat 1 an", "Enclave CXL1 Achat 1 an");

addOption("Enc-CXL2", "Select an item", "", 1); //HEADER OPTION
addOption("Enc-CXL2", "immediat", "Enclave CXL2 Achat immediat");
addOption("Enc-CXL2", "6 mois", "Enclave CXL2 Achat 6 mois");
addOption("Enc-CXL2", "1 an", "Enclave CXL2 Achat 1 an");

addOption("Lac-CX3", "Select an item", "", 1); //HEADER OPTION
addOption("Lac-CX3", "immediat", "Lacrosse CX Achat immediat");
addOption("Lac-CX3", "6 mois", "Lacrosse CX Achat 6 mois");
addOption("Lac-CX3", "1 an", "Lacrosse CX Achat 1 an");

addOption("Lac-CXL3", "Select an item", "", 1); //HEADER OPTION
addOption("Lac-CXL3", "Achat immediat", "Lacrosse CXL Achat immediat");
addOption("Lac-CXL3", "Achat 6 mois", "Lacrosse CXL Achat 6 mois");
addOption("Lac-CXL3", "Achat 1 an", "ELacrosse CXL Achat 1 an");

addOption("Lac-CXS3", "Select an item", "", 1); //HEADER OPTION
addOption("Lac-CXS3", "Achat immediat", "Lacrosse CXS Achat immediat");
addOption("Lac-CXS3", "Achat 6 mois", "Lacrosse CXS Achat 6 mois");
addOption("Lac-CXS3", "Achat 1 an", "Lacrosse CXS Achat 1 an");

addOption("33", "Select an item", "", 1); //HEADER OPTION
addList("33", "Achat immediat", "Autres Modeles Achat immediat");
addOption("33", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("33", "Achat 1 an", "Autres Modeles Achat 1 an");

//CADILLAC
addOption("Cadillac", "Choisissez un model", "", 1); //HEADER OPTION
addList("Cadillac", "Escalade Base 4WD", "Escalade Base 4WD", "Esc-Base");
addList("Cadillac", "Escalade ESV 4WD", "Escalade ESV 4WD", "Esc-ESV");
addList("Cadillac", "Escalade EXT 4WD", "Escalade EXT 4WD", "Esc-EXT"); 
addList("Cadillac", "Voir commentaires", "Voir commentaires", "44");

addOption("Esc-Base", "Select an item", "", 1); //HEADER OPTION
addList("Esc-Base", "Achat immediat", "Escalade Base 4WD Achat immediat");
addOption("Esc-Base", "Achat 6 mois", "Escalade Base 4WD Achat 6 mois");
addOption("Esc-Base", "Achat 1 an", "Escalade Base 4WD Achat 1 an");

addList("Esc-ESV", "Select an item", "", 1); //HEADER OPTION
addOption("Esc-ESV", "Achat immediat", "Escalade ESV 4WD Achat immediat");
addOption("Esc-ESV", "Achat 6 mois", "Escalade ESV 4WD 6 mois");
addOption("Esc-ESV", "Achat 1 an", "Escalade ESV 4WD Achat 1 an");

addList("Esc-EXT", "Select an item", "", 1); //HEADER OPTION
addOption("Esc-EXT", "immediat", "Escalade EXT 4WD Achat immediat");
addOption("Esc-EXT", "6 mois", "Escalade EXT 4WD Achat 6 mois");
addOption("Esc-EXT", "1 an", "Escalade EXT 4WD Achat 1 an");

addOption("44", "Select an item", "", 1); //HEADER OPTION
addList("44", "Achat immediat", "Autres Modeles Achat immediat");
addOption("44", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("44", "Achat 1 an", "Autres Modeles Achat 1 an");

//CHEVY
addOption("Chevrolet", "Choisissez un model", "", 1); //HEADER OPTION
addList("Chevrolet", "Avalanche LT3 4WD", "Avalanche LT3 4WD", "Ava-LT3"); 
addList("Chevrolet", "Avalanche LTZ 4WD", "Avalanche LTZ 4WD", "Ava-LTZ");
addList("Chevrolet", "Camaro LT", "Camaro LT", "Cam-LT");
addList("Chevrolet", "Camaro 2SS", "Camaro 2SS", "Cam-2SS");
addList("Chevrolet", "Tahoe LT3 4WD", "Tahoe LT3 4WD", "Tah-LT3");
addList("Chevrolet", "Tahoe LTZ 4WD", "Tahoe LTZ 4WD", "Tah-LTZ"); 
addList("Chevrolet", "Silverado 4WD", "Silvardo 4WD", "Sil"); 
addList("Chevrolet", "Voir commentaires", "Voir commentaires", "55");

addOption("Ava-LT3", "Select an item", "", 1); //HEADER OPTION
addList("Ava-LT3", "Achat immediat", "Avalanche LT3 4WD Achat immediat");
addOption("Ava-LT3", "Achat 6 mois", "Avalanche LT3 4WD Achat 6 mois");
addOption("Ava-LT3", "Achat 1 an", "Avalanche LT3 4WD Achat 1 an");

addList("Ava-LTZ", "Select an item", "", 1); //HEADER OPTION
addOption("Ava-LTZ", "Achat immediat", "Avalanche LTZ 4WD Achat immediat");
addOption("Ava-LTZ", "Achat 6 mois", "Avalanche LTZ 4WD 6 mois");
addOption("Ava-LTZ", "Achat 1 an", "Avalanche LTZ 4WD Achat 1 an");

addList("Cam-LT", "Select an item", "", 1); //HEADER OPTION
addOption("Cam-LT", "immediat", "Camaro LT Achat immediat");
addOption("Cam-LT", "6 mois", "Camaro LT Achat 6 mois");
addOption("Cam-LT", "1 an", "Camaro LT Achat 1 an");

addList("Cam-2SS", "Select an item", "", 1); //HEADER OPTION
addOption("Cam-2SS", "immediat", "Camaro 2SS Achat immediat");
addOption("Cam-2SS", "6 mois", "Camaro 2SS Achat 6 mois");
addOption("Cam-2SS", "1 an", "Camaro 2SS Achat 1 an");

addList("Tah-LT3", "Select an item", "", 1); //HEADER OPTION
addOption("Tah-LT3", "immediat", "Tahoe LT3 4WD Achat immediat");
addOption("Tah-LT3", "6 mois", "Tahoe LT3 4WD Achat 6 mois");
addOption("Tah-LT3", "1 an", "Tahoe LT3 4WD Achat 1 an");

addList("Tah-LTZ", "Select an item", "", 1); //HEADER OPTION
addOption("Tah-LTZ", "immediat", "Tahoe LT3 4WD Achat immediat");
addOption("Tah-LTZ", "6 mois", "Tahoe LT3 4WD Achat 6 mois");
addOption("Tah-LTZ", "1 an", "Tahoe LT3 4WD Achat 1 an");

addList("Sil", "Select an item", "", 1); //HEADER OPTION
addOption("Sil", "immediat", "Silverado 4WD Achat immediat");
addOption("Sil", "6 mois", "Silverado 4WD Achat 6 mois");
addOption("Sil", "1 an", "Silverado 4WD Achat 1 an");

addOption("55", "Select an item", "", 1); //HEADER OPTION
addList("55", "Achat immediat", "Autres Modeles Achat immediat");
addOption("55", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("55", "Achat 1 an", "Autres Modeles Achat 1 an");


//DODGE
addOption("Dodge", "Choisissez un model", "", 1); //HEADER OPTION
addList("Dodge", "Challenger SRT8", "Challenger SRT8", "Chal"); 
addList("Dodge", "Charger R/T", "Charger R/T", "Char-RT");
addList("Dodge", "Charger SRT 8", "Charger SRT 8", "Char-srt8");
addList("Dodge", "Ram 1500 Sport 5.7 L", "Ram 1500 Sport 5.7 L", "Ram-spo");
addList("Dodge", "Ram 1500 Laramie 5.7L", "Ram 1500 Laramie 5.7L", "Ram-Lar");
addList("Dodge", "Voir commentaires", "Voir commentaires", "77");

addOption("Chal", "Select an item", "", 1); //HEADER OPTION
addList("Chal", "Achat immediat", "Avalanche LT3 4WD Achat immediat");
addOption("Chal", "Achat 6 mois", "Avalanche LT3 4WD Achat 6 mois");
addOption("Chal", "Achat 1 an", "Avalanche LT3 4WD Achat 1 an");

addList("Char-RT", "Select an item", "", 1); //HEADER OPTION
addOption("Char-RT", "Achat immediat", "Avalanche LTZ 4WD Achat immediat");
addOption("Char-RT", "Achat 6 mois", "Avalanche LTZ 4WD 6 mois");
addOption("Char-RT", "Achat 1 an", "Avalanche LTZ 4WD Achat 1 an");

addList("Char-srt8", "Select an item", "", 1); //HEADER OPTION
addOption("Char-srt8", "immediat", "Camaro LT Achat immediat");
addOption("Char-srt8", "6 mois", "Camaro LT Achat 6 mois");
addOption("Char-srt8", "1 an", "Camaro LT Achat 1 an");

addList("Ram-spo", "Choisissez un model", "", 1); //HEADER OPTION
addOption("Ram-spo", "immediat", "Camaro 2SS Achat immediat");
addOption("Ram-spo", "6 mois", "Camaro 2SS Achat 6 mois");
addOption("Ram-spo", "1 an", "Camaro 2SS Achat 1 an");

addList("Ram-Lar", "Select an item", "", 1); //HEADER OPTION
addOption("Ram-Lar", "immediat", "Tahoe LT3 4WDD Achat immediat");
addOption("Ram-Lar", "6 mois", "Tahoe LT3 4WD Achat 6 mois");
addOption("Ram-Lar", "1 an", "Tahoe LT3 4WD Achat 1 an");

addOption("77", "Select an item", "", 1); //HEADER OPTION
addList("77", "Achat immediat", "Autres Modeles Achat immediat");
addOption("77", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("77", "Achat 1 an", "Autres Modeles Achat 1 an");

//GMC
addOption("GMC", "Choisissez un model", "", 1); //HEADER OPTION
addList("GMC", "Denali", "Denali", "Dena"); 
addList("GMC", "Yukon", "Yukon", "Yukon");
addList("GMC", "Voir commentaires", "Voir commentaires", "66");

addOption("Dena", "Select an item", "", 1); //HEADER OPTION
addList("Dena", "Achat immediat", "Denali Achat immediat");
addOption("Dena", "Achat 6 mois", "Denali Achat 6 mois");
addOption("Dena", "Achat 1 an", "Denali Achat 1 an");

addList("Yukon", "Select an item", "", 1); //HEADER OPTION
addOption("Yukon", "Achat immediat", "Yukon Achat immediat");
addOption("Yukon", "Achat 6 mois", "Yukon 6 mois");
addOption("Yukon", "Achat 1 an", "Yukon Achat 1 an");

addOption("66", "Select an item", "", 1); //HEADER OPTION
addList("66", "Achat immediat", "Autres Modeles Achat immediat");
addOption("66", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("66", "Achat 1 an", "Autres Modeles Achat 1 an");

//HUMMER
addOption("HUMMER", "Choisissez un model", "", 1); //HEADER OPTION
addList("HUMMER", "H1", "H1", "H1"); 
addList("HUMMER", "H2", "H2", "H2");
addList("HUMMER", "H3", "H3", "H3");
addList("HUMMER", "Voir commentaires", "Voir commentaires", "hh");


addOption("H1", "Select an item", "", 1); //HEADER OPTION
addList("H1", "Achat immediat", "H1 Achat immediat");
addOption("H1", "Achat 6 mois", "H1 Achat 6 mois");
addOption("H1", "Achat 1 an", "H1 Achat 1 an");

addList("H2", "Select an item", "", 1); //HEADER OPTION
addOption("H2", "Achat immediat", "H2 Achat immediat");
addOption("H2", "Achat 6 mois", "H2 6 mois");
addOption("H2", "Achat 1 an", "H2 Achat 1 an");

addList("H3", "Select an item", "", 1); //HEADER OPTION
addOption("H3", "Achat immediat", "H3 Achat immediat");
addOption("H3", "Achat 6 mois", "H3 6 mois");
addOption("H3", "Achat 1 an", "H3 Achat 1 an");

addOption("hh", "Select an item", "", 1); //HEADER OPTION
addList("hh", "Achat immediat", "Autres Modeles Achat immediat");
addOption("hh", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("hh", "Achat 1 an", "Autres Modeles Achat 1 an");

//JAGUAR
addOption("Jaguar", "Choisissez un model", "", 1); //HEADER OPTION
addList("Jaguar", "XJ", "XJ", "XJ"); 
addList("Jaguar", "XK", "XK", "XK");
addList("Jaguar", "XF", "XF", "XF");
addList("Jaguar", "Voir commentaires", "Voir commentaires", "gg");


addOption("XJ", "Select an item", "", 1); //HEADER OPTION
addList("XJ", "Achat immediat", "XJ Achat immediat");
addOption("XJ", "Achat 6 mois", "XJ Achat 6 mois");
addOption("XJ", "Achat 1 an", "XJ Achat 1 an");

addList("XK", "Select an item", "", 1); //HEADER OPTION
addOption("XK", "Achat immediat", "XK Achat immediat");
addOption("XK", "Achat 6 mois", "XK 6 mois");
addOption("XK", "Achat 1 an", "XK Achat 1 an");

addList("XF", "Select an item", "", 1); //HEADER OPTION
addOption("XF", "Achat immediat", "XF Achat immediat");
addOption("XF", "Achat 6 mois", "XF 6 mois");
addOption("XF", "Achat 1 an", "XF Achat 1 an");

addOption("gg", "Select an item", "", 1); //HEADER OPTION
addList("gg", "Achat immediat", "Autres Modeles Achat immediat");
addOption("gg", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("gg", "Achat 1 an", "Autres Modeles Achat 1 an");

//LINCOLN
addOption("Lincoln", "Choisissez un model", "", 1); //HEADER OPTION
addList("Lincoln", "MKX", "MKX", "MKX"); 
addList("Lincoln", "Navigator", "Navigator", "Navi");
addList("Lincoln", "Town Car", "Town Car", "TC");
addList("Lincoln", "Voir commentaires", "Voir commentaires", "ff");

addOption("MKX", "Select an item", "", 1); //HEADER OPTION
addList("MKX", "Achat immediat", "MKX Achat immediat");
addOption("MKX", "Achat 6 mois", "MKX Achat 6 mois");
addOption("MKX", "Achat 1 an", "MKX Achat 1 an");

addList("Navi", "Select an item", "", 1); //HEADER OPTION
addOption("Navi", "Achat immediat", "Navigator Achat immediat");
addOption("Navi", "Achat 6 mois", "Navigator 6 mois");
addOption("Navi", "Achat 1 an", "Navigator Achat 1 an");

addList("TC", "Select an item", "", 1); //HEADER OPTION
addOption("TC", "Achat immediat", "Town Car Achat immediat");
addOption("TC", "Achat 6 mois", "Town Car6 mois");
addOption("TC", "Achat 1 an", "Town Car Achat 1 an");

addOption("ff", "Select an item", "", 1); //HEADER OPTION
addList("ff", "Achat immediat", "Autres Modeles Achat immediat");
addOption("ff", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("ff", "Achat 1 an", "Autres Modeles Achat 1 an");


//LOTUS
addOption("Lotus", "Choisissez un model", "", 1); //HEADER OPTION
addList("Lotus", "Elise", "Elise", "Elise"); 
addList("Lotus", "Exige", "Exige", "Exige");
addList("Lotus", "Europa", "Europa", "Europa");
addList("Lotus", "Voir commentaires", "Voir commentaires", "ee");

addOption("Elise", "Select an item", "", 1); //HEADER OPTION
addList("Elise", "Achat immediat", "Elise Achat immediat");
addOption("Elise", "Achat 6 mois", "Elise Achat 6 mois");
addOption("Elise", "Achat 1 an", "Elise Achat 1 an");

addList("Exige", "Select an item", "", 1); //HEADER OPTION
addOption("Exige", "Achat immediat", "Exige Achat immediat");
addOption("Exige", "Achat 6 mois", "Exige 6 mois");
addOption("Exige", "Achat 1 an", "Exige Achat 1 an");

addList("Europa", "Select an item", "", 1); //HEADER OPTION
addOption("Europa", "Achat immediat", "Europa Achat immediat");
addOption("Europa", "Achat 6 mois", "Europa 6 mois");
addOption("Europa", "Achat 1 an", "Europa Achat 1 an");

addOption("ee", "Select an item", "", 1); //HEADER OPTION
addList("ee", "Achat immediat", "Autres Modeles Achat immediat");
addOption("ee", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("ee", "Achat 1 an", "Autres Modeles Achat 1 an");

//NISSAN
addOption("Nissan", "Choisissez un model", "", 1); //HEADER OPTION
addList("Nissan", "GTR", "GTR", "GTR"); 
addList("Nissan", "Voir commentaires", "Voir commentaires", "VC");

addOption("GTR", "Select an item", "", 1); //HEADER OPTION
addList("GTR", "Achat immediat", "GTR Achat immediat");
addOption("GTR", "Achat 6 mois", "GTR Achat 6 mois");
addOption("GTR", "Achat 1 an", "GTR Achat 1 an");

addOption("VC", "Select an item", "", 1); //HEADER OPTION
addList("VC", "Achat immediat", "Autres Modeles Achat immediat");
addOption("VC", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("VC", "Achat 1 an", "Autres Modeles Achat 1 an");

//PONTIAC
addOption("Pontiac", "Choisissez un model", "", 1); //HEADER OPTION
addList("Pontiac", "Solstice", "Solstice", "Solstice"); 
addList("Pontiac", "Voir commentaires", "Voir commentaires", "aa");

addOption("Solstice", "Select an item", "", 1); //HEADER OPTION
addList("Solstice", "Achat immediat", "Solstice Achat immediat");
addOption("Solstice", "Achat 6 mois", "Solstice Achat 6 mois");
addOption("Solstice", "Achat 1 an", "Solstice Achat 1 an");

addOption("aa", "Select an item", "", 1); //HEADER OPTION
addList("aa", "Achat immediat", "Autres Modeles Achat immediat");
addOption("aa", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("aa", "Achat 1 an", "Autres Modeles Achat 1 an");

//PORSCHE
addOption("Porsche", "Choisissez un model", "", 1); //HEADER OPTION
addList("Porsche", "911", "911", "911"); 
addList("Porsche", "911 cab", "911 cab", "911 cab"); 
addList("Porsche", "911 C2S", "911 C2S", "911 C2S");
addList("Porsche", "911 C2S cab", "911 C2S cab", "911 C2S cab"); 
addList("Porsche", "911 C4S", "911 C4S", "911 C4S");
addList("Porsche", "911 C4S cab", "911 C4S cab", "911 C4S cab"); 
addList("Porsche", "911 Turbo", "911 Turbo", "911 Turbo");
addList("Porsche", "911 Turbo cab", "911 Turbo cab", "911 Turbo cab"); 
addList("Porsche", "Voir commentaires", "Voir commentaires", "bb");

addOption("911 cab", "Select an item", "", 1); //HEADER OPTION
addList("911 cab", "Achat immediat", "911 cab Achat immediat");
addOption("911 cab", "Achat 6 mois", "911 cab Achat 6 mois");
addOption("911 cab", "Achat 1 an", "911 cab Achat 1 an");

addOption("911", "Select an item", "", 1); //HEADER OPTION
addList("911", "Achat immediat", "911 Achat immediat");
addOption("911", "Achat 6 mois", "911 Achat 6 mois");
addOption("911", "Achat 1 an", "911 Achat 1 an");

addOption("911 C2S", "Select an item", "", 1); //HEADER OPTION
addList("911 C2S", "Achat immediat", "911 C2S Achat immediat");
addOption("911 C2S", "Achat 6 mois", "911 C2S Achat 6 mois");
addOption("911 C2S", "Achat 1 an", "911 C2S Achat 1 an");

addOption("911 C2S cab", "Select an item", "", 1); //HEADER OPTION
addList("911 C2S cab", "Achat immediat", "911 C2S cab Achat immediat");
addOption("911 C2S cab", "Achat 6 mois", "911 C2S cab Achat 6 mois");
addOption("911 C2S cab", "Achat 1 an", "911 C2S cab Achat 1 an");

addOption("911 C4S", "Select an item", "", 1); //HEADER OPTION
addList("911 C4S", "Achat immediat", "911 C4S Achat immediat");
addOption("911 C4S", "Achat 6 mois", "911 C4S Achat 6 mois");
addOption("911 C4S", "Achat 1 an", "911 C4S Achat 1 an");

addOption("911 C4S cab", "Select an item", "", 1); //HEADER OPTION
addList("911 C4S cab", "Achat immediat", "911 C4S cab Achat immediat");
addOption("911 C4S cab", "Achat 6 mois", "911 C4S cab Achat 6 mois");
addOption("911 C4S cab", "Achat 1 an", "911 C4S cab Achat 1 an");

addOption("911 Turbo", "Select an item", "", 1); //HEADER OPTION
addList("911 Turbo", "Achat immediat", "911 TurboAchat immediat");
addOption("911 Turbo", "Achat 6 mois", "911 Turbo Achat 6 mois");
addOption("911 Turbo", "Achat 1 an", "911 Turbo Achat 1 an");

addOption("911 Turbo cab", "Select an item", "", 1); //HEADER OPTION
addList("911 Turbo cab", "Achat immediat", "911 TurboAchat immediat");
addOption("911 Turbo cab", "Achat 6 mois", "911 Turbo Achat 6 mois");
addOption("911 Turbo cab", "Achat 1 an", "911 Turbo Achat 1 an");

addOption("bb", "Select an item", "", 1); //HEADER OPTION
addList("bb", "Achat immediat", "Autres Modeles Achat immediat");
addOption("bb", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("bb", "Achat 1 an", "Autres Modeles Achat 1 an");

//ROLLS ROYCE
addOption("Rolls Royce", "Choisissez un model", "", 1); //HEADER OPTION
addList("Rolls Royce", "Phantom", "Phantom", "Phantom"); 
addList("Rolls Royce", "Ghost", "Ghost", "Ghost"); 
addList("Rolls Royce", "Voir commentaires", "Voir commentaires", "cc");

addOption("Phantom", "Select an item", "", 1); //HEADER OPTION
addList("Phantom", "Achat immediat", "Phantom Achat immediat");
addOption("Phantom", "Achat 6 mois", "Phantom Achat 6 mois");
addOption("Phantom", "Achat 1 an", "Phantom Achat 1 an");

addOption("Ghost", "Select an item", "", 1); //HEADER OPTION
addList("Ghost", "Achat immediat", "Ghost Achat immediat");
addOption("Ghost", "Achat 6 mois", "Ghost Achat 6 mois");
addOption("Ghost", "Achat 1 an", "Ghost Achat 1 an");

addOption("cc", "Select an item", "", 1); //HEADER OPTION
addList("cc", "Achat immediat", "Autres Modeles Achat immediat");
addOption("cc", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("cc", "Achat 1 an", "Autres Modeles Achat 1 an");

//TOYOTA
addOption("Toyota", "Choisissez un model", "", 1); //HEADER OPTION
addList("Toyota", "FJ Cruiser", "FJ Cruiser", "FJ Cruiser"); 
addList("Toyota", "Tundra", "Tundra", "Tundra"); 
addList("Toyota", "Voir commentaires", "Voir commentaires", "dd");

addOption("FJ Cruiser", "Select an item", "", 1); //HEADER OPTION
addList("FJ Cruiser", "Achat immediat", "FJ Cruiser Achat immediat");
addOption("FJ Cruiser", "Achat 6 mois", "FJ Cruiser Achat 6 mois");
addOption("FJ Cruiser", "Achat 1 an", "FJ Cruiser Achat 1 an");

addOption("Tundra", "Select an item", "", 1); //HEADER OPTION
addList("Tundra", "Achat immediat", "Tundra Achat immediat");
addOption("Tundra", "Achat 6 mois", "Tundra Achat 6 mois");
addOption("Tundra", "Achat 1 an", "Tundra Achat 1 an");

addOption("dd", "Select an item", "", 1); //HEADER OPTION
addList("dd", "Achat immediat", "Autres Modeles Achat immediat");
addOption("dd", "Achat 6 mois", "Autres Modeles 6 mois");
addOption("dd", "Achat 1 an", "Autres Modeles Achat 1 an");
