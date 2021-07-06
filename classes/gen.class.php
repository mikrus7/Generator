<?php

class Gen{

    public $count;
    public $minStrlen;
    public $maxStrlen;
    public $words = "";
    // $ uzywane w Class 

    public function __construct(int $one, int $two, int $three){
     $this->count = $one;
     $this->minStrlen = $two;  
     $this->maxStrlen = $three;   
     // $ dostaja wartosci wysylane podczas tworzenia object
    }
    public function word(){
        $myFile = file("../assets/english.txt");
        //laczy do pliku z lista ang slow
        $wordC = 0;
        $consonants = [
            'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 
            'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'];
            // array z spolgloskami
       
        for($x=1; $x<=$this->count; $x+=1){
            //loop zawierajacy liczbe slow wywolujacych przez uzytkownika
            $random = mt_rand(0,19);
            //wybiera spolgloske pomiedzy 1 a 20
            foreach($myFile as $line){
                //czyta plikl slow co linijke 
                if($wordC == $this->count){
                    break; 
                    //jesli jest wystarczajaco slow to loop sie konczy
                }elseif((strlen($line)-1) > $this->minStrlen && (strlen($line)-1) < $this->maxStrlen){
                    // sprawdza czy slowa sa pomiedzy zakresem liczby znakow
                    if($consonants[$random] == $line[0]){
                        //sprawdza czy 1 litera slowa jest samogloska i czy sie rowna z losowo wybrana spolgloska
                        if(preg_match('/^[aeiou]/i', $line[1])){
                            // sprawdza czy 2 litera slowa jest samogloska
                            $this->words .= $line . "<br>";
                            $wordC = $wordC+1;
                            break;
                        }
                    }
                }
                
            } 
        }
        return $this->words;
        // wysyla wsztkie slowa do scriptu do wyswietlenia
        
    }
    public function random_string(){  
        //function tworzenia ciagu znakow
        $string = '';
        $vowels = array("a","e","i","o","u");  
        $consonants = array(
            'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 
            'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'
        );  
        // array samoglosek i spolglosek
    
        $max = $this->maxStrlen;
        for($x=1; $x<=$this->count; $x+=1){
            //loop zawierajacy liczbe slow wywolujacych przez uzytkownika
            for ($i = 0; $i <= $max; $i++){
                // loop dostawania liter dla slowa do maksymalnej liczby liter podanych prze uzytkownika 
                if(strlen($string) < $this->maxStrlen){
                    //sprawdza czy generwoane slow ma ponizej maksymalnej ilosci liter
                    $string .= $consonants[rand(0,19)];
                    //wybiera losowo z array
                }if(strlen($string) < $this->maxStrlen){
                    //sprawdza czy generwoane slow ma ponizej maksymalnej ilosci liter
                    $string .= $vowels[rand(0,4)];
                    //wybiera losowo z array
                }
            } 
            $this->words .= $string ."<br>";
            $string = '';
            //dodaje slow do listy i zmienia $ na pusty na nastepne slowo
        }
        
        return $this->words;
    }   

    public function log(){
        $date = date(DATE_RFC2822);
        // generuje date 
        $file = '../assets/log-' .(string)$date.'.txt';
        // tworzy nazwe pliku 
        $content = "Data wykonania: " .(string)$date. "\nilosc slow: " . (string)$this->count . "\nminimum znakow: " . (string)$this->minStrlen . "\nmaximum znakow: " . (string)$this->maxStrlen;
        // dodaje dane do pliku txt 
        file_put_contents($file, $content);
        //tworzy plik
    } 
   
}