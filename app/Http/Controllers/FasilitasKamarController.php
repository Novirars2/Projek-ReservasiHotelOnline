<?php

namespace App\Http\Controllers;

use App\Models\FasilitasKamar;
use Illuminate\Http\Request;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitasKamar = FasilitasKamar::latest()->paginate(5);
    
        return view('fasilitaskamar.index',compact('fasilitasKamar'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitasKamar = FasilitasKamar::all();
        return view('fasilitaskamar.create', compact('fasilitasKamar',$fasilitasKamar));
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
            'tipe_kamar' => 'required',
            'nama_fasilitas' => 'required',
            'aksi'=> 'required',
        ]);
        FasilitasKamar::create($request->all());
     
        return redirect()->route('fasilitaskamar.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasKamar $fasilitasKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasKamar $fasilitasKamar)
    {
        $fasilitasKamar = FasilitasKamar::all();
        return view('fasilitaskamar.edit',compact('fasilitaskamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FasilitasKamar $fasilitasKamar)
    {
        $request->validate([
            'tipe_kamar' => 'required',
            'nama_fasilitas' => 'required',
            'aksi'=> 'required',
        ]);
        FasilitasKamar::create($request->all());
     
        return redirect()->route('fasilitaskamar.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasKamar $fasilitasKamar)
    {
        $fasilitasKamar->delete();
     
        return redirect()->route('fasilitaskamar.index')
                        ->with('success','Berhasil Hapus !');
    }
}