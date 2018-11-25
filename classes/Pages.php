<?php

/*
    This class handles a list of existing pages (defined in []) with all needed metadata
    such as modules for each page, url name, page's title, filename, etc.
*/
namespace SimpleWebsite;

class Pages
{
    private $id = array();
    private $name = array();
    private $title = array();
    private $urlName = array();
    private $template = array();
    private $menuVisible = array();
    private $modules = array();
    private $count = 0;

    public function __construct($path){

        if ($file = fopen($path, "r")) {
            while(!feof($file)) {
                $line = fgets($file);
        
                $line = str_replace("\r", '', $line);
                $line = str_replace("\n", '', $line);
                
                $parameter = explode("; ", $line);
                $parameter[4] = ($parameter[4]==='true');
        
                $modules = explode(" + ", $parameter[5]);
        
                $this->add($parameter[0], $parameter[1], $parameter[2], $parameter[3], $parameter[4], $modules);
                if($parameter[4])echo $parameter[3];
                
            }
            fclose($file);
        }

    }
    
    /*
        Adds a new page to the object.
    */
    public function add($name, $title, $urlName, $template, $menuVisible = true, $modules){

        $this->id[$this->count] = $this->count;
        $this->name[$this->count] = $name;
        $this->title[$this->count] = $title; 
        $this->urlName[$this->count] = $urlName;
        $this->template[$this->count] = $template;
        $this->menuVisible[$this->count] = $menuVisible;

        $this->modules[$this->count] = new Modules;

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

    /*
        Returns a title of a page with given id
    */
    public function getTitle($id){
        return $this->title[$id];
    }

    /*
        Returns an url name of a page with given id.
    */
    public function getUrlName($id){
        return $this->urlName[$id];
    }

    /*
        Returns a template name of a page with given id.
    */
    public function getTemplate($id){
        return $this->template[$id];
    }

    /*
        Load page's modules
    */
    public function load($id){
        global $blade;
        
        $title = $this->title[$id];
        $content = $this->modules[$id]->loadAll($id);
        
        echo $blade->run("layouts.subPage",array("title"=>$title,"content"=>$content));
    }

}

?>