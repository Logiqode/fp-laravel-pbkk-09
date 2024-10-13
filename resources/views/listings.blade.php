<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
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
        </div>
    @endforeach
</x-layout>
