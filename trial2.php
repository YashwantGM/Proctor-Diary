<?php
 
$sslc=$_POST['sslc'];
$pu=$_POST['pu'];
$cet=$_POST['cet'];
$comed=$_POST['comed'];
$class1=$_POST['class1'];
$class2=$_POST['class2'];
$class3=$_POST['class3'];
$class4=$_POST['class4'];

if(!empty($sslc)||!empty($pu)||!empty($cet)||!empty($comed)||!empty($class1)||!empty($class2)||!empty($class3)||!empty($class4)){
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="studentdb";

	$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);

	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}else{
		
		$INSERT = "INSERT Into secondpage(sslc,class1,pu,class2,cet,class3,comed,class4) values(?,?,?,?,?,?,?,?)";

		//prepare statement
		
			$stmt=$conn->prepare($INSERT);
			$stmt->bind_param("isisisis",$sslc,$class1,$pu,$class2,$cet,$class3,$comed,$class4);
			$stmt->execute();
			echo "New record inserted successfully";
			echo "<br><a href='http:\\google.com'> Goto next page";
		
		$stmt->close();
		$conn->close();
	}
}else{
	echo "All fields are required";
	die();
}

?>