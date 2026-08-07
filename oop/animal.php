<?php
//Terdapat sebuah class Animal yang memiliki sebuah constructor name, 
// default property legs = 4 dan cold_blooded = no.

class animal
{
    public $legs = 4;
    public $cold_blooded = "no";
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }



}
;

?>