<?php
    require_once("conecta.php");

    function listaCategorias($conexao){

        $categorias = Array();
        $buscaCategoriaNoBanco = "select * from categorias";
        $resultado = mysqli_query($conexao,$buscaCategoriaNoBanco);
        while($categoria = mysqli_fetch_assoc($resultado)){
                array_push($categorias,$categoria);
        }
        return $categorias;
    }




?>