<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="text-xl">This is listings</h3>

    @foreach ($listings as $listing)
        <div>
            <h1>{{ $listing->name }}</h1>
            <p>{{ $listing->description }}</p>
            <a href="/listings/{{ $listing->slug }}" class="text-blue-600 hover:underline">Lihat Produk</a>
            <form action="/cart/{{ $listing->id }}/add" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:underline">Add to Cart</button>
            </form>
            <form action="/wishlist/{{ $listing->id }}/add" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-pink-600 hover:underline">Add to Wishlist</button>
        </div>
    @endforeach
</x-layout>
