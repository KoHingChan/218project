<?php

$question1 = 'SELECT colleges.INSTNM, colleges.UNITID FROM colleges INNER JOIN enroll2010 on colleges.UNITID = enroll2010.UNITID ORDER BY enroll2010.EFYTOTLT DESC LIMIT 10';

echo tabler1($question1);

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
?>