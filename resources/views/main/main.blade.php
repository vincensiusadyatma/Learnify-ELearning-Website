@extends('template.main-template')

@section('content')

@guest
 <!-- Login Modal Pop-up -->
 <div id="loginModal" class=" hidden absolute">
  <div class="relative z-50" aria-labelledby="modal-title" role="dialog"
       aria-modal="true">
     @include('auth.login')
  </div>
</div>
@endguest



{{-- first landing section jumbotron --}}
<div class="relative h-screen bg-cover bg-center px-4 sm:px-6 md:px-8" style="background-image: url('img/assets/jumbotron.png');">
  <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-transparent"></div>
  <div class="relative z-10 flex items-center justify-center h-full">
    <div class="text-center text-white">
      <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 drop-shadow-lg leading-tight">
        Welcome to Learnify
      </h1>
      <p class="text-sm sm:text-base md:text-lg mb-6 drop-shadow-lg leading-relaxed">
        Bangun Masa Depanmu Dengan Layanan Kami
      </p>
      <a href="#about" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 drop-shadow-lg text-sm sm:text-base">
        Learn More
      </a>
    </div>
  </div>
</div>

  
  
{{-- end landing section jumbotron --}}

{{-- 3 Point Advantage Card --}}
<div class="container mx-auto mt-[-50px] relative z-20 px-4" data-aos="fade-up" data-aos-duration="500">
  <div class="flex flex-col md:flex-row justify-center gap-4">
    <div class="flex-1 bg-gray-700 text-white rounded-xl shadow-lg p-6 flex flex-col items-center">
      <img src="img/assets/icons/time-icon2.png" alt="Fleksibel" class="w-12 h-12 mb-4">
      <h5 class="text-lg font-bold">Fleksibel</h5>
      <p class="text-sm text-center">Diakses Dimana Saja</p>
    </div>
    <div class="flex-1 bg-gray-700 text-white rounded-xl shadow-lg p-6 flex flex-col items-center">
      <img src="img/assets/icons/handshake-icon.png" alt="Terpercaya" class="w-12 h-12 mb-4">
      <h5 class="text-lg font-bold">Terpercaya</h5>
      <p class="text-sm text-center">Dapat Diandalkan</p>
    </div>
    <div class="flex-1 bg-gray-700 text-white rounded-xl shadow-lg p-6 flex flex-col items-center">
      <img src="img/assets/icons/free.png" alt="Gratis" class="w-12 h-12 mb-4">
      <h5 class="text-lg font-bold">Gratis</h5>
      <p class="text-sm text-center">Data Anda Aman Disimpan Pada Kami</p>
    </div>
  </div>
</div>
{{-- End 3 Point Advantage Card --}}

{{-- About Section --}}
<section class="bg-gray-800 py-8 sm:py-12 lg:py-16" id="tentang">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center">
    <!-- Text Content -->
    <div data-aos="fade-right">
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white mb-4 leading-tight">
        Tentang Kami
      </h2>
      <p class="text-sm sm:text-base text-gray-300 mb-4 leading-relaxed">
        Learnify menyediakan akses pendidikan berkualitas tinggi bagi semua orang, di mana saja. Dengan berbagai kursus yang dirancang oleh para ahli di bidangnya, kami menawarkan pengalaman belajar yang interaktif dan komprehensif.
      </p>
      <p class="text-sm sm:text-base text-gray-300 leading-relaxed">
        Misi kami adalah memberdayakan individu melalui pengetahuan dan keterampilan yang dapat meningkatkan karir dan kehidupan pribadi mereka. Kami percaya bahwa belajar adalah hak semua orang dan kami berkomitmen untuk menciptakan lingkungan belajar yang inklusif dan mendukung.
      </p>
    </div>

    <!-- Image Content -->
    <div class="grid grid-cols-2 gap-4">
      <div data-aos="fade-down">
        <img 
          src="/img/assets/foto-about-landing2.jpg" 
          alt="Office Content 1" 
          class="w-full h-auto rounded-lg grayscale hover:grayscale-0 transition duration-300"
        >
      </div>
      <div data-aos="fade-up" class="mt-4 lg:mt-8">
        <img 
          src="/img/assets/foto-about-landing1.jpg" 
          alt="Office Content 2" 
          class="w-full h-auto rounded-lg"
        >
      </div>
    </div>
  </div>
