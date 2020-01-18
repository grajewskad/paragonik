    <?php
      session_start();
     

    
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('http://lsapp.test/api/user/receipt?email='.$_SESSION["mail"].'&password='.$_SESSION["password"].'');
$request->setMethod(HTTP_Request2::METHOD_GET);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
try {
  $response = $request->send();
  if ($response->getStatus() == 200) {
    
    $contents = json_decode($response->getBody(), true);

    
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