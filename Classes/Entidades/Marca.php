<?php

    class Marca {
        
        private $id_marca;
        private $marca;
        
        function getId_marca() {
            return $this->id_marca;
        }

        function getMarca() {
            return $this->marca;
        }

        function setId_marca($id_marca) {
            $this->id_marca = $id_marca;
        }

        function setMarca($marca) {
            $this->marca = $marca;
        }
    }
?>