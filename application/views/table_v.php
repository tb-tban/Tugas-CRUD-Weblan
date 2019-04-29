<!DOCTYPE html>
<html>

<head>
	<title>Tugas CRUD JQUERY</title>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<style>
		thead tr {
			background-color: #2ed573;
		}

		p {
			text-align: center;
			font-weight: bold;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark">
		<span class="navbar-brand mb-0 h1">jQuery Table CRUD</span>
	</nav>

	<div class="container mt-3">
		<p>Daftar Mahasiswa Pemrogaman Web Lanjut</p>
		<table id="tabel" class="table table-striped table-bordered table-hover mt-2">
			<thead>
				<tr>
					<th width="100px">Select</th>
					<th>NIM</th>
					<th>Nama lengkap</th>
					<th width="150px">
						<center>Aksi</center>
					</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<!-- <div class="col text-right"> -->
		<button type="button" class="btn btn-primary btn-sm add" data-toggle="modal" data-target="#modal">Tambah
			data</button>
		<button type="button" class="btn btn-primary btn-sm multiple_delete">Hapus data yang dipilih</button>
		<!-- </div> -->
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle"><span id=judul>Tambah</span> Data Mahasiswa
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_login">
					<div class="form-group row">
						<label class="col-sm-4 form-label">NIM<span required="">*</span></label>
						<div class="col-sm-8">
							<input type="text" id="nim" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 form-label">Nama<span required="">*</span></label>
						<div class="col-sm-8">
							<input type="text" id="nama" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary batal" data-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-sm btn-primary simpan">Simpan</button>
				</div>
			</div>
		</div>
	</div>

	<!-- JQUERY -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<!-- BOOTBOX -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<!-- Custom Script -->
	<script>
		$(document).ready(function () {
			var i = 0;
			data_sekarang = null;
			$("button.simpan").click(function () {
				var nim = $("#nim").val();
				var nama = $("#nama").val();
				i++;
				var data_baru =
					"<tr id='row' class='info'>" +
					"<td style='background-color:#2ed573;'><input type='checkbox' id='record'></td>" +
					"<td class='nim'>" + nim + "</td>" +
					"<td class='nama'>" + nama + "</td>" +
					"<td><button class='btn btn-sm btn-default edit'>Edit</button>&emsp;<button class='btn btn-sm btn-danger delete'>Hapus</a></button>" +
					"</tr>";
				if (data_sekarang) { //edit data
					$("table tbody").find($(data_sekarang)).replaceWith(data_baru);
					data_sekarang = null;
				} else { //tambah data
					$("table tbody").append(data_baru);
				}
				$("#nim").val('');
				$("#nama").val('');
				$("#modal").modal('hide');
			});

			$(document).on('click', 'button.delete', function () {
				var data = $(this).parents('tr');
				bootbox.confirm({
					size: "small",
					message: "Yakin ingin menghapus data?",
					buttons: {
						confirm: {
							label: 'Hapus',
							className: 'btn-danger btn-sm',
						},
						cancel: {
							label: 'Batal',
							className: 'btn-default btn-sm',

						}
					},
					callback: function (result) {
						if (result == true) {
							data.remove();
						}
					}
				})
			});

			$("button.multiple_delete").click(function () {
				bootbox.confirm({
					size: "small",
					message: "Yakin ingin menghapus data?",
					buttons: {
						confirm: {
							label: 'Hapus',
							className: 'btn-danger btn-sm',
						},
						cancel: {
							label: 'Batal',
							className: 'btn-default btn-sm',

						}
					},
					callback: function (result) {
						if (result == true) {
							$("table tbody").find('input[id="record"]').each(function () {
								if ($(this).is(":checked")) {
									$(this).parents("tr").remove();
								}
							});
						}
					}
				})
			});

			$(document).on('click', 'button.edit', function () {
				data_sekarang = $(this).parents('tr');
				$("#nim").val($(this).closest('tr').find('td.nim').text());
				$("#nama").val($(this).closest('tr').find('td.nama').text());
				$("#modal").modal('show');
				$('#judul').html('Edit');
			});

			$("button.add").click(function () {
				data_sekarang = null;
				$('input').val('');
				$('#judul').html('Tambah');
			})
		})
	</script>
</body>

</html>