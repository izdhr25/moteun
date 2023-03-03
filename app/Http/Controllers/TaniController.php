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
use Carbon\Carbon;

class TaniController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->input('query');
        $user = Auth::user()->get();
        $tanis = Tani::where('user', Auth::user()->id)
                    ->when($keyword, function ($query, $keyword) {
                        return $query->where(function ($query) use ($keyword) {
                             $query->where('name', 'like', "%$keyword%")
                                   ->orWhere('tanaman', 'like', "%$keyword%")
                                   ->orWhere('jenis', 'like', "%$keyword%")
                                   ->orWhere('kelamin', 'like', "%$keyword%")
                                   ->orWhere('ditanam', 'like', "%$keyword%")
                                   ->orWhere('umur', 'like', "%$keyword%")
                                   ->orWhere('dipanen', 'like', "%$keyword%")
                                   ->orWhere('hasil', 'like', "%$keyword%")
                                   ->orWhere('user', 'like', "%$keyword%");
                        });
                 })
                ->paginate(5);

        $tanggal = Carbon::now();
        foreach ($tanis as $tani) {
            $umur_hari = $tani->hitungUmurHari($tani->ditanam, $tanggal);
            $tani->umur = $umur_hari;
            $tani->save();
        }


        return view('user.tani.index', compact('tanis', 'tanggal'));
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

        $hariini = Carbon::now();

        return redirect('/tani')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Tani $tani)
    {
        
    }

 
    public function edit(Tani $tani)
    {
        $jenistanis = JenisTani::all();
        return view('user.tani.edit', compact('tani', 'jenistanis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tani $tani)
    {
        $request->validate([
            'name' => 'required',
            'tanaman' => 'required',
            'jenis' => 'required',
            'kelamin' => 'required',
            'ditanam' => 'required',
            'umur' => 'nullable',
            'dipanen' => 'nullable',
            'hasil' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        $tani->update($input);

        return redirect('/tani')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tani $tani)
    {
        $tani->delete();

        return redirect('/tani')->with('message', 'Data Berhasil Dihapus'); 
    }
}