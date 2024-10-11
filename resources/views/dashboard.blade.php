<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    @auth
        <h1 class="font-bold text-3xl">Welcome back, {{ auth()->user()->username }}</h1>
    @else
        <h1 class="font-bold text-3xl">Dashboard</h1>
    @endauth

    <a href="/listings" class="block text-blue-600 hover:underline">Click here to go to listings</a>
</x-layout>