</section>
{{-- End of About Section --}}


{{-- why choose us section --}}
<div class="bg-black">
  <section id="manfaat" class="relative block px-6 py-10 md:py-20 md:px-10 border-t border-b border-neutral-900 bg-neutral-900/30">
    <div class="relative mx-auto max-w-5xl text-center" data-aos="zoom-in">
      <span class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
        Mengapa Memilih Kami
      </span>
      <h2 class="py-4 block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-3xl sm:text-4xl">
        Platform Dengan Beragam Manfaat Untuk Anda
      </h2>
      <p class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
        Kami menyediakan berbagai manfaat memudahkan Anda untuk belajar pemrograman secara efektif dan efisien.  
      </p>
    </div>

    <div class="relative mx-auto max-w-7xl z-10 flex sm:flex-col gap-10 pt-14 md:flex-row sm:flex-wrap">
      <div class="w-full sm:w-auto sm:flex-1 rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow" data-aos="zoom-in">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-md border bg-gradient-to-r from-indigo-600 to-blue-600 border-indigo-700">
          <img src="img/assets/icons/global-icon.png" class="icon w-8 h-8">
        </div>
        <h3 class="mt-6 text-gray-400">Materi Standar Industri</h3>
        <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
          Pelajari keterampilan pemrograman yang paling diminati di industri saat ini untuk menghadapi tantangan dunia kerja modern.
        </p>
      </div>
      
      <div class="w-full sm:w-auto sm:flex-1 rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow" data-aos="zoom-in" data-aos-delay="150">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-md border bg-gradient-to-r from-indigo-600 to-blue-600 border-indigo-700">
          <img src="img/assets/icons/time-icon2.png" class="icon w-8 h-8">
        </div>
        <h3 class="mt-6 text-gray-400">Fleksibilitas Dan Efisiensi</h3>
        <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
          Belajar kapan saja dan di mana saja dengan fleksibilitas penuh memungkinkan Anda belajar sesuai jadwal Anda sendiri.
        </p>
      </div>
      
      <div class="w-full sm:w-auto sm:flex-1 rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow" data-aos="zoom-in" data-aos-delay="250">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-md border bg-gradient-to-r from-indigo-600 to-blue-600 border-indigo-700">
          <img src="img/assets/icons/sertificate-icon.png" class="icon w-8 h-8">
        </div>
        <h3 class="mt-6 text-gray-400">Pembelajaran Bersertifikat</h3>
        <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
          Dapatkan sertifikat yang diakui industri setelah menyelesaikan kursus kami. Semua yang Anda butuhkan untuk berhasil ada di sini.
        </p>
      </div>
    </div>
    <div class="absolute bottom-0 left-0 z-0 h-1/3 w-full border-b" style="background-image: linear-gradient(to right top, rgba(79, 70, 229, 0.2) 0%, transparent 50%, transparent 100%); border-color: rgba(92, 79, 240, 0.2);"></div>
    <div class="absolute bottom-0 right-0 z-0 h-1/3 w-full" style="background-image: linear-gradient(to left top, rgba(89, 16, 207, 0.2) 0%, transparent 50%, transparent 100%); border-color: rgba(92, 79, 240, 0.2);"></div>
  </section>
</div>
{{-- end of why choose us section --}}

