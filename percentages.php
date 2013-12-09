<?php

try{
$DBH = new PDO("mysql:host=localhost;dbname=employees", 'kc99', 'kc99$1234');
}

catch(PDOException $e){
echo $e->getMessage();
}

$fr2010 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1D01 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1D01 DESC';
$fr2011 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2011.F1D01 FROM colleges INNER JOIN fin2011 on fin2011.UNITID = colleges.UNITID ORDER BY fin2011.F1D01 DESC';
$fl2010 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A13 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A13 DESC';
$fl2011 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2011.F1A13 FROM colleges INNER JOIN fin2011 on fin2011.UNITID = colleges.UNITID ORDER BY fin2011.F1A13 DESC';
$fn2010 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A18 FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A18 DESC';
$fn2011 = 'SELECT colleges.INSTNM, colleges.UNITID, fin2011.F1A18 FROM colleges INNER JOIN fin2011 on fin2011.UNITID = colleges.UNITID ORDER BY fin2011.F1A18 DESC';
$e2010 = 'SELECT colleges.INSTNM, colleges.UNITID FROM colleges INNER JOIN enroll2010 on colleges.UNITID = enroll2010.UNITID ORDER BY enroll2010.EFYTOTLT DESC';
$e2011 = 'SELECT colleges.INSTNM, colleges.UNITID FROM colleges INNER JOIN enroll2010 on colleges.UNITID = enroll2011.UNITID ORDER BY enroll2011.EFYTOTLT DESC';

$ = $DBH->query("Select * from colleges limit 10");

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

echo $holder;

?>