	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"><?php echo $titulo; ?></h1>
		<a class="btn btn-primary" href="<?php echo base_url('index.php/livraria/cadastro'); ?>">Casdastrar Livro</a>
	</div>

	<section class="row">
		<div class="col-12 col-sm-12">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Data Cadastro</th>
						<th>Titulo Livro</th>
						<th>Autor Livro</th>
						<th>Preço</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($livros as $livro) {
							$link = 'index.php/livraria/info/'.$livro->id;
							echo '
								<tr>
									<td>'.$livro->id.'</td>
									<td>'.formataDataBr($livro->data_cadastro).'</td>
									<td><a href="'.base_url($link).'">'.$livro->nome_livro.'</a></td>
									<td>'.$livro->autor_livro.'</td>
									<td>'.formataMoedaBr($livro->preco).'</td>
								</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>	
	<script type="text/javascript">
		$(document).ready(function(){
			console.log($('#link_livro').addClass('active'));
		});
	</script>