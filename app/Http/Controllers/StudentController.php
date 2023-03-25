<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use App\Models\Video;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index', [
            'students'      => Student::where('user_id', auth()->user()->id)->get()
        ]);
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
            'name'  => 'required',
            'class' => 'required',
        ]);

        Student::create([
            'user_id'       => auth()->user()->id,
            'school_id'     => auth()->user()->school_id,
            'name'          => $request->name,
            'class'         => $request->class
        ]);

        return response()->json([
            'message'   => "Siswa baru berhasil ditambahkan.."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student, $username)
    {
        $siswa = Student::where('username', $username)->first();
        $books = Book::where('student_id', $siswa->id)->get();
        $videos = Video::where('student_id', $siswa->id)->get();
        return view('student.show', compact('siswa', 'books', 'videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name'      => 'required',
            'class'     => 'required'
        ]);

        Student::whereUsername($request->siswa)->update($data);
        return response()->json([
            'message'   => 'Siswa berhasil diedit..'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $username)
    {
        $siswa = Student::whereUsername($username)->first();
        Book::where('student_id', $siswa->id)->delete();
        $siswa->delete();
        return back()->with('success', 'Siswa berhasil dihapus');
    }

    public function modal(Request $request)
    {
        if ($request->modalType == 'create') {
            return view('student.modal-add-siswa');
        } elseif ($request->modalType == 'edit') {
            return view('student.modal-edit-siswa', [
                'siswa'    => Student::whereUsername($request->username)->first()
            ]);
        } else {
            return "<div class='text-danger'>Maaf terjadi kesalahan...</div>";
        }
    }
}
