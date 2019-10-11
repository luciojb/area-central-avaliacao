<?php

class EnvironmentController {

	public static function getCredentials() {
		return [
			'dbName' => 'areaCentralTest',
			'host' => 'localhost',
			'user' => 'root',
			'pass' => 'root'
		];
	}
}