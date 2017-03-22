<?php
    require_once("cabecalho.php");
    require_once("banco-produto.php");
    require_once("logica-usuario.php");
    require_once("class/Produto.php");
    require_once("class/Categoria.php");
    
    verificaUsuario();
    mostraAlerta("success");
    $produtos = listaProdutos($conexao);

    $produto = new Produto();
    
?>

<table class="table table-striped table-bordered">
    <?php foreach($produtos as $produto):?>
        <tr>
            <td><?=$produto->nome?></td>
            <td><?=$produto->preco?></td>
            <td><?=$produto->categoria->nome></td>
            <td><?= substr($produto->descricao,0,40)?></td>
            <td>
                <?php if($produto->usado != 0){
                ?>
                    usado
                <?php } else { ?>
                    não usado
                <?php }?>
                
            </td>
            <td>
                <form action="produto-altera-formulario.php" method="post">
                    <input type="hidden" name="id" value="<?=$produto->id?>" />
                    <button class="btn btn-primary">altera</button>                  
                </form>
            <td>
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?=$produto->id?>" />
                    <button class="btn btn-danger">remover</button>                  
                </form>
            </td>
        </tr>
    <?php endforeach;?>
</table>
    
<?php require_once("rodape.php");?>
