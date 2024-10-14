<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="form-createstore">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Create a Store
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('store.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="store_name" class="block mb-2 text-sm font-medium text-gray-900">Store Name</label>
                            <input autofocus type="text" name="store_name" id="store_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Store Name">
                            @error('store_name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="store_description" class="block mb-2 text-sm font-medium text-gray-900">Store Description</label>
                            <textarea name="store_description" id="store_description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Store Description"></textarea>
                            @error('store_description')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create Store</button>
                    </form>                    
                </div>
            </div>
        </div>
    </section>    
</x-layout>