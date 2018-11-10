<?php
/*
    This class handles a list of modules and modules loading from the list.
*/

class modules
{
    private $id = array();
    private $name = array();
    private $count = 0;

    public function add($name){
        
        $this->id[$this->count] = $this->count;
        $this->name[$this->count] = $name;

        $this->count++;

    }

    public function count(){    
        return $this->count;
    }

    public function getName($moduleId){
        return $this->name[$moduleId];
    }

    public function list(){

        foreach($this->name as $value){
            echo " {$value}";
        }
         
    }

    public function loadAll(){

        foreach($this->name as $value){
            include(MODULES_PATH.$value);
        }

    }
}

?>