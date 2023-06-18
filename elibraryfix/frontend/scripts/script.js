document.getElementById("book-now").addEventListener("click", function() {
    if (stokBuku > 0) {
        document.getElementById("bookDetails").classList.add("blur");
            // Tampilkan pop up form pemesanan
        document.getElementById("popupForm").style.display = "block";
        // Sembunyikan pop up bukti jika terbuka
        document.getElementById("popupBukti").style.display = "none"; 
    } else {
        document.getElementById("bookDetails").classList.add("blur");
        document.getElementById("popupTidakTersedia").style.display = "block"; 
    }
});
document.getElementById("btnCloseStok").addEventListener("click", function() {
    document.getElementById("bookDetails").classList.remove("blur");
    document.getElementById("popupTidakTersedia").style.display = "none";
});
document.getElementById("btnCloseBukti").addEventListener("click", function() {
    document.getElementById("bookDetails").classList.remove("blur");
    // Tutup pop up hasil pemesanan
    document.getElementById("popupBukti").style.display = "none";
    location.reload();
});

document.getElementById("btnCloseForm").addEventListener("click", function() {
    document.getElementById("bookDetails").classList.remove("blur");
    // Tutup pop up form pemesanan
    document.getElementById("popupForm").style.display = "none";
      // Tutup pop up hasil pemesanan
      document.getElementById("popupBukti").style.display = "none";
});

document.getElementById("formPeminjaman").addEventListener("submit", function(e) {
    e.preventDefault();

       // Ambil nilai input dari form
       var nama = document.getElementById("nama").value;
       var nis = document.getElementById("nis").value;
       var tglPeminjaman = document.getElementById("tglPeminjaman").value;
       var judulBuku = document.getElementById("judulBuku").value;
       var checkboxDenda = document.getElementById("checkboxDenda").checked;
       var timestamp = Date.now().toString();
       var uniqueCode = timestamp.slice(-6); 

       // Data yang akan dikirimkan melalui AJAX
       var data = {
            idPeminjaman : uniqueCode,
            nis: nis,
            tglPeminjaman: tglPeminjaman,
       };
   
       // Kirim data ke server menggunakan AJAX
       var xhr = new XMLHttpRequest();
       xhr.open("POST", "simpan_peminjaman.php", true);
       xhr.setRequestHeader("Content-Type", "application/json");
       xhr.onreadystatechange = function() {
           if (xhr.readyState === 4 && xhr.status === 200) {
               // Tanggapan dari server
               var response = JSON.parse(xhr.responseText);
               if (response.success) {
                   // Tampilkan pesan sukses atau lakukan tindakan lain
               } else {
                   // Tampilkan pesan error atau lakukan tindakan lain
               }
           }
       };
       xhr.send(JSON.stringify(data));
    // Tampilkan hasil inputan
    document.getElementById("popupForm").style.display = "none";
    var tableContent =
    "<table>" +
    "<tr><td>Nama</td><td>:</td><td>" + nama + "</td></tr>" +
    "<tr><td>NISN</td><td>:</td><td>" + nis + "</td></tr>" +
    "<tr><td>Judul Buku</td><td>:</td><td>" + judulBuku + "</td></tr>" +
    "<tr><td>Tanggal Peminjaman</td><td>:</td><td>" + tglPeminjaman + "</td></tr>" +
    "</table>";

    document.getElementById("buktiPeminjaman").innerHTML = tableContent;
    // Generate QR Code
   
    var qrCodeText = "Id Peminjaman: " + uniqueCode + "\nNama: " + nama + "\nNIS: " + nis +"\nJudul Buku: " + judulBuku + "\nTanggal Peminjaman: " + tglPeminjaman;
    var qrCodeElement = document.getElementById("qrCode");

    // Hapus konten sebelumnya jika ada
    while (qrCodeElement.firstChild) {
        qrCodeElement.removeChild(qrCodeElement.firstChild);
    }

    // Buat instance QRCode dari library qrcode.js
    var qrcode = new QRCode(qrCodeElement, {
        text: qrCodeText,
        width: 200,
        height: 200
    });

    // Tampilkan pop up hasil inputan dan QR Code
    document.getElementById("popupBukti").style.display = "block";
});

document.getElementById("checkboxDenda").addEventListener("change", function() {
    // Aktifkan tombol Submit jika checkbox sudah dicentang
    document.getElementById("btnSubmit").disabled = !this.checked;
});

document.getElementById("btnDownload").addEventListener("click", function() {
    document.getElementById("btnDownload").style.display = "none";
    document.getElementById("btnCloseBukti").style.display = "none";
    // Ambil elemen popupHasil
    var popupBuktiElement = document.getElementById("popupBukti");

    // Tangkap layar elemen popupHasil menggunakan html2canvas
    html2canvas(popupBuktiElement).then(function(canvas) {
        // Konversi canvas menjadi data URL
        var imageDataURL = canvas.toDataURL("image/png");

        // Buat elemen tautan (anchor) untuk mengunduh
        var downloadLink = document.createElement("a");
        downloadLink.href = imageDataURL;
        downloadLink.download = "bukti_peminjaman.png";

        // Klik secara otomatis pada tautan untuk memulai unduhan
        downloadLink.click();
        document.getElementById("btnDownload").style.display = "block";
        document.getElementById("btnCloseBukti").style.display = "block";
    });
});

document.getElementById("btnCloseBukti").addEventListener("click", function() {
    // Sembunyikan tombol "Download" dan tombol "Close"
    document.getElementById("btnDownload").style.display = "none";
    document.getElementById("btnCloseBukti").style.display = "none";
    // Tutup pop up hasil pemesanan
    document.getElementById("popupBukti").style.display = "none";
});

