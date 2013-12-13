<?php

if (isset($_POST['statepicker'])){
    
    $sql = 'SELECT colleges.INSTNM FROM colleges Where colleges.STABBR = "' . $_POST['statepicker'] . '" ORDER BY colleges.INSTNM ASC';
    
}

echo "All Colleges from " . $_POST['statepicker'] . '<br/>';

        $menu = '<style>table{float:left}</style><table border="1" bordercolor="#0033FF">';
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
        

echo $menu;    


try{
$DBH = new PDO("mysql:host=localhost;dbname=employees", 'kc99', 'kc99$1234');
}

catch(PDOException $e){
echo $e->getMessage();
}

$results = $DBH->query($sql);

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

echo tabler1($sql);


?>