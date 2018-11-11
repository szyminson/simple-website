<?php
require_once('modulesClass.php');
/*
    This class handles a list of existing pages (defined in []) with all needed metadata
    such as modules for each page, url name, page's title, filename, etc.
*/

class pages
{
    private $id = array();
    private $name = array();
    private $title = array();
    private $urlName = array();
    private $menuVisible = array();
    private $modules = array();
    private $count = 0;

    /*
        Adds a new page to the object.
    */
    public function add($name, $title, $urlName, $menuVisible = true, $modules){

        $this->id[$this->count] = $this->count;
        $this->name[$this->count] = $name;
        $this->title[$this->count] = $title; 
        $this->urlName[$this->count] = $urlName;
        $this->menuVisible[$this->count] = $menuVisible;

        $this->modules[$this->count] = new modules;

        if(is_array($modules)){    
            foreach($modules as $module){
                $this->modules[$this->count]->add($module);
            }
        }
        else $this->modules[$this->count]->add($modules);

        $this->count++;

    }


    /*
        This one's just for testing purposes. Runs the list method from class modules.
    */
    public function showModules($id){
        $this->modules[$id]->list();
    }

}

?>