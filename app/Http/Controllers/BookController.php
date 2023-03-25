<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'photo'     => "image|mimes:jpg,png,jpeg|max:2048"
        ]);

        $student = Student::whereUsername($request->student)->first();

        $data = [
            'student_id'        => $student->id,
            'title'             => $request->title,
            'penerbit'          => $request->penerbit,
            'tahun_terbit'      => $request->tahun_terbit,
            'halaman'           => $request->halaman
        ];

        $photo = $request->file('photo');
        if($photo){
            $data['photo'] = time() . "." . $photo->getClientOriginalExtension();
            $photo->move('file_upload/buku', $data['photo']);
        }

        Book::create($data);
        return back()->with('success', 'Ringkasan buku berhasil diupload..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $data = [
            'title'         => $request->title,
            'penerbit'      => $request->penerbit,
            'tahun_terbit'  => $request->tahun_terbit,
            'halaman'       => $request->halaman
        ];

        $photo = $request->file('photo');
        $book = Book::whereSlug($request->slug)->first();
        if($photo){
            if($book->photo != null){
                unlink('file_upload/user/' . $book->photo);
            }
            $data['photo'] = time() . "." . $photo->getClientOriginalExtension();
            $photo->move('file_upload/user', $data['photo']);
        }

        $book->update($data);

        return back()->with('success', 'Rincian buku berhasil diedit..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, $slug)
    {
        $boku = Book::whereSlug($slug)->first();
        unlink('file_upload/buku/' . $boku->photo);
        $boku->delete();
        return back()->with('success', 'Rincian buku berhasil dihapus..');
    }

    public function modal(Request $request)
    {
        if ($request->modalType == 'edit') {
            return view('book.modal-edit-book', [
                'book'    => Book::whereSlug($request->username)->first(),
            ]);
        } elseif ($request->modalType == 'lihat') {
            return view('book.modal-lihat-book', [
                'book'    => Book::whereSlug($request->username)->first(),
            ]);
        } else {
            return "<div class='text-danger'>Maaf terjadi kesalahan...</div>";
        }
    }
}
