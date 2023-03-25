<img src="{{ asset('file_upload/buku/' . $book->photo) }}" alt="photo" width="100%" height="250px" class="mb-3">
<table class="w-100">
    <tr>
        <td>Judul Buku</td>
        <td class="text-primary">{{ $book->title }}</td>
    </tr>
    <tr>
        <td>Penerbit</td>
        <td class="text-primary">{{ $book->penerbit != null ? $book->penerbit : '-'  }}</td>
    </tr>
    <tr>
        <td>Tahun Penerbit</td>
        <td class="text-primary">{{ $book->tahun_terbit != null ? $book->tahun_terbit : '-' }}</td>
    </tr>
    <tr>
        <td>Jumlah Halaman</td>
        <td class="text-primary">{{ $book->halaman != null ? $book->halaman : '-' }}</td>
    </tr>
</table>