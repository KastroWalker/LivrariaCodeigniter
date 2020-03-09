	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"><?php echo $titulo; ?></h1>
		<a class="btn btn-primary" href="<?php echo base_url('index.php/usuarios/add'); ?>">Casdastrar Usuário</a>
	</div>

	<div class="col-12 col-sm-12">
		<?=$this->session->flashdata('user');?>
		<?=$this->session->flashdata('msg');?>
	</div>

	<section class="row">
		<div class="col-12 col-sm-12">
			<table class="table table-striped table-hover" id="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Status</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($usuarios as $usuario) {
							$link = 'index.php/livraria/info/'.$usuario->id;
							$link_edit = 'index.php/usuarios/edit/'.$usuario->id;
							$link_del = 'index.php/usuarios/del/'.$usuario->id;
							$link_ativar = 'index.php/usuarios/ativar/'.$usuario->id;
							$link_inativar = 'index.php/usuarios/inativar/'.$usuario->id;
							echo '
								<tr>
									<td>'.$usuario->id.'</td>
									<td><a href="'.base_url($link).'">'.$usuario->nome.'</a></td>
									<td>'.$usuario->email.'</td>
									<td>'.($usuario->ativo == 1 ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>').'</td>
									<td>
										<a class="btn btn-primary" href="'.base_url($link_edit).'"><i class="fa fa-edit"></i></a>
										<a class="btn btn-danger" href="'.base_url($link_del).'"><i class="fa fa-trash-o"></i></a>
										'.($usuario->ativo == 1 ? '<a class="btn btn-secondary" href="'.base_url($link_inativar).'"><i class="fa fa-times"></i></i></a>' : '<a class="btn btn-secondary" href="'.base_url($link_ativar).'"><i class="fa fa-check"></i></a>')
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
			console.log($('#link_usuario').addClass('active'));
		});
	</script>