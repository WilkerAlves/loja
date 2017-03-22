<?php
        require_once("cabecalho.php");
        require_once("banco-categoria.php");
        require_once("banco-produto.php");
        
        $id=$_POST['id'];
        $produto = buscaProduto($conexao,$id);
        $usado = $produto['usado'] ? "checked = 'cheked'" : "";
        
        $categorias = listaCategorias($conexao);

?>
        
        <h1>Alteração de Produtos</h1>
        <form  action="altera-produto.php" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <table class="table">
            <?php 
            	require_once("produto-formulario-base.php");
            ?>
                <tr>
                    <td><input class="btn btn-primary" type="submit" value="ALTERAR"/></td>
                </tr>
            </table>
        </form>
<?php require_once("rodape.php");?>
