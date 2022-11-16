<?php
include('./config/db.php');

// Read the variables sent via POST from our API
$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];
$userID = "";



if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Select Language/ Hitamo ururimi \n";
    $response .= "1. English \n";
    $response .= "2. Kinyarwanda";
}else{
    switch ($text) {
        case "1":
            // english
            $response = "CON Choose account information you want to view \n";
            $response .= "1. Register \n";
            $response .= "2. Login \n";
            break;
        case "1*1":
            // english
            $response = "CON Account successful created \n";
            $response .= "END Account number is ABCD1213 \n";
            break;
        case "1*2":
            $response = "CON Enter ".explode("*", $text)."Your Account Number";
            break;
        case "1*2".explode("*", $text):
            if("1*2".explode("*", $text) == 'ABCD1213'){
                $response = "END ".explode("*", $text)." Welcome back".$phoneNumber;
            }else{
                $response = "END ".explode("*", $text). "Not found";
            }
            break;
        case "2":
            // kinya
            $response = "CON Hitamo \n";
            $response .= "1. Kwiyandikisha \n";
            $response .= "2. Kwinjira \n";
            break;
        case "2*1":
            $response = "CON Konti yawe yakozwe neza \n";
            $response .= "END Konti yawe ni ABCD1213 \n";
            break;
        case "2*2":
            $response = "CON Andika Konti yawe \n";
            break;
        case "2*2*ABCD1213":
            $response = "END Byakozwe neza, Ikaze ".$phoneNumber;
            break;
        default:
            $response = "END Invalid input \n";
    }
}

// if ($text == "") {
//     // This is the first request. Note how we start the response with CON
//     $response  = "CON What would you want to check \n";
//     $response .= "1. My Account \n";
//     $response .= "2. My phone number";

// } else if ($text == "1") {
//     // Business logic for first level response
//     $response = "CON Choose account information you want to view \n";
//     $response .= "1. Account number \n";

// } else if ($text == "2") {
//     // Business logic for first level response
//     // This is a terminal request. Note how we start the response with END
//     $response = "END Your phone number is ".$phoneNumber;

// } else if($text == "1*1") { 
//     // This is a second level response where the user selected 1 in the first instance
//     $accountNumber = "ACC1001";

//     // This is a terminal request. Note how we start the response with END
//     $response = "END Your account number is ".$accountNumber;

// }

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;