	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"><?php echo $titulo; ?></h1>
		<a class="btn btn-primary" href="<?php echo base_url('index.php/livros/add/'); ?>">Casdastrar Livro</a>
	</div>

	<section class="row">
		<div class="col-12 col-sm-12">
			<?= $this->session->userdata('msg') ?>
		</div>
	</section>

	<section class="row">
		<div class="col-12 col-sm-12">
			<table class="table table-striped table-hover" id="table">
				<thead>
					<tr>
						<th class="col-1">#</th>
						<th class="col-4">Titulo</th>
						<th class="col-3">Autor</th>
						<th class="col-1">Preço</th>
						<th class="col-1">Status</th>
						<th class="col-2">Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($livros as $livro) {
							$link = 'index.php/livros/info/'.$livro->id;
							$link_edit = 'index.php/livros/edit/'.$livro->id;
							$link_del = 'index.php/livros/del/'.$livro->id;
							$link_ativar = 'index.php/livros/ativar/'.$livro->id;
							$link_inativar = 'index.php/livros/inativar/'.$livro->id;
							$link_img = 'upload/'.$livro->img;
							echo '
								<tr>
									<td><img class="img-fluid" src="'.base_url($link_img).'" alt="'.$livro->titulo.'"/></td>
									<td><a href="'.base_url($link).'">'.$livro->titulo.'</a></td>
									<td>'.$livro->autor.'</td>
									<td>'.formataMoedaBr($livro->preco).'</td>
									<td>'.($livro->ativo == 1 ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>').'</td>
									<td>
										<a class="btn btn-primary" href="'.base_url($link_edit).'"><i class="fa fa-edit"></i></a>
										<a class="btn btn-danger" href="'.base_url($link_del).'"><i class="fa fa-trash-o"></i></i></a>
										'.($livro->ativo == 1 ? '<a class="btn btn-secondary" href="'.base_url($link_inativar).'"><i class="fa fa-times"></i></i></a>' : '<a class="btn btn-secondary" href="'.base_url($link_ativar).'"><i class="fa fa-check"></i></a>')
									.'</td>
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