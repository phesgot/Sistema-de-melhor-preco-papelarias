<?php

    class Listas_materiais {
        
        private $id_lista_mat;
        private $escola;
		private $ano;
        private $turma;
        private $lista;
        
        function getId_lista_mat() {
            return $this->id_lista_mat;
        }

        function getEscola() {
            return $this->escola;
        }

        function getAno() {
            return $this->ano;
        }

        function getTurma() {
            return $this->turma;
        }

        function getLista() {
            return $this->Lista;
        }

        function setId_lista_mat($id_lista_mat) {
            $this->id_lista_mat = $id_lista_mat;
        }

        function setEscola($escola) {
            $this->escola = $escola;
        }

        function setAno($ano) {
            $this->ano = $ano;
        }

        function setTurma($turma) {
            $this->turma = $turma;
        }

        function setLista($Lista) {
            $this->lista = $lista;
        }



        
    }
?>

