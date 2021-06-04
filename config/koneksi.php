<?php
	//localhost
	
	$Open = mysql_connect("localhost","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
	$Koneksi = mysql_select_db("simpeg_dispora");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}
		
	//server
	/* 
	$Open = mysql_connect("mahadewa","math3328","ayamgoreng2790");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
	$Koneksi = mysql_select_db("math3328_simpeg_dispora");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}
		*/
?>