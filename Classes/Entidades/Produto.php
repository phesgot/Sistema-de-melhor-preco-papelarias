<?php

    class Produto {
        
        private $id_pro;
        private $nome_pro;
		private $preco_pro;
        private $imagem_pro;
        private $info_pro;
		private $quant_pro;
        private $promocao_pro;
		private $desconto_pro;
		private $fk_categoria_pro;
		private $fk_usuario_pro;
        private $fk_marca_pro;
        
        function getId_pro() {
            return $this->id_pro;
        }

        function getNome_pro() {
            return $this->nome_pro;
        }

        function getPreco_pro() {
            return $this->preco_pro;
        }

        function getImagem_pro() {
            return $this->imagem_pro;
        }

        function getInfo_pro() {
            return $this->info_pro;
        }

        function getQuant_pro() {
            return $this->quant_pro;
        }

        function getPromocao_pro() {
            return $this->promocao_pro;
        }

        function getDesconto_pro() {
            return $this->desconto_pro;
        }

        function getFk_categoria_pro() {
            return $this->fk_categoria_pro;
        }

        function getFk_usuario_pro() {
            return $this->fk_usuario_pro;
        }

        function getFk_marca_pro() {
            return $this->fk_marca_pro;
        }

        function setId_pro($id_pro) {
            $this->id_pro = $id_pro;
        }

        function setNome_pro($nome_pro) {
            $this->nome_pro = $nome_pro;
        }

        function setPreco_pro($preco_pro) {
            $this->preco_pro = $preco_pro;
        }

        function setImagem_pro($imagem_pro) {
            $this->imagem_pro = $imagem_pro;
        }

        function setInfo_pro($info_pro) {
            $this->info_pro = $info_pro;
        }

        function setQuant_pro($quant_pro) {
            $this->quant_pro = $quant_pro;
        }

        function setPromocao_pro($promocao_pro) {
            $this->promocao_pro = $promocao_pro;
        }

        function setDesconto_pro($desconto_pro) {
            $this->desconto_pro = $desconto_pro;
        }

        function setFk_categoria_pro($fk_categoria_pro) {
            $this->fk_categoria_pro = $fk_categoria_pro;
        }

        function setFk_usuario_pro($fk_usuario_pro) {
            $this->fk_usuario_pro = $fk_usuario_pro;
        }

        function setFk_marca_pro($fk_marca_pro) {
            $this->fk_marca_pro = $fk_marca_pro;
        }        
    }
  
?>

