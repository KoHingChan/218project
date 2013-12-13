<?php

//create table queries

$createhd2011 = 'create table colleges(UNITID int, INSTNM varchar, STABBR varchar(2))';
$createeffy2010 = 'create table enroll2010(UNITID int, EFYTOTLT bigint)';
$createeffy2011 = 'create table enroll2011(UNITID int, EFYTOTLT bigint)';
$createfin2010 = 'create table fin2010(UNITID int, F1A13 bigint,F1A18 bigint,F1D01 bigint)';
$createfin2011 = 'create table fin2011(UNITID int, F1A13 bigint,F1A18 bigint,F1D01 bigint)';

$createrev2010 = 'create table rev2010(UNITID int, revps float)';
$createnet2010 = 'create table net2010(UNITID int, netps float)';
$createliab2010 = 'create table liab2010(UNITID int, liabps float)';

$createrev2011 = 'create table rev2011(UNITID int, revps float)';
$createnet2011 = 'create table net2011(UNITID int, netps float)';
$createliab2011 = 'create table liab2011(UNITID int, liabps float)';

$createdliab = 'create table dliab(UNITID int, dliab float(4))';
$createdenrol = 'create table denrol(UNITID int, denrol float(4))';


//insert queries
$effy2010sql = "INSERT INTO enroll2010(UNITID, EFYTOTLT) VALUES (:id, :number)";
$effy2011sql = "INSERT INTO enroll2011(UNITID, EFYTOTLT) VALUES (:id, :number)";
$hd2011sql = "INSERT INTO colleges(UNITID, INSTNM, STABBR) VALUES (:id, :name, :state)";
$fin2010sql = "INSERT INTO fin2010(UNITID,F1A13,F1A18,F1D01) VALUES (:id, :liabilities, :netassets, :totalrevenue)";
$fin2011sql = "INSERT INTO fin2011(UNITID,F1A13,F1A18,F1D01) VALUES (:id, :liabilities, :netassets, :totalrevenue)";

function upload_csv($filename,$sql)
  {
    //read csv file to create $records, an associative array
    $file = new file();
    $file-> read_csv($filename);
    
    try{

    $DBH = new PDO('mysql:host=localhost;dbname=employees','kc99','kc99$1234');

    }
    catch(PDOException $e){
      
      echo $e->getMessage();
      
    }
    
    //data manipulation here, the insert mysql statement
    foreach ($records as $record)
    {
      $q = $DBH->prepare($sql);
      $q->execute($record);
    }
    
  }


$insertqueries = array($effy2010sql, $effy2011sql, $hd2011sql, $fin2010sql, $fin2011sql);
$insertfiles = array('effy2010.csv', 'effy2011.csv', 'hd2011.csv', 'f0910_f1a.csv', 'f1011_f1a.csv');

foreach ($insertqueries as $key => $value){
    upload_csv($value, $insertfiles[$key]);
}

  //database handler instantiated
  try{
    
    $DBH = new PDO("mysql:host=localhost;dbname=employees",'kc99','kc99$1234');
    
  }
  catch(PDOException $e){
    
    echo $e->getMessage();
    
  }

//create database tables
  
$tablequeries = array($createhd2011, $createeffy2010, $createeffy2011, $createfin2010, $createfin2011, $createrev2010, $createrev2011, $createnet2010, $createnet2011, $createliab2010, $createliab2011, $createdrev, $createdenrol);

//create tables;

foreach ($tablequeries as $values){
  echo $values;
  $DBH->exec($values);
}

class file {
    
    public function read_csv($filename) {
        $first_run = TRUE;
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                if ($first_run == TRUE) {
                    $field_name = $this->create_field_names($data);
                    $first_run  = FALSE;
                } else {
                    $records[] = $this->create_record($data,$field_name);
                }
            }
            fclose($handle);
        }
    }
    
    public function create_field_names($data) {
        return $data;
    }
    
    public function create_record($data, $field_name) {
        $data = array_combine($field_name, $data);
        return $data;
    }
    
    public function writeCSV($data) {
        $fp = fopen('filecsv.csv', 'w');
        
        foreach ($data as $fields) {
            fputcsv($fp, $fields);
        }
        
        fclose($fp);
    }
}

?>