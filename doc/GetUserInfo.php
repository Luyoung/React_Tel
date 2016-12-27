<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '123123';
$dbname = 'test';
$myconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$sql1 = "SELECT emp_no,ename,cname,ext_no,dept_name FROM userbaseinfo where dept_code='".$_POST['dept_code']."' or dept_code='".$_POST['parent_code']."'
union
SELECT emp_no,ename,cname,ext_no,dept_name FROM userbaseinfo where ename like '%".$_POST['dept_code']."%'
union
SELECT emp_no,ename,cname,ext_no,dept_name FROM userbaseinfo where ext_no like '%".$_POST['dept_code']."%'
union
SELECT emp_no,ename,cname,ext_no,dept_name FROM userbaseinfo where cname like '%".$_POST['dept_code']."%'
";
$result1 = $myconn->query($sql1);
$str_msg="";


if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()) {
		if($_POST['flag']=="false"){
			$imgurl="http://localhost:8080/test3/doc/Getpic.php?username=".$row1["cname"];
			$str_msg=$str_msg."<li class='mui-table-view-cell mui-collapse forth'><a id='".$row1["emp_no"]."' href='doc/UserInfo.php'><img class='mui-media-object mui-pull-left' src='".$imgurl."'><div class='mui-media-body'>".$row1["cname"]." (".$row1["ename"].")"."<p class='mui-ellipsis'>".$row1["ext_no"]."</p></div></a></li>";
		}
		else{
			$imgurl="http://localhost:8080/test3/doc/Getpic.php?username=".$row1["cname"];
			$str_msg=$str_msg."<li class='mui-table-view-cell mui-collapse forth'><a id='".$row1["emp_no"]."' href='doc/UserInfo.php'><img class='mui-media-object mui-pull-left' src='".$imgurl."'><div class='mui-media-body'>".$row1["cname"]." (".$row1["ename"].")".$row1["dept_name"]."<p class='mui-ellipsis'>".$row1["ext_no"]."</p></div></a></li>";
		}
    }
} 

echo $str_msg;
$myconn->close();
?>