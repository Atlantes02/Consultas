<?php
    include 'lib/banco.php';
    include 'lib/config.php';
	$link = bancoConecta();

	$sql = <<<EOT
        SELECT 
            ci.Name, ci.Population
        FROM 
            city as ci
        WHERE
            ci.CountryCode ='BRA'
EOT;


?>
<!doctype html>
<html>
    <head>
    <meta charset ='UTF-8'>
    <link rel = "stylesheet" href = "lib/css/bootstrap.min.css">
    </head>
    <div class ="container">
        <div class="row">
            <div class="col-3">        
            <button type="button" class="btn btn-outline-primary" onclick="history.back()">Voltar</button>
            </div>
            <div class="col-9">        
                <h1>Cidades brasileiras e suas populações</h1>
            </div>
        </div> 
    </div>
    <div class="table-responsive-md container">
        <table class="table table-striped table-dark">
            <thead class="thead-dark">
		        <tr>
		        <th scope="col">Nome</th>
		        <th scope="col">População</th>
		        </tr>
	        </thead>
	        <tbody>
		        <?php foreach(executaSelect($link,$sql) as $linha) { ?> 
			        <tr>
				        <td><?=$linha['Name']?></td>
				        <td><?=$linha['Population']?></td>
			    </tr>
		        <?php } /*foreach*/ ?>

            <script scr="lib/js/jquery-3.4.1.slim.min.js"></script>
            <script scr="lib/js/bootstrap.min.js" ></script>
	        </tbody>
        </table>
    </div>
</html>