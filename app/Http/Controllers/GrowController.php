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

class GrowController extends Controller
{
    public function index( Request $request)
    {
        $keyword = $request->input('query');
        $user = Auth::user()->get();
        $siap = 'Siap';
        $grows = Grow::where('user', Auth::user()->id)
                    ->when($keyword, function ($query, $keyword) {
                        return $query->where(function ($query) use ($keyword) {
                             $query->where('id_betina', 'like', "%$keyword%")
                                   ->orWhere('id_jantan', 'like', "%$keyword%")
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
        return view('user.grow.index', compact('grows'));
    }

    public function create()
    {
        $user = Auth::user()->get();
        $siap = 'Siap';
        $jenis = 'Hewan';
        $ternaks = Alert::where('user', Auth::user()->id)->where('jenis', $jenis)->where('status', $siap)->get();
        return view('user.grow.create', compact('ternaks'));
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

        return redirect('/grow')->with('message', 'Data Berhasil Ditambahkan'); 
    }

    public function show(Grow $grow)
    {
        //
    }

 
    public function edit(Grow $grow)
    {
        $user = Auth::user()->get();
        $siap = 'Siap';
        $jenis = 'Hewan';
        $ternaks = Alert::where('user', Auth::user()->id)->where('jenis', $jenis)->where('status', $siap)->get();
        return view('user.grow.edit', compact('grow', 'ternaks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grow $grow)
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

        $grow->update($input);

        return redirect('/grow')->with('message', 'Data Berhasil Diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grow $grow)
    {
        $grow->delete();

        return redirect('/grow')->with('message', 'Data Berhasil Dihapus'); 
    }
}