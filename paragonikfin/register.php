<?php

    session_start();
	$login = $_GET["login"];
    $mail = $_GET["mail"];
    $password = $_GET["password"];
    $_SESSION["bar"]="";
    for($x=0; $x < 7; $x++){
    	 if(strlen($mail)<$x){
    	 	$_SESSION["bar"]= $_SESSION["bar"].'00';
    	 }
    	 else{

    	 $_SESSION["bar"] = $_SESSION["bar"].(137-ord($mail[$x]));
    	}
    }

    $name = $_GET["name"];
    $surname = $_GET["surname"];
    $_SESSION["mail"] = $mail;
    $_SESSION["password"] = $password;
    $_SESSION["check"] = 0;
	require_once 'HTTP/Request2.php';
	$request = new HTTP_Request2();
	$request->setUrl('http://lsapp.test/api/user/register?name='.$name.'&surname='.$surname.'&login='.$login.'&email='.$mail.'&password='.$password.'&barcode='.$_SESSION["bar"].'');
	$request->setMethod(HTTP_Request2::METHOD_POST);
	$request->setConfig(array(
 		'follow_redirects' => TRUE
	));
	try {
  		$response = $request->send();
  		if ($response->getStatus() == 200) {
   			 echo $response->getBody();
 		 }

 		 if ($response->getStatus() == 201) {
   			 echo $response->getBody();
   			 header("Location: index.php");
   			 $_SESSION["check"] = 1;

 		 }

 		  if ($response->getStatus() == 404) {
   			 echo $response->getBody();
   			 header("Location: index.php");
   			 $_SESSION["check"] = 3;

 		 }

  		else {
    		echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
    		$response->getReasonPhrase();
 		 }
	}
	catch(HTTP_Request2_Exception $e) {
 		 echo 'Error: ' . $e->getMessage();
	}

?>