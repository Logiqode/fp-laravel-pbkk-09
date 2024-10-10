@props(['active' => false])

<a {{ $attributes }}
class="{{ $active ? 'bg-blue-600 text-white' : 'text-white hover:text-gray-500' }} block flex flex-col items-center justify-center rounded-md font-medium px-4 py-2" 
aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}>{{ $slot }}</a>