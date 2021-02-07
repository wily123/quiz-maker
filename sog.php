<?php

$myFile = "default.txt";
$myFolder= "./db/";


if(isset($_REQUEST['f'])){
	$_REQUEST['f'] = preg_replace('/\s+/', '_', $_REQUEST['f']);
	$myFile= preg_replace("/\W|_/", "" , $_REQUEST['f']).".txt";
	$myFile= preg_replace("/\W|_/", "" , $_REQUEST['f']).".txt";
}


$myFile = $myFolder.$myFile;


if(isset($_POST['jsonText'])){
	$fh = fopen($myFile, 'w') or die("can't open file");
	//$stringData = json_encode($_POST['jsonText']);
	$stringData = $_POST['jsonText'];
	fwrite($fh, $stringData);
	fclose($fh);
}


if(isset($_GET['get'])){
	if (file_exists($myFile)) {
	$json = json_decode(file_get_contents($myFile), true);
	$json = file_get_contents($myFile);
	print_r($json);
	}
	else{
	print("No database found...");
	}
}

?>
