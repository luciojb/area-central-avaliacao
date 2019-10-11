<?php

use PHPUnit\Framework\Exception;

require_once '../services/ProdutoService.php';
require_once '../environment/EnvironmentController.php';
require_once '../model/Produto.php';

if($_POST) {
	try {
		if (isset($_POST['description']) && isset($_POST['quantity']) && isset($_POST['barcode']) && isset($_POST['unitaryValue'])) {
			$cred = EnvironmentController::getCredentials();
			$pService = new ProdutoService($cred['dbName'], $cred['host'], $cred['user'], $cred['pass']);
			$pService->insert(new Product($_POST['description'], $_POST['quantity'], $_POST['barcode'], $_POST['unitaryValue']));
		}

	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

header('Location: '.__DIR__.'../produtos.php');

?>