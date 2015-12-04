//var hide_empty_list=true; //uncomment this line to hide empty selection lists
var disable_empty_list=true; //uncomment this line to disable empty selection lists

var onclickaction="alert" //set to "alert" or "goto". Former is for debugging purposes, to tell you the value of the final selected list that will be used as the destination URL. Set to "goto" when below configuration is all set up as desired. 

var newwindow=0 //Open links in new window or not? 1=yes, 0=no.

/////DEFINE YOUR MENU LISTS and ITEMS below/////////////////

addListGroup("chainedmenu", "First-Select");

addOption("First-Select", "Select a Make", "", 1); //HEADER OPTION
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
addOption("Ford", "Select a Model", "", 1); //HEADER OPTION
addList("Ford", "Mustang V6", "Mustang V6", "Ford-stang V6");
addList("Ford", "Mustang V6 cab", "Mustang V6 cab", "Ford-stang V6 cab");
addList("Ford", "Mustang GT", "Mustang GT", "Ford-stang GT");
addList("Ford", "Mustang GT cab", "Mustang GT cab", "Ford-stang GT cab"); //END OF THIS NODE


addOption("Ford-stang V6", "Select an item", "", 1); //HEADER OPTION
addList("Ford-stang V6", "Now", "Now");
addList("Ford-stang V6", "6 months", "6 months");
addList("Ford-stang V6", "1 year", "1 year");

addOption("Ford-stang V6 cab", "Select an item", "", 1); //HEADER OPTION
addList("Ford-stang V6 cab", "Now", "Now");
addList("Ford-stang V6 cab", "6 months", "6 months");
addList("Ford-stang V6 cab", "1 year", "1 year");

addOption("Ford-stang GT", "Select an item", "", 1); //HEADER OPTION
addOption("Ford-stang GT", "Now", "Now");
addOption("Ford-stang GT", "6 months", "6 months");
addOption("Ford-stang GT", "1 year", "1 year");

addOption("Ford-stang GT cab", "Select an item", "", 1); //HEADER OPTION
addOption("Ford-stang GT cab", "Now", "Now");
addOption("Ford-stang GT cab", "6 months", "6 months");
addOption("Ford-stang GT cab", "1 year", "1 year");




//ASTON MARTIN
addOption("Aston Martin","Select a Model", "", 1); //HEADER OPTION
addList("Aston Martin", "DB7", "DB7", "Aston Martin-DB7");
addList("Aston Martin", "DB7 Volante", "DB7 Volante", "Aston Martin-DB7 Volante");
addList("Aston Martin", "DB9", "DB9", "Aston Martin-DB9");
addList("Aston Martin", "DB9 Volante", "DB9 Volante", "Aston Martin-DB9 Volante");
addList("Aston Martin", "Vintage", "Vintage", "Aston Martin-Vintage");
addList("Ford", "See comments", "See comments", "zz");

addOption("Aston Martin-DB7", "Select an item", "", 1); //HEADER OPTION
addOption("Aston Martin-DB7", "Now", "Now");
addOption("Aston Martin-DB7", "6 months", "6 months");
addOption("Aston Martin-DB7",  "1 year", "1 year");

addOption("Aston Martin-DB7 Volante", "Select an item", "", 1); //HEADER OPTION
addOption("Aston Martin-DB7 Volante", "Now", "Now");
addOption("Aston Martin-DB7 Volante", "6 months", "6 months");
addOption("Aston Martin-DB7 Volante",  "1 year", "1 year");

addOption("Aston Martin-DB9", "Select an item", "", 1); //HEADER OPTION
addOption("Aston Martin-DB9", "Now", "Now");
addOption("Aston Martin-DB9", "6 months", "6 months");
addOption("Aston Martin-DB9",  "1 year", "1 year");

addOption("Aston Martin-DB9 Volante", "Select an item", "", 1); //HEADER OPTION
addOption("Aston Martin-DB9 Volante", "Now", "Now");
addOption("Aston Martin-DB9 Volante","6 month", "6 month");
addOption("Aston Martin-DB9 Volante",  "1 year", "1 year");

addOption("Aston Martin-Vintage", "Select an item", "", 1); //HEADER OPTION
addOption("Aston Martin-Vintage", "Now", "Now");
addOption("Aston Martin-Vintage", "6 month", "6 month");
addOption("Aston Martin-Vintage",  "1 year", "1 year");

