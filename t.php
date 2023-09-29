<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Inicia
$curl = curl_init();

// Configura
curl_setopt_array($curl, [
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => 'http://147.182.220.131:8000/teste'
]);

// Envio e armazenamento da resposta
$response = curl_exec($curl);

echo curl_getinfo($curl);
var_dump($response);
echo curl_error($curl);
// Fecha e limpa recursos
curl_close($curl);
?>