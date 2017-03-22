<?php
	require_once("conecta.php");

    function listaProdutos($conexao){
        $listaTodosDoBanco = "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id";
        
        $resultado = mysqli_query($conexao,$listaTodosDoBanco);
        
        $produtos = Array();
        
        while($produto_array = mysqli_fetch_assoc($resultado)){
            
            $produto = new Produto();
            $produto->id = $produto_array['id'];
            $produto->nome = $produto_array['nome'];
            $produto->preco = $produto_array['preco'];
            $produto->descricao = $produto_array['descricao'];
            
            $categoria = new Categoria();
            $categoria->nome = $produto_array['categoria_nome'];

            $produto->categoria = $categoria;
            $produto->usado = $produto_array['usado'];

            array_push($produtos,$produto);
        }
        
        return $produtos;
    }

    function insereProduto($conexao,Produto $produto){
    	$nome = mysqli_real_escape_string($conexao, $produto->nome);
    	$descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    	$preco = mysqli_real_escape_string($conexao, $produto->preco);
        $insereNoBanco = "insert into produtos(nome,preco,descricao,categoria_id,usado) 
                            values('{$produto->nome}',{$produto->preco},'{$produto->descricao}',
                                {$produto->categoria->id},{$produto->usado})";
        return mysqli_query($conexao,$insereNoBanco); 
    }

    function removeProduto($conexao,$id){
        $removeDoBanco = "delete from produtos where id='{$id}'";
        return mysqli_query($conexao,$removeDoBanco);
    }

    function buscaProduto($conexao, $id){
        $buscaProdutoNoBanco = "select * from produtos where id='{$id}'";
        $resultado = mysqli_query($conexao,$buscaProdutoNoBanco);
        
        return mysqli_fetch_assoc($resultado);
    }

    function alteraProduto($conexao,Produto $produto){
        $alteraProdutoNoBanco = "update produtos set nome='{$produto->nome}',preco={$produto->preco} ,descricao='{$produto->descricao}',categoria_id={$produto->categoria->id},usado={$produto->usado} where id='{$produto->id}'"; 
        return mysqli_query($conexao,$alteraProdutoNoBanco);
    }
?>