addOption("zz", "Select an item", "", 1); //HEADER OPTION
addOption("zz", "Now", "Now");
addOption("zz", "6 months", "6 months");
addOption("zz",  "1 year", "1 year");

//BENTLEY
addOption("Bentley", "Select a Model", "", 1); //HEADER OPTION
addList("Bentley", "Continental GT", "Continental GT", "Cont-GT");
addList("Bentley", "Continental GT speed", "Continental GT spped", "Cont-GT S");
addList("Bentley", "Continental GTC", "Continental GTC", "Cont-GTC");
addList("Bentley", "Continental GTC speed", "Continental GTC speed", "Cont-GTC S"); //END OF THIS NODE
addList("Bentley", "See comments", "See comments", "11");

addOption("Cont-GT", "Select an item", "", 1); //HEADER OPTION
addOption("Cont-GT","Now", "Now");
addOption("Cont-GT", "6 months", "6 months");
addOption("Cont-GT",  "1 year", "1 year");

addOption("Cont-GT S", "Select an item", "", 1); //HEADER OPTION
addOption("Cont-GT S", "Now", "Now");
addOption("Cont-GT S", "6 months", "6 months");
addOption("Cont-GT S",  "1 year", "1 year");

addOption("Cont-GTC", "Select an item", "", 1); //HEADER OPTION
addOption("Cont-GTC", "Now", "Now");
addOption("Cont-GTC", "6 months", "6 months");
addOption("Cont-GTC",  "1 year", "1 year");

addOption("Cont-GTC S", "Select an item", "", 1); //HEADER OPTION
addOption("Cont-GTC S", "Now", "Now");
addOption("Cont-GTC S","6 months", "6 months");
addOption("Cont-GTC S",  "1 year", "1 year");

addOption("11", "Select an item", "", 1); //HEADER OPTION
addList("11", "Now", "Now");
addOption("11", "6 months", "6 months");
addOption("11",  "1 year", "1 year");

//BUICK
addOption("Buick", "Select a Model", "", 1); //HEADER OPTION
addList("Buick", "Enclave CX", "Enclave CX", "Enc-CX");
addList("Buick", "Enclave CXL1", "Enclave CXL 1", "Enc");
addList("Buick", "Enclave CXL2", "Enclave CXL2", "Enc-CXL2");
addList("Buick", "Lacrosse CX", "Lacrosse CX", "Lac-CX3");
addList("Buick", "Lacrosse CXL", "Lacrosse CXL", "Lac-CXL3");
addList("Buick", "Lacrosse CXS", "Lacrosse CXS", "Lac-CXS3"); 
addList("Buick", "See comments", "See comments","33");

addOption("Enc-CX", "Select an item", "", 1); //HEADER OPTION
addOption("Enc-CX", "Now", "Now");
addOption("Enc-CX", "6 months", "6 months");
addOption("Enc-CX",  "1 year", "1 year");

addOption("Enc", "Select an item", "", 1); //HEADER OPTION
addList("Enc",  "Now", "Now");
addList("Enc", "6 months", "6 months");
addList("Enc",  "1 year", "1 year");

addOption("Enc-CXL2", "Select an item", "", 1); //HEADER OPTION
addOption("Enc-CXL2",  "Now", "Now");
addOption("Enc-CXL2", "6 months", "6 months");
addOption("Enc-CXL2",  "1 year", "1 year");

addOption("Lac-CX3", "Select an item", "", 1); //HEADER OPTION
addOption("Lac-CX3",  "Now", "Now");
addOption("Lac-CX3", "6 months", "6 months");
addOption("Lac-CX3",  "1 year", "1 year");

addOption("Lac-CXL3", "Select an item", "", 1); //HEADER OPTION
addOption("Lac-CXL3",  "Now", "Now");
addOption("Lac-CXL3", "6 months", "6 months");
addOption("Lac-CXL3",  "1 year", "1 year");

addOption("Lac-CXS3", "Select an item", "", 1); //HEADER OPTION
addOption("Lac-CXS3",  "Now", "Now");
addOption("Lac-CXS3", "6 months", "6 months");
addOption("Lac-CXS3",  "1 year", "1 year");

addOption("33", "Select an item", "", 1); //HEADER OPTION
addList("33",  "Now", "Now");
addOption("33",  "6 months", "6 months");
addOption("33", "1 year", "1 year");

