<?php
    //conectar db
    $dsn = 'mysql:host=localhost;dbname=sistema';
    $user = 'root';
    $senha = ''; 
    $conexao = new PDO ($dsn,$user, $senha);

    $query = 'select * from produtos';

    $stmt = $conexao->query($query);
    $lista = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    /*
    echo'<pre>';
    print_r($lista);
    echo'</pre>';

    print_r($lista[2]['codigo']);
    */
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistema</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<script>
			function editar(id) {
				location.href = 'editar.php?id='+id;
			}
			function remover(id,nome) {
				var resultado = confirm("Deseja excluir o item: " + nome + " ?");
       			if (resultado == true) {
					location.href = 'controlador.php?acao=remover&id='+id;
			    } else{ alert("Você desistiu de excluir o item!"); }
			}	
	</script>

	<body>		
		<nav class="navbar navbar-dark ">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item "><a href="index.html">menu principal</a></li>
						<li class="list-group-item "><a href="novoproduto.php">Novo Produto</a></li>
					</ul>
				</div>

				<div class="col-sm-6">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Produtos:</h4>
								<hr />

								<?php foreach ($lista as $indice => $lista) {
                                    $lista['valor'] = number_format($lista['valor'],2, ',', ' ');  ?>
								
									<div class="col-sm-9 tarefa" id="<?= $lista['id'] ?>">
										<?= $lista['nome']?> R$<?= $lista['valor']?> #<?= $lista['codigo']?>

										<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $lista['id'] ?>)" ></i>
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $lista['id'] ?> , '<?= $lista['nome']?>')"></i>
									</div>
									
											
									
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

