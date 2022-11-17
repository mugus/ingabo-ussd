<?php
header('Content-type: text/plain');

include('./functions.php');
// Read the variables sent via POST from our API
$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];
if ($text == "") {
    // This is the first request. Note how we start the response with CON
    main_menu();
}else{
    switch ($text) {
        case "1":
            // english
            switch_english();
            break;
        case "1*1":
            // english menu
            Eng_products_list();
            break;
        case "1*2":
            eng_promotion();
            break;
        case "1*2*1":
            eng_purchase();
            break;
        case "1*3":
            eng_register();
            break;
        case "1*4":
            eng_help();
            break;
        case "2":
            // kinya
            switch_kinya();
            break;
        case "2*2":
            kinya_promotion();
            break;
        case "2*3":
            kinya_register();
            break;
        case "2*2*1":
            //Customer want to buy something
            kinya_purchase();
            break;
        case "2*4":
            kinya_help();
            break;
        case "2*1":
            products_list();
            break;
        case "2*2*ABCD1213":
            $response = "END Byakozwe neza, Ikaze ".$phoneNumber;
            break;
        default:
            $text = "Invalid input \n";
            $ussd_stop($text);
    }
}

?>