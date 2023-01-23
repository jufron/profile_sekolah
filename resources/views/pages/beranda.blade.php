<x-app title="Beranda">
  {{-- corousel --}}
  <x-sub-components.corousel />
  {{-- end corousel --}}

  <div class="bg-slate-50">
    <div class="container px-4 m-auto py-10">
      <div class="grid md:grid-cols-2 gap-x-4 gap-y-5 pb-10">
        <div class="py-5 md:px-10 flex items-center">
          <p class="leading-9">
            Selamat Datang di website resmi Sekolah Menengah Kejuruan (SMK) Uyelindo Kupang website ini dibangun sebagai sarana atau media informasi dan komunikasi sekolah, karena sejalan dengan perkembangan industri 4.0 yang berguna untuk memudahkan mencari informasi tentang SMK Uyelindo Kupang. Kualitas layanan menjadi salah satu misi sekolah. Semoga dengan adanaya website sekolah dapat mendatangkan manfaat bagi semua pihak.
          </p>
        </div>
        <div class="lg:p-10 flex">
          <div class="bg-red-200 rounded-2xl overflow-hidden shadow-2xl my-auto">
            <img class="bg-center bg-cover object-cover w-full h-full" src="{{ asset('img/IMG_20220930_100345.jpg') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div>
    <div class="container pt-10 pb-20 px-4 m-auto">
      <h1 class="pt-10 pb-5 text-4xl">Program Keahlian</h1>
      <p class="pb-10">Jurusan yang ada di SMK Uyelindo memiliki 3 jurusan berikut selengkapnya </p>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-5">

        <div class="bg-slate-50 rounded-2xl overflow-hidden hover:bg-slate-100 transition duration-500">
          <img class="object-cover w-full bg-cover bg-center rounded-2xl" src="{{ asset('img/IMG_20220905_083536.jpg') }}" alt="">
          <div class="py-5 px-7">
            <div class="mb-3">
              <h1 class="text-lg font-semibold">Teknik Komputer & Jaringan (TKJ)</h1>
              <span class="text-sm">Network & Computer</span>
            </div>
            <p class="leading-9">
              Program keahlian Teknik Komputer & Jaringan mampu menghasilkan tenaga terampil siap kerja yang berintegrasi tinggi, semangat dalam memberikan kontribusi pada bidang Teknik Komputer & Jaringan
            </p>
          </div>
        </div>
        <div class="bg-slate-50 overflow-hidden rounded-2xl hover:bg-slate-100 transition duration-500">
          <img class="object-cover bg-cover bg-center rounded-2xl" src="{{ asset('img/IMG_20220907_212219.jpg') }}" alt="">
          <div class="py-5 px-7">
            <div class="mb-3">
              <h1 class="text-lg font-semibold">Rekayasa Perangkat Lunak (RPL)</h1>
              <span class="text-sm">Software Engineer</span>
            </div>
            <p class="leading-9">
              Program keahlian Rekayasa Perangkat Lunak menghasilkan tenaga ahli yang berkompeten di bidang Software, mempunyai etos kerja yang tinggi disiplin inovatif dan kreatif.
            </p>
          </div>
        </div>
        <div class="bg-slate-50 overflow-hidden rounded-2xl hover:bg-slate-100 transition duration-500">
          <img class="object-cover rounded-2xl bg-cover bg-center" src="{{ asset('img/IMG_20220907_125303.jpg') }}" alt="">
          <div class="py-5 px-7">
            <div class="mb-3">
              <h1 class="text-lg font-semibold">Akuntansi & Keuangan Lembaga</h1>
              <span class="text-sm">Finance Acounting Public </span>
            </div>
            <p class="leading-9">
              Program keahlian Akuntansi mampu menghasilkan tenaga terampil siap kerja, mempunyai etos kerja yang tinggi disiplin inofatif dan kreatif.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-slate-100">
    <div class="container pt-10 pb-20 px-4 m-auto">
      <h1 class="pt-10 pb-5 text-4xl">Testimoni</h1>
      <p>Apa pendapat mereka tentang SMK Uyelindo</p>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-5 pt-5 pb-10">

        <div class="bg-slate-50 py-5 px-7 rounded-2xl hover:bg-white hover:shadow-sm transition duration-500">
          <div class="flex place-items-center">
            <img class="w-10 h-10 object-cover bg-center bg-cover rounded-2xl" src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="avatar">
            <h4 class="ml-3 text-lg">Larry Pagee</h4>
          </div>
          <div class="mt-5">
            <i class="fa-solid fa-quote-left fa-1x"></i>
          </div>
          <p class="leading-9 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus eius vero rerum impedit voluptas quaerat exercitationem pariatur corporis omnis suscipit.</p>
        </div>
        <div class="bg-slate-50 py-5 px-7 rounded-2xl hover:bg-white hover:shadow-sm transition duration-500">
          <div class="flex place-items-center">
            <img class="w-10 h-10 object-cover bg-center bg-cover rounded-2xl" src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="avatar">
            <h4 class="ml-3 text-lg">Larry Pagee</h4>
          </div>
          <div class="mt-5">
            <i class="fa-solid fa-quote-left fa-1x"></i>
          </div>
          <p class="leading-9 text-base">Lorem sit amet adipisicing elit. Accusamus eius vero rerum impedit voluptas quaerat exercitationem pariatur corporis omnis suscipit.</p>
        </div>
        <div class="bg-slate-50 py-5 px-7 rounded-2xl hover:bg-white hover:shadow-sm transition duration-500">
          <div class="flex place-items-center">
            <img class="w-10 h-10 object-cover bg-center bg-cover rounded-2xl" src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="avatar">
            <h4 class="ml-3 text-lg">Larry Pagee</h4>
          </div>
          <div class="mt-5">
            <i class="fa-solid fa-quote-left fa-1x"></i>
          </div>
          <p class="leading-9 text-base">Lorem ipsum dolor adipisicing elit. Accusamus eius vero rerum impedit voluptas quaerat.</p>
        </div>
        <div class="bg-slate-50 py-5 px-7 rounded-2xl hover:bg-white hover:shadow-sm transition duration-500">
          <div class="flex place-items-center">
            <img class="w-10 h-10 object-cover bg-center bg-cover rounded-2xl" src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="avatar">
            <h4 class="ml-3 text-lg">Larry Pagee</h4>
          </div>
          <div class="mt-5">
            <i class="fa-solid fa-quote-left fa-1x"></i>
          </div>
          <p class="leading-9 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="bg-slate-50 py-5 px-7 rounded-2xl hover:bg-white hover:shadow-sm transition duration-500">
          <div class="flex place-items-center">
            <img class="w-10 h-10 object-cover bg-center bg-cover rounded-2xl" src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="avatar">
            <h4 class="ml-3 text-lg">Larry Pagee</h4>
          </div>
          <div class="mt-5">
            <i class="fa-solid fa-quote-left fa-1x"></i>
          </div>
          <p class="leading-9 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus corporis omnis suscipit.</p>
        </div>
        <div class="bg-slate-50 py-5 px-7 rounded-2xl hover:bg-white hover:shadow-sm transition duration-500">
          <div class="flex place-items-center">
            <img class="w-10 h-10 object-cover bg-center bg-cover rounded-2xl" src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="avatar">
            <h4 class="ml-3 text-lg">Larry Pagee</h4>
          </div>
          <div class="mt-5">
            <i class="fa-solid fa-quote-left fa-1x"></i>
          </div>
          <p class="leading-9 text-base">Lorem ipsum dolor sit amet elit. Accusamus eius vero rerum quaerat exercitationem pariatur corporis omnis suscipit.</p>
        </div>

      </div>

    </div>
  </div>

  <p class="text-center py-10 text-xl">SMK Uyelindo memiliki tenaga Pengajar berkualitas dan ahli di bidangnya</p>
  <div class="flex px-10 py-10 flex-wrap items-center justify-center">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-5">
      <x-sub-components.card />
    </div>
  </div>
  <div class="container px-4 m-auto py-10 flex justify-center items-center">
    <a href="{{ route('daftar_guru') }}" class="inline-block py-3 px-5 rounded-xl text-pink-100 transition-colors duration-150 bg-red-800 focus:shadow-outline hover:bg-red-900">
      Lebih Detail
    </a>
  </div>

</x-app>
