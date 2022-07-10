<?php
    $dsn = 'mysql:host=localhost;dbname=sistema';
    $user = 'root';
    $senha = ''; 
    $conexao = new PDO ($dsn,$user, $senha);
    
    /*
    $query = '
        insert into produtos(
            codigo, nome, valor, status
        )values(
            1234, "leite", 5.50, 1
        )
    ';
    $conexao->exec($query);
    */
    $query = 'select * from produtos';

    $stmt = $conexao->query($query);
    $lista = $stmt->fetchALL();
    
    echo'<pre>';
    print_r($lista);
    echo'</pre>';

    print_r($lista[2][2]);


?> 