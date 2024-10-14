<x-layout>
    <x-slot:title>{{ $storeOwner->store_name }}</x-slot:title>

    <h1 class="text-2xl font-bold mb-4">{{ $storeOwner->store_name }}</h1>
    <p>{{ $storeOwner->store_description }}</p>
    <p><strong>Status:</strong> {{ $storeOwner->status }}</p>
</x-layout>