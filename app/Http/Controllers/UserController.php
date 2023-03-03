<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tani;
use App\Models\Ternak;
use App\Models\Obat;
use App\Models\Sakit_Sehat;
use App\Models\Alert;

class UserController extends Controller
{
    public function getNotification()
    {
        $status = Alert::where('status', '=', 'siap')->where('user', Auth::user()->id)->paginate(5);;
        $count = count($status);

        return $status;
    }

    public function index() {
    	$user = Auth::user()->get();
    	$tanis = Tani::where('user', Auth::user()->id)->get();
    	$ternaks = Ternak::where('user', Auth::user()->id)->get();
    	$alerts = Alert::where('user', Auth::user()->id)->get();
    	$kondisis = Sakit_Sehat::where('user', Auth::user()->id)->get();

    	$jumlahtani = count($tanis);
    	$jumlahternak = count($ternaks);
    	$jumlahalert = count($alerts);
    	$jumlahkondisi = count($kondisis);

        $notification = $this->getNotification();

        return view('user.index', compact('jumlahtani', 'jumlahternak', 'jumlahalert', 'jumlahkondisi', 'tanis', 'ternaks', 'alerts', 'notification'));
    }
}