//CADILLAC
addOption("Cadillac", "Select a Model", "", 1); //HEADER OPTION
addList("Cadillac", "Escalade Base 4WD", "Escalade Base 4WD", "Esc-Base");
addList("Cadillac", "Escalade ESV 4WD", "Escalade ESV 4WD", "Esc-ESV");
addList("Cadillac", "Escalade EXT 4WD", "Escalade EXT 4WD", "Esc-EXT"); 
addList("Cadillac", "See comments", "See comments","44");

addOption("Esc-Base", "Select an item", "", 1); //HEADER OPTION
addList("Esc-Base",  "Now", "Now");
addOption("Esc-Base", "6 months", "6 months");
addOption("Esc-Base", "1 year", "1 year");

addList("Esc-ESV", "Select an item", "", 1); //HEADER OPTION
addOption("Esc-ESV",  "Now", "Now");
addOption("Esc-ESV",  "6 months", "6 months");
addOption("Esc-ESV", "1 year", "1 year");

addList("Esc-EXT", "Select an item", "", 1); //HEADER OPTION
addOption("Esc-EXT",  "Now", "Now");
addOption("Esc-EXT",  "6 months", "6 months");
addOption("Esc-EXT", "1 year", "1 year");

addOption("44", "Select an item", "", 1); //HEADER OPTION
addList("44",  "Now", "Now");
addOption("44",  "6 months", "6 months");
addOption("44", "1 year", "1 year");

//CHEVY
addOption("Chevrolet", "Select a Model", "", 1); //HEADER OPTION
addList("Chevrolet", "Avalanche LT3 4WD", "Avalanche LT3 4WD", "Ava-LT3"); 
addList("Chevrolet", "Avalanche LTZ 4WD", "Avalanche LTZ 4WD", "Ava-LTZ");
addList("Chevrolet", "Camaro LT", "Camaro LT", "Cam-LT");
addList("Chevrolet", "Camaro 2SS", "Camaro 2SS", "Cam-2SS");
addList("Chevrolet", "Tahoe LT3 4WD", "Tahoe LT3 4WD", "Tah-LT3");
addList("Chevrolet", "Tahoe LTZ 4WD", "Tahoe LTZ 4WD", "Tah-LTZ"); 
addList("Chevrolet", "Silverado 4WD", "Silvardo 4WD", "Sil"); 
addList("Chevrolet", "See comments", "See comments","55");

addOption("Ava-LT3", "Select an item", "", 1); //HEADER OPTION
addList("Ava-LT3", "Now", "Now");
addOption("Ava-LT3", "6 months", "6 months");
addOption("Ava-LT3", "1 year", "1 year");

addList("Ava-LTZ", "Select an item", "", 1); //HEADER OPTION
addOption("Ava-LTZ", "Now", "Now");
addOption("Ava-LTZ", "6 months", "6 months");
addOption("Ava-LTZ", "1 year", "1 year");

addList("Cam-LT", "Select an item", "", 1); //HEADER OPTION
addOption("Cam-LT", "Now", "Now");
addOption("Cam-LT","6 months", "6 months");
addOption("Cam-LT", "1 year", "1 year");

addList("Cam-2SS", "Select an item", "", 1); //HEADER OPTION
addOption("Cam-2SS", "Now", "Now");
addOption("Cam-2SS", "6 months", "6 months");
addOption("Cam-2SS", "1 year", "1 year");

addList("Tah-LT3", "Select an item", "", 1); //HEADER OPTION
addOption("Tah-LT3", "Now", "Now");
addOption("Tah-LT3", "6 months", "6 months");
addOption("Tah-LT3","1 year", "1 year");

addList("Tah-LTZ", "Select an item", "", 1); //HEADER OPTION
addOption("Tah-LTZ", "Now", "Now");
addOption("Tah-LTZ","6 months", "6 months");
addOption("Tah-LTZ", "1 year", "1 year");

addList("Sil", "Select an item", "", 1); //HEADER OPTION
addOption("Sil", "Now", "Now");
addOption("Sil","6 months", "6 months");
addOption("Sil", "1 year", "1 year");

addOption("55", "Select an item", "", 1); //HEADER OPTION
addList("55",  "Now", "Now");
addOption("55","6 months", "6 months");
addOption("55", "1 year", "1 year");


