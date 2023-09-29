<?php

/*if (file_exists($autoload = realpath(__DIR__ . "/vendor/autoload.php"))) {
	require_once $autoload;
} else {
	print_r("Autoload not found or on path <code>$autoload</code>");
}*/

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

/*if (file_exists($options = realpath(__DIR__ . "/../../credentials/options.php"))) {
	require_once $options;
}*/
error_reporting(E_ALL);
ini_set('display_errors', '1');
$options = [
	"client_id" => "Client_Id_9e417f14fd10064d153a7b45a451bc9dafac81e5",
	"client_secret" => "Client_Secret_10ee8f677278d5c4457b7c33ac969d1071c632e4",
	"certificate" => realpath(__DIR__ . "/homologacao-492510-SnookerballCertificadoHomologacao.p12"), // Caminho absoluto para o certificado no formato .p12 ou .pem
	"sandbox" => true,
	"debug" => true,
	"timeout" => 30
];

//To enable the pix/send endpoint it is necessary to contact
//with Gerencianet's Commercial team for a new contractual annex.

$params = [
	"idEnvio" => "0S000000000000000000000000000000000"
];

$body = [
	"valor" => "0.01",
	"pagador" => [
		"chave" => "46818616000175",
		"infoPagador" => "order payment"
	],
	"favorecido" => [
		"chave" => "a0a227fd-a539-405a-b56c-79be72523759"
	]
];

try {
	$api = Gerencianet::getInstance($options);
	$response = $api->pixSend($params, $body);

	print_r("<pre>" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</pre>");
} catch (GerencianetException $e) {
	print_r($e->code);
	print_r($e->error);
	print_r($e->errorDescription);
} catch (Exception $e) {
	print_r($e->getMessage());
}
