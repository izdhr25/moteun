<?php

namespace App\Http\Controllers;

use App\Models\Ternak;
use App\Models\JenisTernak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AllTernakController extends Controller
{
    use ValidatesRequests;

    public function index(Request $request)
    {
        $keyword = $request->input('query');

        $ternaks = Ternak::where('name', 'LIKE', '%'.$keyword.'%')
        ->orWhere('hewan', 'LIKE', '%'.$keyword.'%')
        ->orWhere('jenis', 'LIKE', '%'.$keyword.'%')
        ->orWhere('kelamin', 'LIKE', '%'.$keyword.'%')
        ->orWhere('lahir', 'LIKE', '%'.$keyword.'%')
        ->orWhere('umur', 'LIKE', '%'.$keyword.'%')
        ->orWhere('mati', 'LIKE', '%'.$keyword.'%')
        ->orWhere('hasil', 'LIKE', '%'.$keyword.'%')
        ->orWhere('user', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);
        return view('admin.ternak.index', compact('ternaks'));
    }

    public function create()
    {
        $jenisternaks = JenisTernak::all();
        return view('admin.ternak.create', compact('jenisternaks'));  
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hewan' => ['required', 'string', 'max:255'],
            'jenis' => 'required',
            'kelamin' => 'required',
            'lahir' => 'required',
            'umur' => 'required',
            'mati' => 'nullable',
            'hasil' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        Ternak::create($input);

        return redirect('/allternak')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Ternak $allternak)
    {
        //
    }

 
    public function edit(Ternak $allternak)
    {
        $jenisternaks = JenisTernak::all();
        return view('admin.ternak.edit', compact('allternak', 'jenisternaks'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ternak $allternak)
    {
        $request->validate([
            'name' => 'required',
            'hewan' => 'required',
            'jenis' => 'required',
            'kelamin'=> 'required',
            'lahir' => 'required',
            'umur' => 'required',
            'mati' => 'nullable',
            'hasil' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        $allternak->update($input);

        return redirect('/allternak')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ternak $allternak)
    {
        $allternak->delete();

        return redirect('/allternak')->with('message', 'Data Berhasil Dihapus'); 
    }
}