<?php

    class Endereco {
        
        private $id_end;
        private $cep;
		private $estado;
        private $cidade;
        private $bairro;
		private $endereco;
		private $fk_usuario;
        
        function getId_end() {
            return $this->id_end;
        }

        function getCep() {
            return $this->cep;
        }

        function getEstado() {
            return $this->estado;
        }

        function getCidade() {
            return $this->cidade;
        }

        function getBairro() {
            return $this->bairro;
        }

        function getEndereco() {
            return $this->endereco;
        }
		
		function getFk_usuario() {
            return $this->fk_usuario;
        }

        function setId_end($id_end) {
            $this->id_end = $id_end;
        }

        function setCep($cep) {
            $this->cep = $cep;
        }

        function setEstado($estado) {
            $this->estado = $estado;
        }

        function setCidade($cidade) {
            $this->cidade = $cidade;
        }

        function setBairro($bairro) {
            $this->bairro = $bairro;
        }

        function setEndereco($endereco) {
            $this->endereco = $endereco;
        }
		
		function setFk_usuario($fk_usuario) {
            $this->fk_usuario = $fk_usuario;
        }



        
    }
?>

