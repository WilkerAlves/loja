<?php require_once("cabecalho.php");
	  require_once("logica-usuario.php");
?>
<?php 
	if (usuarioEstaLogado()){
?>
		<p class="text-success"> Você esta logado com <?= usuarioLogado()?><a href="logout.php">DESLOGAR</a></p>
		 
<?php 
	} else{
?>
<h1> BEM VINDO! </h1>
<h2>Login</h2>
<form action="login.php" method="post">
    <table class="table">
        <tr>
            <td>Usuario</td>
            <td><input type="email" name="email" class="form-control" /></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input type="password" name="senha" class="form-control" /></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary">Entrar</button></td>
        </tr>    
    </table>
</form>
<?php }?>
<?php require_once("rodape.php");?>
