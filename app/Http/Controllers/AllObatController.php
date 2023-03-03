<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AllObatController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('query');

        $obats = Obat::where('nama_obat', 'LIKE', '%'.$keyword.'%')
        ->orWhere('nama', 'LIKE', '%'.$keyword.'%')
        ->orWhere('jenis', 'LIKE', '%'.$keyword.'%')
        ->orWhere('obat', 'LIKE', '%'.$keyword.'%')
        ->orWhere('dosis', 'LIKE', '%'.$keyword.'%')
        ->orWhere('perawat', 'LIKE', '%'.$keyword.'%')
        ->orWhere('user', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);
        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('admin.obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'obat' => 'required',
            'dosis' => 'required',
            'perawat' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        // if($image = $request->file('image')){
        //     $destinationPath = 'image/';
        //     $imageName = $image->getClientOriginalName();
        //     $image->move($destinationPath, $imageName);
        //     $input['image'] = $imageName;
        // }

        Obat::create($input);

        return redirect('/allobat')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Obat $allobat)
    {
        //
    }

 
    public function edit(Obat $allobat)
    {
        return view('admin.obat.edit', compact('allobat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $allobat)
    {
        $request->validate([
            'nama_obat' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'obat' => 'required',
            'dosis' => 'required',
            'perawat' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        // if($image = $request->file('image')){
        //     $destinationPath = 'image/';
        //     $imageName = $image->getClientOriginalName();
        //     $image->move($destinationPath, $imageName);
        //     $input['image'] = $imageName;
        // } else {
        //     unset($input['image']);
        // }

        $allobat->update($input);

        return redirect('/allobat')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $allobat)
    {
        $allobat->delete();

        return redirect('/allobat')->with('message', 'Data Berhasil Dihapus'); 
    }
}