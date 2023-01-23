{{-- corousel --}}
<div class="mx-auto relative " x-data="{

  activeSlide: 1,
  slides: [
    { id : 1, pageNumber : 1, bgColor : 'bg-teal-900' },
    { id : 2, pageNumber : 2 , bgColor : 'bg-red-800'},
    { id : 3, pageNumber : 3, bgColor : 'bg-blue-700' },
    { id : 4, pageNumber : 4, bgColor : 'bg-green-600' },
    { id : 5, pageNumber : 5, bgColor : 'bg-orange-500' }
  ]

  }">

  <!-- Slides -->
  <template x-for="slide in slides" :key="slide.id">
    <div
        x-show="activeSlide === slide.id && setTimeout( () => {
          activeSlide = activeSlide == slides.length ? 1 : activeSlide + 1
        }, 10000)"
        x-transition:enter="transition duration-400"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        :class="slide.bgColor"
        class="p-24 font-bold text-5xl h-[520px] flex items-center text-white rounded-lg">
        <div class="container">
          <h1 class="text-center text-xl md:text-left md:text-6xl">SMK Uyelindo</h1>
        </div>
    </div>
  </template>

  <!-- Prev/Next Arrows -->
  <div class="absolute inset-0 flex">
    <div class="flex items-center justify-start w-1/2">
      <button
        class="bg-teal-100 opacity-25 text-teal-500 hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 ml-6 z-10"
        x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1">
        &#8592;
        </button>
    </div>
    <div class="flex items-center justify-end w-1/2">
      <button
        class="bg-teal-100 opacity-25 text-teal-500 hover:text-orange-500 font-bold hover:shadow rounded-full w-12 h-12 mr-6 cursor-pointer z-10"
        x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1">
        &#8594;
      </button>
    </div>
  </div>

  <!-- Buttons -->
  <div class="absolute w-full flex items-center opacity-25 justify-center px-4">
    <template x-for="slide in slides" :key="slide.id">
      <button
        class="w-4 h-4 -mt-10 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-teal-600 hover:shadow-lg"
        :class="{
            'bg-orange-600': activeSlide === slide.id,
            'bg-teal-300': activeSlide !== slide.id
        }"
        x-on:click="activeSlide = slide"
      ></button>
    </template>
  </div>
</div>
  {{-- end corousel --}}

