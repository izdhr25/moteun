<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TentangController extends Controller
{
    public function index()
    {
    	$tentangs = Tentang::all(); 
        return view('admin.tentang.index', compact('tentangs'));
    }

    public function create()
    {
        return view('admin.tentang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
	        'isi' => 'required',
	        'poin' => 'required',
	        'poin2' => 'required',
	        'poin3' => 'required',
	        'poin4' => 'required',
	        'poin5' => 'required',
	        'visi' => 'nullable',
	        'misi' => 'nullable',
        ]);       
        
        $input = $request->all();

        Tentang::create($input);

        return redirect('/about')->with('message', 'Data Berhasil Ditambah'); 
    }

    public function show()
    {
        //
    }

 
    public function edit(Tentang $about)
    {
        return view('admin.tentang.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tentang $about)
    {
        $request->validate([
            'judul' => 'required',
	        'isi' => 'required',
	        'poin' => 'required',
	        'poin2' => 'required',
	        'poin3' => 'required',
	        'poin4' => 'required',
	        'poin5' => 'required',
	        'visi' => 'nullable',
	        'misi' => 'nullable',
        ]);       
        
        $input = $request->all();

        $about->update($input);

        return redirect('/about')->with('message', 'Data Berhasil Diedit'); 
    }

    public function destroy(Tentang $tentang)
    {
        $tentang->delete();

        return redirect('/about')->with('message', 'Data Berhasil Dihapus'); 
    }
}