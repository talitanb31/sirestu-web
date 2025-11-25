<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat | Formulir Pengajuan Cuti</title>
    <meta name="description" content="Formulir Pengajuan Cuti, Kementerian Agama Kabupaten Pasuruan" />
    <meta name="author" content="Kementerian Agama Kabupaten Pasuruan" />
    <link href="landing-assets/images/favicon.ico" rel="shortcut icon">
    <link href="landing-assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="landing-assets/libs/jarallax/jarallax.min.css" rel="stylesheet">
    <link href="landing-assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="landing-assets/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>

    <section class="py-20">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                <div>
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950 mb-6">
                        Rekap Pengajuan Cuti
                    </span>

                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Riwayat Cuti Pegawai</h2>
                </div>

                <form id="searchForm" method="GET" action="{{ route('history.index') }}">
                    <div class="flex gap-2">
                        <input type="text" name="search" placeholder="Masukkan NIP" value="{{ request('search') }}"
                            class="block text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent">
                        <button type="submit" id="btnFilter"
                            class="py-2 px-6 rounded-md text-base items-center justify-center border border-primary text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium">
                            Cari
                        </button>
                    </div>
                </form>

            </div>

            <div id="cutiList" class="grid grid-cols-1 gap-6">
                <div class="text-center text-gray-500 py-6  rounded-lg ">
                    Masukkan NIP untuk melihat riwayat cuti
                </div>
            </div>

        </div>
    </section>


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


    <script>
        document.getElementById("searchForm").addEventListener("submit", function(e) {
            e.preventDefault(); // prevent reload

            let url = this.action + "?search=" + encodeURIComponent(this.search.value);

            fetch(url, {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest"
                    }
                })
                .then(res => res.text())
                .then(html => {
                    // find only the cutiList content from response
                    let parser = new DOMParser();
                    let doc = parser.parseFromString(html, "text/html");
                    let newContent = doc.querySelector("#cutiList").innerHTML;

                    document.querySelector("#cutiList").innerHTML = newContent;
                });
        });
    </script>

</body>

</html>
