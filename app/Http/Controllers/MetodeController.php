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

class MetodeController extends Controller
{
    public function index( Request $request)
    {
        $keyword = $request->input('query');
        $user = Auth::user()->get();
        $metodes = Metode::where('user', Auth::user()->id)
                    ->when($keyword, function ($query, $keyword) {
                        return $query->where(function ($query) use ($keyword) {
                             $query->where('id_tanaman', 'like', "%$keyword%")
                                   ->orWhere('id_pasangan', 'like', "%$keyword%")
                                   ->orWhere('mulai', 'like', "%$keyword%")
                                   ->orWhere('akhir', 'like', "%$keyword%")
                                   ->orWhere('keterangan', 'like', "%$keyword%")
                                   ->orWhere('hasil', 'like', "%$keyword%")
                                   ->orWhere('status', 'like', "%$keyword%")
                                   ->orWhere('sebab', 'like', "%$keyword%")
                                   ->orWhere('user', 'like', "%$keyword%");
                        });
                 })
                ->paginate(5);
        return view('user.metode.index', compact('metodes'));
    }

    public function create()
    {
        $user = Auth::user()->get();
        $siap = 'Siap';
        $jenis = 'Tanaman';
        $tanis = Alert::where('user', Auth::user()->id)->where('jenis', $jenis)->where('status', $siap)->get();
        return view('user.metode.create', compact('tanis'));
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

        return redirect('/metode')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Metode $metode)
    {
        //
    }

 
    public function edit(Metode $metode)
    {
        $user = Auth::user()->get();
        $siap = 'Siap';
        $jenis = 'Tanaman';
        $tanis = Alert::where('user', Auth::user()->id)->where('jenis', $jenis)->where('status', $siap)->get();
        return view('user.metode.edit', compact('metode', 'tanis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metode $metode)
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

        $metode->update($input);

        return redirect('/metode')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metode $metode)
    {
        $metode->delete();

        return redirect('/metode')->with('message', 'Data Berhasil Dihapus'); 
    }
}