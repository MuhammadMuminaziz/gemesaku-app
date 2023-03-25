<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
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
        $data = $request->validate([
            'title'     => 'required',
            'link'      => 'required',
        ]);
        $student = Student::whereUsername($request->student)->first();
        $data['student_id'] = $student->id;
        $link = explode('/', $request->link);
        $data['link'] = $link[3];
        Video::create($data);
        return back()->with('success', 'Link video berhasil diupload..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'link'  => 'required'
        ]);

        $link = explode('/', $request->link);
        $video->update([
            'title'     => $request->title,
            'link'      => $link[3]
        ]);
        return back()->with('success', 'Rincian video berhasil diedit..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return back()->with('success', 'Rincian video berhasil dihapus..');
    }

    public function modal(Request $request)
    {
        return view('book.modal-edit-video', [
            'video' => Video::where('slug', $request->username)->first()
        ]);
    }
}
