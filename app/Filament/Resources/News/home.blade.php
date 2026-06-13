<!DOCTYPE html>
<html>
<head>
    <title>Website Nommensen</title>
</head>
<body>

    <h1>WEBSITE NOMMENSEN</h1>

    <!-- ================= SAMBUTAN ================= -->
    <h2>Sambutan</h2>
    <div>
        <p>{{ $greetings->content ?? 'Belum ada sambutan' }}</p>
    </div>

    <hr>

    <!-- ================= FASILITAS ================= -->
    <h2>Fasilitas</h2>

    @forelse($facilities as $item)
        <div style="margin-bottom:20px;">
            <p>{{ $item->description }}</p>

            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" width="200">
            @else
                <p>Tidak ada gambar</p>
            @endif
        </div>
    @empty
        <p>Belum ada data fasilitas</p>
    @endforelse

    <hr>

    <!-- ================= KERJA SAMA ================= -->
    <h2>Kerja Sama</h2>

    @forelse($cooperations as $item)
        <div style="margin-bottom:20px;">
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" width="150">
            @else
                <p>Tidak ada logo</p>
            @endif
        </div>
    @empty
        <p>Belum ada data kerja sama</p>
    @endforelse

</body>
</html>