//DODGE
addOption("Dodge", "Select a Model", "", 1); //HEADER OPTION
addList("Dodge", "Challenger SRT8", "Challenger SRT8", "Chal"); 
addList("Dodge", "Charger R/T", "Charger R/T", "Char-RT");
addList("Dodge", "Charger SRT 8", "Charger SRT 8", "Char-srt8");
addList("Dodge", "Ram 1500 Sport 5.7 L", "Ram 1500 Sport 5.7 L", "Ram-spo");
addList("Dodge", "Ram 1500 Laramie 5.7L", "Ram 1500 Laramie 5.7L", "Ram-Lar");
addList("Dodge", "See comments", "See comments","77");

addOption("Chal", "Select an item", "", 1); //HEADER OPTION
addList("Chal", "Now", "Now");
addOption("Chal", "6 months", "6 months");
addOption("Chal", "1 year", "1 year");

addList("Char-RT", "Select an item", "", 1); //HEADER OPTION
addOption("Char-RT", "Now", "Now");
addOption("Char-RT", "6 months", "6 months");
addOption("Char-RT", "1 year", "1 year");

addList("Char-srt8", "Select an item", "", 1); //HEADER OPTION
addOption("Char-srt8", "Now", "Now");
addOption("Char-srt8", "6 months", "6 months");
addOption("Char-srt8", "1 year", "1 year");

addList("Ram-spo", "Choisissez un model", "", 1); //HEADER OPTION
addOption("Ram-spo", "Now", "Now");
addOption("Ram-spo","6 months", "6 months");
addOption("Ram-spo", "1 year", "1 year");

addList("Ram-Lar", "Select an item", "", 1); //HEADER OPTION
addOption("Ram-Lar", "Now", "Now");
addOption("Ram-Lar", "6 months", "6 months");
addOption("Ram-Lar", "1 year", "1 year");

addOption("77", "Select an item", "", 1); //HEADER OPTION
addList("77", "Now", "Now");
addOption("77", "6 months", "6 months");
addOption("77", "1 year", "1 year");

//GMC
addOption("GMC", "Select a Model", "", 1); //HEADER OPTION
addList("GMC", "Denali", "Denali", "Dena"); 
addList("GMC", "Yukon", "Yukon", "Yukon");
addList("GMC", "See comments", "See comments", "66");

addOption("Dena", "Select an item", "", 1); //HEADER OPTION
addList("Dena", "Now", "Now");
addOption("Dena", "6 months", "6 months");
addOption("Dena", "1 year", "1 year");

addList("Yukon", "Select an item", "", 1); //HEADER OPTION
addOption("Yukon", "Now", "Now");
addOption("Yukon", "6 months", "6 months");
addOption("Yukon", "1 year", "1 year");

addOption("66", "Select an item", "", 1); //HEADER OPTION
addList("66", "Now", "Now");
addOption("66", "6 months", "6 months");
addOption("66", "1 year", "1 year");

//HUMMER
addOption("HUMMER", "Select a Model", "", 1); //HEADER OPTION
addList("HUMMER", "H1", "H1", "H1"); 
addList("HUMMER", "H2", "H2", "H2");
addList("HUMMER", "H3", "H3", "H3");
addList("HUMMER", "See comments", "See comments","hh");


addOption("H1", "Select an item", "", 1); //HEADER OPTION
addList("H1", "Now", "Now");
addOption("H1", "6 months", "6 months");
addOption("H1", "1 year", "1 year");

addList("H2", "Select an item", "", 1); //HEADER OPTION
addOption("H2", "Now", "Now");
addOption("H2", "6 months", "6 months");
addOption("H2", "1 year", "1 year");

addList("H3", "Select an item", "", 1); //HEADER OPTION
addOption("H3","Now", "Now");
addOption("H3", "6 months", "6 months");
addOption("H3", "1 year", "1 year");

addOption("hh", "Select an item", "", 1); //HEADER OPTION
addList("hh", "Now", "Now");
addOption("hh", "6 months", "6 months");
addOption("hh", "1 year", "1 year");

//JAGUAR
addOption("Jaguar", "Select a Model", "", 1); //HEADER OPTION
addList("Jaguar", "XJ", "XJ", "XJ"); 
addList("Jaguar", "XK", "XK", "XK");
addList("Jaguar", "XF", "XF", "XF");
addList("Jaguar", "See comments", "See comments","gg");


addOption("XJ", "Select an item", "", 1); //HEADER OPTION
addList("XJ", "Now", "Now");
addOption("XJ", "6 months", "6 months");
addOption("XJ",  "1 year", "1 year");

addList("XK", "Select an item", "", 1); //HEADER OPTION
addOption("XK", "Now", "Now");
addOption("XK", "6 months", "6 months");
addOption("XK",  "1 year", "1 year");

