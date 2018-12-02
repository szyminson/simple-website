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
    private $pgref;

    /*
        This constructor reads a modules list from a file with path provided as a parameter.
    */
    public function __construct($path = null){
        if($path != null){
            if ($file = fopen($path, "r")) {
                while(!feof($file)) {
                    $line = fgets($file);
            
                    $line = str_replace("\r", '', $line);
                    $line = str_replace("\n", '', $line);
                
                    $this->add($line);
                    
                
                    
                }
                fclose($file);
            }
        }
    }

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
        include($_ENV['MODULES_PATH'].'/'.$this->name[$id]);
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
    public function loadAsContent($pageId){
       
        global $pages, $blade;
        
        $loaded = '';       //  This is where modules' views will be loaded
        

        if($this->count<2){
            
            $Content = array(null);
            $file = $_ENV['MODULES_PATH'].'/'.$this->name[0].'.php';
            if(file_exists($file)) include($file);
             $loaded = $loaded.$blade->run("modules.".$this->name[0],$Content);
        
            } 
        else{    
            
            foreach($this->name as $value){
                $Content = array(null);
                $file = $_ENV['MODULES_PATH'].'/'.$value.'.php';
                if(file_exists($file)) include($file);
                $loaded = $loaded.$blade->run("modules.".$value,$Content);
            }
        
        }
        return $loaded;

    }

    /*
        Loads each module into an array segment
    */
    public function loadAsArray($pageId){
        
        global $pages, $blade;

        $array = array();

        if($this->count<2){
            
            $Content = array(null);
            $file = $_ENV['MODULES_PATH'].'/'.$this->name[0].'.php';
            if(file_exists($file)) include($file);
             $array[$this->name[0]] = $blade->run("modules.".$this->name[0],$Content);
        
            } 
        else{    
            
            foreach($this->name as $value){
                $Content = array(null);
                $file = $_ENV['MODULES_PATH'].'/'.$value.'.php';
                if(file_exists($file)) include($file);
                $array[$value] = $blade->run("modules.".$value,$Content);
            }
        
        }
        return $array;



    }
}

?>