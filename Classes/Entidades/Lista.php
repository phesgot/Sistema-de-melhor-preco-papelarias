<?php

    class Lista {
        
        private $id_lista;
        private $escola;
		private $ensino;
        private $ano;

        function getId_lista() {
            return $this->id_lista;
        }

        function getEscola() {
            return $this->escola;
        }

        function getEnsino() {
            return $this->ensino;
        }

        function getAno() {
            return $this->ano;
        }

        function setId_lista($id_lista) {
            $this->id_lista_mat = $id_lista;
        }

        function setEscola($escola) {
            $this->escola = $escola;
        }

        function setEnsino($ensino) {
            $this->ensino = $ensino;
        }

        function setAno($ano) {
            $this->ano = $ano;
        }

        
    }
?>

