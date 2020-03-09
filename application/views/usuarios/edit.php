	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"><?php echo $titulo; ?></h1>
		<a class="btn btn-primary" href="<?php echo base_url('index.php/usuarios/'); ?>">Voltar</a>
	</div>

	<section class="row">
		<div class="col-12 col-sm-12">
			<?php 
				echo validation_errors("<div class='alert alert-danger'>", "</div>");
			?>
		</div>
	</section>

	<section class="row">
		<div class="col-12 col-sm-12">
			<?php 
				echo form_open();

				echo "<div class='form-group'>";
					$attr = array(
						'type' => 'text',
						'name' => 'nome',
						'id' => 'nome',
						'placeholder' => 'Nome',
						'class' => 'form-control',
						'value' => $query->nome
					);
					echo form_label('Nome', 'nome');
					echo form_input($attr);
				echo "</div>";

				echo "<div class='form-group'>";
					$attr = array(
						'type' => 'email',
						'name' => 'email',
						'id' => 'email',
						'placeholder' => 'E-mail',
						'class' => 'form-control',
						'value' => $query->email
					);
					echo form_label('E-mail', 'email');
					echo form_input($attr);
				echo "</div>";

				echo form_hidden('id', $query->id);

				echo form_submit('submit', 'Editar', array('class' => 'btn btn-success btn-cadastro'));

				echo form_close();
			?>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>	
	<script type="text/javascript">
		$(document).ready(function(){
			console.log($('#link_usuario').addClass('active'));
		});
	</script>