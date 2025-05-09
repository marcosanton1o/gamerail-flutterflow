<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white font-semibold bg-purple-600 
 cursor-pointer rounded-md p-3 transition-all hover:bg-white hover:text-purple-700']) }}>
    {{ $slot }}
</button>
