<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from zoyothemes.com/tailwind/evea/index-1 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Jul 2025 10:12:25 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>SiRestu | Formulir Pengajuan Cuti</title>
    <meta name="description"
        content="A Fully Responsive Tailwind CSS Template, personal, agency, application, business, clean, creative, it solutions, startup, career, blog, modern, creative, multipurpose, portfolio, saas, software, tailwind css, etc." />
    <meta name="keywords" content="Onepage, creative, modern, Tailwind CSS, multipurpose, clean" />
    <meta name="author" content="Zoyothemes" />

    <style>
        /* Custom style for weekends in Flatpickr */
        .flatpickr-day.weekend {
            color: #dc2626;
            /* Tailwind's red-600 */
            font-weight: bold;
        }

        .flatpickr-current-month .flatpickr-monthDropdown-months {
            background-color: white;
            border: 1px solid #d1d5db;
            /* Tailwind gray-300 */
            border-radius: 0.375rem;
            /* rounded-md */
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            /* text-sm */
            font-weight: 500;
            color: #111827;
            /* Tailwind gray-900 */
            appearance: none;
        }

        .flatpickr-current-month .numInput {
            background-color: white;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #111827;
            width: 4rem;
        }

        .flatpickr-current-month select:focus,
        .flatpickr-current-month .numInput:focus {
            outline: none;
            border-color: #9ca3af;
            /* Tailwind gray-400 */
        }

        .swal2-confirm {
            background-color: #7066e0 !important;
            /* Tailwind blue-600 */
            color: #fff !important;
            border-radius: 0.25em !important;
            font-size: 1em !important;
            border: 0 !important;
            transition: background-color 0.2s ease;
        }
    </style>

    <!-- favicon -->
    <link href="landing-assets/images/favicon.ico" rel="shortcut icon">
    <!-- Icons Css -->
    <link href="landing-assets/css/icons.min.css" rel="stylesheet" type="text/css">

    <!-- Jarallax Css -->
    <link href="landing-assets/libs/jarallax/jarallax.min.css" rel="stylesheet">

    <!-- Swiper Css -->
    <link href="landing-assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main Css -->
    <link href="landing-assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- Include Flatpickr CSS in your <head> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>

    <!-- Contact Start -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="container">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950 mb-6">
                        Pengisian Formulir Cuti
                    </span>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Pengisian Formulir</h2>
                </div>

                <div>
                    <div class="p-6 md:p-12 rounded-md shadow-lg bg-white">
                        <form action="{{ route('formulir.store') }}" method="POST">
                            <div class="grid sm:grid-cols-2 gap-6">
                                @csrf

                                <div>
                                    <label for="pegawai_id"
                                        class="block text-sm/normal font-semibold text-black mb-2">Nama</label>
                                    <select id="pegawai_id" name="pegawai_id"
                                        class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                        required>
                                        <option value="" disabled selected>Pilih Nama Pegawai</option>
                                        @foreach ($pegawais as $pegawai)
                                            <option value="{{ $pegawai->id }}">{{ $pegawai->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="tanggal_cuti"
                                        class="block text-sm/normal font-semibold text-black mb-2">Tanggal Cuti</label>
                                    <input type="text" id="tanggal_cuti"
                                        class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                        placeholder="Pilih tanggal cuti" required>
                                </div>

                                <input type="hidden" name="tanggal_mulai" id="tanggal_mulai">
                                <input type="hidden" name="tanggal_selesai" id="tanggal_selesai">

                                <div>
                                    <label for="jenis_cuti"
                                        class="block text-sm/normal font-semibold text-black mb-2">Jenis Cuti</label>
                                    <select id="jenis_cuti" name="jenis_cuti"
                                        class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                        required>
                                        <option value="" disabled selected>Pilih Jenis Cuti</option>
                                        <option value="tahunan">Cuti Tahunan</option>
                                        <option value="besar">Cuti Besar</option>
                                        <option value="sakit">Cuti Sakit</option>
                                        <option value="melahirkan">Cuti Melahirkan</option>
                                        <option value="alasan">Cuti Karena Alasan Penting</option>
                                        <option value="diluar">Cuti Diluar Tanggungan Negara</option>
                                    </select>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="alasan"
                                        class="block text-sm/normal font-semibold text-black mb-2">Alasan Cuti</label>
                                    <textarea id="alasan" name="alasan"
                                        class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                        rows="4" placeholder="Tuliskan alasan cuti..." required></textarea>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="alamat"
                                        class="block text-sm/normal font-semibold text-black mb-2">Alamat Selama
                                        Menjalankan Cuti</label>
                                    <textarea id="alamat" name="alamat"
                                        class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                        rows="4" placeholder="Tuliskan alamat selama menjalankan cuti..." required></textarea>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit"
                                    class="py-2 px-6 rounded-md text-base items-center justify-center border border-primary text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium">
                                    Ajukan Cuti <i class="mdi mdi-send ms-1"></i>
                                </button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('sweetalert2::index')

    @if ($errors->any())
        <script>
            let errorMessages = `
                        <div style="text-align:center;">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    `;

            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                html: errorMessages,
                confirmButtonText: 'OK'

            })
        </script>
    @endif
    <!-- Contact End -->

    <!-- Back to top -->
    <a href="javascript: void(0);" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed text-base rounded-md z-10 bottom-8 right-8 h-8 w-8 text-center bg-primary text-white leading-9 justify-center items-center">
        <i data-lucide="arrow-up" class="h-4 w-4 text-white stroke-2"></i>
    </a>
    <!-- Back to top -->

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#tanggal_cuti", {
            mode: "range",
            dateFormat: "d-m-Y", // format tampilan di input utama
            monthSelectorType: "dropdown",
            locale: {
                firstDayOfWeek: 1,
                rangeSeparator: " sampai ",
                weekdays: {
                    shorthand: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                    longhand: [
                        "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"
                    ],
                },
                months: {
                    shorthand: [
                        "Jan", "Feb", "Mar", "Apr", "Mei", "Jun",
                        "Jul", "Agu", "Sep", "Okt", "Nov", "Des"
                    ],
                    longhand: [
                        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                    ],
                },
            },
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                const date = dayElem.dateObj;
                const day = date.getDay();
                if (day === 0 || day === 6) { // Minggu = 0, Sabtu = 6
                    dayElem.classList.add("weekend");
                }
            },
            onChange: function(selectedDates) {
                if (selectedDates.length === 2) {
                    // Format untuk ke DB (YYYY-MM-DD biar aman)
                    const formatDB = d => d.toLocaleDateString("sv-SE").split("T")[0];

                    document.getElementById("tanggal_mulai").value = formatDB(selectedDates[0]);
                    document.getElementById("tanggal_selesai").value = formatDB(selectedDates[1]);
                }
            }
        });
    </script>

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
