// menampilkan total harga tiket pada halaman tiket/index.php
let harga = document.getElementById('hargaTiket');
let jumlah = document.getElementById('jumlahTiket');
let total = document.getElementById('totalHarga');

if (jumlah == undefined) {
    console.log('Bukan halaman tiket');
} else {
    jumlah.addEventListener('input', () => {
        total.classList.remove('d-none');

        total.innerText = new Intl.NumberFormat('id-ID', { 
            style: 'currency', 
            currency: 'IDR'
        }).format(harga.value * jumlah.value);
    });
}

// ubah modal pada laporan/index.php
$(function() {
    $('.tombolTambahData').on('click', function() {
        $('#judulModal').html('Tambah Transaksi');
        $('.modal-footer button[type=submit]').html('Tambah Transaksi');
    });
    
    $('.tampilModalUbah').on('click', function() {
        $('#judulModal').html('Ubah Data Transaksi');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/aplikasi-tiket-coban/public/laporan/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/aplikasi-tiket-coban/public/laporan/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#tgl').val(data.tgl);
                $('#ket').val(data.ket);
                $('#jmlh').val(data.jmlh);
            }
        });
    });
});