<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Victor Castro">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Livraria</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/album/">

   	<!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('dist/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
	<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
	<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#563d7c">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>
<body>
	<header>
		<div class="navbar navbar-dark bg-dark shadow-sm">
			<div class="container d-flex justify-content-between">
				<a href="#" class="navbar-brand d-flex align-items-center">
					<strong>Livraria</strong>
				</a>
				<a href="<?= base_url('admin'); ?>" class="navbar-toggler btn btn-info">Login</a>
			</div>
		</div>
	</header>

	<main role="main">
		<section class="jumbotron text-center">
			<div class="container">
				<h1>Catálogo de Livros</h1>
				<p class="lead text-muted">Veja a lista de livros que temos no nosso sistema.</p>
			</div>
		</section>
		<div class="album py-5 bg-light">
		    <div class="container">
				<?php foreach ($livros as $l) {?>
					<div class="media mb-5">
						<img src="<?= base_url('upload/'. $l->img) ?>" class="mr-3 img-fluid" style="height: 200px;" alt="<?= $l->titulo ?>">
						<div class="media-body">
							<h4 class="mt-0"><?= $l->titulo ?></h4>
							<div>
								<strong>Resumo: </strong>
								<?= $l->resumo ?>
							</div>
							<div>
								<strong>Valor: </strong>
								<?= $l->preco ?>
							</div>
						</div>
					</div>
				<?php } ?>
		    </div>
		</div>
	</main>

	<footer class="text-muted">
	  	<div class="container">
	    	<p class="mt-5 mb-3 text-muted text-center">&copy; 2020 | Todos os direitos reservados.</p>
	  	</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  	<script src="<?php echo base_url('dist/bootstrap/js/bootstrap.bundle.min.js'); ?>" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</body>
</html>
