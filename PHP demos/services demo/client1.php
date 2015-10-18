<?php
// Pull in the NuSOAP code
require_once 'lib/nusoap.php';


$proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
$proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
$proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
$proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';



// Create the client instance
$client = new nusoap_client('http://creative2.synechron.com/manjiri/service1/hellowsdl2.php?wsdl', 'wsdl',
$proxyhost, $proxyport, $proxyusername, $proxypassword);
// Check for an error
$err = $client->getError();
if ($err) {
    // Display the error
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    // At this point, you know the call that follows will fail
}
// Create the proxy
$proxy = $client->getProxy();
// Call the SOAP method
$person = array('firstname' => 'Willi', 'age' => 22, 'gender' => 'male');
$result = $proxy->hello($person);
// Check for a fault
if ($proxy->fault) {
    echo '<h2>Fault</h2><pre>';
    print_r($result);
    echo '</pre>';
} else {
    // Check for errors
    $err = $proxy->getError();
    if ($err) {
        // Display the error
        echo '<h2>Error</h2><pre>' . $err . '</pre>';
    } else {
        // Display the result
        echo '<h2>Result</h2><pre>';
        print_r($result);
    echo '</pre>';
    }
}
/* Display the request and response
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($proxy->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($proxy->response, ENT_QUOTES) . '</pre>';
// Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($proxy->debug_str, ENT_QUOTES) . '</pre>';*/
?>