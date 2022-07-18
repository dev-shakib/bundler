@foreach ($image as $img)
    <img src="{{ public_path($img) }}" alt='{{ $img }}'><br>
@endforeach
