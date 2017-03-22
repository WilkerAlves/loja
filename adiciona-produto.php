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

            if(array_key_exists('usado', $_POST)){
                $produto->usado = "true";
            }else{
                $produto->usado = "false";
            }

            if(insereProduto($conexao,$produto)){
        ?>
                <p class="text-success">O produto <?php echo $produto->nome;?>, no valor de <?php echo      $produto->preco;?> foi adicionado com sucesso!</p>
        <?php
            }else{
                 $mensagem = mysqli_error($conexao);
                ?>
                <p class="text-danger">Produto não cadastrado pois ocorreu o seguinte erro: <?php echo       $produto->mensagem?></p>
        <?php
            }
        ?>
        <?php require_once("rodape.php");?>
