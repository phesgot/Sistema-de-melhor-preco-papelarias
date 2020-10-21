<?php

class upLoad {

     public function upLoadFile($arquivo, $diretorio, $extencao) {

        $pasta = $diretorio;
        $tamanho = 1024 * 1024 * 20;
       
        $renomeia = true;

        if ($tamanho < $arquivo['size']) {

        }
        if ($renomeia == true) {

            $nomeFinal = time() . $extencao;
        } else {

            $nomeFinal = $arquivo['name'];
        }
        if (move_uploaded_file($arquivo['tmp_name'], $pasta . $nomeFinal)) {

            return $nomeFinal;
        } else {


            return null;
        }
    }
	
}


?>

