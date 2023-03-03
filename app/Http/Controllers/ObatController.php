<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ObatController extends Controller
{
    public function index( Request $request)
    {
        $keyword = $request->input('query');
        $obats = Obat::when($keyword, function ($query, $keyword) {
                        return $query->where(function ($query) use ($keyword) {
                             $query->where('nama_obat', 'like', "%$keyword%")
                                   ->orWhere('nama', 'like', "%$keyword%")
                                   ->orWhere('nama', 'like', "%$keyword%")
                                   ->orWhere('jenis', 'like', "%$keyword%")
                                   ->orWhere('obat', 'like', "%$keyword%")
                                   ->orWhere('dosis', 'like', "%$keyword%")
                                   ->orWhere('perawat', 'like', "%$keyword%")
                                   ->orWhere('user', 'like', "%$keyword%");
                        });
                 })
                ->paginate(5);
        return view('user.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('user.obat.create');
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


        Obat::create($input);

        return redirect('/obat')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Obat $obat)
    {
        //
    }

 
    public function edit(Obat $obat)
    {
        return view('user.obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
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

        $obat->update($input);

        return redirect('/obat')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect('/obat')->with('message', 'Data Berhasil Dihapus'); 
    }
}