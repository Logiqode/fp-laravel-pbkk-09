<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <h1 class="text-2xl font-bold mb-4">Store Management</h1>

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <div class="py-4 my-2 px-2 border-2 border-black">
        <h2 class="text-xl font-bold mt-6">Pending Stores</h2>
        <table class="w-full mb-6">
            <thead>
                <tr>
                    <th>Store Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingStores as $store)
                    <tr>
                        <td>
                            <a href="{{ route('store.show', $store->store_slug) }}" class="block hover:underline hover:text-blue-800">
                                {{ $store->store_name }}
                            </a>
                        </td>
                        <td>{{ $store->status }}</td>
                        <td>
                            <form action="{{ route('admin.verify', $store->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Verify Store</button>
                            </form>
                            <form action="{{ route('admin.remove', $store->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Remove Store</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="py-4 my-2 px-2 border-2 border-black">
        <h2 class="text-xl font-bold mt-6">Suspended Stores</h2>
        <table class="w-full mb-6">
            <thead>
                <tr>
                    <th>Store Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suspendedStores as $store)
                    <tr>
                        <td>
                            <a href="{{ route('store.show', $store->store_slug) }}" class="block hover:underline hover:text-blue-800">
                            {{ $store->store_name }}
                            </a>
                        </td>
                        <td>{{ $store->status }}</td>
                        <td>
                            <form action="{{ route('admin.verify', $store->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Reverify Store</button>
                            </form>
                            <form action="{{ route('admin.remove', $store->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Remove Store</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="py-4 my-2 px-2 border-2 border-black">
        <h2 class="text-xl font-bold mt-6">Verified Stores</h2>
        <table class="w-full mb-6">
            <thead>
                <tr>
                    <th>Store Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($verifiedStores as $store)
                    <tr>
                        <td>
                            <a href="{{ route('store.show', $store->store_slug) }}" class="block hover:underline hover:text-blue-800">
                            {{ $store->store_name }}
                            </a>
                        </td>
                        <td>{{ $store->status }}</td>
                        <td>
                            <form action="{{ route('admin.suspend', $store->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Suspend Store</button>
                            </form>
                            <form action="{{ route('admin.remove', $store->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Remove Store</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
