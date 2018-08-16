<?php
 $sname=$_POST['sname'];
 $usn=$_POST['usn'];
 $sdob=$_POST['sdob'];
 $nfather=$_POST['nfather'];
 $nmother=$_POST['nmother'];
 $ofather=$_POST['ofather'];
 $omother=$_POST['omother'];
 $paddress=$_POST['paddress'];
 $laddress=$_POST['laddress'];
 $semail=$_POST['semail'];
 $gemail=$_POST['gemail'];
 $pemail=$_POST['pemail'];

if(!empty($sname)||!empty($usn)||!empty($sdob)||!empty($nfather)||!empty($nmother)||!empty($ofather)||!empty($omother)||!empty($paddress)||!empty($laddress)||!empty($semail)||!empty($gemail)||!empty($pemail)){
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="studentdb";

	//create connection
	$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);

	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}else{
		
		$INSERT = "INSERT Into firstpage(sname,usn,sdob,nfather,nmother,ofather,omother,paddress,laddress,semail,gemail,pemail) values(?,?,?,?,?,?,?,?,?,?,?,?)";

		//prepare statement
		
			$stmt=$conn->prepare($INSERT);
			$stmt->bind_param("ssisssssssss",$sname,$usn,$sdob,$nfather,$nmother,$ofather,$omother,$paddress,$laddress,$semail,$gemail,$pemail);
			$stmt->execute();
			echo "New record inserted successfully";
			echo "<br> <a href='second_page.HTML'>Goto next page";
		$stmt->close();
		$conn->close();

	} 

}else{
	echo "All fields are required";
	die();
}

?>