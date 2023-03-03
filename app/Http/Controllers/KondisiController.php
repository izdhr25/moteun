<?php

namespace App\Http\Controllers;

use App\Models\Sakit_Sehat;
use App\Models\Obat;
use App\Models\JenisTernak;
use App\Models\JenisTani;
use App\Models\Ternak;
use App\Models\Tani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class KondisiController extends Controller
{
    public function index( Request $request)
    {
        $keyword = $request->input('query');
        $user = Auth::user()->get();
        $kondisis = Sakit_Sehat::where('user', Auth::user()->id)
                    ->when($keyword, function ($query, $keyword) {
                        return $query->where(function ($query) use ($keyword) {
                             $query->where('nama_id', 'like', "%$keyword%")
                                   ->orWhere('nama', 'like', "%$keyword%")
                                   ->orWhere('jenis', 'like', "%$keyword%")
                                   ->orWhere('tgl_sakit', 'like', "%$keyword%")
                                   ->orWhere('lama_Sakit', 'like', "%$keyword%")
                                   ->orWhere('tgl_sembuh', 'like', "%$keyword%")
                                   ->orWhere('obat', 'like', "%$keyword%")
                                   ->orWhere('perawat', 'like', "%$keyword%")
                                   ->orWhere('status', 'like', "%$keyword%")
                                   ->orWhere('user', 'like', "%$keyword%");
                        });
                 })
                ->paginate(5);

        $tanggal = Carbon::now();
        foreach ($kondisis as $kondisi) {
            if ($kondisi->tgl_sembuh === null) {
                $umur_hari = $kondisi->hitungUmurHari($kondisi->tgl_sakit, $tanggal);
                $kondisi->lama_sakit = $umur_hari;
                $kondisi->save();
            } else {
                $umur_hari = $kondisi->hitungUmurHari($kondisi->tgl_sakit, $kondisi->tgl_sembuh);
                $kondisi->lama_sakit = $umur_hari;
                $kondisi->save();
            }
        }

        return view('user.kondisi.index', compact('kondisis'));
    }

    public function create()
    {
        $obats = Obat::all();
        $user = Auth::user()->get();
        $tanis = Tani::where('user', Auth::user()->id)->get();
        $ternaks = Ternak::where('user', Auth::user()->id)->get();
        $jenisternaks = JenisTernak::all();
        $jenistanis = JenisTani::all();
        return view('user.kondisi.create', compact('obats', 'jenisternaks', 'jenistanis', 'tanis', 'ternaks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_id' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'tgl_sakit' => 'required',
            'lama_sakit' => 'required',
            'tgl_sembuh' => 'nullable',
            'obat' => 'required',
            'perawat' => 'required',
            'status' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        Sakit_Sehat::create($input);

        return redirect('/kondisi')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Sakit_Sehat $kondisi)
    {
        //
    }

 
    public function edit(Sakit_Sehat $kondisi)
    {
        $obats = Obat::all();
        $user = Auth::user()->get();
        $tanis = Tani::where('user', Auth::user()->id)->get();
        $ternaks = Ternak::where('user', Auth::user()->id)->get();
        $jenisternaks = JenisTernak::all();
        $jenistanis = JenisTani::all();
        return view('user.kondisi.edit', compact('kondisi', 'jenisternaks', 'jenistanis', 'tanis', 'ternaks', 'obats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sakit_Sehat $kondisi)
    {
        $request->validate([
            'nama_id' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'tgl_sakit' => 'required',
            'lama_sakit' => 'nullable',
            'tgl_sembuh' => 'nullable',
            'obat' => 'required',
            'perawat' => 'required',
            'status' => 'required',
            'user' => 'required',
        ]);

        $input = $request->all();

        $kondisi->update($input);

        return redirect('/kondisi')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sakit_Sehat $kondisi)
    {
        $kondisi->delete();

        return redirect('/kondisi')->with('message', 'Data Berhasil Dihapus'); 
    }
}