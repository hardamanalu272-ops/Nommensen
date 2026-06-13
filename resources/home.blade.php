<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

    <h1>HALAMAN HOME</h1>

    {{-- SAMBUTAN --}}
    <h2>Sambutan</h2>
    @if($greetings)
        <p>{!! $greetings->content !!}</p>

        @if($greetings->image)
            <img src="{{ asset('storage/' . $greetings->image) }}" width="200">
        @endif
    @else
        <p>Tidak ada sambutan</p>
    @endif

    <hr>

    {{-- FASILITAS --}}
    <h2>Fasilitas</h2>
    @foreach($facilities as $item)
        <div style="margin-bottom:20px;">
            <p>{!! $item->description !!}</p>

            @if($item->foto)
                <img src="{{ asset('storage/' . $item->foto) }}" width="200">
            @endif
        </div>
    @endforeach

    <hr>

    {{-- KERJA SAMA --}}
    <h2>Kerja Sama</h2>
    @foreach($cooperations as $item)
        @if($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" width="150">
        @endif
    @endforeach

</body>
</html>