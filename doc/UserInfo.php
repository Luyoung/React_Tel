<!DOCTYPE html>

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '123123';
$dbname = 'test';
$myconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$sql1 = "SELECT cname,email,dept_code,ext_no,phonenumber FROM userbaseinfo where emp_no='".$_GET['emp_no']."'";
$result1 = $myconn->query($sql1);
$cname="";$email="";$dlidl="";$dept_code="";$ext_no="";

if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
		$cname=$row["cname"];
		$email=$row["email"];
		$dept_code=$row["dept_code"];
		$ext_no=$row["ext_no"];
		$phonenumber=$row["phonenumber"];
		$imgurl="http://localhost:8080/test3/doc/Getpic.php?username=".$row["cname"];
    }
} 
$myconn->close();
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="../js/mui.min.js"></script>
    <link href="../css/mui.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="../css/Tel_info.css" />
    <script type="text/javascript" charset="utf-8">
      	mui.init();
    </script>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		<h1 class="mui-title">人员信息</h1>
	</header>
	<div class="user_body">
		<ul class="mui-table-view">
			<div class="list_head">
				<li class="mui-table-view-cell mui-media">
					<img class="mui-media-object mui-pull-left" src='<?php echo $imgurl;?>'/>
					<div class="mui-media-body"><?php echo $cname;?>
						<p class='mui-ellipsis'><?php echo $email;?></p>
					</div>
				</li>
			</div>
			<div class="list_body">
				<li class="mui-table-view-cell">
					<label>手机：</label>
					<div><?php echo $phonenumber;?></div>
				</li>
				<li class="mui-table-view-cell">
					<label>部门：</label>
					<div><?php echo $dept_code;?></div>
				</li>
				<li class="mui-table-view-cell">
					<label>分机：</label>
					<div><?php echo $ext_no;?></div>
				</li>
			</div>
		</ul>		
	</div>
</body>
</html>		
