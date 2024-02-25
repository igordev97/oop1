<?php

class Igor{
    private $name;


    public function getName(){
        return $this->name;
    }

    public function setName($newName){
        $this->name = $newName;
        $this->name = ucfirst($this->name);
    }



}

$igor = new Igor();

$igor->setName("igor");
echo $igor->getName();