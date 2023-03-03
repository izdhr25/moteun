<?php

namespace App\Http\Controllers;

use App\Models\Metode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Alert;
use App\Models\Tani;

class AllMetodeController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('query'); 

        $metodes = Metode::where('id_tanaman', 'LIKE', '%'.$keyword.'%')
        ->orWhere('id_pasangan', 'LIKE', '%'.$keyword.'%')
        ->orWhere('mulai', 'LIKE', '%'.$keyword.'%')
        ->orWhere('akhir', 'LIKE', '%'.$keyword.'%')
        ->orWhere('keterangan', 'LIKE', '%'.$keyword.'%')
        ->orWhere('hasil', 'LIKE', '%'.$keyword.'%')
         ->orWhere('status', 'LIKE', '%'.$keyword.'%')
        ->orWhere('sebab', 'LIKE', '%'.$keyword.'%')
        ->orWhere('user', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);
        return view('admin.metode.index', compact('metodes'));
    }

    public function create()
    {
        $siap = 'Siap';
        $jenis = 'Tanaman';
        $tanis = Alert::where('jenis', $jenis)->where('status', $siap)->get();
        return view('admin.metode.create', compact('tanis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tanaman' => 'required',
	        'id_pasangan' => 'required',
            'mulai' => 'required',
            'akhir' => 'nullable',
	        'keterangan' => 'required',
	        'hasil' => 'required',
	        'status' => 'required',
	        'sebab' => 'required',
	        'user' => 'required',
        ]);

        $input = $request->all();

        // if($image = $request->file('image')){
        //     $destinationPath = 'image/';
        //     $imageName = $image->getClientOriginalName();
        //     $image->move($destinationPath, $imageName);
        //     $input['image'] = $imageName;
        // }

        Metode::create($input);

        return redirect('/allmetode')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Metode $metode)
    {
        //
    }

 
    public function edit(Metode $allmetode)
    {
        $siap = 'Siap';
        $jenis = 'Tanaman';
        $tanis = Alert::where('jenis', $jenis)->where('status', $siap)->get();
        return view('admin.metode.edit', compact('allmetode', 'tanis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metode $allmetode)
    {
        $request->validate([
            'id_tanaman' => 'required',
	        'id_pasangan' => 'required',
            'mulai' => 'required',
            'akhir' => 'nullable',
	        'keterangan' => 'required',
	        'hasil' => 'required',
	        'status' => 'required',
	        'sebab' => 'required',
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

        $allmetode->update($input);

        return redirect('/allmetode')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metode $allmetode)
    {
        $allmetode->delete();

        return redirect('/allmetode')->with('message', 'Data Berhasil Dihapus'); 
    }
}