<?php

namespace App\Http\Controllers;

use App\Models\JudulKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        $judul_kegiatan = JudulKegiatan::all();
        return view('kegiatan.index', compact('kegiatan', 'judul_kegiatan'));
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
        ]);

        $judul = JudulKegiatan::create([
            'name'  => $request->title,
            'desc'  => $request->desc
        ]);

        foreach($request->file('photo') as $photo){
            $name = rand() . time() . "." . $photo->getClientOriginalExtension();
            $photo->move('file_upload/kegiatan', $name);
            Kegiatan::create([
                'judul_kegiatan_id' => $judul->id,
                'photo' => $name
            ]);
        }
        return back()->with('success', 'Ringkasan buku berhasil diupload..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'title' => 'required',
            'photo' => $request->file('photo') != null ? "image|mimes:jpg,png,jpeg|max:2048" : ''
        ]);

        $kegiatan = Kegiatan::find($request->id);
        $judul_kegiatan = JudulKegiatan::find($kegiatan->judul_kegiatan_id);
        $judul_kegiatan->update([
            'name'  => $request->title,
            'desc'  => $request->desc
        ]);

        $photo = $request->file('photo');
        if ($photo) {
            if ($kegiatan->photo != null) {
                unlink('file_upload/kegiatan/' . $kegiatan->photo);
            }
            $photo_baru = rand() . time() . "." . $photo->getClientOriginalExtension();
            $photo->move('file_upload/kegiatan', $photo_baru);
            $kegiatan->update([
                'photo' => $photo_baru
            ]);
        }

        return back()->with('success', 'Photo kegiatan berhasil diedit..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->photo != null) {
            unlink('file_upload/kegiatan/' . $kegiatan->photo);
        }
        $kegiatan->delete();
        return back()->with('success', 'Photo kegiatan berhasil dihapus..');
    }

    public function modal(Request $request)
    {
        if ($request->modalType == 'edit') {
            return view('kegiatan.modal-edit-kegiatan', [
                'kegiatan'    => Kegiatan::find($request->username)
            ]);
        } elseif ($request->modalType == 'lihat') {
            return view('kegiatan.modal-lihat-kegiatan', [
                'kegiatan'    => Kegiatan::whereSlug($request->username)->first(),
            ]);
        } else {
            return "<div class='text-danger'>Maaf terjadi kesalahan...</div>";
        }
    }

    public function hapusJudul(Request $request)
    {
        $judul = JudulKegiatan::whereSlug($request->slug)->first();
        foreach($judul->kegiatan as $kegiatan){
            unlink('file_upload/kegiatan/'. $kegiatan->photo);
            $kegiatan->delete();
        }
        $judul->delete();
        return back()->with('success', 'kegiatan berhasil dihapus..');
    }
}
