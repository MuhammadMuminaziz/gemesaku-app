<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    @include('main-layouts.navbar')

    <div class="container py-5 my-5">
        <div class="d-flex gap-2 p-2 align-items-center">
            <h1 class="display-3"><i class="bi bi-rocket-takeoff text-warning me-md-3"></i></h1>
            <div>
                <h1 class="mb-0">Hi {{ $student->name }}</h1>
                <p class="text-secondary">{{ $student->school->name }}</p>
            </div>
        </div>
        <hr class="m-0">

        <div class="row mt-5">
            <h5 class="mb-4">Photo Pembelajaran:</h5>
            @foreach($books as $book)
            <div class="col-md-4">
                <img src="{{ asset('file_upload/buku/' . $book->photo) }}" alt="image" class="img-fluid">
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <h5 class="mb-4">Video Pembelajaran:</h5>
            @foreach($videos as $video)
            <div class="col-md-6 mb-1">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $video->link }}" title="{{ $video->title }}" allowfullscreen></iframe>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('main-layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </body>
</html>