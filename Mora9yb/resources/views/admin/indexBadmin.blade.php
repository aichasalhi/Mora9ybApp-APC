<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mora9yb</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="/image/png" href="/images/icons/logobina.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/util3.css">
	<link rel="stylesheet" type="text/css" href="/css/main3.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">nom_commune</th>
									<th class="cell100 column2">nbr_électeurs_inscrits</th>
									<th class="cell100 column3">nbrvotants</th>
									<th class="cell100 column4">nbrdoc_contest</th>
									<th class="cell100 column5">nbrdoc_annuler</th>
                                    <th class="cell100 column5">nbrvotes_exprim</th>
                                    <th class="cell100 column5">L16</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
                                @foreach ($results as $result)
								<tr class="row100 body">
									<td class="cell100 column1">{{ $result["nom_commune"] }}</td>
									<td class="cell100 column2">{{ $result["nbr_électeurs_inscrits"] }}</td>
									<td class="cell100 column3">{{ $result["nbrvotants"] }}</td>
									<td class="cell100 column4">{{ $result["nbrdoc_contest"] }}</td>
									<td class="cell100 column5">{{ $result["nbrdoc_annuler"] }}</td>
                                    <td class="cell100 column5">{{ $result["nbrvotes_exprim"] }}</td>
                                    <td class="cell100 column5">{{ $result["L16"] }}</td>
								</tr>
                                @endforeach
								
							</tbody>
						</table>
					</div>
				</div>
				
				
				
			</div>
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
<!--===============================================================================================-->
	<script src="/js/main4.js"></script>

</body>
</html>