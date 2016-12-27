<?php
header("Content-Type: text/html; charset=utf-8");
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '123123';
$dbname = 'test';
$myconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$sql1 = "SELECT distinct domain FROM userbaseinfo ";
$result1 = $myconn->query($sql1);
$sql2 = "SELECT distinct dept_code,dept_name,domain,PARENT_dept_code FROM userbaseinfo where PARENT_dept_code like 'S000%' or dept_code='S000' order by PARENT_dept_code, DEPT_CODE";
$result2 = $myconn->query($sql2);


$str_msg="";
$str_place1="";
$str_place2="";
if ($result2->num_rows > 0) {
    // 组合子列表
    while($row2 = $result2->fetch_assoc()) {
		$temp_site=trim($row2["domain"]);
		if($temp_site=="BMS"){			
			$str_place1 = $str_place1."<li class='mui-table-view-cell mui-collapse second'><a class='mui-navigate-right a_second' id='".$row2["dept_code"]."'>".$row2["dept_name"]."</a><ul class='mui-table-view department' style='display: none;'></ul></li>";						
		}
		ELSE{
			$str_place2 = $str_place2."<li class='mui-table-view-cell mui-collapse second'><a class='mui-navigate-right a_second' id='".$row2["dept_code"]."'>".$row2["dept_name"]."</a><ul class='mui-table-view department' style='display: none;'></ul></li>";
		}
    }
} 


if ($result1->num_rows > 0) {
    // 组合一级父列表
    while($row1 = $result1->fetch_assoc()) {
		$temp_site=trim($row1["domain"]);
		if($temp_site=="BMS"){
			$str_msg = $str_msg."<li class='mui-table-view-cell mui-collapse first'><a class='mui-navigate-right' id='".$row1["domain"]."' >".$row1["domain"]."</a><ul class='mui-table-view first_dept'>".$str_place1."</ul></li>";
		}
		ELSE{
			$str_msg = $str_msg."<li class='mui-table-view-cell mui-collapse first'><a class='mui-navigate-right' id='".$row1["domain"]."' >".$row1["domain"]."</a><ul class='mui-table-view first_dept'>".$str_place2."</ul></li>";
		}
    }
} 


echo $str_msg;
$myconn->close();

//echo $_POST['username'];
?>