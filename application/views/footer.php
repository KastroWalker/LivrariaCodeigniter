			</main>
		  </div>
		</div>
		
      	<script src="<?php echo base_url('dist/bootstrap/js/bootstrap.bundle.min.js'); ?>" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
      	<script src="<?php echo base_url('dist/bootstrap/js/dashboard.js'); ?>" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
		<script>
		    $(document).ready( function () {
			    $('#table').DataTable({
			    	language: {
			    		"sEmptyTable": "Nenhum registro encontrado",
					    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
					    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
					    "sInfoPostFix": "",
					    "sInfoThousands": ".",
					    "sLengthMenu": "_MENU_ resultados por página",
					    "sLoadingRecords": "Carregando...",
					    "sProcessing": "Processando...",
					    "sZeroRecords": "Nenhum registro encontrado",
					    "sSearch": "Pesquisar",
					    "oPaginate": {
					        "sNext": "Próximo",
					        "sPrevious": "Anterior",
					        "sFirst": "Primeiro",
					        "sLast": "Último"
					    },
					    "oAria": {
					        "sSortAscending": ": Ordenar colunas de forma ascendente",
					        "sSortDescending": ": Ordenar colunas de forma descendente"
					    },
					    "select": {
					        "rows": {
					            "_": "Selecionado %d linhas",
					            "0": "Nenhuma linha selecionada",
					            "1": "Selecionado 1 linha"
					        }
					    }
					}
			    });

			    $('.btn-cancela-troca').on('click', function(){
			    	$('.img-livro').removeClass('hide');
			    	$('.input-file-imagem').prop('disabled', true);
			    	$('.input-file-imagem').addClass('hide');	
			    });

			    $('.btn-trocar-imagem').on('click', function(){
			    	$('.img-livro').addClass('hide');
			    	$('.input-file-imagem').prop('disabled', false);
			    	$('.input-file-imagem').removeClass('hide');
			    });
			    
			} );	
		</script>
</html>