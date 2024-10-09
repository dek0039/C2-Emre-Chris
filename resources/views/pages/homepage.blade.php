<x-layouts.app>
    <x-slot:introduction_text>
        <p>
            <img src="img/afbl_logo.png" align="right" width="100" height="100">
            {{ __('introduction_texts.homepage_line_1') }}
        </p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>{{ __('misc.all_brands') }}</h1>
    <h1>Alle Merken</h1>

    <div class="container">
        <div class="row">
            <div class="alphabet-links">
                @foreach(range('A', 'Z') as $letter)
                        <a href="#{{ $letter }}">{{ $letter }}</a>
                @endforeach
            </div>
        </div>

        <div class="row">
            @php
                $header_first_letter = null;
            @endphp

            @foreach($brands as $brand)
                @php
                    $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                    if ($header_first_letter !== $current_first_letter) {
                        if ($header_first_letter !== null) {
                            echo '</ul>'; 
                        }
                        echo '<h2 id="' . $current_first_letter . '">' . $current_first_letter . '</h2><ul>'; 
                    }
                    $header_first_letter = $current_first_letter;
                @endphp

                <li>
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                </li>
            @endforeach

            @if ($header_first_letter !== null)
                echo '</ul>'; // Close the list after the last brand
            @endif
        </div>
    </div>
</x-layouts.app>
`
