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
use Carbon\Carbon;

class AlertController extends Controller
{
    public function index( Request $request)
    {
        $keyword = $request->input('query');
        $user = Auth::user()->get();
        $alerts = Alert::where('user', Auth::user()->id)
                    ->when($keyword, function ($query, $keyword) {
                        return $query->where(function ($query) use ($keyword) {
                             $query->where('name', 'like', "%$keyword%")
                                   ->orWhere('name_id', 'like', "%$keyword%")
                                   ->orWhere('jenis', 'like', "%$keyword%")
                                   ->orWhere('kelamin', 'like', "%$keyword%")
                                   ->orWhere('status', 'like', "%$keyword%")
                                   ->orWhere('umur_siap', 'like', "%$keyword%")
                                   ->orWhere('umur', 'like', "%$keyword%")
                                   ->orWhere('keterangan', 'like', "%$keyword%")
                                   ->orWhere('user', 'like', "%$keyword%");
                        });
                 })
                ->paginate(5);

        $tanis = Tani::where('user', Auth::user()->id)
            ->when($keyword, function ($query, $keyword) {
                return $query->where(function ($query) use ($keyword) {
                     $query->where('name', 'like', "%$keyword%")
                           ->orWhere('tanaman', 'like', "%$keyword%")
                           ->orWhere('jenis', 'like', "%$keyword%")
                           ->orWhere('kelamin', 'like', "%$keyword%")
                           ->orWhere('ditanam', 'like', "%$keyword%")
                           ->orWhere('umur', 'like', "%$keyword%")
                           ->orWhere('lahir_ditanam', 'like', "%$keyword%")
                           ->orWhere('dipanen', 'like', "%$keyword%")
                           ->orWhere('hasil', 'like', "%$keyword%")
                           ->orWhere('user', 'like', "%$keyword%");
                });
        });

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
        });

        $tanggal = Carbon::now();
        foreach ($alerts as $alert) {
            $umur_hari = $alert->hitungUmurHariAlert($alert->lahir_ditanam, $tanggal);
            $alert->umur = $umur_hari;

            if($alert->umur_siap <= $alert->umur) {
                $alert->status = "Siap";
            } else {
                $alert->status = "Belum Siap";
            }

            $alert->save();
        }

        foreach ($tanis as $tani) {
            $umur_hari = $tani->hitungUmurHariTani($tani->ditanam, $tanggal);
            $tani->umur = $umur_hari;
            $tani->save();
        }

        foreach ($ternaks as $ternak) {
            $umur_hari = $ternak->hitungUmurHariTernak($ternak->ditanam, $tanggal);
            $ternak->umur = $umur_hari;
            $ternak->save();
        }

        

        return view('user.alert.index', compact('alerts', 'tanis', 'ternaks'));
    }

    public function create()
    {
        $user = Auth::user()->get();
        $tanis = Tani::where('user', Auth::user()->id)->get();
        $ternaks = Ternak::where('user', Auth::user()->id)->get();
        return view('user.alert.create', compact('tanis', 'ternaks'));
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

        return redirect('/alert')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Alert $alert)
    {
        //
    }

 
    public function edit(Alert $alert)
    {
        $user = Auth::user()->get();
        $tanis = Tani::where('user', Auth::user()->id)->get();
        $ternaks = Ternak::where('user', Auth::user()->id)->get();
        return view('user.alert.edit', compact('alert', 'tanis', 'ternaks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alert $alert)
    {
        $request->validate([
            'name' => 'required',
            'name_id' => 'required',
            'jenis' => 'required',
            'kelamin' => 'required',
            'status' => 'required',
            'umur_siap' => 'required',
            'umur' => 'nullable',
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

        $alert->update($input);

        return redirect('/alert')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alert $alert)
    {
        $alert->delete();

        return redirect('/alert')->with('message', 'Data Berhasil Dihapus'); 
    }
}