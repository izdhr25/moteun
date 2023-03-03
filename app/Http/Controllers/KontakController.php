<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KontakController extends Controller
{
    public function index()
    {
    	$kontaks = Kontak::all(); 
        return view('admin.kontak.index', compact('kontaks'));
    }

    public function create()
    {
        return view('admin.kontak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'instagram' => 'required',
	        'whatsapp' => 'required',
	        'linkedin' => 'required',
	        'email' => 'required',
	        'alamat' => 'required',
        ]);       
        
        $input = $request->all();

        Kontak::create($input);

        return redirect('/kontak')->with('message', 'Data Berhasil Ditambah'); 
    }

    public function show()
    {
        //
    }

 
    public function edit(Kontak $kontak)
    {
        return view('admin.kontak.edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'instagram' => 'required',
	        'whatsapp' => 'required',
	        'linkedin' => 'required',
	        'email' => 'required',
	        'alamat' => 'required',
        ]);       
        
        $input = $request->all();

        $kontak->update($input);

        return redirect('/kontak')->with('message', 'Data Berhasil Diedit'); 
    }

    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return redirect('/kontak')->with('message', 'Data Berhasil Dihapus'); 
    }
}