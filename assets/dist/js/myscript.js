//mencari element class flash-data dan diambil datanya
const
	flashData = $('.flash-data').data('flashdata');

//jika ada flashdata
if (flashData) {
	Swal.fire({
		title: 'Data berhasil ' + flashData,
		text: '',
		icon: 'success',
	});
}

//tombol hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault(); //aksi defaul href dimatikan
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah yakin dihapus?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal'
	}).then((result) => {
		//jika ditekan tombol ok
		if (result.value) {
			document.location.href = href;
		}
	});
});