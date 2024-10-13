<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1>Your Wishlist</h1>

    @if ($wishlistItems->isEmpty())
        <p>Your wishlist is empty.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishlistItems as $item)
                    <tr>
                        <td>{{ $item->listing->name }}</td>
                        <td>
                            <form action="{{ route('wishlist.remove', $item->listing->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layout>
