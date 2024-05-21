<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class LombaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Lomba';

        $lombas = Lomba::orderBy('created_at', 'desc')->get();

        return view('lomba.index', compact('pageTitle', 'lombas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Lomba';

        return view('lomba.create', compact('pageTitle'));
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

        $lomba = new Lomba();
        $lomba->name = $request->nama;
        $lomba->requirement = $request->persyaratan;
        $lomba->description = $request->deskripsi;

        $file = $request->file('foto');
        if ($file != null) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/files', $filename);
            $lomba->image = $filename;
        }

        $lomba->save();

        Alert::success('Added Successfully', 'Lomba Added Successfully.');

        return redirect()->route('lombas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Lomba Detail';

        $lomba = Lomba::find($id);

        return view('lomba.show', compact('pageTitle', 'lomba'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Lomba Edit';

        $lomba = Lomba::find($id);

        return view('lomba.edit', compact('pageTitle', 'lomba'));
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

        $lomba = Lomba::find($id);
        $lomba->name = $request->nama;
        $lomba->requirement = $request->persyaratan;
        $lomba->description = $request->deskripsi;

        $file = $request->file('foto');
        if ($file != null) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/files', $filename);
            $lomba->image = $filename;
        }

        $lomba->save();

        Alert::success('Changed Successfully', 'Lomba Changed Successfully.');

        return redirect()->route('lombas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lomba = Lomba::find($id);

        if ($lomba->image) {
            Storage::delete('public/files/' . $lomba->image);
        }

        $lomba->delete();

        Alert::success('Deleted Successfully', 'Lomba Data Deleted Successfully.');

        return redirect()->route('lombas.index');
    }
}
