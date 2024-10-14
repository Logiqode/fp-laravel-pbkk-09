<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>
        <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
            @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
            @else
            <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
            <div class="space-y-6">
            @foreach ($cartItems as $item)
            <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                    <!-- Product Image -->
                    <a href="#" class="shrink-0 md:order-1">
                        <img class="h-20 w-20 dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="imac image" />
                        <img class="hidden h-20 w-20 dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="imac image" />
                    </a>
                    
                    <!-- Product Name and Wishlist/Remove Options -->
                    <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                        <a href="#" class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $item->listing->name }}</a>
                        <div class="flex items-center gap-4">
                        <button type="button" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
                            <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                            </svg>
                            Add to Wishlist
                        </button>
                    
                        <form action="{{ route('cart.remove', $item->listing->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                            <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                            Remove
                            </button>
                        </form>
                        </div>
                    </div>
                    
                    <!-- Quantity Controls -->
                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                        <div class="flex items-center">
                          <!-- Decrement Button -->
                          <button type="button" id="decrement-button-{{ $item->listing->id }}" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                            </svg>
                          </button>
                      
                          <!-- Quantity Input -->
                          <input type="text" name="quantity" id="quantity-input-{{ $item->listing->id }}" class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" min="1" value="{{ $item->quantity }}" />
                      
                          <!-- Increment Button -->
                          <button type="button" id="increment-button-{{ $item->listing->id }}" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                          </button>
                        </div>
                      </div>
                      <form action="{{ route('cart.update', $item->listing->id) }}" method="POST" id="quantity-form-{{ $item->listing->id }}">
                        @csrf
                        <input type="hidden" name="quantity" id="quantity-hidden-input-{{ $item->listing->id }}" value="{{ $item->quantity }}" />
                      </form>
                    
                    <!-- Price and Quantity Update -->
                    <div class="text-end md:order-4 md:w-32">
                        <p class="text-base font-bold text-gray-900 dark:text-white">${{ $item->listing->price }}</p>
                    </div>
                    </div>                          
                </div>
            @endforeach
            </div>
        </div>
        <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
            <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>
    
                <div class="space-y-4">
                <div class="space-y-2">
                    <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Total price</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">${{ $totalPrice }}</dd>
                    </dl>
                </div>
                </div>
    
                <a href="#" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Proceed to Checkout</a>
    
                <div class="flex items-center justify-center gap-2">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                <a href="/listings" title="" class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                    Continue Shopping
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.5 4.5l5 5-5 5" />
                    </svg>
                </a>
                </div>
            </div>
        </div>
        @endif
    </div>
    </div>
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach ($cartItems as $item)
            const decrementButton{{ $item->listing->id }} = document.getElementById('decrement-button-{{ $item->listing->id }}');
            const incrementButton{{ $item->listing->id }} = document.getElementById('increment-button-{{ $item->listing->id }}');
            const quantityInput{{ $item->listing->id }} = document.getElementById('quantity-input-{{ $item->listing->id }}');
            const hiddenInput{{ $item->listing->id }} = document.getElementById('quantity-hidden-input-{{ $item->listing->id }}');
            const form{{ $item->listing->id }} = document.getElementById('quantity-form-{{ $item->listing->id }}');
    
            decrementButton{{ $item->listing->id }}.addEventListener('click', function() {
                let currentQuantity = parseInt(quantityInput{{ $item->listing->id }}.value);
                if (currentQuantity > 1) {
                    quantityInput{{ $item->listing->id }}.value = --currentQuantity;
                    hiddenInput{{ $item->listing->id }}.value = currentQuantity;
                    form{{ $item->listing->id }}.submit();  // Submit form to update quantity
                }
            });
    
            incrementButton{{ $item->listing->id }}.addEventListener('click', function() {
                let currentQuantity = parseInt(quantityInput{{ $item->listing->id }}.value);
                quantityInput{{ $item->listing->id }}.value = ++currentQuantity;
                hiddenInput{{ $item->listing->id }}.value = currentQuantity;
                form{{ $item->listing->id }}.submit();  // Submit form to update quantity
            });

            quantityInput{{ $item->listing->id }}.addEventListener('change', function() {
                let currentQuantity = parseInt(quantityInput{{ $item->listing->id }}.value);
                if (currentQuantity > 0) {
                    hiddenInput{{ $item->listing->id }}.value = currentQuantity;
                    form{{ $item->listing->id }}.submit();  // Submit form to update quantity
                } else {
                    quantityInput{{ $item->listing->id }}.value = hiddenInput{{ $item->listing->id }}.value;  // Revert to previous value if invalid
                }
            });
        @endforeach
    });
    </script>