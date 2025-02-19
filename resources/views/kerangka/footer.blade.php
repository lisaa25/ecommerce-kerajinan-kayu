<footer>
    <div class="footer-content">
        <div class="logo-footer">
            <h1>DC WOODCRAFT</h1>
            <p id="alamat">Jl. Citrawijaya No.44 <br>
                RT.12 RW.06 Pesawahan, Kec. Binangun <br>
                Kabupaten Cilacap, Jawa Tengah, Indonesia
            </p>
        </div>
        <div class="footer-column">
            <h3>Tautan</h3>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#produk">Product</a></li>
                <li><a href="#kontak">Contact</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>FAQ</h3>
            <ul class="faq-list">
                <li><a href="#" id="cara-membeli-link">Bagaimana cara membeli?</a></li>
                <li><a href="#" id="refund-info-link">Informasi Refund</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Follow us!</h3>
            <div class="social-icons">
                <ul>
                    <li>
                        <i data-feather="instagram"></i><a href="https://www.instagram.com/dc.woodcraft" target="_blank">Instagram</a>
                    </li>
                    <li>
                        <i data-feather="facebook"></i><a href="https://www.facebook.com/DC Woodcraft Store" target="_blank">Facebook</a>
                    </li>
                    <li>
                        <i data-feather="youtube"></i><a href="https://www.youtube.com/@egi_irawan" target="_blank">Youtube</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Kelompok 12. All rights reserved.</p>
    </div>
</footer>

<!-- memanggil css footer -->
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
<footer>
    <!-- Existing footer content -->
</footer>

<!-- Modal cara membeli -->
<div id="how-to-buy-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Bagaimana Cara Membeli ?</h2>
        <div class="modal-steps">
            <div class="step">
                <h3>Langkah 1: Melihat Produk</h3>
                <img src="{{ asset('img/faq/1.png') }}" alt="Melihat Produk">
                <p>User masuk ke website dan dapat melihat produk, mengirim pesan, dan melihat informasi lainnya tetapi tidak bisa memasukkan produk ke cart.</p>
            </div>
            <div class="step">
                <h3>Langkah 2: Registrasi Akun</h3>
                <img src="{{ asset('img/faq/2.png') }}" alt="Registrasi Akun">
                <p>User dapat memasukkan produk ke cart saat sudah login. Jika belum login, user harus membuat akun dengan mengisi form register.</p>
            </div>
            <div class="step">
                <h3>Langkah 3: Login dan Membeli</h3>
                <img src="{{ asset('img/faq/3.png') }}" alt="Login dan Membeli">
                <p>Setelah login, user bisa membeli produk dan melihat informasi pengguna.</p>
            </div>
            <div class="step">
                <h3>Langkah 4: Checkout dan Pembayaran</h3>
                <img src="{{ asset('img/faq/4.png') }}" alt="Checkout dan Pembayaran">
                <p>User dapat memasukkan produk ke keranjang, memilih checkout, dan membayar dengan metode pembayaran yang tersedia.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Informasi Refund -->
<div id="refund-info-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Informasi Refund</h2>
        <div class="step">
            <h3>Syarat dan Ketentuan Refund</h3><hr>
            <p>Garansi untuk pembelian Furniture dalam masa satu bulan <br>
                Pembeli dapat mengajukan permintaan Refund dengan cara <br>
                mengirim pesan permintaan refund di bagian <b>contact</b><br>
                lalu permintaan refund akan diproses oleh admin.
            </p>
        </div>
    </div>
</div>

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>

<!-- Modal Script untuk cara membeli -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var caraMembeliLink = document.getElementById("cara-membeli-link");
    var refundInfoLink = document.getElementById("refund-info-link");

    var howToBuyModal = document.getElementById("how-to-buy-modal");
    var refundInfoModal = document.getElementById("refund-info-modal");

    var closeButtons = document.getElementsByClassName("close");

    caraMembeliLink.onclick = function() {
        howToBuyModal.style.display = "block";
    };

    refundInfoLink.onclick = function() {
        refundInfoModal.style.display = "block";
    };

    Array.prototype.forEach.call(closeButtons, function(button) {
        button.onclick = function() {
            button.parentElement.parentElement.style.display = "none";
        };
    });

    window.onclick = function(event) {
        if (event.target == howToBuyModal) {
            howToBuyModal.style.display = "none";
        }
        if (event.target == refundInfoModal) {
            refundInfoModal.style.display = "none";
        }
    };
});

</script>
