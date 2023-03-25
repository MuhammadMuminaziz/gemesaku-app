<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\JudulKegiatan;
use App\Models\Kegiatan;
use App\Models\Student;
use App\Models\Video;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $books = Book::limit(20)->get();
        $kegiatan = Kegiatan::all();
        $judul_kegiatan = JudulKegiatan::all();
        return view('welcome', compact('books', 'judul_kegiatan', 'kegiatan'));
    }

    public function student(Student $student)
    {
        $books = Book::where('student_id', $student->id)->get();
        $videos = Video::where('student_id', $student->id)->get();
        return view('student', compact('student', 'books', 'videos'));
    }

    public function search(Request $request)
    {
        if($request->typeModal == 'main'){
            $val = $request->val;
            $student = Student::where('name', 'like', '%' . $val . '%')->get();
            $studentId = [];
            foreach($student as $item){
                $studentId[] += $item->id;
            }
            return view('main-layouts.search', [
                'books' => Book::limit(20)->whereIn('student_id', $studentId)->get()
            ]);
        }elseif($request->typeModal == 'search'){
            return view('main-layouts.search', [
                'books' => Book::limit(20)->get()
            ]);
        }
    }
}
