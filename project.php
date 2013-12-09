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
//

function __destruct(){
    
}
}

class session{

public function __construct(){

    session_start();

}
}
function tabler1($query){

echo '<link rel="stylesheet" type="text/css" href="tabley.css">';

try{
$DBH = new PDO("mysql:host=localhost;dbname=employees", 'kc99', 'kc99$1234');
}

catch(PDOException $e){
echo $e->getMessage();
}

$results = $DBH->query($query);

$holder = "<div class='CSSTableGenerator'><table><tr>";

$count = 0;

foreach ($results as $row){
  $hold1 = '<tr>';
  foreach ($row as $item => $value){
    if ($count == 0 && is_int($item) !== TRUE){
      $holder .= '<td>' . $item . '</td>';
    }
  }
  $holder .= '</tr>';
  $count = 1;
  for ($i = 0; $i<count($row)/2; ++$i){
    $hold1 .= '<td>' . $row[$i] . '</td>';
  }
  $hold1 .= '</tr>';
  $holder .= $hold1;
}

return $holder;

}

//--------------------------

abstract class page{
    
    public $content;
    
    function menu(){
        
        $menu = "Due to the Server's hardware limitations, please allow a moment for the tables to be generated."
        $menu .= '<table>';
        $menu .= '<tr><td><a href="./project.php">Homepage</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question1">Question1</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question2">Question2</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question3">Question3</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question4">Question4</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question5">Question5</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question6">Question6</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question7">Question7</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question8">Question8</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question9">Question9</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question10">Question10</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question11">Question11</a></td></tr>';
        $menu .= '<tr><td><a href="./project.php?page=question12">Question12</a></td></tr>';
        
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

//---------------------------

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

class question1 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->item();
        
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID FROM colleges INNER
        JOIN enroll2010 on colleges.UNITID = enroll2010.UNITID ORDER BY
        enroll2010.EFYTOTLT DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question2 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->item();
        
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A13 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A13 DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question3 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->item();
        
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A18 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A18 DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question4 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->item();
        
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A18 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A18 DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question5 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->item();
        
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1D01 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1D01 DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

//class question2 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//        
//    }
//    
//    $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A13 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A13 DESC LIMIT 10';
//    
//}
//
//
//class question3 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//        
//    }
//    
//    $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A13 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A13 DESC LIMIT 10';;
//    
//    
//}
//
//
//class question4 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//        
//    }
//    
//    $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A13 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A13 DESC LIMIT 10'; 
//    
//}
//
//
//class question5 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//        
//    }
//    
//    $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1D01 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1D01 DESC LIMIT 10';
//    
//}
//
//
//class question6 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//        
//    }
//
//    $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1D01 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1D01 DESC LIMIT 10';
//    $q2 = 'SELECT colleges.INSTNM, colleges.UNITID FROM colleges INNER JOIN enroll2010 on colleges.UNITID = enroll2010.UNITID ORDER BY enroll2010.EFYTOTLT DESC LIMIT 10';
//}
//
//
//class question7 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//        
//    }
//    
//    $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1D01 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1D01 DESC LIMIT 10';
//    $q2 = 'SELECT colleges.INSTNM, colleges.UNITID FROM colleges INNER JOIN enroll2010 on colleges.UNITID = enroll2010.UNITID ORDER BY enroll2010.EFYTOTLT DESC LIMIT 10';
//}
//
//
//class question8 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//        
//    }
//    
//    $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A13 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A13 DESC LIMIT 10';
//    $q2 = 'SELECT colleges.INSTNM, colleges.UNITID FROM colleges INNER JOIN enroll2010 on colleges.UNITID = enroll2010.UNITID ORDER BY enroll2010.EFYTOTLT DESC LIMIT 10';
//}
//
//class question9 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//        
//    }
//    
//    $q1 = '';
//    $q2 = '';
//    $q3 = '';
//    $q4 = '';
//    $q5 = '';
//    $q6 = '';
//    $q7 = '';
//    
//}
//
//
//
//class question10 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//        
//    }
//    
//}
//
//
//class question11 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//        
//    }
//    
//    $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A13 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A13 DESC LIMIT 10';
//    $q2 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A13 FROM colleges INNER JOIN fin2010 on fin2011.UNITID = colleges.UNITID ORDER BY fin2011.F1A13 DESC LIMIT 10';
//    
//}
//
//
//class question12 extends page
//{
//    
//    function get()
//    {
//        $this->content .= $this->menu();
//        
//    }
//    
//    $q1 = 'SELECT colleges.INSTNM, colleges.UNITID FROM colleges INNER JOIN enroll2010 on colleges.UNITID = enroll2010.UNITID ORDER BY enroll2010.EFYTOTLT DESC LIMIT 10';
//    $q2 = 'SELECT colleges.INSTNM, colleges.UNITID FROM colleges INNER JOIN enroll2010 on colleges.UNITID = enroll2011.UNITID ORDER BY enroll2011.EFYTOTLT DESC LIMIT 10';
//    
//}
?>