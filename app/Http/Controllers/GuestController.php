<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Loker;
use App\Models\Lomba;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function indexwelcome()
    {
        $pageTitle = 'Terbaru';

        $beasiswas = Beasiswa::orderBy('created_at', 'desc')->take(2)->get();
        $lombas = Lomba::orderBy('created_at', 'desc')->take(2)->get();
        $lokers = Loker::orderBy('created_at', 'desc')->take(2)->get();

        return view('welcome', compact('pageTitle', 'beasiswas', 'lombas', 'lokers'));
    }

    public function indexbeasiswa()
    {
        $pageTitle = 'Beasiswa List';

        $beasiswas = Beasiswa::all();

        return view('guest.beasiswa', compact('pageTitle', 'beasiswas'));
    }

    public function indexlomba()
    {
        $pageTitle = 'Lomba List';

        $lombas = Lomba::all();

        return view('guest.lomba', compact('pageTitle', 'lombas'));
    }

    public function indexloker()
    {
        $pageTitle = 'Loker List';

        $lokers = Loker::all();

        return view('guest.loker', compact('pageTitle', 'lokers'));
    }
}
