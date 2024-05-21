<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Lowongan Kerja';

        $lokers = Loker::orderBy('created_at', 'desc')->get();

        return view('loker.index', compact('pageTitle', 'lokers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Loker';

        return view('loker.create', compact('pageTitle'));
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

        $loker = new Loker();
        $loker->name = $request->nama;
        $loker->requirement = $request->persyaratan;
        $loker->description = $request->deskripsi;

        $file = $request->file('foto');
        if ($file != null) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/files', $filename);
            $loker->image = $filename;
        }

        $loker->save();

        Alert::success('Added Successfully', 'Lowongan Kerja Added Successfully.');

        return redirect()->route('lokers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Loker Detail';

        $loker = Loker::find($id);

        return view('loker.show', compact('pageTitle', 'loker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Loker Edit';

        $loker = Loker::find($id);

        return view('loker.edit', compact('pageTitle', 'loker'));
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

        $loker = Loker::find($id);
        $loker->name = $request->nama;
        $loker->requirement = $request->persyaratan;
        $loker->description = $request->deskripsi;

        $file = $request->file('foto');
        if ($file != null) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/files', $filename);
            $loker->image = $filename;
        }

        $loker->save();

        Alert::success('Changed Successfully', 'Beasiswa Data Changed Successfully.');

        return redirect()->route('lokers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loker = Loker::find($id);

        if ($loker->image) {
            Storage::delete('public/files/' . $loker->image);
        }

        $loker->delete();

        Alert::success('Deleted Successfully', 'Loker Data Deleted Successfully.');

        return redirect()->route('lokers.index');
    }
}
