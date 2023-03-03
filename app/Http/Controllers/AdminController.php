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

class AdminController extends Controller
{
    public function getNotification()
    {
        $status = Alert::where('status', '=', 'siap')->paginate(5);
        $count = count($status);

        return $status;
    }

    public function index() {
        $tanis = Tani::all();
        $ternaks = Ternak::all();
        $alerts = Alert::all();
        $kondisis = Sakit_Sehat::all();

        $jumlahtani = count($tanis);
        $jumlahternak = count($ternaks);
        $jumlahalert = count($alerts);
        $jumlahkondisi = count($kondisis);

        $notification = $this->getNotification();

        return view('admin.index', compact('jumlahtani', 'jumlahternak', 'jumlahalert', 'jumlahkondisi', 'tanis', 'ternaks', 'alerts', 'notification'));
    }
}
