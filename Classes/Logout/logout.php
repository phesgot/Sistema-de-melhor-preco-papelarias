<?php

session_start();

if ($_SESSION["logado"]) {
    
    $_SESSION["id_usu"] = null;
    $_SESSION['nome_usu'] = null;
    $_SESSION['cnpj_usu'] = null;
    $_SESSION['logado'] = null;
}
         ?>
        <script>
            document.location.href = "../../index.php?pagina=login";
        </script>  
        <?php 
?>