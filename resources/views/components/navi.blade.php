<style>
    [drawer-backdrop] {
        display: none !important;
    }

</style>
<div class="p-0 absolute w-full top-10 left-0 right-0 z-10">
    <div class="max-w-7xl mx-auto flex-wrap lg:flex hidden justify-end items-center text-sm text-white py-1 px-10 ml-10">
        <span class="mr-4">📅 Monday - Friday 8am - 5pm</span>
        <span class="mr-4">📧 sam.sovannarith.ra@gmail.com</span>
        <span>📞 016/017 43 02 02</span>
    </div>
    <!-- Navbar -->
    <nav class="bg-white shadow">

        <div class=" max-w-7xl mx-auto px-4 lg:flex hidden justify-between items-center h-20">
            <div class="flex-shrink-0 mr-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-14">
            </div>
            <!-- Navbar -->
            <nav class="">
                <div class="max-w-7x1 left-4 mx-auto px-10 flex justify-between items-center">

                    <!-- Logo -->



                    <div class="hidden md:flex space-x-4 ml-35">
                        <a href="/" class="{{ request()->routeIs('/')
        ? 'bg-green-700'
        : 'hover:bg-greeb-100 ' }}
          px-3 py-7 rounded text-sm font-medium items-flex">
                            Home
                        </a>

                        <a href="{{ route('about') }}" class="inline-flex items-center px-3 py-7 rounded text-sm font-medium
    {{ request()->routeIs('about')
        ? 'bg-green-700 '
        : 'hover:bg-green-100 ' }}">
                            About
                        </a>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-3 py-7 rounded text-sm font-medium
{{ request()->routeIs('/ourproduct')
    ? 'bg-green-700'
    : ' hover:bg-green-100' }}">
                            Our Products
                        </a>
                        <a href="/ourteam" class="{{ request()->is('/ourteam') ? 'bg-green-700 text-white' : 'text-gray-700 hover:bg-green-100' }}
          px-3 py-7 rounded-b-lg text-sm font-medium items-flex">Our
                            Team</a>
                        <a href="/news" class="{{ request()->is('/news') }}px-3 py-7 rounded-md text-sm font-medium text-gray-700 hover:bg-green-100">News</a>
                        <a href="/publication" class="px-3 py-7 rounded-md text-sm font-medium text-gray-700 hover:bg-green-100">Our
                            Publication</a>
                        <a href="/career" class="px-3 py-7 rounded-md text-sm font-medium text-gray-700 hover:bg-green-100">Career</a>
                        <a href="/contact" class="px-3 py-7 rounded-md text-sm font-medium text-gray-700 hover:bg-green-100">Contact
                            Us</a>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex items-center space-x-3 text-green-900 text-lg">
                        <a href="#"><i class="bi bi-telegram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
            </nav>

        </div>

        <div class="lg:hidden flex justify-between items-center p-4">



            <!-- drawer init and toggle -->
            <div class="text-center">
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 focus:outline-none" type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
                    Show drawer
                </button>
            </div>

            <!-- drawer component -->
            <div id="drawer-example" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80" tabindex="-1" aria-labelledby="drawer-label">
                <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500"><svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>Info</h5>
                <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <div drawer-backdrop="" class="bg-gray-900/50 fixed inset-0 z-30" id="drawer-backdrop"></div>

                <div class="grid grid-cols-2 gap-4">

                    <a href="/" class="{{ request()->is('/') ? 'bg-green-700 text-white' : 'text-gray-700 hover:bg-green-100' }}
            px-3 py-7 rounded text-sm font-medium items-flex">
                        Home
                    </a>

                    <a href="/about" class="{{ request()->is('about') ? 'bg-green-700 text-white' : 'text-gray-700 hover:bg-green-100' }}
          px-3 py-7 rounded text-sm font-medium">
                        About Us
                    </a>
                    <a href="/ourproduct" class="{{ request()->is('/ourproduct') ? 'bg-green-700 text-white' : 'text-gray-700 hover:bg-green-100' }}
          px-3 py-7 rounded text-sm font-medium">
                        Our Products
                    </a>
                    <a href="/team" class="px-3 py-7 text-sm font-medium text-gray-700 hover:bg-green-100">Our
                        Team</a>
                    <a href="/news" class="px-3 py-7 rounded-md text-sm font-medium text-gray-700 hover:bg-green-100">News</a>
                    <a href="/publication" class="px-3 py-7 rounded-md text-sm font-medium text-gray-700 hover:bg-green-100">Our
                        Publication</a>
                    <a href="/career" class="px-3 py-7 rounded-md text-sm font-medium text-gray-700 hover:bg-green-100">Career</a>
                    <a href="/contact" class="px-3 py-7 rounded-md text-sm font-medium text-gray-700 hover:bg-green-100">Contact
                        Us</a>

                </div>
                <div class="max-w-7xl mx-auto flex-wrap flex justify-end items-bottom text-sm text-white py-1 px-10 ml-10">
                    <span class="mr-4">📅 Monday - Friday 8am - 5pm</span>
                    <span class="mr-4">📧 sam.sovannarith.ra@gmail.com</span>
                    <span>📞 016/017 43 02 02</span>
                </div>

            </div>

        </div>

    </nav>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const drawer = document.getElementById('drawer-example');
        const backdrop = document.querySelector('[drawer-backdrop]');

        // Close drawer when clicking on the backdrop
        backdrop.addEventListener('click', function() {
            const event = new Event('click');
            const closeButton = document.querySelector('[data-drawer-hide="drawer-example"]');
            closeButton.dispatchEvent(event);
        });

        // Optional: Close drawer when clicking outside the drawer (anywhere else on the page)
        document.addEventListener('click', function(event) {
            if (!drawer.contains(event.target) && !event.target.closest('[data-drawer-target="drawer-example"]')) {
                const closeButton = document.querySelector('[data-drawer-hide="drawer-example"]');
                closeButton.click();
            }
        });
    });

</script>
