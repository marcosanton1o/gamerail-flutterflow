@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-md border-none bg-purple-600 
     text-white placeholder-white ring-0 w-64 transition-all focus:border-fuchsia-500
     focus:bg-purple-700 shadow-inner focus:text-white focus:ring-2 focus:ring-white']) }}>
