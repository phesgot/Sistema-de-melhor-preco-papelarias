<?php

    class Categoria {
        
        private $id_cat;
        private $nome_cat;
        
        function getId_cat() {
            return $this->id_cat;
        }

        function getNome_cat() {
            return $this->nome_cat;
        }

        function setId_cat($id_cat) {
            $this->id_cat = $id_cat;
        }

        function setNome_cat($nome_cat) {
            $this->nome_cat = $nome_cat;
        }


        
    }
?>


