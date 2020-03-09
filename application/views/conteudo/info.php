	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"><?php echo $titulo; ?></h1>
	</div>

	<section class="row">
		<div class="col-12 col-sm-12">
			<dl>
				<dt>ID:</dt>
				<dd><?php echo $livro->id ?></dd>
				
				<dt>Data de Cadastro:</dt>
				<dd><?php echo formataDataBr($livro->data_cadastro); ?></dd>
				
				<dt>Titulo:</dt>
				<dd><?php echo $livro->nome_livro; ?></dd>
				
				<dt>Autor:</dt>
				<dd><?php echo $livro->autor_livro; ?></dd>
				
				<dt>Preço:</dt>
				<dd><?php echo formataMoedaBr($livro->preco); ?></dd>

				<dt>Resumo:</dt>
				<dd><?php echo $livro->resumo; ?></dd>
			</dl>
		</div>
	</section>