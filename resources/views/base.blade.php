<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Welcome!')</title>
        <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text><text y=%221.3em%22 x=%220.2em%22 font-size=%2276%22 fill=%22%23fff%22>sf</text></svg>">
        
        <!-- Tailwind via CDN -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        @yield('styles')
        @vite(['resources/js/app.js']) 
    </head>

    <body class="bg-[#161616]">
        
        @include('partials.navbar')

        @yield('body')

        @include('partials.footer')


        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const navToggle = document.getElementById('navToggle');
                const mobileMenu = document.getElementById('mobileMenu');
                const menuIcon = document.getElementById('menuIcon');
                const closeIcon = document.getElementById('closeIcon');
                const sidebar = document.getElementById('sidebar');

                function toggleMobileMenu() {
                    const isOpen = !mobileMenu.classList.contains('translate-y-full');
                    mobileMenu.classList.toggle('translate-y-0', !isOpen);
                    mobileMenu.classList.toggle('translate-y-full', isOpen);
                    menuIcon.classList.toggle('hidden', !isOpen);
                    closeIcon.classList.toggle('hidden', isOpen);

                    if (sidebar && !isOpen) {
                        sidebar.classList.add('-translate-x-full');
                    }
                }

                if (navToggle) navToggle.addEventListener('click', toggleMobileMenu);

                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => link.addEventListener('click', toggleMobileMenu));

                window.addEventListener('resize', function () {
                    if (window.innerWidth >= 768) {
                        mobileMenu.classList.add('translate-y-full');
                        menuIcon.classList.remove('hidden');
                        closeIcon.classList.add('hidden');
                    }
                });
            });
        </script>

        @yield('scripts')
    </body>
</html>
