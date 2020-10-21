<?php

    class Item {
        
        private $id_item;
        private $item;
		private $quantidade_item; 
        private $fk_item_lista;

        function getId_item() {
            return $this->id_item;
        }

        function getItem() {
            return $this->item;
        }

        function getQuantidade_item() {
            return $this->quantidade_item;
        }

        function getFk_item_lista() {
            return $this->fk_item_lista;
        }

        function setId_item($id_item) {
            $this->id_item = $id_item;
        }

        function setItem($item) {
            $this->item = $item;
        }

        function setQuantidade_item($quantidade_item) {
            $this->quantidade_item = $quantidade_item;
        }

        function setFk_item_lista($fk_item_lista) {
            $this->fk_item_lista = $fk_item_lista;
        }

        
    }
?>

