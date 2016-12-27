<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '123123';
$dbname = 'test';
$myconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$sql1 = "SELECT dept_code,dept_name,PARENT_dept_code FROM (  
     SELECT distinct dept_code,dept_name,PARENT_dept_code FROM userbaseinfo
     UNION ALL  
     SELECT distinct dept_code,dept_name,PARENT_dept_code FROM userbaseinfo where PARENT_dept_code like 'S000%' 
)TEMP where PARENT_dept_code LIKE'".$_POST['dept_code']."%' GROUP BY dept_code HAVING COUNT(dept_code) = 1";
$result1 = $myconn->query($sql1);
$str_msg="";


if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()) {		
		$str_msg = $str_msg."<li class='mui-table-view-cell third'><a class='mui-navigate-right' id='".$row1["dept_code"]."'>".$row1["dept_name"]." </a></li>";								
    }
} 
else{
	$str_msg="false";
}

echo $str_msg;
$myconn->close();
?>