addList("XF", "Select an item", "", 1); //HEADER OPTION
addOption("XF", "Now", "Now");
addOption("XF", "6 months", "6 months");
addOption("XF",  "1 year", "1 year");

addOption("gg", "Select an item", "", 1); //HEADER OPTION
addList("gg", "Now", "Now");
addOption("gg", "6 months", "6 months");
addOption("gg",  "1 year", "1 year");

//LINCOLN
addOption("Lincoln", "Select a Model", "", 1); //HEADER OPTION
addList("Lincoln", "MKX", "MKX", "MKX"); 
addList("Lincoln", "Navigator", "Navigator", "Navi");
addList("Lincoln", "Town Car", "Town Car", "TC");
addList("Lincoln", "See comments", "See comments","ff");

addOption("MKX", "Select an item", "", 1); //HEADER OPTION
addList("MKX", "Now", "Now");
addOption("MKX", "6 months", "6 months");
addOption("MKX", "1 year", "1 year");

addList("Navi", "Select an item", "", 1); //HEADER OPTION
addOption("Navi", "Now", "Now");
addOption("Navi", "6 months", "6 months");
addOption("Navi", "1 year", "1 year");

addList("TC", "Select an item", "", 1); //HEADER OPTION
addOption("TC", "Now", "Now");
addOption("TC", "6 months", "6 months");
addOption("TC", "1 year", "1 year");

addOption("ff", "Select an item", "", 1); //HEADER OPTION
addList("ff", "Now", "Now");
addOption("ff", "6 months", "6 months");
addOption("ff", "1 year", "1 year");


//LOTUS
addOption("Lotus", "Select a Model", "", 1); //HEADER OPTION
addList("Lotus", "Elise", "Elise", "Elise"); 
addList("Lotus", "Exige", "Exige", "Exige");
addList("Lotus", "Europa", "Europa", "Europa");
addList("Lotus", "See comments", "See comments", "ee");

addOption("Elise", "Select an item", "", 1); //HEADER OPTION
addList("Elise", "Now", "Now");
addOption("Elise","6 months", "6 months");
addOption("Elise","1 year", "1 year");

addList("Exige", "Select an item", "", 1); //HEADER OPTION
addOption("Exige", "Now", "Now");
addOption("Exige", "6 months", "6 months");
addOption("Exige", "1 year", "1 year");

addList("Europa", "Select an item", "", 1); //HEADER OPTION
addOption("Europa","Now", "Now");
addOption("Europa", "6 months", "6 months");
addOption("Europa", "1 year", "1 year");

addOption("ee", "Select an item", "", 1); //HEADER OPTION
addList("ee", "Now", "Now");
addOption("ee", "6 months", "6 months");
addOption("ee", "1 year", "1 year");

//NISSAN
addOption("Nissan", "Select a Model", "", 1); //HEADER OPTION
addList("Nissan", "GTR", "GTR", "GTR"); 
addList("Nissan", "Voir commentaires", "Voir commentaires", "VC");

addOption("GTR", "Select an item", "", 1); //HEADER OPTION
addList("GTR", "Now", "Now");
addOption("GTR", "6 months", "6 months");
addOption("GTR", "1 year", "1 year");

addOption("VC", "Select an item", "", 1); //HEADER OPTION
addList("VC", "Now", "Now");
addOption("VC","6 months", "6 months");
addOption("VC", "1 year", "1 year");

//PONTIAC
addOption("Pontiac", "Choisissez un model", "", 1); //HEADER OPTION
addList("Pontiac", "Solstice", "Solstice", "Solstice"); 
addList("Pontiac", "See comments", "See comments","aa");

addOption("Solstice", "Select an item", "", 1); //HEADER OPTION
addList("Solstice", "Now", "Now");
addOption("Solstice", "6 months", "6 months");
addOption("Solstice", "1 year", "1 year");

addOption("aa", "Select an item", "", 1); //HEADER OPTION
addList("aa", "Now", "Now");
addOption("aa", "6 months", "6 months");
addOption("aa", "1 year", "1 year");

