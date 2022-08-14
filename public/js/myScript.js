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

function openInNewTab(url, triggerPrintDialog = false) {
    if (url !== "") {
        const newTabWindow = window.open(url, "_blank");
        if (newTabWindow !== null) {
            if (triggerPrintDialog) {
                newTabWindow.onload = newTabWindow.print;
            }
            newTabWindow.focus();
            setTimeout(newTabWindow.close(), 3000);
        }
    } else {
        window.alert("openInNewTab() blocked by browser.");
    }
}