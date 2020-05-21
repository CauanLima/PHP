<?php
	include "usuarios.php";
	session_start();
	if(!isset($_SESSION['idUsuario'])){
	    Header("Location:index.php?msg=relogue");
	} 
	
?>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Cadastro de Usuários</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
	<body>
	<style>
		body{
			overflow: hidden;
		}
	</style>
	
	<?php
	    $v_usuario = new usuarios();
	    if(isset($_POST['f_selecao'])){ 
	        $selecao = $_POST['f_selecao'];
	        if($selecao == 'Excluir'){
	            $v_usuario->setId($_POST['f_id']);
	            $v_usuario->delete($_POST['f_id']);
	            echo "<div class = container>";
			    echo  "<div class = row justify-content-center>";
			    echo"<div class = col-4>";
			    echo "<div class = card p-3>";
			    echo "<form method=POST action=".$_SERVER['PHP_SELF'].">";
			    echo "<input type = hidden name = f_selecao value = Incluir>";
			    echo "<div class = form-row>";
			    echo "<div class = col-12>";
			    echo "<labeL>Nome:</label>";
			    echo "<input class = form-control type=text name=f_nome>";
			    echo "</div>";
			    echo "<div class = col-12>";
			    echo "<label>Email:</label>";
			    echo "<input class = form-control type=text name=f_mail>";
			    echo "</div>";
			    echo "<div class = col-12>";
			    echo "<label>Senha:</label>";
			    echo "<input class = form-control type=password name=f_senha>";
			    echo "</div>";
			    echo "<div class = col-12 my-3>";
			    echo "<input class = btn btn-outline-dark type=submit value=Enviar>";
			    echo "</div>";
			    echo "</div>";
			    echo "</form>";
			    echo  "</div>";
			    echo "</div>";
			    echo "</div>";
		        echo "</div>";    
	        }else if($selecao == 'Atualizar'){
	            echo "<div class = container>";
			    echo  "<div class = row justify-content-center>";
			    echo"<div class = col-4>";
			    echo "<div class = card p-3>";
			    echo "<form method=POST action=atualizar.php>";
			    echo "<div class = form-row>";
			    echo "<div class = col-12>";
			    echo "<labeL>Nome:</label>";
			    echo "<input class = form-control type=text name=f_nome value = ".$_POST['f_nome'].">";
			    echo "</div>";
			    echo "<div class = col-12>";
			    echo "<label>Email:</label>";
			    echo "<input class = form-control type=text name=f_mail  value = ".$_POST['f_mail'].">";
			    echo "</div>";
			    echo "<div class = col-12>";
			    echo "<input class = form-control type=hidden name=f_id value = ".$_POST['f_id'].">";
			    echo "</div>";
			    echo "<div class = col-12 my-3>";
			    echo "<input class = btn btn-outline-dark type=submit value=Atualizar>";
			    echo "</div>";
			    echo "</div>";
			    echo "</form>";
			    echo  "</div>";
			    echo "</div>";
			    echo "</div>";
		        echo "</div>";
		    }else if($selecao == 'resetar'){
		        $v_usuario->setId($_POST['f_id']);
		        $v_usuario->setSenha('123456');
		        $v_usuario->resetSenha();
		    echo "<div class = container>";
			    echo  "<div class = row justify-content-center>";
			    echo"<div class = col-4>";
			    echo "<div class = card p-3>";
			    echo "<form method=POST action=".$_SERVER['PHP_SELF'].">";
			    echo "<input type = hidden name = f_selecao value = Incluir>";
			    echo "<div class = form-row>";
			    echo "<div class = col-12>";
			    echo "<labeL>Nome:</label>";
			    echo "<input class = form-control type=text name=f_nome>";
			    echo "</div>";
			    echo "<div class = col-12>";
			    echo "<label>Email:</label>";
			    echo "<input class = form-control type=text name=f_mail>";
			    echo "</div>";
			    echo "<div class = col-12>";
			    echo "<label>Senha:</label>";
			    echo "<input class = form-control type=password name=f_senha>";
			    echo "</div>";
			    echo "<div class = col-12 my-3>";
			    echo "<input class = btn btn-outline-dark type=submit value=Enviar>";
			    echo "</div>";
			    echo "</div>";
			    echo "</form>";
			    echo  "</div>";
			    echo "</div>";
			    echo "</div>";
		        echo "</div>";
	        }else{
	            $v_usuario->setNome($_POST['f_nome']);
		        $v_usuario->setEmail($_POST['f_mail']);
		        $v_usuario->setSenha($_POST['f_senha']);
		        $v_usuario->insert();
	            echo "<div class = container>";
			    echo  "<div class = row justify-content-center>";
			    echo"<div class = col-4>";
			    echo "<div class = card p-3>";
			    echo "<form method=POST action=".$_SERVER['PHP_SELF'].">";
			    echo "<input type = hidden name = f_selecao value = Incluir>";
			    echo "<div class = form-row>";
			    echo "<div class = col-12>";
			    echo "<labeL>Nome:</label>";
			    echo "<input class = form-control type=text name=f_nome>";
			    echo "</div>";
			    echo "<div class = col-12>";
			    echo "<label>Email:</label>";
			    echo "<input class = form-control type=text name=f_mail>";
			    echo "</div>";
			    echo "<div class = col-12>";
			    echo "<label>Senha:</label>";
			    echo "<input class = form-control type=password name=f_senha>";
			    echo "</div>";
			    echo "<div class = col-12 my-3>";
			    echo "<input class = btn btn-outline-dark type=submit value=Enviar>";
			    echo "</div>";
			    echo "</div>";
			    echo "</form>";
			    echo  "</div>";
			    echo "</div>";
			    echo "</div>";
		        echo "</div>";    
	        }
	    }else{
	         echo "<div class = container>";
			echo  "<div class = row justify-content-center>";
			echo"<div class = col-4>";
			echo "<div class = card p-3>";
			echo "<form method=POST action=".$_SERVER['PHP_SELF'].">";
			echo "<input type = hidden name = f_selecao value = Incluir>";
			echo "<div class = form-row>";
			echo "<div class = col-12>";
			echo "<labeL>Nome:</label>";
			echo "<input class = form-control type=text name=f_nome>";
			echo "</div>";
			echo "<div class = col-12>";
			echo "<label>Email:</label>";
			echo "<input class = form-control type=text name=f_mail>";
			echo "</div>";
			echo "<div class = col-12>";
			echo "<label>Senha:</label>";
			echo "<input class = form-control type=password name=f_senha>";
			echo "</div>";
			echo "<div class = col-12 my-3>";
			echo "<input class = btn btn-outline-dark type=submit value=Enviar>";
			echo "</div>";
			echo "</div>";
			echo "</form>";
			echo  "</div>";
			echo "</div>";
			echo "</div>";
		    echo "</div>";
	    }
	?>
	
		<h1 class="my-5 text-center">Cadastro de Usuários</h1>
	
		
			
		<div class = "container">
		
			<div class = "row justify-content-center">
			
				<div class = "col-10 my-3">
				
					<table class = "table">
		
						<tr>
							<th>Nome:</th>
							<th>Email:</th>
							<th></th>
						    <th></th>
						    <th></th>
						</tr>
						<?php foreach($v_usuario->findAll() as $key=>$value): ?>
						<tr>
							<td><?php echo "$value->nome"; ?></td>
							<td><?php echo "$value->email"; ?></td>
						    <td>
						        <form method= "POST" action  = "<?php echo $_SERVER['PHP_SELF']; ?>">
						            <input type ="hidden"  name= "f_selecao" value ="Atualizar">
						            <input class = "btn btn-outline-dark" type="submit" value="Atualizar">
						            <input type = "hidden" type="text" name="f_nome" value = "<?php echo "$value->nome"; ?>">
						            <input type = "hidden" type="text" name="f_mail" value = "<?php echo "$value->email"; ?>">
						             <input type = "hidden" name = "f_id" value = "<?php echo "$value->id";  ?>">
						        </form>      
						    </td>
						    <td>
						        <form method= "POST" action ="<?php echo $_SERVER['PHP_SELF']; ?>">
						            <input type = "hidden" name = "f_selecao" value = "Excluir">
						            <input class = "btn btn-outline-dark" type="submit" value="Excluir">
						            <input type = "hidden" name = "f_id" value = "<?php echo "$value->id";  ?>">
						        </form>
						    </td>
						    <td>
						       <form method= "POST" action ="<?php echo $_SERVER['PHP_SELF']; ?>">
						            <input type = "hidden" name = "f_selecao" value = "resetar">
						            <input class = "btn btn-outline-dark" type="submit" value="Resetar">
						            <input type = "hidden" name = "f_id" value = "<?php echo "$value->id";  ?>">
						        </form>     
						    </td> 
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
		<Text></Text>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	</body>
</html>