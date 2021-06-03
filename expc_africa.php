<?php
    include 'lib/banco.php';
    include 'lib/config.php';
	$link = bancoConecta();

	$sql = <<<EOT
        SELECT 
            c.Name, c.Population, c.GNP, c.LifeExpectancy
        FROM 
            country as c
        WHERE
            c.Continent = 'Africa'
        ORDER BY 
            c.GNP ASC
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
            <div class="col-4">        
            <button type="button" class="btn btn-outline-primary" onclick="history.back()">Voltar</button>
            </div>
            <div class="col-8">        
                <h1> Países Africanos</h1>
            </div>
    </div>
    <div class="table-responsive-md container"> 
        <table class="table table-striped table-dark">
	        <thead>
		        <tr>
		            <th scope="col">Nome</th>
		            <th scope="col">População</th>
		            <th scope="col">PIB</th>
		            <th scope="col">Expectativa de Vida</th>
		        </tr>
	        </thead>
	        <tbody>
		        <?php foreach(executaSelect($link,$sql) as $linha) { ?> 
			        <tr>
				        <td><?=$linha['Name']?></td>
				        <td><?=$linha['Population']?></td>
				        <td><?=$linha['GNP']?></td>
				        <td><?=$linha['LifeExpectancy']?></td>
			        </tr>
		        <?php } /*foreach*/ ?>
	        </tbody>
        </table>
    </div>    
</html>