<?php

    function bancoConecta() 
    {
        global $config;

        define("DB_HOST", $config['HOST']);
        define("DB_USER", $config['USUARIO']);
        define("DB_PASSWORD", $config['SENHA']);
        define("DB_DATABASE", $config['BANCO']);
    
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
       
      
   if(!$link)
        {
            echo "Erro de conexao: " . mysqli_connect_error();
            die();
        }

        if(!mysqli_select_db($link, DB_DATABASE))
        {
            echo "Erro na selecao do banco: " . mysqli_error($link);
            mysqli_close($link);
            die();
        }

       

        register_shutdown_function(function() use ($link) {
            mysqli_close($link);
        });

        return $link;
    }

    function executaSelect($link, $sql)
    {
    
	    $resposta = mysqli_query($link, $sql);
	    if($resposta)
	    {
         
    		$linha = mysqli_fetch_assoc($resposta);
            while($linha)
            {
             
                yield $linha;
                $linha = mysqli_fetch_assoc($resposta);
            }
        }
        else
        {
            echo mysqli_error($link);
        }
    } ?> 