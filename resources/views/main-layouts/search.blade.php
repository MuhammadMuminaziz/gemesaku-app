@if($books->count() > 0)
@foreach ($books as $book)
<div class="col-md-3 mb-3">
    <div class="card border-0 shadow" style="overflow: hidden">
        <img src="{{ asset('file_upload/buku/' . $book->photo) }}" alt="image" width="100%" height="180px">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="text-primary m-0">{{ $book->student->name }}</p>
                    <hr class="m-0">
                    <small class="m-0 text-secondary fst-italic" style="margin-top: -100px">{{ $book->student->school->name }}</small>
                </div>
                <a href="{{ route('student', $book->student) }}" class="small">Lihat..</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="col bg-secondary p-5">
    <p class="text-white text-center">Maaf belum ada Karya yang diupload...</p>
</div>
@endif