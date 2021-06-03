<?php
    include 'lib/banco.php';
	include 'lib/config.php';

	$link = bancoConecta();

	$sql = <<<EOT
        SELECT 
            c.Name, c.HeadOfState,c.Continent, c.GNP
        FROM 
            country as c
        WHERE
            c.GovernmentForm = 'Republic'
        ORDER BY 
            c.GNP DESC
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
                <h1> Países que são Repúblicas</h1>
    		</div>
		</div>
    </div>
	<div class="table-responsive-md container">     
		<table class="table table-striped table-dark">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Chefe de Estado</th>
					<th scope="col">Continente</th>
					<th scope="col">PIB</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach(executaSelect($link,$sql) as $linha) { ?> 
					<tr>
						<td><?=$linha['Name']?></td>
						<td><?=$linha['HeadOfState']?></td>
						<td><?=$linha['Continent']?></td>
						<td><?=$linha['GNP']?></td>
					</tr>
				<?php } /*foreach*/ ?>
			</tbody>
		</table>
	</div>
</html>