//PORSCHE
addOption("Porsche", "Select a Model", "", 1); //HEADER OPTION
addList("Porsche", "911", "911", "911"); 
addList("Porsche", "911 cab", "911 cab", "911 cab"); 
addList("Porsche", "911 C2S", "911 C2S", "911 C2S");
addList("Porsche", "911 C2S cab", "911 C2S cab", "911 C2S cab"); 
addList("Porsche", "911 C4S", "911 C4S", "911 C4S");
addList("Porsche", "911 C4S cab", "911 C4S cab", "911 C4S cab"); 
addList("Porsche", "911 Turbo", "911 Turbo", "911 Turbo");
addList("Porsche", "911 Turbo cab", "911 Turbo cab", "911 Turbo cab"); 
addList("Porsche", "See comments", "See comments","bb");

addOption("911 cab", "Select an item", "", 1); //HEADER OPTION
addList("911 cab", "Now", "Now");
addOption("911 cab", "6 months", "6 months");
addOption("911 cab", "1 year", "1 year");

addOption("911", "Select an item", "", 1); //HEADER OPTION
addList("911", "Now", "Now");
addOption("911", "6 months", "6 months");
addOption("911", "1 year", "1 year");

addOption("911 C2S", "Select an item", "", 1); //HEADER OPTION
addList("911 C2S", "Now", "Now");
addOption("911 C2S", "6 months", "6 months");
addOption("911 C2S", "1 year", "1 year");

addOption("911 C2S cab", "Select an item", "", 1); //HEADER OPTION
addList("911 C2S cab", "Now", "Now");
addOption("911 C2S cab", "6 months", "6 months");
addOption("911 C2S cab", "1 year", "1 year");

addOption("911 C4S", "Select an item", "", 1); //HEADER OPTION
addList("911 C4S", "Now", "Now");
addOption("911 C4S", "6 months", "6 months");
addOption("911 C4S", "1 year", "1 year");

addOption("911 C4S cab", "Select an item", "", 1); //HEADER OPTION
addList("911 C4S cab", "Now", "Now");
addOption("911 C4S cab", "6 months", "6 months");
addOption("911 C4S cab","1 year", "1 year");

addOption("911 Turbo", "Select an item", "", 1); //HEADER OPTION
addList("911 Turbo", "Now", "Now");
addOption("911 Turbo", "6 months", "6 months");
addOption("911 Turbo", "1 year", "1 year");

addOption("911 Turbo cab", "Select an item", "", 1); //HEADER OPTION
addList("911 Turbo cab", "Now", "Now");
addOption("911 Turbo cab", "6 months", "6 months");
addOption("911 Turbo cab", "1 year", "1 year");

addOption("bb", "Select an item", "", 1); //HEADER OPTION
addList("bb", "Now", "Now");
addOption("bb", "6 months", "6 months");
addOption("bb", "1 year", "1 year");

//ROLLS ROYCE
addOption("Rolls Royce", "Select a Model", "", 1); //HEADER OPTION
addList("Rolls Royce", "Phantom", "Phantom", "Phantom"); 
addList("Rolls Royce", "Ghost", "Ghost", "Ghost"); 
addList("Rolls Royce", "See comments", "See comments","cc");

addOption("Phantom", "Select an item", "", 1); //HEADER OPTION
addList("Phantom", "Now", "Now");
addOption("Phantom", "6 months", "6 months");
addOption("Phantom", "1 year", "1 year");

addOption("Ghost", "Select an item", "", 1); //HEADER OPTION
addList("Ghost", "Now", "Now");
addOption("Ghost", "6 months", "6 months");
addOption("Ghost", "1 year", "1 year");

addOption("cc", "Select an item", "", 1); //HEADER OPTION
addList("cc", "Now", "Now");
addOption("cc", "6 months", "6 months");
addOption("cc", "1 year", "1 year");

//TOYOTA
addOption("Toyota","Select a Model", "", 1); //HEADER OPTION
addList("Toyota", "FJ Cruiser", "FJ Cruiser", "FJ Cruiser"); 
addList("Toyota", "Tundra", "Tundra", "Tundra"); 
addList("Toyota", "See comments", "See comments", "dd");

addOption("FJ Cruiser", "Select an item", "", 1); //HEADER OPTION
addList("FJ Cruiser","Now", "Now");
addOption("FJ Cruiser", "6 months", "6 months");
addOption("FJ Cruiser", "1 year", "1 year");

addOption("Tundra", "Select an item", "", 1); //HEADER OPTION
addList("Tundra", "Now", "Now");
addOption("Tundra","6 months", "6 months");
addOption("Tundra", "1 year", "1 year");

addOption("dd", "Select an item", "", 1); //HEADER OPTION
addList("dd", "Now", "Now");
addOption("dd", "6 months", "6 months");
addOption("dd", "1 year", "1 year");