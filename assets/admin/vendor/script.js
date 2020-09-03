
$(function () {

	$('.tambahDataKaryawan').on('click', function(){
		$('#myManagInformasi').html('Tambah Data Karyawan');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		

	});

	$('.tampilModalUbahPengumuman').on('click', function(){
		console.log('oke');
		$('#myManagInformasi').html('Ubah Data Karyawan');
		$('.modal-footer button[type=submit]').html('Ubah Data');
		
	});


});