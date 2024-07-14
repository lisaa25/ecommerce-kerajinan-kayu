 <!--kontak dan lokasi-->
 @extends('layout.master')

 @section('kontak')
     <section id="lokasi-dan-kontak">
         <h2>Contact and Location</h2>
         <div class="lokasi-content">
             <div class="lokasi">
                 <div id="map-container">
                     <iframe
                         src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.149667015357!2d109.29793097500374!3d-7.667053692349589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65479c3d2793f9%3A0xc13f47fd553ce897!2sDC%20Woodcraft%20Store!5e0!3m2!1sid!2sid!4v1719883076287!5m2!1sid!2sid"></iframe>
                 </div>
             </div>
             <div class="kontak">
                 <form action="{{ route('pesan.store') }}" method="post">
                     @csrf
                     <label for="nama">Nama Lengkap:</label>
                     <input type="text" id="nama" name="nama" placeholder="masukan nama anda" required>

                     <label for="email">Email:</label>
                     <input type="email" id="email" name="email" placeholder="masukan email anda"required>

                     <label for="pesan">Pesan:</label>
                     <textarea id="pesan" name="pesan" placeholder="masukan pesan" required></textarea>

                     <button type="submit">Kirim</button>
                 </form>
             </div>
         </div>
     </section>

     <!-- memanggil css kontak -->
     <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
     <script src="{{ asset('js/kontak.js') }}"></script>
 @endsection
