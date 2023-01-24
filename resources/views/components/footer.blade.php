<footer>
  <div class="bg-slate-900 text-slate-300">
    <div class="container px-4 pb-8 m-auto pt-14">
      <div class="grid gap-y-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

        <div class="px-2" data-aos="fade-down" data-aos-duration="2000">
          <div class="w-28 h-28 mt-2 md:ml-10">
            <img class="w-full h-auto" src="{{ asset('img/f12fe4e8-90d0-4815-ab6d-a45c8eba04eb-modified.png') }}" alt="">
          </div>
          <p class="mb-3 mt-4 pr-5">
            SMK Uyelindo merupakan salah satu sekolah kejuruan suasta di kota kupang
          </p>
        </div>

        <div class="px-2" data-aos="fade-down" data-aos-duration="2000">
          <h3 class="text-xl font-semibold mt-2 mb-5">Link</h3>
          <div class="grid md:grid-cols-2">
            <a class="block mb-3 transition duration-500 hover:text-red-400" href="{{ route('beranda') }}">Beranda</a>
            <a class="block mb-3 transition duration-500 hover:text-red-400" href="{{ route('galeri') }}">Galeri</a>
            <a class="block mb-3 transition duration-500 hover:text-red-400" href="{{ route('sejarah') }}">sejarah</a>
            <a class="block mb-3 transition duration-500 hover:text-red-400" href="{{ route('ppdb') }}">PPDB</a>
            <a class="block mb-3 transition duration-500 hover:text-red-400" href="{{ route('visiMisi') }}">Visi misi</a>
            <a class="block mb-3 transition duration-500 hover:text-red-400" href="{{ route('blog') }}">Blog</a>
            <a class="block mb-3 transition duration-500 hover:text-red-400" href="{{ route('programKeahlian') }}">Program Keahlian</a>
            <a class="block mb-3 transition duration-500 hover:text-red-400" href="{{ route('kontak') }}">Kontak</a>
          </div>
        </div>

        <div class="px-2" data-aos="fade-down" data-aos-duration="2000">
          <h4 class="text-xl font-semibold mt-2 mb-5">Alamat</h4>
          <p class="mb-3">indonesia</p>
          <p class="mb-3">
            Jl. Perintis Kemerdekaan I No.9, Oebufu, Kec. Oebobo, Kota Kupang, Nusa Tenggara Timur
          </p>
        </div>

        <div class="px-2" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="200">
          <h3 class="text-xl font-semibold mt-2 mb-5">Kontak</h3>
          <a class="block mb-3" target="_blank" href="https://wa.me/+6282147554549?text=">+62 8234 5678 910</a>
          <a class="block mb-3" target="_blank" href="mailto:jufrontamoama@gmail.com">smkuyelindo108@gmail.com</a>

          <div class="flex flex-wrap mt-2 mb-5">
            <a target="_blank" href="https://web.facebook.com/jufron.tama.7/" class="block p-5 transition rounded-lg hover:bg-slate-400 duration-400">
              <i class="fa-brands fa-facebook fa-lg"></i>
            </a>
            <a target="_blank" href="https://www.instagram.com/jufrontamoama/" class="block p-5 transition rounded-lg hover:bg-slate-400 duration-400">
              <i class="fa-brands fa-instagram fa-lg"></i>
            </a>
            <a target="_blank" href="https://www.linkedin.com/in/jufron-tamo-ama-71709622b" class="block p-5 transition rounded-lg hover:bg-slate-400 duration-400">
              <i class="fa-brands fa-tiktok fa-lg"></i>
            </a>
            <a target="_blank" href="https://github.com/jufron" class="block p-5 transition rounded-lg hover:bg-slate-400 duration-400">
              <i class="fa-brands fa-youtube"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="bg-slate-700" x-data="{ tahun : new Date().getFullYear() }">
    <p class="py-3 text-center text-white">
      &copy; Copyright
      <span id="tahun" x-text="tahun"></span>
      SMK Uyelindo Kupang
    </p>
  </div>
</footer>
