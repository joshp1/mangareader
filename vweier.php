<?php	$nm=$_POST ['nmae'];

		//$_nm=$_POST['mnea'];
		$_nm="ID";

		$_fw=$_POST['fwr'];

		$_bw=$_POST['bck'];

		$_i=0;

		$_abc=$_COOKIE ['setcbk'];

		$_img=$_COOKIE['username'];

		$_mn=$_nm;
			$host="SMFReader.db.7684787.hostedresource.com";

			$data='SMFReader';

			$pass='M01@rtinfan';



			$can=mysqli_connect ($host,$data,$pass,$data);

			$quary="SELECT*FROM SMFReader.pages WHERE AID=".$_mn." ORDER BY ID;";

			$resalt=mysqli_query ($can,$quary);

			// echo $quary.$nm;

			while ($row=mysqli_fetch_array ($resalt)or die (mysqli_error ($can))){$_i++;

					echo "\n<img class='sp' src='".$row ['Path']."/".$row ['image']."' />";}?>