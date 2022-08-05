// menampilkan total harga tiket pada halaman tiket/index.php
let harga = document.getElementById('hargaTiket');
let jumlah = document.getElementById('jumlahTiket');
let total = document.getElementById('totalHarga');

jumlah.addEventListener('input', () => {
    total.classList.remove('d-none');

    total.innerText = new Intl.NumberFormat('id-ID', { 
        style: 'currency', 
        currency: 'IDR'
    }).format(harga.value * jumlah.value);
});