<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section>
        <div class="py-20 mx-auto max-w-screen-xl lg:py-40 bg-svg">
            <div class="mx-auto max-w-screen-md sm:text-center">
                @auth
                <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl dark:text-white">Welcome back, {{ auth()->user()->name }}</h2>
                <p class="mx-auto font-semibold mb-8 max-w-2xl text-gray-700 md:mb-12 sm:text-xl dark:text-gray-400">What are you looking for? Type into the search bar or click on the button below to view products.</p>
                @else
                <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl dark:text-white">Dashboard</h2>
                <p class="mx-auto mb-8 max-w-2xl font-semibold text-gray-700 md:mb-12 sm:text-xl dark:text-gray-400">Please sign in to access more features and make purchases. You can still view products as guest, just type into the search bar below or click on "View Products".</p>
                @endauth  
                <form action="/listings">
                    <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0 py-2">
                        <div class="relative w-full">
                            <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>                              
                            </div>
                            <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search for products" type="search" id="search" name="search">
                        </div>
                        <div>
                            <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
                        </div>
                    </div>
                    <a class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" href="/listings">View Products</a>
                </form>
            </div>
        </div>
      </section>
</x-layout>

