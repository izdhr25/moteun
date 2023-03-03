<?php

namespace App\Http\Controllers;

use App\Models\Tani;
use App\Models\JenisTani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AllTaniController extends Controller
{
    public function index( Request $request)
    {
        $keyword = $request->input('query');

        $tanis = Tani::where('name', 'LIKE', '%'.$keyword.'%')
        ->orWhere('tanaman', 'LIKE', '%'.$keyword.'%')
        ->orWhere('jenis', 'LIKE', '%'.$keyword.'%')
        ->orWhere('kelamin', 'LIKE', '%'.$keyword.'%')
        ->orWhere('ditanam', 'LIKE', '%'.$keyword.'%')
        ->orWhere('umur', 'LIKE', '%'.$keyword.'%')
        ->orWhere('dipanen', 'LIKE', '%'.$keyword.'%')
        ->orWhere('hasil', 'LIKE', '%'.$keyword.'%')
        ->orWhere('user', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);
        return view('admin.tani.index', compact('tanis'));
    }

    public function create()
    {
        $jenistanis = JenisTani::all();
        return view('user.tani.create', compact('jenistanis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tanaman' => 'required',
            'jenis' => 'required',
            'kelamin' => 'required',
            'ditanam' => 'required',
            'umur' => 'required',
            'dipanen' => 'nullable',
            'hasil' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        Tani::create($input);

        return redirect('/alltani')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Tani $alltani)
    {
        
    }

 
    public function edit(Tani $alltani)
    {
        $jenistanis = JenisTani::all();
        return view('user.tani.edit', compact('alltani', 'jenistanis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tani $alltani)
    {
        $request->validate([
            'name' => 'required',
            'tanaman' => 'required',
            'jenis' => 'required',
            'kelamin' => 'required',
            'ditanam' => 'required',
            'umur' => 'required',
            'dipanen' => 'nullable',
            'hasil' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        $alltani->update($input);

        return redirect('/alltani')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tani $alltani)
    {
        $alltani->delete();

        return redirect('/alltani')->with('message', 'Data Berhasil Dihapus'); 
    }

}