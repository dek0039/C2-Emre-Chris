<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>


    <h1>
    {{ __('misc.most_popular_manuals') }}
    </h1>
    <div class="container">
        <div class="row">
            @foreach ($manuals as $manual)
            <div class="col-md-4">
                <a href={{$manual["originUrl"]}};>{{$manual["brand_name"]}} : {{$manual["name"];}} -> {{$manual["visits"];}}</a>
            </div>
            @endforeach
        </div>
    </div>


    <h1>Alle Merken</h1>

    <div class="row">
        <div class="alphabet-links">
            @foreach(range('A', 'Z') as $letter)
            <a href="#{{ $letter }}">{{ $letter }}</a>
            @if (!$loop->last)
            @endif
            @endforeach
        </div>

        <?php
        $size = count($brands);
        $columns = 3;
        $chunk_size = ceil($size / $columns);
        ?>

        <div class="container">
            <div class="row">

                @foreach($brands->chunk($chunk_size) as $chunk)
                <div class="col-md-4">

                    <ul>
                        @foreach($chunk as $brand)

                        <?php
                        $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                        if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                            // Add an ID for the letter section
                            echo '</ul>
                                    <h2 id="' . $current_first_letter . '">' . $current_first_letter . '</h2>
                                    <ul>';
                        }
                        $header_first_letter = $current_first_letter
                        ?>

                        <li>
                            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                        </li>
                        @endforeach
                    </ul>

                </div>
                <?php
                unset($header_first_letter);
                ?>
                @endforeach

            </div>

        </div>
</x-layouts.app>