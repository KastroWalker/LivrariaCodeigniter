	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"><?php echo $titulo; ?></h1>
		<a class="btn btn-primary" href="<?php echo base_url('index.php/livros/'); ?>">Voltar</a>
	</div>

	<section class="row">
		<div class="col-12 col-sm-12">
			<?php 
				if(validation_errors()){
					echo "<div class='alert alert-danger' role='alert'>". validation_errors() ."</div>"; 
				}
			?>
		</div>
	</section>

	<section class="row">
		<div class="col-12 col-sm-12">
			<?php 
				echo form_open_multipart();

				echo "<div class='form-group'>";
					$attr = array(
						'type' => 'text',
						'name' => 'titulo',
						'id' => 'titulo_livro',
						'placeholder' => 'Título',
						'class' => 'form-control',
						'required' => '',
						'value' => $query->titulo
					);
					echo form_label('Título', 'titulo_livro');
					echo form_input($attr);
				echo "</div>";

				echo "<div class='form-group'>";
					$attr = array(
						'type' => 'text',
						'name' => 'autor',
						'id' => 'autor_livro',
						'placeholder' => 'Autor',
						'class' => 'form-control',
						'required' => '',
						'value' => $query->autor
					);
					echo form_label('Autor', 'autor_livro');
					echo form_input($attr);
				echo "</div>";

				echo "<div class='form-group'>";
					$attr = array(
						'type' => 'text',
						'name' => 'preco',
						'id' => 'preco_livro',
						'placeholder' => 'Preço',
						'class' => 'form-control',
						'required' => '',
						'value' => $query->preco
					);
					echo form_label('Preço', 'preco_livro');
					echo form_input($attr);
				echo "</div>";

				echo "<div class='form-group'>";
					$attr = array(
						'name' => 'resumo',
						'id' => 'Resumo_livro',
						'placeholder' => 'Resumo',
						'class' => 'form-control',
						'required' => '',
						'value' => $query->resumo
					);
					echo form_label('Resumo', 'resumo_livro');
					echo form_textarea($attr);
				echo "</div>";

				echo "<div class='form-group'>";
					echo form_label('Status');
					echo form_dropdown('ativo', [1 => 'Sim', 0 => 'Não'], ( $query->ativo == 1 ? 1 : 0 ), ['class' => 'form-control']);
				echo "</div>";

				echo "<div class='form-group'>";
					echo "<img src='".base_url('upload/'.$query->img)."' alt='$query->titulo' class='img-livro'/>";
				echo "</div>";

				echo "<div class='form-group'>";
					echo "<button class='btn btn-secondary mb-2 btn-trocar-imagem' style='margin-right: 5px;'><i class='fa fa-upload'></i>Trocar Imagem</button>";

					echo "<a class='btn btn-danger mb-2 btn-cancela-troca'><i class='fa fa-times'></i>Cancelar</a>";

					echo "<input type='file' name='foto_livro' class='form-control input-file-imagem hide' disabled required/>";
				echo "</div>";

				echo form_hidden('id_livro', $query->id);

				echo form_submit('submit', 'Atualizar', array('class' => 'btn btn-success btn-cadastro'));

				echo form_close();
			?>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>	
	<script type="text/javascript">
		$(document).ready(function(){
			console.log($('#link_livro').addClass('active'));
		});
	</script>