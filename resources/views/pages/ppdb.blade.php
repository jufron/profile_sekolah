<x-app title="PPDB">
    <div class="container px-4 m-auto">
      <h1 class="py-10 text-4xl">Penerimaan Peserta didik baru</h1>
      <div class="flex items-center mb-20">
        <div class="max-w-xl pt-10 pb-4">
          <h1 class="font-medium">Smooth Accordion</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium ut tenetur provident, dolorem tempora quisquam cumque sed aperiam consequuntur repellendus?</p>
        </div>
          <div
            class="max-w-xl mx-auto"
            x-data="{ selected : 1 }"
            >
            {{-- accordion component --}}
              <li class="list-none relative bg-slate-50 rounded-2xl my-3">

                <button
                  type="button"
                  class="w-full px-8 py-6 text-left"
                  @click="selected !== 1 ? selected = 1 : selected = null"
                  >
                  <div class="flex items-center justify-between">
                    <span>
                      Should I use reCAPTCHA v2 or v3?
                    </span>
                    <div x-show="selected == 1">
                      <i class="fa-solid fa-arrow-down fa-1x"></i>
                    </div>
                    <div x-show="selected !== 1">
                      <i class="fa-solid fa-bars fa-1x"></i>
                    </div>
                  </div>
                </button>

                <div
                  class="relative overflow-hidden transition-all max-h-0 duration-700"
                  style=""
                  x-ref="container1"
                  x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''"
                  >
                  <div class="p-6">
                    <p>reCAPTCHA v2 is not going away! We will continue to fully support and improve security and usability for v2.</p>
                    <p>reCAPTCHA v3 is intended for power users, site owners that want more data about their traffic, and for use cases in which it is not appropriate to show a challenge to the user.</p>
                    <p>For example, a registration page might still use reCAPTCHA v2 for a higher-friction challenge, whereas more common actions like sign-in, searches, comments, or voting might use reCAPTCHA v3. To see more details, see the reCAPTCHA v3 developer guide.</p>
                  </div>
                </div>
              </li>
              <li class="list-none relative bg-slate-50 rounded-2xl my-3">

                <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                  <div class="flex items-center justify-between">
                    <span>
                      I'd like to run automated tests with reCAPTCHA. What should I do?
                    </span>
                    <div x-show="selected == 2">
                      <i class="fa-solid fa-arrow-down fa-1x"></i>
                    </div>
                    <div x-show="selected !== 2">
                      <i class="fa-solid fa-bars fa-1x"></i>
                    </div>
                  </div>
                </button>

                <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                  <div class="p-6">
                    <p>For reCAPTCHA v3, create a separate key for testing environments. Scores may not be accurate as reCAPTCHA v3 relies on seeing real traffic.</p>
                    <p>For reCAPTCHA v2, use the following test keys. You will always get No CAPTCHA and all verification requests will pass.</p>
                  </div>
                </div>

              </li>
              <li class="list-none relative bg-slate-50 rounded-2xl my-3">

                <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                  <div class="flex items-center justify-between">
                    <span>
                      Can I run reCAPTCHA v2 and v3 on the same page?
                    </span>
                    <div x-show="selected == 3">
                      <i class="fa-solid fa-arrow-down fa-1x"></i>
                    </div>
                    <div x-show="selected !== 3">
                      <i class="fa-solid fa-bars fa-1x"></i>
                    </div>
                  </div>
                </button>

                <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                  <div class="p-6">
                    <p>To do this, load the v3 site key as documented, and then explicitly render v2 using grecaptcha.render.</p>
                      <p>You are allowed to hide the badge as long as you include the reCAPTCHA branding visibly in the user flow. Please include the following text:</p>
                      <p>Yes, please use "www.recaptcha.net" in your code in circumstances when "www.google.com" is not accessible.</p>
                      <ul>
                        <li>First, replace &lt;script src="https://www.google.com/recaptcha/api.js" async defer&gt;&lt;/script&gt; with &lt;script src="https://www.recaptcha.net/recaptcha/api.js" async defer&gt;&lt;/script&gt;</li>
                        <li>After that, apply the same to everywhere else that uses "www.google.com/recaptcha/" on your site.</li>
                      </ul>
                      <p>After that, apply the same to everywhere else that uses "www.google.com/recaptcha/" on your site.</p>
                  </div>
                </div>

              </li>
          </div>
      </div>

    </div>
</x-app>

