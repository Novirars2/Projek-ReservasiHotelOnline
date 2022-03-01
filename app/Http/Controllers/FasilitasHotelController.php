<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use Illuminate\Http\Request;

class FasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitashotels = FasilitasHotel::latest()->paginate(5);
    
        return view('fasilitashotels.index',compact('fasilitashotels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitashotels = FasilitasHotel::all();
        return view('fasilitashotels.create', compact('fasilitashotels',$fasilitashotels));
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
            'nama_fasilitas' => 'required',
            'keterangan' => 'required',
            'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'aksi'=> 'required',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')){
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        }
        
            FasilitasHotel::create($input);
         
            return redirect()->route('fasilitashotels.index')
                            ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasHotel $fasilitasHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasHotel $fasilitasHotel)
    {
        $fasilitashotels = FasilitasHotel::all();
        return view('fasilitashotels.edit', compact('fasilitashotels',$fasilitashotels));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FasilitasHotel $fasilitasHotel)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
            'keterangan' => 'required',
            'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'aksi'=> 'required',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')){
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        } else {
            unset($input['image']);
        }
        
            FasilitasHotel::create($input);
         
            return redirect()->route('fasilitashotels.index')
                            ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasHotel $fasilitasHotel)
    {
        $fasilitasHotel->delete();
     
        return redirect()->route('fasilitashotels.index')
                        ->with('success','Berhasil Hapus !');
    }
}
