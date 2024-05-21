<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Beasiswa';

        $beasiswas = Beasiswa::orderBy('created_at', 'desc')->get();

        return view('beasiswa.index', compact('pageTitle', 'beasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Beasiswa';

        return view('beasiswa.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'persyaratan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required ',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $beasiswa = new Beasiswa();
        $beasiswa->name = $request->nama;
        $beasiswa->requirement = $request->persyaratan;
        $beasiswa->description = $request->deskripsi;

        $file = $request->file('foto');
        if ($file != null) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/files', $filename);
            $beasiswa->image = $filename;
        }

        $beasiswa->save();

        Alert::success('Added Successfully', 'Beasiswa Data Added Successfully.');

        return redirect()->route('beasiswas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Beasiswa Detail';

        $beasiswa = Beasiswa::find($id);

        return view('beasiswa.show', compact('pageTitle', 'beasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Beasiswa Edit';

        $beasiswa = Beasiswa::find($id);

        return view('beasiswa.edit', compact('pageTitle', 'beasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'persyaratan' => 'required',
            'deskripsi' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $beasiswa = Beasiswa::find($id);
        $beasiswa->name = $request->nama;
        $beasiswa->requirement = $request->persyaratan;
        $beasiswa->description = $request->deskripsi;

        $file = $request->file('foto');
        if ($file != null) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/files', $filename);
            $beasiswa->image = $filename;
        }

        $beasiswa->save();

        Alert::success('Changed Successfully', 'Beasiswa Data Changed Successfully.');

        return redirect()->route('beasiswas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beasiswa = beasiswa::find($id);

        if ($beasiswa->image) {
            Storage::delete('public/files/' . $beasiswa->image);
        }

        $beasiswa->delete();

        Alert::success('Deleted Successfully', 'Beasiswa Data Deleted Successfully.');

        return redirect()->route('beasiswas.index');
    }
}
