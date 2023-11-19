<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ app('websiteTitle') }}</title>
    <meta name="description"
        content="{{ app('websiteTitle') }} is a service ordering website that provides printing, design, photography, and videography services in SMKN 46 Jakarta. We offer high-quality services for teachers and students of SMKN 46 Jakarta.">
    <meta name="keywords"
        content="{{ app('websiteTitle') }}, printing, design, photography, videography, SMKN 46 Jakarta, services, high-quality, teachers, students">
    <meta name="theme-color" content="#ef6603">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    @vite('resources/js/client.js')
    @stack('styles')
</head>

<body>
    @yield('header')

    @yield('hero')

    <main id="main-content" data-mail-success="{{ session('success', 'success') }}"
        data-mail-failure="{{ session('failure') }}">
        @yield('main')
    </main>

    @include('layouts.footer')

    <div class="bottom-button d-flex flex-column">
        <a href="https://wa.me/6285936128829?text=Halo,%20saya%20tertarik%20dengan%20produk%20Anda..."
            class="back-to-top-wa whatsapp-button d-flex align-items-center justify-content-center" target="_blank">
            <i class="bi bi-whatsapp"></i>
        </a>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i>
        </a>
    </div>

    <!-- Vendor JS Files -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let successMessage = document.querySelector('#main-content').dataset.mailSuccess;
            let failureMessage = document.querySelector('#main-content').dataset.mailFailure;

            if (successMessage) {
                showToast(successMessage, "#28a745");
            }

            if (failureMessage) {
                showToast(failureMessage, "#dc3545");
            }
        })

        function showToast(message, background) {
            Toastify({
                text: message,
                duration: 1800,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background,
                },
            }).showToast();
        }

        const showPortfolios = (element, dataName, limit) => {
            const portfolioContainer = document.querySelector(element);
            const portfolios = JSON.parse(portfolioContainer.dataset[dataName]);

            portfolioContainer.innerHTML = portfolios
                .slice(0, limit)
                .map((portfolio) => {
                    return `
                        <div class="col-lg-4 col-md-6 portfolio-item filter-${portfolio.category}">
                            <div class="portfolio-img">
                                <img src="{{ asset('assets/img/${portfolio.image}') }}" class="img-fluid" alt="${portfolio.title}">
                            </div>
                            <div class="portfolio-info">
                                <h4>${portfolio.title}</h4>
                                <p>${portfolio.category}</p>
                                <a href="{{ asset('assets/img/${portfolio.image}') }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="${portfolio.title}">
                                    <i class="bx bx-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                    `;
                })
                .join('');
        };
    </script>

    @stack('scripts')
</body>

</html>
