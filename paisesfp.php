  
<?php
    include 'lib/banco.php';
	include 'lib/config.php';
	$link = bancoConecta();

	$sql = <<<EOT
        SELECT 
            c.Name, c.Continent
        FROM 
            country as c,  
            countrylanguage as cl
        WHERE
            c.Code = cl.CountryCode and
            cl.Language = 'Portuguese'
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
                <h1> Países que Falam Português</h1>
            </div>
    	</div>
	<div class="table-responsive-md container">
		<table class="table table-striped  table-dark">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Continente</th>
				</tr>
			</thead class = "background-color=">
			<tbody>
				<?php foreach(executaSelect($link,$sql) as $linha) { ?> 
					<tr>
						<td><?=$linha['Name']?></td>
						<td><?=$linha['Continent']?></td>
					</tr>
				<?php } /*foreach*/ ?>
			</tbody>
		</table>
	</div>
</html>
