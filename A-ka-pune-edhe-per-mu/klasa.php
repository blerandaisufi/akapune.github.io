<?php
class Mesazhi{
    public $message;
    public function __construct($message){

        $this->message=$message;
    }
    public function getMessage(){
        echo $this->message;
    }
} 


?>