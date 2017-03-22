<?php
    require_once("banco-usuario.php");
    require_once("logica-usuario.php");

    $usuario = buscaUsuarioNoBanco($conexao,$_POST["email"],$_POST["senha"]);
    
    
    if($usuario == NULL){
    	$_SESSION["danger"]="Usuário ou senha incorreto";
    	header("Location: index.php");
    }else {
    	$_SESSION["success"]="Login efetuado com sucesso!";
    	header("Location: index.php");
    	logaUsuario($usuario["email"]);
    }
