<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">This is the single listing</h3>

    <div>
        <h1>{{ $listing->name }}</h1>
        <p>{{ $listing->description }}</p>
    </div>

</x-layout>