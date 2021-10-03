<?php
if (session_id() == '') {
    session_start();
}

use Vendor\autoload;
// require __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName('Google Calendar API PHP Quickstart');
$client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
$client->addScope("https://www.googleapis.com/auth/userinfo.email");
$client->setAuthConfig('credentials.json');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');
$login_url = $client->createAuthUrl();
// class SettingsClient {
//     public static object $clie ;

//   public static function setclient($client2) {
//            self::$clie = (object)$client2;
//     }

//     public static function getclient(){
//         return (object)self::$clie;
//     }
// }


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forge";

//$dbconn =  mysqli_connect($servername, $username, $password, $dbname);

// print_r($conn);
?>