<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiRestu | Formulir Pengajuan Cuti</title>
    <meta name="description" content="Formulir Pengajuan Cuti, Kementerian Agama Kabupaten Pasuruan" />
    <meta name="author" content="Kementerian Agama Kabupaten Pasuruan" />
    <link href="landing-assets/images/favicon.ico" rel="shortcut icon">
    <link href="landing-assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="landing-assets/libs/jarallax/jarallax.min.css" rel="stylesheet">
    <link href="landing-assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="landing-assets/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>

    <nav class="navbar fixed top-0 start-0 end-0 z-999 transition-all duration-500 py-5 items-center shadow-md lg:shadow-none [&.is-sticky]:bg-white group [&.is-sticky]:shadow-md bg-white lg:bg-transparent"
        id="navbar">
        <div class="container">

            <div class="flex lg:flex-nowrap flex-wrap items-center justify-between">

                <a class='flex items-start' href='index-1.html'>
                    <img src="landing-assets/images/Logo.png" class="h-9 flex">
                </a>

                <div class="lg:hidden flex items-center ms-auto px-2.5">
                    <button class="hs-collapse-toggle" type="button" id="hs-unstyled-collapse"
                        data-hs-collapse="#navbarCollapse">
                        <i data-lucide="menu" class="h-8 w-8 text-black"></i>
                    </button>
                </div>

                <div class="navigation hs-collapse transition-all duration-300 " id="navbarCollapse">
                    <ul class="navbar-nav flex-col lg:flex-row gap-y-2 flex lg:items-center justify-center"
                        id="navbar-navlist">
                        <li
                            class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark all duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                                href="#home">Beranda</a>
                        </li>

                        <li
                            class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                                href="#about">Tentang</a>
                        </li>

                        <li
                            class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize"
                                href="#FAQs">FAQs</a>
                        </li>

                        <li
                            class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a href="{{ route('formulir.index') }}"
                                class="py-2 px-6 rounded-md text-white text-base bg-primary hover:bg-primaryDark border border-primary hover:border-primaryDark transition-all duration-500 font-medium">
                                Isi Formulir
                            </a>
                        </li>

                        <li
                            class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a href="{{ route('history.index') }}"
                                class="py-2 px-6 rounded-md border border-primary text-base hover:border-primary hover:bg-primary hover:text-white transition-all duration-500 font-medium text-primary">
                                Riwayat
                            </a>
                        </li>

                    </ul>
                </div>



            </div>

        </div>
    </nav>

    <section
        class="relative pt-32 pb-32 overflow-x-hidden from-slate-500/10 bg-[url(../images/home/bg-1.png)] bg-no-repeat bg-cover"
        id="home">
        <div class="container">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 items-center">
                <div class="text-sm py-20 px-10">
                    <span
                        class="inline-flex py-2 text-lg text-black font-medium items-center justify-center rounded-full">
                        <i data-lucide="minus"></i> Kementerian Agama Kabupaten Pasuruan</span>
                    <h1 class="md:text-6xl/tight text-4xl text-dark tracking-normal leading-normal font-bold mb-4 mt-6">
                        Formulir Pengajuan <span class="text-primary"> Cuti </span></h1>
                    <p class="text-base font-medium text-muted leading-7 mt-5">Dengan formulir ini, Anda dapat mengisi
                        formulir cuti dengan mudah dan cepat,
                        tanpa perlu mengisi formulir manual yang memakan waktu</p>
                    </p>
                    </p>
                </div>

                <div class="mt-4 pt-2 sm:mt-0 sm:pt-0 relative">
                    <iframe
                        src="https://calendar.google.com/calendar/embed?height=500&wkst=1&ctz=Asia%2FJakarta&showPrint=0&showTitle=0&showTabs=0&showCalendars=0&hl=id&src=ZW4tZ2IuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%230b8043"
                        style="border-width:0" width="540" height="500" frameborder="0" scrolling="no"></iframe>
                </div>
            </div>

        </div>
    </section>

    <section class="relative py-20 bg-cover bg-no-repeat bg-center"
        style="background-image: url('landing-assets/images/kantor.webp');" data-jarallax data-speed="0.20">
        <div class="absolute inset-0 w-full h-full bg-gray-900/70"></div>

        <div class="container">
            <div class="pb-10 lg:pb-0 flex flex-col items-center justify-center">
                <h1 class="text-3xl md:text-4xl/tight font-semibold text-white text-center">Petunjuk Pengisian Formulir
                </h1>
                <p class="text-base font-normal max-w-xl text-center mx-auto text-white mt-6">
                    Silahkan tonton video berikut untuk mengetahui cara mengisi formulir pengajuan cuti dengan jelas.
                </p>
                <div class="flex flex-wrap mt-6 gap-3">
                    <button
                        class="py-2 px-6 rounded-md border border-white text-base hover:border-white hover:bg-white hover:text-primary transition-all duration-500 font-medium text-white ">Lihat
                        Video</button>
                </div>
            </div>
        </div>
    </section>

    <!-- About Start -->
    <section id="about" class="py-20">
        <div class="container">

            <div class="grid lg:grid-cols-2 items-center gap-6">
                <div class="lg:ms-5 ms-8">

                    <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Isi Formulir Pengajuan Cuti
                        Kurang Dari 1 Menit Aja!</h2>
                    <p class="text-base font-normal text-muted mt-6">Dengan platform ini, kamu bisa isi formulir cuti
                        secara online, cepat, dan tanpa ribet.
                        Data langsung tersimpan, dan surat cuti bisa langsung kamu unduh dalam hitungan detik.</p>

                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-8 mt-9">

                        <div class="">
                            <div class="flex items-center justify-start">
                                <div
                                    class="items-center justify-center flex bg-green-50 rounded-full h-20 w-20 border border-dashed border-green-50">
                                    <i data-lucide="smartphone" class="h-8 w-8 text-black"></i>
                                </div>
                            </div>
                            <h1 class="text-xl font-semibold pt-6">1. Buka Website</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Kunjungi halaman pengisian formulir
                                online.</p>
                        </div>

                        <div class="">
                            <div class="flex items-center justify-start">
                                <div
                                    class="items-center justify-center flex bg-red-50 rounded-full h-20 w-20 border border-dashed border-red-50">
                                    <i data-lucide="file-text" class="h-8 w-8 text-black"></i>
                                </div>
                            </div>
                            <h1 class="text-xl font-semibold  pt-6">2. Isi Formulir</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Lengkapi data pegawai dan detail cuti.
                            </p>
                        </div>

                        <div class="">
                            <div class="flex items-center justify-start">
                                <div
                                    class="items-center justify-center flex bg-primary/10 rounded-full h-20 w-20 border border-dashed border-primary/10">
                                    <i data-lucide="rocket" class="h-8 w-8 text-black"></i>
                                </div>
                            </div>
                            <h1 class="text-xl font-semibold pt-6">3. Download</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Klik download, dan surat cuti langsung
                                terunduh dalam format PDF.</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <img src="landing-assets/images/MacBook Pro.png" class="h-[600px] rounded-xl mx-auto"
                        alt="feature-image">
                </div>

            </div>
        </div>
    </section>
    <!-- About End -->

    <!-- Faqs Start -->
    <section id="FAQs" class="py-20 bg-gray-50">
        <div class="container">
            <div class="">
                <div class="text-center max-w-xl mx-auto">
                    <div>
                        <span
                            class="text-sm text-primary uppercase font-medium tracking-wider text-default-950 mb-6">FAQs</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Frequently Asked Questions</h2>
                </div>

                <div id="accordion-collapse" data-accordion="collapse"
                    class="md:gap-[30px] mt-14 bg-white rounded-xl">
                    <div class="hs-accordion-group divide-y divide-gray-200">
                        <div class="relative overflow-hidden">
                            <h2 class="text-base font-semibold" id="accordion-collapse-heading-4">
                                <button type="button"
                                    class="flex justify-between items-center px-5 py-4 w-full font-semibold text-lg text-start"
                                    data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-4">
                                    <span>Apakah semua kolom wajib diisi ?</span>
                                    <svg data-accordion-icon class="size-4 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-4" class="hidden"
                                aria-labelledby="accordion-collapse-heading-4">
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">
                                        Ya, semua kolom pada formulir pengajuan cuti wajib diisi.
                                        Hal ini penting untuk memastikan bahwa data yang diberikan lengkap dan akurat.
                                        Pastikan untuk mengisi setiap kolom dengan informasi yang sesuai.</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="relative overflow-hidden">
                            <h2 class="text-base font-semibold" id="accordion-collapse-heading-5">
                                <button type="button"
                                    class="flex justify-between items-center px-5 py-4 w-full font-semibold text-lg text-start"
                                    data-accordion-target="#accordion-collapse-body-5" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-4">
                                    <span>Bisakah saya mengubah data setelah form dikirim ?</span>
                                    <svg data-accordion-icon class="size-4 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-5" class="hidden"
                                aria-labelledby="accordion-collapse-heading-5">
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">
                                        Form yang sudah di-generate tidak bisa langsung diubah di website.
                                        Jika terjadi kesalahan, hubungi admin untuk memperbarui data atau buat
                                        form baru dengan data yang benar.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="relative overflow-hidden">
                            <h2 class="text-base font-semibold" id="accordion-collapse-heading-6">
                                <button type="button"
                                    class="flex justify-between items-center px-5 py-4 w-full font-semibold text-lg text-start"
                                    data-accordion-target="#accordion-collapse-body-6" aria-expanded="false"
                                    aria-controls="accordion-collapse-body-6">
                                    <span>Apakah saya bisa mengakses form ini lewat HP ?</span>
                                    <svg data-accordion-icon class="size-4 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-6" class="hidden"
                                aria-labelledby="accordion-collapse-heading-6">
                                <div class="px-5 pb-5">
                                    <p class="text-muted text-base font-normal">
                                        Ya, formulir pengajuan cuti ini responsif dan dapat diakses
                                        melalui perangkat apapun, termasuk smartphone, tablet, maupun komputer.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Faqs End -->

    <!-- Footer Start -->
    <footer style="background-color: #06411F;">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 pb-16 pt-16">
                <!-- Left Side -->
                <div class="col-span-1">
                    <div class="max-w-2xl mx-auto">
                        <div class="flex items-center">
                            <img src="landing-assets/images/logo.png" alt="" class="h-10 me-5">
                        </div>
                        <p class="text-gray-300 max-w-xs mt-6">
                            Kantor Kementerian Agama Kabupaten Pasuruan.
                        </p>
                    </div>

                    <div class="mt-6 grid space-y-3">
                        <!-- Address -->
                        <a class="inline-flex items-center gap-x-4 text-gray-300 hover:text-gray-400 transition-all duration-300"
                            href="https://share.google/7cnKCCPkJS5KHMJdM" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                                <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            Jl. Dokter Wahidin Sudiro Husodo No.5, Pekuncen, Kec. Panggungrejo, Kota Pasuruan, Jawa
                            Timur 67126
                        </a>

                        <!-- Website -->
                        <a class="inline-flex items-center gap-x-4 text-gray-300 hover:text-gray-400 transition-all duration-300"
                            href="https://kemenagkabpasuruan.id" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M2 12h20M12 2a15.3 15.3 0 0 0 0 20M12 2a15.3 15.3 0 0 1 0 20" />
                            </svg>
                            kemenagkabpasuruan.id
                        </a>
                    </div>
                </div>

                <div class="col-span-1">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13763.44236603116!2d112.89934034465716!3d-7.647221087292955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7c6080a2a61e9%3A0x8ec44f27f3ef0df0!2sKantor%20Kementerian%20Agama%20Kabupaten%20Pasuruan!5e0!3m2!1sid!2sid!4v1763469191197!5m2!1sid!2sid"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <div style="background-color: #06411F;" class="py-4">
            <div class="container">
                <div class="flex justify-between items-center">
                    <p class="text-base text-white">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Kementerian Agama Kabupaten Pasuruan
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer End -->
    <!-- Back to top -->
    <a href="javascript: void(0);" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed text-base rounded-md z-10 bottom-8 right-8 h-8 w-8 text-center bg-primary text-white leading-9 justify-center items-center">
        <i data-lucide="arrow-up" class="h-4 w-4 text-white stroke-2"></i>
    </a>
    <!-- Back to top -->

    <!-- Preline Js -->
    <script src="landing-assets/libs/preline/preline.js"></script>

    <!-- Lucide Js -->
    <script src="landing-assets/libs/lucide/umd/lucide.min.js"></script>

    <!-- Gumshoe Js -->
    <script src="landing-assets/libs/gumshoejs/gumshoe.polyfills.min.js"></script>

    <!-- Jarallax Js -->
    <script src="landing-assets/libs/jarallax/jarallax.min.js"></script>

    <!-- Swiper Bundle Js -->
    <script src="landing-assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Swiper Js -->
    <script src="landing-assets/js/swiper.js"></script>

    <!-- Main App Js -->
    <script src="landing-assets/js/app.js"></script>

</body>

<!-- Mirrored from zoyothemes.com/tailwind/evea/index-1 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Jul 2025 10:12:37 GMT -->

</html>
