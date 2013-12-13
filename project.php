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
        
        $menu .= '<table border="1" bordercolor="#0033FF">';
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
    
    function legend(){
        
        $something = '<style>table{float:left}</style><table border="1" bordercolor="#0033FF" style="background-color:#FFFFFF" width=auto cellpadding="3" cellspacing="0">
    <tr>
        <td><b>Code</b></td>
        <td><b>Description</b></td>
    </tr>
        <tr>
        <td>EFYTOTLT</td>
        <td>Total Enrollment</td>
    </tr>
    <tr>
        <td>F1D01</td>
        <td>Total Revenue</td>
    </tr>
    <tr>
        <td>F1A18</td>
        <td>Total Net Assets</td>
    </tr>
    <tr>
        <td>F1A13</td>
        <td>Total Liabilities</td>
    </tr>
    <tr>
        <td>INSTNM</td>
        <td>Institute Name</td>
    </tr>
    <tr>
        <td>UNITID</td>
        <td>Institute ID #</td>
    </tr>
    <tr>
        <td>STABBR</td>
        <td>State</td>
    </tr>
    <tr>
        <td>dliab</td>
        <td>% Change in Liability</td>
    </tr>
    <tr>
        <td>denrol</td>
        <td>% Change in Enrollment</td>
    </tr>
    <tr>
        <td>revps</td>
        <td>Revenue per Student</td>
    </tr>
    <tr>
        <td>netps</td>
        <td>Net Assets per Student</td>
    </tr>
    <tr>
        <td>liabps</td>
        <td>Liabilities per Student</td>
    </tr>
</table>

';
        return $something;
        
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
        $this->content .= $this->legend();
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
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, enroll2010.EFYTOTLT FROM colleges INNER
        JOIN enroll2010 on colleges.UNITID = enroll2010.UNITID ORDER BY
        enroll2010.EFYTOTLT DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
    function description()
    {
    
        $description = "Top Ten Colleges with the Highest Enrollment (2010)";
        
        return $description;
    }
    
}

class question2 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A13 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A13 DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
    function description()
    {
    
        $description = "Top Ten Colleges with the Highest Liabilities (2010)";
        
        return $description;
    }
    
}

class question3 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
    function description()
    {
        $description = "Top Ten Colleges with the Net Assets (2010)";
        
        return $description;
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
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
        function description()
    {
    
        $description = "Top Ten Colleges with the Highest Net Assets (2010)";
        
        return $description;
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
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
    function description()
    {
        $description = "Top Ten Colleges with the Highest Revenue (2010)";
        
        return $description;
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1D01 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1D01 DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question6 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
    function description()
    {
        $description = "Top Ten Colleges with the Highest Revenue per Student (2010)";
        
        return $description;
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, rev2010.revps FROM colleges INNER JOIN rev2010 on rev2010.UNITID = colleges.UNITID ORDER BY net2010.netps DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question7 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
    function description()
    {
        $description = "Top Ten Colleges with the Highest Net Assets Per Student (2010)";
        
        return $description;
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, net2010.netps FROM colleges INNER JOIN net2010 on net2010.UNITID = colleges.UNITID ORDER BY net2010.netps DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question8 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
    function description()
    {
        $description = "Top Ten Colleges with the Highest Liabilities Per Student (2010)";
        
        return $description;
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, liab2010.liabps FROM colleges INNER JOIN liab2010 on liab2010.UNITID = colleges.UNITID ORDER BY liab2010.liabps DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question9 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
    function description()
    {
        $description = "Top Ten Colleges (2010)";
        
        return $description;
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.UNITID fin2010.F1D01 FROM colleges
        INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID
        INNER JOIN enroll2010 on enroll2010.UNITID = colleges.UNITID
        INNER JOIN rev2010 on rev2010.UNITID = colleges.UNITID
        INNER JOIN net2010 on net2010.UNITID = colleges.UNITID
        INNER JOIN liab2010 on liab2010.UNITID = colleges.UNITID ORDER BY fin2010.F1D01 ORDER BY  DESC LIMIT 5';
        $q2 = 
        $q3 =  
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question10 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->legend();
        $this->content .= $this->selectstate();
        $this->content .= $this->description();
        
    }
    
    function description()
    {
        $description = "Top Ten Colleges with the Highest Revenue (2010)";
        
        return $description;
    }
    
    
    function selectstate()
    {
       
        $form = '<select name="statepicker" form="statequery">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>';

     
        $form .= '<form action="state.php" id = "statequery" method="post">
        <input type="submit">
        </form>';
        
        return $form;
        
    }
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1D01 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1D01 DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question11 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
    function description()
    {
        $description = "Top Ten Colleges with the Highest Percent Change in Liabilities from 2010 to 2011";
        
        return $description;
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, dliab.dliab FROM colleges INNER JOIN dliab on dliab.UNITID = colleges.UNITID ORDER BY dliab.dliab DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

class question12 extends page
{
    
    function get()
    {
        $this->content .= $this->menu();
        $this->content .= $this->legend();
        $this->content .= $this->item();
        $this->content .= $this->description();
        
    }
    
    function description()
    {
        $description = "Top Ten Colleges with the Highest Percent Change in Enrollment from 2010 to 2011";
        
        return $description;
    }
    
    
    function item()
    {
        $q1 = 'SELECT colleges.INSTNM, colleges.UNITID, denrol.denrol FROM colleges INNER JOIN denrol on denrol.UNITID = colleges.UNITID ORDER BY denrol.denrol DESC LIMIT 10';
        
        $item = tabler1($q1);
        
        return $item;
    }
    
}

?>