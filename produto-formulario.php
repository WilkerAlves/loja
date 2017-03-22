<?php
        require_once("cabecalho.php");
        require_once("banco-categoria.php");
        require_once("logica-usuario.php");
        $categorias = listaCategorias($conexao);
        verificaUsuario();
        
        $produto = array("nome"=>"","preco"=>"","descricao"=>"","categoria_id"=>"1");
        $usado = "";
?>
        
        <h1>Cadastramento de Produtos</h1>
        <form  action="adiciona-produto.php" method="post">
            <table class="table">
			<?php 
            	require_once("produto-formulario-base.php");
            ?>
                <tr>
                    <td><button class="btn btn-primary">Cadastrar</button></td>
                </tr>
            </table>
        </form>
<?php require_once("rodape.php");?>