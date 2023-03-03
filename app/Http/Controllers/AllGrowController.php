<?php

namespace App\Http\Controllers;

use App\Models\Grow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Alert;
use App\Models\Ternak;

class AllGrowController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('query'); 

        $grows = Grow::where('id_betina', 'LIKE', '%'.$keyword.'%')
        ->orWhere('id_jantan', 'LIKE', '%'.$keyword.'%')
        ->orWhere('mulai', 'LIKE', '%'.$keyword.'%')
        ->orWhere('akhir', 'LIKE', '%'.$keyword.'%')
        ->orWhere('keterangan', 'LIKE', '%'.$keyword.'%')
        ->orWhere('hasil', 'LIKE', '%'.$keyword.'%')
         ->orWhere('status', 'LIKE', '%'.$keyword.'%')
        ->orWhere('sebab', 'LIKE', '%'.$keyword.'%')
        ->orWhere('user', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);
        return view('admin.grow.index', compact('grows'));
    }

    public function create()
    {
    	$siap = 'Siap';
        $jenis = 'Hewan';
        $ternaks = Alert::where('jenis', $jenis)->where('status', $siap)->get();
        return view('admin.grow.create', compact('ternaks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_betina' => 'required',
	        'id_jantan' => 'required',
            'mulai' => 'required',
            'akhir' => 'nullable',
	        'keterangan' => 'required',
	        'hasil' => 'required',
	        'status' => 'required',
	        'sebab' => 'required',
	        'user' => 'required',
        ]);

        $input = $request->all();

        Grow::create($input);

        return redirect('/allgrow')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Grow $grow)
    {
        //
    }

 
    public function edit(Grow $grow)
    {
        $siap = 'Siap';
        $jenis = 'Hewan';
        $ternaks = Alert::where('jenis', $jenis)->where('status', $siap)->get();
        return view('admin.grow.edit', compact('grow', 'ternaks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grow $allgrow)
    {
        $request->validate([
            'id_betina' => 'required',
	        'id_jantan' => 'required',
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

        $allgrow->update($input);

        return redirect('/allgrow')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grow $allgrow)
    {
        $allgrow->delete();

        return redirect('/allgrow')->with('message', 'Data Berhasil Dihapus'); 
    }
}