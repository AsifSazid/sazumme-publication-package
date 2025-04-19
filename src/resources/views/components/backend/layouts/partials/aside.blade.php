@php use Illuminate\Support\Str; @endphp
{{-- <aside class="w-64 bg-white shadow-lg p-4 flex flex-col"> --}}
    <nav class="space-y-4">
        @foreach ($navigations as $navTitle => $navLink)
            <a href="{{ route($navLink) }}" class="block px-4 py-2 rounded hover:bg-gray-200">{{ Str::title($navTitle) }}</a>
        @endforeach
    </nav>
{{-- </aside> --}}