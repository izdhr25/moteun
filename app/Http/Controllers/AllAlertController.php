<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tani;
use App\Models\Kondisi;
use App\Models\Ternak;

class AllAlertController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('query'); 
        $alerts = Alert::where('name', 'LIKE', '%'.$keyword.'%')
        ->orWhere('name_id', 'LIKE', '%'.$keyword.'%')
        ->orWhere('jenis', 'LIKE', '%'.$keyword.'%')
        ->orWhere('kelamin', 'LIKE', '%'.$keyword.'%')
        ->orWhere('status', 'LIKE', '%'.$keyword.'%')
        ->orWhere('umur_siap', 'LIKE', '%'.$keyword.'%')
        ->orWhere('umur', 'LIKE', '%'.$keyword.'%')
        ->orWhere('lahir_ditanam', 'LIKE', '%'.$keyword.'%')
        ->orWhere('keterangan', 'LIKE', '%'.$keyword.'%')
        ->orWhere('user', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);

        return view('admin.alert.index', compact('alerts'));
    }

    public function create()
    {
        $tanis = Tani::all();
        $ternaks = Ternak::all();

        return view('admin.alert.create', compact('tanis', 'ternaks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'name_id' => 'required',
            'jenis' => 'required',
            'kelamin' => 'required',
            'status' => 'required',
            'umur_siap' => 'required',
            'umur' => 'required',
            'lahir_ditanam' => 'required',
            'keterangan' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        Alert::create($input);

        return redirect('/allalert')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Alert $alert)
    {
        //
    }

 
    public function edit(Alert $allalert)
    {
        $tanis = Tani::all();
        $ternaks = Ternak::all();
        return view('admin.alert.edit', compact('allalert', 'tanis', 'ternaks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alert $allalert)
    {
        $request->validate([
            'name' => 'required',
            'name_id' => 'required',
            'jenis' => 'required',
            'kelamin' => 'required',
            'status' => 'required',
            'umur_siap' => 'required',
            'umur' => 'required',
            'lahir_ditanam' => 'required',
            'keterangan' => 'required',
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

        $allalert->update($input);

        return redirect('/allalert')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alert $allalert)
    {
        $allalert->delete();

        return redirect('/allalert')->with('message', 'Data Berhasil Dihapus'); 
    }
}