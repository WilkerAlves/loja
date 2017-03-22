        <?php
            require_once("cabecalho.php");
            require_once("banco-produto.php");
            require_once("class/Produto.php");
            require_once("class/Categoria.php");

            $produto = new Produto();
            $produto->nome=$_POST["nome"];
            $produto->preco=$_POST["preco"];
            $produto->descricao=$_POST["descricao"];

            $categoria = new Categoria();
            $categoria->id = $_POST["categoria_id"];
            
            $produto->categoria = $categoria;
            $produto->id = $_POST['id'];

            if(array_key_exists('usado', $_POST)){
                $produto->usado = "true";
            }else{
                $produto->usado = "false";
            }

            if(alteraProduto($conexao,$produto)){
        ?>
                <p class="text-success">O produto <?php echo $produto->nome;?>, no valor de <?php echo      $produto->preco;?> foi alterado com sucesso!</p>
        <?php
            }else{
                 $mensagem = mysqli_error($conexao);
                ?>
                <p class="text-danger">alteração não efetuada! Ocorreu o seguinte erro: <?php echo          $produto->mensagem?></p>
        <?php
            }
        ?>
        <?php require_once("rodape.php");?>
