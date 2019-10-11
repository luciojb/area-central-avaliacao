<?php

require_once './Conexao.php';
require_once '../model/Product.php';

class ProdutoService extends Conexao {

	public function insert(Product $product) {
		try {
			$this->setConexao();
			if ($st = $this->conexao->prepare("INSERT INTO product (id, 'description', quantity, barcode, unitaryValue) VALUES (null, ?, ?, ?, ?)")) {
				$st->bind_param('siid', $product->getDescription(), $product->getQuantity(), $product->getBarcode(), $product->getUnitaryValue());
				$st->execute();
				$this->closeConexao();
				return true;
			}
		} catch (Exception $e) {
			echo 'Não foi possível criar um cadastro. Tente novamente em outro momento.';
		}
		return false;
	}

	public function update(Product $product) {
		try {
			$this->setConexao();
			if ($st = $this->conn->prepare("UPDATE product s SET s.description=?, s.quantity=?, s.barcode=?, s.unitaryValue=? WHERE id = ?")) {
				$st->bind_param('siidi', $product->getDescription(), $product->getQuantity(), $product->getBarcode(), $product->getUnitaryValue(), $product->getId());
				$st->execute();
				return $this->closeConexao();
			}
		} catch (Exception $e) {
			echo 'Não foi possível atualizar o produto. Tente novamente em outro momento.';
		}
		return false;
	}

	public function remove($id) {
		try {
			$this->setConexao();
			if ($st = $this->conn->prepare("UPDATE product s SET s.active=false WHERE id = ?")) {
				$st->bind_param('i', $id);
				$ret = $st->execute();
				return $this->closeConexao();
			}
		} catch (Exception $e) {
			echo 'Não foi possível remover o produto. Tente novamente em outro momento.';
		}
		return false;
	}

	public function restore($id) {
		try {
			$this->setConexao();
			if ($st = $this->conn->prepare("UPDATE product s SET s.active=true WHERE id = ?")) {
				$st->bind_param('i', $id);
				$st->execute();
				return $this->closeConexao();
			}
		} catch (Exception $e) {
			echo 'Não foi possível restaurar o produto. Tente novamente em outro momento.';
		}
		return false;
	}

	public function getAll($active = true) {
		try {
			$this->setConexao();
			if ($st = $this->conn->prepare("SELECT * from product s WHERE s.active=?")) {
				$st->bind_param('i', $active);
				$ret = $st->execute();
				$this->closeConexao();
				return $ret;
			}
		} catch (Exception $e) {
			echo 'Não foi possível retornar os produtos. Tente novamente em outro momento.';
		}
		return false;
	}

	public function getProduct($id) {
		try {
			$this->setConexao();
			if ($st = $this->conn->prepare("SELECT s from product s WHERE s.id=?")) {
				$st->bind_param('i', $id);
				$ret = $st->execute();
				$this->closeConexao();
				return $ret;
			}
		} catch (Exception $e) {
			echo 'Não foi possível retornar o produto. Tente novamente em outro momento.';
		}
		return false;
	}

}