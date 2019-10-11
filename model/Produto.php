<?php

require_once './Generic.php';

class Product extends Generic {

	private $description;
	private $quantity;
	private $barcode;
	private $unitaryValue;
	private $active;

	function __construct($description, $quantity, $barcode, $unitaryValue) {
		$this->description = $description;
		$this->quantity = $quantity;
		$this->barcode = $barcode;
		$this->unitaryValue = $unitaryValue;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;

		return $this;
	}

	public function getQuantity() {
		return $this->quantity;
	}

	public function setQuantity($quantity) {
		$this->quantity = $quantity;

		return $this;
	}

	public function getBarcode() {
		return $this->barcode;
	}

	public function setBarcode($barcode) {
		$this->barcode = $barcode;

		return $this;
	}

	public function getUnitaryValue() {
		return $this->unitaryValue;
	}

	public function setUnitaryValue($unitaryValue) {
		$this->unitaryValue = $unitaryValue;

		return $this;
	}

	public function getActive()	{
		return $this->active;
	}

	public function setActive($active)	{
		$this->active = $active;

		return $this;
	}
}