<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">You don't have a store</h3>
    <a href="{{ route('store.create') }}">Open a store</a>
</x-layout>