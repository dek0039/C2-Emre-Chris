<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>


    @foreach ($manuals as $manual)

    @if ($manual->locally_available)
    <a class="btn btn-primary" href="{{ route('track', $manual->id) }}" alt="{{ $manual->name }}" title="{{ $manual->name }}">
        {{ $manual->name }}
    </a>

    ({{$manual->filesize_human_readable}})
    @else
    <a class="btn btn-primary" href="{{ route('track', $manual->id) }}" target="new" alt="{{ $manual->name }}" title="{{ $manual->name }}">
        {{ $manual->name }}
    </a>
    @endif
    <br>
    <br>
    @endforeach

</x-layouts.app>