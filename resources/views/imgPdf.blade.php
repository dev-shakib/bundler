
        <header>
           <h1>{{ $section_name }}</h1>
        </header>
        <main>
            @foreach ($image as $img)
                <img src="{{ storage_path('app/public/files/' . $img) }}" alt='{{ $img }}' style="width: 100%"><br>
            @endforeach

        </main>
