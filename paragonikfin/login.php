<?php

    session_start();
	$password = $_GET["password"];
    $mail = $_GET["mail"];
    
    $_SESSION["mail"] = $mail;
    $_SESSION["password"] = $password;
    
    $_SESSION["check"] = 0;
    

require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('http://lsapp.test/api/user/login?email='.$mail.'&password='.$password.'');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
try {
  $response = $request->send();
  $contents = json_decode($response->getBody(), true);
  if ($response->getStatus() == 200) {
     

      if($contents["message "]=="Accepted."){
        $_SESSION["barcode"] = $contents["user"]["barcode"];
        $_SESSION["name"] = $contents["user"]["name"];
        $_SESSION["surname"] = $contents["user"]["surname"];
        $_SESSION["login"] = $contents["user"]["login"];
        header("Location: view.php");
      }


      


  }
  else {
    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
    $response->getReasonPhrase();

    header("Location: index.php");
     $_SESSION["check"] = 2;
  }
}
catch(HTTP_Request2_Exception $e) {
  echo 'Error: ' . $e->getMessage();
}

//$_SESSION["barcode"] = $contents["user"]["barcode"];

?>