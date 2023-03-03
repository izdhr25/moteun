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

class AllArtikelController extends Controller
{
    use ValidatesRequests;

    public function index(Request $request)
    {
        $keyword = $request->input('query'); 

        $artikels = Artikel::where('judul', 'LIKE', '%'.$keyword.'%')
        ->orWhere('tgl_tulis', 'LIKE', '%'.$keyword.'%')
        ->orWhere('penulis', 'LIKE', '%'.$keyword.'%')
        ->orWhere('deskripsi', 'LIKE', '%'.$keyword.'%')
        ->orWhere('user', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikel.create');
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

        return redirect('/allartikel')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Artikel $artikel)
    {
        //
    }

 
    public function edit(Artikel $allartikel)
    {
        return view('admin.artikel.edit', compact('allartikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $allartikel)
    {
        $request->validate([
            'judul' => 'string',
            'tgl_tulis' => 'required',
            'penulis' => 'string',
            'deskripsi' => 'string',
            'image' => 'image',
            'user' => 'string',
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
         
        $allartikel->update($input);

        return redirect('/allartikel')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $allartikel)
    {
        $allartikel->delete();

        return redirect('/allartikel')->with('message', 'Data Berhasil Dihapus'); 
    }
}