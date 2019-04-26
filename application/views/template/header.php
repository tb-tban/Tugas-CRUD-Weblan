<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

</head>
<body>
	<!-- <div class="container"> -->
		<nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-">
			<a class="navbar-brand" href="#">TUGAS <b>UTS</b></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item home">
						<a class="nav-link" href="<?php echo base_url()?>komponen" id="home" name="home">Home</a>
					</li>
					<li class="nav-item jenis">
						<a class="nav-link" href="<?php echo base_url()?>jenis" id="jenis" name="jenis">Data Komponen</a>
					</li>
					<?php if ($this->session->userdata('role_db') == "super"){ ?>
						<li class="nav-item users">
							<a class="nav-link" href="<?php echo base_url()?>users" id=data name=data>Data User</a>
						</li>
					<?php } ?>
				</ul>
			</div>
			<ul class="navbar-nav form-inline">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $this->session->userdata("role_name")." : ". $this->session->userdata("nama_lengkap");?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url();?>login/logout">Logout</a>
					</div>
				</li>
			</ul>
		</nav>

	<!-- </div> -->