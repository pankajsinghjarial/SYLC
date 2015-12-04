<?php

/** Enable W3 Total Cache */

define('WP_CACHE', true); // Added by W3 Total Cache









//define(‘CONCATENATE_SCRIPTS’, false );



 

/**

 * La configuration de base de votre installation WordPress.

 *

 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,

 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.

 * Vous pouvez en savoir plus à leur sujet en allant sur 

 * {@link http://codex.wordpress.org/Editing_wp-config.php Modifier

 * wp-config.php} (en anglais). C'est votre hébergeur qui doit vous donner vos

 * codes MySQL.

 *

 * Ce fichier est utilisé par le script de création de wp-config.php pendant

 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous

 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les

 * valeurs.

 *

 * @package WordPress

 */



// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //

/** Nom de la base de données de WordPress. */

define('DB_NAME', 'sylcexpo_sylc_new');



/** Utilisateur de la base de données MySQL. */

define('DB_USER', 'root');



/** Mot de passe de la base de données MySQL. */

define('DB_PASSWORD', 'root');



/** Adresse de l'hébergement MySQL. */

define('DB_HOST', 'localhost');



/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */

define('DB_CHARSET', 'utf8');



/** Type de collation de la base de données. 

  * N'y touchez que si vous savez ce que vous faites. 

  */

define('DB_COLLATE', '');



/**#@+

 * Clefs uniques d'authentification et salage.

 *

 * Remplacez les valeurs par défaut par des phrases uniques !

 * Vous pouvez générer des phrases aléatoires en utilisant 

 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.

 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.

 * Cela forcera également tous les utilisateurs à se reconnecter.

 *

 * @since 2.6.0

 */
/*
define('AUTH_KEY',         'put your unique phrase here'); 
define('SECURE_AUTH_KEY',  'put your unique phrase here'); 
define('LOGGED_IN_KEY',    'put your unique phrase here'); 
define('NONCE_KEY',        'put your unique phrase here'); 
define('AUTH_SALT',        'put your unique phrase here'); 
define('SECURE_AUTH_SALT', 'put your unique phrase here'); 
define('LOGGED_IN_SALT',   'put your unique phrase here'); 
define('NONCE_SALT',       'put your unique phrase here'); 
*/


define('AUTH_KEY',         'y`K@0C%R~9oCm&+B ZnuFtB?Q%3?-yJ*XEcs2){{ePz/[ nTW{Hq*I`ooSQ6E>X*');
define('SECURE_AUTH_KEY',  '%WldMd+6Sc5WJ$UW-HjhY5DHR#O*y!g8]e;hV`EO#Nj|Q>[qnRcAi(5~vZXY,i]a');
define('LOGGED_IN_KEY',    ')>{4[|ooV_V/(TUWSpv 9C}guk++Rv!Us[vL[Sd$O+/$xaV|O$ayl>V?13{OZD=a');
define('NONCE_KEY',        '1YZ`CpXny.k^My`k+JHY?Jf$YpgHnX(UwlB4FFgbGhCr~iB`Aa,(AL8[ff41b]:$');
define('AUTH_SALT',        'g>&;_ZHb*~t/wC*8H<sjne [_0+SiC~)NH0*]2mtu&zQ,@-*!b%ix8|;CeRaU]ph');
define('SECURE_AUTH_SALT', '6@_T<Xh?is=P$IsYe8.[)^3_7Ko]$CU_+JVN_$3@]4q1;b1Khm|.kZ3]rxjsPMTs');
define('LOGGED_IN_SALT',   'f X-fEAj|zT-Q^^Eqr/?d+`uI#^2- I={D`;?<#L]VQ;1kVctzOk<dSZUzgbdt9A');
define('NONCE_SALT',       'NmNwKtt$A;iT3LZu:?A@H!g.yt-oL!s.5_`P&WQ}P4fI0ip9 1Ftb%@$cMusuh-Z');
/**#@-*/



/**

 * Préfixe de base de données pour les tables de WordPress.

 *

 * Vous pouvez installer plusieurs WordPress sur une seule base de données

 * si vous leur donnez chacune un préfixe unique. 

 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!

 */

$table_prefix  = 'wp_';



/**

 * Langue de localisation de WordPress, par défaut en Anglais.

 *

 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant

 * au langage choisi doit être installé dans le dossier wp-content/languages.

 * Par exemple, pour mettre en place une traduction française, mettez le fichier

 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".

 */

define('WPLANG', 'fr_FR');

define( 'AUTOMATIC_UPDATER_DISABLED', true );



/** 

 * Pour les développeurs : le mode deboguage de WordPress.

 * 

 * En passant la valeur suivante à "true", vous activez l'affichage des

 * notifications d'erreurs pendant votre essais.

 * Il est fortemment recommandé que les développeurs d'extensions et

 * de thèmes se servent de WP_DEBUG dans leur environnement de 

 * développement.

 */ 

define('WP_DEBUG', false); 



/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */



/** Chemin absolu vers le dossier de WordPress. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Réglage des variables de WordPress et de ses fichiers inclus. */

require_once(ABSPATH . 'wp-settings.php');
