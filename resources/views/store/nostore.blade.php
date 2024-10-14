<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-3xl font-semibold">You don't have a store</h3>
    <a href="{{ route('store.create') }}" class="text-blue-600 hover:underline">Open a store</a>
</x-layout>