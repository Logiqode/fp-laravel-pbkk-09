<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6 flex">
                            <div class="flex-shrink-0 flex items-center justify-center">
                                <svg class="w-48 h-48 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                                </svg>
                            </div>
                            <div class="ml-6">
                                <div class="font-semibold">Name:<a class="pl-4 font-normal">{{ $user->name }}</a></div> 
                                <div class="font-semibold">Username:<a class="pl-4 font-normal">{{ $user->username }}</a></div>
                                <div class="font-semibold">Email:<a class="pl-4 font-normal">{{ $user->email }}</a></div>
                                @if ($user->storeowner)
                                    <div class="font-semibold">Your store:<a class="pl-4 font-normal hover:underline" href="/store/{{ $user->storeowner->store_slug }}">{{ $user->storeowner->store_name }}</a></div>
                                @else
                                    <div class="font-semibold">Your store:<a class="pl-4 font-normal">You don't currently own a store. Create your store <a class="text-blue-800 hover:underline" href="/store/create">here</a>.</a></div>
                                @endif
                                
                                <div class="editable-fields space-y-4">
                                    <div>
                                        <label for="address" class="block font-semibold">Address:</label>
                                        <input type="text" id="address" value="{{ $user->address }}" class="editable-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-100" data-field="address" />
                                    </div>
                                    <div>
                                        <label for="birthday" class="block font-semibold">Birthday:</label>
                                        <input type="date" id="birthday" value="{{ $user->birthday ? $user->birthday->format('Y-m-d') : '' }}" class="editable-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-100" data-field="birthday" />
                                    </div>
                                    <div>
                                        <label for="phone" class="block font-semibold">Phone number:</label>
                                        <input type="text" id="phone" value="{{ $user->phone }}" class="editable-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-100" data-field="phone" />
                                    </div>
                                    <div>
                                        <label for="gender" class="block font-semibold">Gender:</label>
                                        <select id="gender" class="editable-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-gray-100" data-field="gender">
                                            <option value="M" {{ $user->gender == 'M' ? 'selected' : '' }}>M</option>
                                            <option value="F" {{ $user->gender == 'F' ? 'selected' : '' }}>F</option>
                                        </select>
                                    </div>
                                </div>
                                <div>You have been a member since {{ $user->created_at->diffForHumans() }}. Profile last updated on {{ $user->updated_at }}.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
document.querySelectorAll('.editable-input').forEach(input => {
    input.addEventListener('blur', function() {
        const field = this.dataset.field;
        const value = this.value;

        fetch('/profile/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ field, value })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Profile updated successfully');
            } else {
                console.error('Error updating profile');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>
