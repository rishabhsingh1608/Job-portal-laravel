{{-- <button
    {{ $attributes->class([' class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-400"']) }}>{{ $slot }}</button> --}}

<button
    {{ $attributes->merge(['class' => 'rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-slate-200']) }}>
    {{ $slot }}
</button>
