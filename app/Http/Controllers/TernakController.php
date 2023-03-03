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
use Carbon\Carbon;

class TernakController extends Controller
{
    use ValidatesRequests;

    public function index( Request $request)
    {
        $keyword = $request->input('query');
        $user = Auth::user()->get();
        $ternaks = Ternak::where('user', Auth::user()->id)
                    ->when($keyword, function ($query, $keyword) {
                        return $query->where(function ($query) use ($keyword) {
                             $query->where('name', 'like', "%$keyword%")
                                   ->orWhere('hewan', 'like', "%$keyword%")
                                   ->orWhere('jenis', 'like', "%$keyword%")
                                   ->orWhere('kelamin', 'like', "%$keyword%")
                                   ->orWhere('lahir', 'like', "%$keyword%")
                                   ->orWhere('umur', 'like', "%$keyword%")
                                   ->orWhere('mati', 'like', "%$keyword%")
                                   ->orWhere('hasil', 'like', "%$keyword%")
                                   ->orWhere('user', 'like', "%$keyword%");
                        });
                 })
                ->paginate(5);

        $tanggal = Carbon::now();
        foreach ($ternaks as $ternak) {
            $umur_hari = $ternak->hitungUmurHari($ternak->lahir, $tanggal);
            $ternak->umur = $umur_hari;
            $ternak->save();
        }

        return view('user.ternak.index', compact('ternaks'));
    }

    public function create()
    {
        $jenisternaks = JenisTernak::all();
        return view('user.ternak.create', compact('jenisternaks'));  
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

        return redirect('/ternak')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Ternak $ternak)
    {
        //
    }

 
    public function edit(Ternak $ternak)
    {
        $jenisternaks = JenisTernak::all();
        return view('user.ternak.edit', compact('ternak', 'jenisternaks'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ternak $ternak)
    {
        $request->validate([
            'name' => 'required',
            'hewan' => 'required',
            'jenis' => 'required',
            'kelamin'=> 'required',
            'lahir' => 'required',
            'umur' => 'nullable',
            'mati' => 'nullable',
            'hasil' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        $ternak->update($input);

        return redirect('/ternak')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ternak $ternak)
    {
        $ternak->delete();

        return redirect('/ternak')->with('message', 'Data Berhasil Dihapus'); 
    }
}