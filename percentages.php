<?php

$revenueper = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1D01, enroll2010.EFYTOTLT FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID INNER JOIN enroll2010 on enroll2010.UNITID = colleges.UNITID ORDER BY fin2010.F1D01 DESC';
$netassper = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A18, enroll2010.EFYTOTLT FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID INNER JOIN enroll2010 on enroll2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A18 DESC';
$liabilper = 'SELECT colleges.INSTNM, colleges.UNITID, fin2010.F1A13, enroll2010.EFYTOTLT FROM colleges INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID INNER JOIN enroll2010 on enroll2010.UNITID = colleges.UNITID ORDER BY fin2010.F1A13 DESC';

$perchangeliab = 'SELECT colleges.UNITID, fin2011.F1A13, fin2010.F1A13 as 1F1A13 FROM colleges INNER JOIN fin2011 on fin2011.UNITID = colleges.UNITID INNER JOIN fin2010 on fin2010.UNITID = colleges.UNITID';
$perchangeenrol = 'SELECT colleges.UNITID, enroll2011.EFYTOTLT, enroll2010.EFYTOTLT as 1EFYTOTLT FROM colleges INNER JOIN enroll2011 on enroll2011.UNITID = colleges.UNITID INNER JOIN enroll2010 on enroll2010.UNITID = colleges.UNITID'; 

function perstudenter($query, $table, $newitem, $param){
  //--addinhere--//

try{
$DBH = new PDO("mysql:host=localhost;dbname=employees", 'kc99', 'kc99$1234');
}

catch(PDOException $e){
echo $e->getMessage();
}

$sql = "INSERT INTO " . $table . "(UNITID," . $newitem . ") VALUES (:id, :per)";

echo $sql;

$this1 = $DBH->prepare($query);
$this1->execute();
$what1 = $this1->fetchall(PDO::FETCH_ASSOC);


foreach($what1 as $index1 => $output1){
  $holder = 0;
  $miniarray = array();
  foreach($output1 as $index2 => $output2){
    if ($index2 == 'UNITID'){
      array_push($miniarray, $output2);
    }elseif($index2 == $param){
      $holder = $holder + $output2;
    }elseif($index2 == 'EFYTOTLT'){
      $holder = $holder/$output2;
      array_push($miniarray, $holder);
        $inject = $DBH->prepare($sql);
        $inject->bindValue(':id',$miniarray[0]);
        $inject->bindValue(':per',$miniarray[1]);
        $inject->execute();
    }
  }
}

}

function percentager($query, $table, $newitem, $param, $param2){

try{
$DBH = new PDO("mysql:host=localhost;dbname=employees", 'kc99', 'kc99$1234');
}

catch(PDOException $e){
echo $e->getMessage();
}

$sql = "INSERT INTO " . $table . "(UNITID," . $newitem . ") VALUES (:id, :per)";

$this1 = $DBH->prepare($query);
$this1->execute();
$what1 = $this1->fetchall(PDO::FETCH_ASSOC);  


foreach($what1 as $index1 => $output1){
  $holder = 0;
  $miniarray = array();
  foreach($output1 as $index2 => $output2){
    if ($index2 == 'UNITID'){
      array_push($miniarray, $output2);
    }elseif($index2 == $param){
      $holder = $holder + $output2;
    }elseif($index2 == $param2){
      $place = $holder;
      $holder = $holder - $output2;
      $holder = $holder/$place * 100;
      array_push($miniarray, $holder);
        $inject = $DBH->prepare($sql);
        $inject->bindValue(':id',$miniarray[0]);
        $inject->bindValue(':per',$miniarray[1]);
        $inject->execute();
      }
    }
  }

echo '<br/>';

}

//perstudenter($revenueper, 'rev2010', 'revps' ,'F1D01');
//perstudenter($netassper, 'net2010', 'netps', 'F1A18');
//perstudenter($liabilper, 'liab2010', 'liabps', 'F1A13');

//percentager($perchangeenrol,'denrol','denrol','EFYTOTLT', '1EFYTOTLT');
//percentager($perchangeliab, 'dliab','dliab','F1A13', '1F1A13');

?>