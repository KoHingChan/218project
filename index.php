<?php
print_r(PDO::getAvailableDrivers());
echo '<br/>';
echo '<link rel="stylesheet" type="text/css" href="tabley.css">';


try{
$DBH = new PDO("mysql:host=localhost;dbname=employees", 'kc99', 'kc99$1234');
echo 'success'.'<br/>';
}

catch(PDOException $e){
echo $e->getMessage();
}

$results = $DBH->query("Select * from employees limit 10");

echo "<div class='CSSTableGenerator'><table><tr><td>First Name</td><td>Last Name
</td><td>Employee Number</td><td>Birth Date</td><td>Gender</td><td>Hire Date</td>
</tr>";

foreach ($results as $row){
echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . 
"</td><td>" . $row['emp_no'] . "</td><td>" . $row['birth_date'] . "</td><td>" . 
$row['gender']  . "</td><td>" . $row['hire_date'] . "</td></tr>";
}

echo "</table></div>";

?>
