<?php
include('./config/db.php');


function main_menu(){
    $text  = "Select Language/ Hitamo ururimi \n1. English \n2. Kinyarwanda \n";
    ussd_proceed($text);
}


// For 2
function switch_kinya(){
    $text = "Ikaze mu INGABO Plant Health ltd \n1. Reba Ibicuruzwa byacu \n2. Reba Poromotion dufite\n 3. Iyandikishe nk'umukiriya mushya \n4. Saba ubufasha \n";
    ussd_proceed($text);
}

// For 2*1
function products_list(){
    // Get products kinya
    $url = "http://197.243.14.102:4000/api/v1/products/kin";
    $decode = array();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if($e = curl_error($ch)){
        $text = "Error: ".$e;
        ussd_stop($text);
    }else{
        $decode = json_decode($response, true);
    }
    $text = "Urutonde:\n";
    $i = 1;
    foreach($decode['products'] AS $val){
        $text .= $i.". ".$val['name']."\n";
        $i++;
    }
    ussd_stop($text);
}

// For 2*1*1
function kinya_purchase(){
    $text = "Umukozi wacu arakuvugisha vuba agufashe.\n Urakoze cyane!";
    ussd_stop($text);
}

// For 1*3
function eng_register(){
    $text = "Register here: \n Add fullname!";
    ussd_proceed($text);
}

// For 1*4
function eng_help(){
    $text = "Call us on +250 738 907 967/+250 787 265 587. \n Send us a message on info@ingabo.rw or Visit our office: Umuyenzi plaza, KN 5 Rd, Kigali, Rwanda \n Thank you!";
    ussd_stop($text);
}




// For 2*2
function kinya_promotion(){
    $text = "Gura ibicuruzwa birengeje 200.000 RWF ubyohererezwe kubuntu no kugabanyirizwa 3% ku giciro wagombaga kwishyura. \n1. Gura nonaha\n";
    ussd_proceed($text);
}

// For 2*3
function kinya_register(){
    $text = "Iyandikishe: \n Andikamo amazina yawe!";
    ussd_proceed($text);
}

// For 2*4
function kinya_help(){
    $text = "Hamagara +250 738 907 967/+250 787 265 587. \n Twandikire kuri info@ingabo.rw cyangwa udusure ku umuyenzi plaza, KN 5 Rd, Kigali, Rwanda \n Murakoze!";
    ussd_stop($text);
}


// For 1
function switch_english(){
    $text = "Welcome at INGABO Plant Health ltd \n1. Our product list \n2. Current Promotions\n 3. New customer registration \n4. Help center \n";
    ussd_proceed($text);
}

// For 1*1
function Eng_products_list(){
    // Get products kinya
    $url = "http://197.243.14.102:4000/api/v1/products/en";
    $decode = array();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if($e = curl_error($ch)){
        $text = "Error: ".$e;
        ussd_stop($text);
    }else{
        $decode = json_decode($response, true);
    }
    $text = "List:\n";
    $i = 1;
    foreach($decode['products'] AS $val){
        $text .= $i.". ".$val['name']."\n";
        $i++;
    }
    ussd_stop($text);
}

// For 1*2
function eng_promotion(){
    $text = "Place order of 200,000 Rwandan Francs and  above, you'll get a free shipping and 3% discount.. \n1. Shop now\n";
    ussd_proceed($text);
}

// For 1*2*1
function eng_purchase(){
    $text = "Our team are working hard to contact you.\n Thank you!";
    ussd_stop($text);
}



function english_menu(){
    $text = "Choose account information you want to view \n1. Register \n2. Login \n";
    ussd_proceed($text);
}




function ussd_proceed($text){
    echo "CON ".$text;
}

function ussd_stop($text){
    echo "END ".$text;
}

?>