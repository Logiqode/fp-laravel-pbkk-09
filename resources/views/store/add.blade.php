<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="form-addlisting">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Add a New Listing
                    </h1>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form class="space-y-4 md:space-y-6"
                        action="{{ $listing ? route('store.updateListing', ['listing_id' => $listing->id]) : route('store.storeListing') }}"
                        method="POST">
                        @csrf
                        @if (isset($listing))
                            @method('PUT')
                        @endif
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Listing
                                Name</label>
                            <input autofocus type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Listing Name" value="{{ isset($listing) ? $listing->name : '' }}">
                            @error('name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Listing
                                Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Listing Description">{{ isset($listing) ? $listing->description : '' }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Listing
                                Price</label>
                            <input autofocus type="number" name="price" id="price" step="0.01"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Listing Price" value="{{ isset($listing) ? $listing->price : '' }}">
                            @error('price')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="category_id"
                                class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                id="category_id" name="category_id" required>
                                <option value="{{ isset($listing) ? $listing->category_id : '' }}">
                                    {{ isset($listing) ? $listing->category->name : 'Select Category' }}
                                    @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                id="status" name="status" required>
                                <option value="{{ isset($listing) ? $listing->status : '' }}">
                                    {{ isset($listing) ? $listing->status : 'Select Status' }}
                                <option value="Available">Available</option>
                                <option value="Unlisted">Unlisted</option>
                                <option value="Out of Stock">Out of Stock</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            @if (isset($listing))
                                Update Listing
                            @else
                                Add Listing
                        </button>
                        @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
