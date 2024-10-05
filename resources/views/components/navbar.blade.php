<nav class="bg-blue-950 border-b border-gray-200">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="#" class="text-lg font-semibold text-white px-3 py-2 rounded-md">Dashboard</a>
                </div>
            </div>
            <div class="flex items-center">
                <div class="relative hidden md:block">
                    <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm" placeholder="Search">
                </div>
                <div class="ml-4 flex items-center space-x-4 hidden md:flex">
                    <a href="#" class="text-white hover:text-gray-300">
                        <!-- Placeholder for Shopping Cart Icon -->
                        <span class="sr-only">Shopping Cart</span>
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.4 5M17 13l1.4 5M9 21h6"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-white hover:text-gray-300">
                        <!-- Placeholder for Notifications Icon -->
                        <span class="sr-only">Notifications</span>
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </a>
                    <div>
                        <button id="profileButton" class="text-white focus:outline-none">
                            <!-- Placeholder for Profile Icon -->
                            <span class="sr-only">Your Profile</span>
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.953 9.953 0 0112 15c2.21 0 4.21.722 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0zM12 2a10 10 0 100 20 10 10 0 000-20z"></path>
                            </svg>
                        </button>
                        <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Wishlist</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="md:hidden">
                    <button id="hamburger" class="text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="dropdown" class="hidden md:hidden">
        <a href="#" class="block px-4 py-2 text-white">Dashboard</a>
        <a href="#" class="block px-4 py-2 text-white">Shopping Cart</a>
        <a href="#" class="block px-4 py-2 text-white">Notifications</a>
    </div>
</nav>

<script>
    document.getElementById('hamburger').addEventListener('click', function() {
        var dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    });

    document.getElementById('profileButton').addEventListener('click', function() {
        var profileDropdown = document.getElementById('profileDropdown');
        profileDropdown.classList.toggle('hidden');
    });
</script>

<style>
    @media (max-width: 768px) {
        .md\:hidden {
            display: none;
        }
    }
</style>
