<?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            session_start();
            /*$handle = curl_init();
 
            $url = "http://147.182.220.131:5000/user/updatestats";
             
            // Set the url
            curl_setopt($handle, CURLOPT_URL, $url);
            // Set the result output to be a string.
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));

            $data = array(
                'email' => 'a'
            );
            $payload = json_encode(array("user" => $data));
            
            curl_setopt($handle, CURLOPT_POSTFIELDS, $payload);
             
            $output = curl_exec($handle);
            
            echo curl_getinfo($handle);
            
            curl_close($handle);
*/

$url = 'http://147.182.220.131:5000/user/updatestats';
$data = array(
    "email" => $_SESSION['email']
);

// encoding the request data as JSON which will be sent in POST
$encodedData = json_encode($data);

// initiate curl with the url to send request
$curl = curl_init($url);

// return CURL response
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Send request data using POST method
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

// Data conent-type is sent as JSON
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type:application/json'
));
curl_setopt($curl, CURLOPT_POST, true);

// Curl POST the JSON data to send the request
curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);

// execute the curl POST request and send data
$result = curl_exec($curl);
curl_close($curl);

// if required print the curl response
print $result;
echo $result;
print_r ($result);
?>