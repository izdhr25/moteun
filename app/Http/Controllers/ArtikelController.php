<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    use ValidatesRequests;

    public function index( Request $request)
    {
        $keyword = $request->input('query');
        $artikels = Artikel::where('user', Auth::user()->id)
                    ->when($keyword, function ($query, $keyword) {
                        return $query->where(function ($query) use ($keyword) {
                             $query->where('judul', 'like', "%$keyword%")
                                   ->orWhere('tgl_tulis', 'like', "%$keyword%")
                                   ->orWhere('penulis', 'like', "%$keyword%")
                                   ->orWhere('deskripsi', 'like', "%$keyword%")
                                   ->orWhere('user', 'like', "%$keyword%");
                        });
                 })
                ->paginate(5);
        return view('user.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('user.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tgl_tulis' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
            'image' => 'image',
            'user' => 'required',
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $destinationPath = 'assets/img/artikel';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
        }

        Artikel::create($input);

        return redirect('/artikel')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Artikel $artikel)
    {
        //
    }

 
    public function edit(Artikel $artikel)
    {
        return view('user.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required',
            'tgl_tulis' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
            'image' => 'image',
            'user' => 'required',
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $destinationPath = 'assets/img/artikel';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
        } else {
            unset($input['image']);
        }
         
        $artikel->update($input);

        return redirect('/artikel')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect('/artikel')->with('message', 'Data Berhasil Dihapus'); 
    }
}