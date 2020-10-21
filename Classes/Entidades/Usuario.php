<?php

    class Usuario {
        
        private $id_usu;
        private $nome_usu;
		private $email_usu;
        private $senha_usu;
        private $cpf_usu;
		private $cnpj_usu;
        private $telefone_usu;
		private $tipo_usu;
		private $status_usu;
        
        function getId_usu() {
            return $this->id_usu;
        }

        function getNome_usu() {
            return $this->nome_usu;
        }

        function getEmail_usu() {
            return $this->email_usu;
        }

        function getSenha_usu() {
            return $this->senha_usu;
        }

        function getCpf_usu() {
            return $this->cpf_usu;
        }

        function getCnpj_usu() {
            return $this->cnpj_usu;
        }

        function getTelefone_usu() {
            return $this->telefone_usu;
        }

        function getTipo_usu() {
            return $this->tipo_usu;
        }

        function getStatus_usu() {
            return $this->status_usu;
        }

        function setId_usu($id_usu) {
            $this->id_usu = $id_usu;
        }

        function setNome_usu($nome_usu) {
            $this->nome_usu = $nome_usu;
        }

        function setEmail_usu($email_usu) {
            $this->email_usu = $email_usu;
        }

        function setSenha_usu($senha_usu) {
            $this->senha_usu = $senha_usu;
        }

        function setCpf_usu($cpf_usu) {
            $this->cpf_usu = $cpf_usu;
        }

        function setCnpj_usu($cnpj_usu) {
            $this->cnpj_usu = $cnpj_usu;
        }

        function setTelefone_usu($telefone_usu) {
            $this->telefone_usu = $telefone_usu;
        }

        function setTipo_usu($tipo_usu) {
            $this->tipo_usu = $tipo_usu;
        }

        function setStatus_usu($status_usu) {
            $this->status_usu = $status_usu;
        }
        
    }
    
?>
        


