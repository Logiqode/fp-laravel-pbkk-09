<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">This is listings</h3>

    @foreach ($listings as $listing)
    <div>
        <h1>{{ $listing->name }}</h1>
        <p>{{ $listing->description }}</p>
        <a href="/listings/{{ $listing->slug }}" class="text-blue-600 hover:underline">Lihat Produk</a>
    </div>
        
    @endforeach
</x-layout>