{{-- learning path section --}}
<section id="fitur" class="relative px-6 py-10 md:py-20 md:px-10 flex justify-center flex-col">
  <div class="relative mx-auto max-w-5xl text-center" data-aos="zoom-in">
    <span class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
      Alur Belajar
    </span>
    <h2
    class="pb-1 block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-3xl sm:text-4xl">
    Bangun Karirmu Dengan Informatika Bersama Kami
</h2>
<p
    class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
    Alur belajar akan membantu anda dalam belajar di learnify dengan kurikulum yang dibangun dengan standar industri modern.
</p>
  </div>
  <div class="wrapper max-w-[1100px] w-full relative mx-auto my-8">
    <i id="left" class="z-10 fa-solid fa-angle-left top-1/2 h-[50px] w-[50px] cursor-pointer text-lg absolute text-center leading-[50px] bg-white text-black rounded-full shadow-md transform -translate-y-1/2 transition-transform duration-100 left-[-22px] active:scale-85" style="display: flex; justify-content: center; align-items: center;">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
      </svg>
      
    </i>
    
    <ul class="carousel">
      <li class="card flex flex-col items-center  " style="background-image: url('img/assets/learning-path-assets/data-scientist.jpg');  background-position: center;  background-size: cover;"> 
        <h2 class="font-medium text-[1.56rem] my-[30px] text-white text-xl  text-shadow-sm z-[2]">Data Scientist</h2>
       
      </li>
      <li class="card flex flex-col items-center" style="background-image: url('img/assets/learning-path-assets/machine-learning.jpg');  background-position: center;  background-size: cover;">
        <h2 class="font-medium text-[1.56rem] my-[30px] text-white text-xl  text-shadow-sm z-[2]">Machine Learning</h2>
       
      </li>
      <li class="card flex flex-col items-center" style="background-image: url('img/assets/learning-path-assets/programmer.jpg');  background-position: center;  background-size: cover;">
        
        <h2 class="font-medium text-[1.56rem] my-[30px] text-white text-xl  text-shadow-sm z-[2]">Basic Programming</h2>
       
      </li>
      <li class="card flex flex-col items-center" style="background-image: url('img/assets/learning-path-assets/software-developer.jpg');  background-position: center;  background-size: cover;">
       
        <h2 class="font-medium text-[1.56rem] my-[30px] text-white text-xl  text-shadow-sm z-[2]">Mobile Developer</h2>
       
      </li>
      <li class="card flex flex-col items-center" style="background-image: url('img/assets/learning-path-assets/web-developer.jpg');  background-position: center;  background-size: cover;">
       
        <h2 class="font-medium text-[1.56rem] my-[30px] text-white text-xl  text-shadow-sm z-[2]">Web Developer</h2>
      
      </li>
    
    </ul>
    <i id="right" class="z-10 fa-solid fa-angle-right top-1/2 h-[50px] w-[50px] cursor-pointer text-lg absolute text-center leading-[50px] bg-white rounded-full shadow-md transform -translate-y-1/2 transition-transform duration-100 right-[-22px] active:scale-85" style="display: flex; justify-content: center; align-items: center;">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
      </svg>
       
    </i>
    
  </div>
</section>
{{-- akhir learning path section --}}

{{-- OUR Partner --}}
{{-- OUR Partner --}}
<section class="bg-gray-800 py-16">
  <div class=" mx-auto px-6 ">
      <div class="relative mx-auto max-w-5xl text-center" data-aos="zoom-in">
          <span class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
              Our Partners
          </span>
          <h2 class="pb-1 block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-3xl sm:text-4xl">
              Bersama Mitra Kepercayaan Kami Yang Profesional
          </h2>
          <p class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
              Kami bangga berkolaborasi dengan berbagai mitra terpercaya yang mendukung perjalanan kami dalam memberikan solusi terbaik untuk Anda.
          </p>
      </div>
      <div class="flex justify-center gap-6 items-center mt-10">
          <!-- Partner 1 -->
          <div class="p-4 flex justify-center items-center">
            <img src="{{ asset('img/logo/usd-logo.png') }}" alt="Partner 1" class="w-auto object-contain h-36">
          </div>
      </div>
  </div>
