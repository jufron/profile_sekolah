{{-- navbar --}}
<nav class="bg-slate-50">
  <div x-data="{showMenu : false}" class="container max-w-screen-lg mx-auto flex justify-between sm:h-14 md:h-20">
    <!-- Brand-->
    <a href="#" class="flex items-center cursor-pointer hover:bg-purple-50 px-2 ml-3">
      <!-- Logo-->
      <div class="rounded bg-purple-400 text-white font-bold w-10 h-10 flex justify-center text-3xl pt-0.5">A</div>
      <div class="text-gray-700 font-semibold ml-2">SMK Uyelindo</div>
    </a>
    <!-- Navbar Toggle Button -->
    <button @click="showMenu = !showMenu" class="block md:hidden text-gray-700 p-2 rounded hover:border focus:border focus:bg-gray-100 my-2 mr-5" type="button" aria-controls="navbar-main" aria-expanded="false" aria-label="Toggle navigation">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
    </button>
    <!-- Nav Links-->
    <ul class="md:flex text-gray-700 text-base mr-3 origin-top z-50"
        :class="{ 'block absolute top-14 border-b bg-white w-full p-2': showMenu, 'hidden': !showMenu}"
        id="navbar-main" x-cloak>
        <li class="md:w-24 md:justify-center cursor-pointer hover:bg-purple-50 flex items-center @requestIs('home') text-white bg-red-900 @endrequestIs hover:text-white hover:bg-red-800 transition duration-500" :class="showMenu && 'py-2'">
            <a href="{{ route('beranda') }}">Beranda</a>
        </li>
        <li class="px-3 md:w-24  @requestIs('profil/*') text-white bg-red-900 @endrequestIs md:justify-center cursor-pointer flex items-center hover:text-white hover:bg-red-800 transition duration-500" :class="showMenu && 'py-2'">
          <div x-data="{dropdownMenu: false}" class="relative">
            <button @mouseover="dropdownMenu = ! dropdownMenu">
              Profil
            </button>

            <!-- Dropdown list -->
            <div x-show="dropdownMenu" @click.away="dropdownMenu = false" class="absolute md:-left-5 py-2 md:mt-6 bg-white bg-gray-100 rounded-md shadow-xl w-44">
                <a @requestIs('profil/sejarah') style="color: white" @endrequestIs href="{{ route('sejarah') }}" class="@requestIs('profil/sejarah') text-white bg-red-900 @endrequestIs block px-4 py-2 md:py-5 text-sm text-slate-900 hover:text-white hover:bg-red-800 transition duration-500">
                  Sejarah
                </a>
                <a @requestIs('profil/visi-misi') style="color: white" @endrequestIs href="{{ route('visiMisi') }}" class="@requestIs('profil/visi-misi') bg-red-900 @endrequestIs block px-4 py-2 md:py-5 text-sm text-slate-900 hover:text-white hover:bg-red-800 transition duration-500">
                    Visi Misi
                </a>
                <a @requestIs('profil/programKeahlian') style="color: white" @endrequestIs href="{{ route('programKeahlian') }}" class="@requestIs('profil/programKeahlian') text-white bg-red-900 @endrequestIs block px-4 py-2 md:py-5 text-sm text-slate-900 hover:text-white hover:bg-red-800 transition duration-500">
                    Program Keahlian
                </a>
            </div>
          </div>
        </li>
        <li class="px-3 md:w-24 md:justify-center cursor-pointer hover:bg-purple-50 flex items-center @requestIs('galeri') text-white bg-red-900 @endrequestIs hover:text-white hover:bg-red-800 transition duration-500" :class="showMenu && 'py-2'">
            <a href="{{ route('galeri') }}">Galeri</a>
        </li>
        <li class="px-3 md:w-24 md:justify-center cursor-pointer hover:bg-purple-50 flex items-center @requestIs('ppdb') text-white bg-red-900 @endrequestIs hover:text-white hover:bg-red-800 transition duration-500" :class="showMenu && 'py-2'">
            <a href="{{ route('ppdb') }}">PPDB</a>
        </li>
        <li class="px-3 md:w-24 md:justify-center cursor-pointer hover:bg-purple-50 flex items-center @requestIs('blog') text-white bg-red-900 @endrequestIs hover:text-white hover:bg-red-800 transition duration-500" :class="showMenu && 'py-2'">
            <a href="{{ route('blog') }}">Blog</a>
        </li>
        <li class="px-3 md:w-24 md:justify-center cursor-pointer hover:bg-purple-50 flex items-center @requestIs('kontak') text-white bg-red-900 @endrequestIs hover:text-white hover:bg-red-800 transition duration-500" :class="showMenu && 'py-2'">
            <a href="{{ route('kontak') }}">Kontak</a>
        </li>
    </ul>
  </div>
</nav>
{{-- end navbar --}}
