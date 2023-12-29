<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawans.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawanData = Karyawan::all();
    return view('karyawans.create', compact('karyawanData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Karyawan::create($request->all());
        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawans.edit', compact(karyawan));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $karyawan->update($request->all());
        return redirect()->route('karyawans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawans.index');
    }
}
