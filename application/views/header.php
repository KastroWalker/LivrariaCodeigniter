<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Livraria</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('dist/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('dist/bootstrap/css/dashboard.css'); ?>" rel="stylesheet">

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

      .btn-cadastro {
      	margin-top: 15px;
      }

      .hide {
        display: none;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Livraria</a>
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="<?php echo base_url('livraria/logout/'); ?>">Sair</a>
			</li>
		</ul>
	</nav>

	<div class="container-fluid">
	  <div class="row">
	    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
	      <div class="sidebar-sticky">
	        <ul class="nav flex-column">
	          <li class="nav-item">
	            <a class="nav-link" id="link_home" href="<?php echo base_url('/livraria/home/'); ?>">
                <span data-feather="home"></span>
	              Home <span class="sr-only">(current)</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="link_livro" href="<?php echo base_url('/livros/'); ?>">
	              <span data-feather="shopping-cart"></span>
	              Livros
	            </a>
              <a class="nav-link" id="link_usuario" href="<?php echo base_url('/usuarios/'); ?>">
                <span data-feather="users"></span>
                Usuarios
              </a>
	          </li>
	        </ul>
	      </div>
	    </nav>

	    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">