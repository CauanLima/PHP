<?php
        
            echo "<html>";
            echo "<head>";
            echo "<meta http-equiv=Content-Type content=text/html; charset=UTF-8>";
		    echo "<title>Login</title>";
		    echo "<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css>";
            echo "</head>";
            echo "<body style=background-color: #0CF>";
            echo "<div class=container>"; // Classe container
            echo "<div class=col-lg-4></div>"; // Classe de coluna
            echo "<div class=col-lg-4>"; // divide a tela em 4 partes
            echo "</br>";
            echo "</br>";
            echo "</br>";
            echo "</br>";
            echo "</br>";
            echo "<div class=jumbotron >";
            echo "<form method=POST action='/CONTROL/Control.php'>";
		    echo "<label>Email:</label>";
		    echo "<input class = form-control type=text name=f_mail>";
		    echo "<label>Senha:</label>";
		    echo "<input class = form-control type=password name=f_senha>";
		    echo "<center><input class = btn btn-outline-dark type=submit value=Login></center>";
		    echo "<input type=hidden name=acao value=login>";
		    echo "</form>";
		    echo "</div>";
		    echo "</div>"; //  fim da class 4 
		    echo "</div>"; // Fim da classe container
		
		echo "</body>";
		echo "</html>";
?>