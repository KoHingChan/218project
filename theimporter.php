<?php

$program = new program();
class program{

function __construct(){

    session;
    
    $page = 'homepage';
    
    $arg  = NULL;
    
    if (isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
    }
    
    if (isset($_REQUEST['arg'])) {
        $arg = $_REQUEST['arg'];
    }
    //echo $page;
    $page = new $page($arg);
}

}
function __destruct(){
    
}

class session{

public function __construct(){

    session_start();

}

}

abstract class page{
    
    public $content;
    
    function menu(){
        
        $menu = '<table>';
        $menu .= '<tr><td><a href="./project.php">Homepage</a></td></tr>';
        $menu .= '</table>';
        
        return $menu;
        
    }
    
    function __construct($arg = NULL){
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            
            $this->get();
            
        }else{
            
            $this->post();
            
        }
        
    }
    
    function get(){
        
        
        
    }
    
    function post(){
        
        
        
    }
    
    function __destruct(){
        
        echo $this->content;
        
    }
    
}

class homepage extends page
{
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->welcome();
    }
    function welcome()
    {
      $welcome = '<P>Hello, and welcome to these silly databases</p>';
      
      return $welcome;
    }
}





?>