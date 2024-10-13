<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1>Your Cart</h1>

    @if ($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->listing->name }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->listing->id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>
                            <p>Form action: {{ route('cart.remove', $item->listing->id) }}</p>

                            <form action="{{ route('cart.remove', $item->listing->id) }}" method="POST">
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
