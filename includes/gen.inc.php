<?php


include 'class-autoload.inc.php';
//wywoluje class-load

$minStrlen =(int)$_POST['num1'];
$maxStrlen =(int)$_POST['num2'];
$wordC =(int)$_POST['num3'];
$option = $_POST['option'];
//wywoluje wszystkie informacje z formy uzytkownika

$words = new Gen($wordC, $minStrlen, $maxStrlen);
//tworzy nowy object classy z informacja przyjeta od uzytkownika przez wyslanie do function __constructor

try{
    $words->log();
    //tworzy log uzywajac classy $words
    if($option == 'real'){
        echo $words->word();
        //jesli uzytkownik wybierze generacje prawdziwych slow, script 
        //zarzadza urchomienie function w class $words
    }elseif($option == 'random'){
        echo $words->random_string();
        //jesli uzytkownik wybierze generacje ciagu slow, script 
        //zarzadza urchomienie function w class $words
    }else{
        echo "error";
    }
    
}catch(TypeError $e){
    echo "error: ". $e->getMessage();
}catch(Exception $e){
    echo "error: ". $e->getMessage();
}