</section>





{{-- FAQ Section --}}
<div id="faq" class="bg-gray-700">
  <section class="max-w-5xl mx-auto py-10 sm:py-20">
    <div class="flex items-center justify-center flex-col gap-y-2 py-5" data-aos="fade-up">
      <h1 class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider text-lg">
        Frequently Asked Question
      </h1>
    </div>
    <div class="w-full px-7 md:px-10 xl:px-2 py-4" data-aos="zoom-in">
      <div class="mx-auto w-full max-w-5xl border border-slate-400/20 rounded-lg glass-bg">
        <div class="border-b border-[#0A071B]/10">
          <button class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-white focus:outline-none p-5" data-toggle="answer-1">
            <span class="question-text">Apa itu learnify?</span>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mt-1.5 md:mt-0 flex-shrink-0 transform h-5 w-5 icon-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
            </svg>
          </button>
          <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-slate-300 font-medium" id="answer-1" style="display: none;">
            Learnify adalah platform belajar online untuk semua kalangan yang ingin mempelajari dunia informatika
          </div>
        </div>
        <div class="border-b border-[#0A071B]/10">
          <button class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-white focus:outline-none p-5" data-toggle="answer-2">
            <span class="question-text">Bagaimana mengakses materi pada learnify?</span>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mt-1.5 md:mt-0 flex-shrink-0 transform h-5 w-5 icon-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
            </svg>
          </button>
          <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-slate-300 font-medium" id="answer-2" style="display: none;">
            Agar dapat mengakses materi yang ada pada learnify, pengguna wajib mendaftarkan akun atau melakukan login terlebih dahulu untuk bisa memilih materi
          </div>
        </div>
        <div class="border-b border-[#0A071B]/10">
          <button class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-white focus:outline-none p-5" data-toggle="answer-3">
            <span class="question-text">Bagaimana mendapatkan sertifikat?</span>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mt-1.5 md:mt-0 flex-shrink-0 transform h-5 w-5 icon-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
            </svg>
          </button>
          <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-slate-300 font-medium" id="answer-3" style="display: none;">
            Pengguna hanya bisa mendapatkan sertifikat ketika menyelesaikan progress dari satu jenis alur belajar
          </div>
        </div>
        <div>
          <button class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-white focus:outline-none p-5" data-toggle="answer-4">
            <span class="question-text">Apakah dapat mengambil lebih dari satu kursus?</span>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mt-1.5 md:mt-0 flex-shrink-0 transform h-5 w-5 icon-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
            </svg>
          </button>
          <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-slate-300 font-medium" id="answer-4" style="display: none;">
            Ya, pengguna dapat mengambil lebih dari satu kursus yang disediakan oleh learnify
          </div>
        </div>
      </div>
    </div>
  </section>


</div>
{{-- End FAQ Section --}}

 {{-- Closing Section --}}
<section id="closing" class="text-white bg-gray-700 py-44">
  <div class="container mx-auto text-center" data-aos="zoom-in-up">
      <h2 class="text-3xl font-bold mb-4">Mari Mulai Langkahmu Demi Karirmu</h2>
      <p class="text-lg mb-8">Mulailah belajar di Learnify demi masa depanmu yang lebih cerah untuk kedepannya</p>
      @guest
         <!-- Tombol di Closing Section -->
        <button id="openModalButton2" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
          Get Started
        </button>

      @else
          <a href="{{ route('show-dashboard') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
              Get Started
          </a>
      @endguest
  </div>
</section>

<script>
      const openModalButtonClosing = document.getElementById('openModalButton2');

      if (openModalButtonClosing) {
          openModalButtonClosing.addEventListener('click', () => {
              loginModal.classList.remove('hidden');
          });
      }
</script>

@endsection