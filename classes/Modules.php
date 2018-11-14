<?php
/*
    This class handles a list of modules and modules loading from the list.
*/

namespace SimpleWebsite;

class Modules
{
    private $id = array();
    private $name = array();
    private $count = 0;

    /*
        Adds a new module to the list.
    */
    public function add($name){
        
        $this->id[$this->count] = $this->count;
        $this->name[$this->count] = $name;
        $this->count++;

    }

    /*
        Returns a number of modules on the list.
    */
    public function count(){    
        return $this->count;
    }

    /*
        Returns a name of a module with a given id parameter.
    */
    public function getName($id){
        return $this->name[$id];
    }

    /*
        Includes a module into an app code.
    */
    public function load($id){
        include($_ENV['MODULES_PATH'].$this->name[$id]);
    }

    /*
        This one's for testing purposes. Displays names of all modules from the list.
    */
    public function list(){

        foreach($this->name as $value){
            echo " {$value}";
        }
         
    }

    /*
        Includes all modules from the list into an app code.
    */
    public function loadAll($pageId){

        if($this->count<2){
            global $pages;
            include($_ENV['MODULES_PATH'].$this->name[0].'.php');
        } 
        else{    
            foreach($this->name as $value){
                global $pages, $blade;
                include($_ENV['MODULES_PATH'].$value.'.php');
            }
        }

    }
}

?>