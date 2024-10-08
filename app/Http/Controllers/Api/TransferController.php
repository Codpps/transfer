<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransferResource;
use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $transfers = Transfer::latest()->paginate(10);
        return new TransferResource(true, 'List Data Transfers', $transfers);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'nominal' => 'required',
        ]);

        $transfer = Transfer::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nominal' => $request->nominal,
        ]);

        // Return a resource response
        return new TransferResource(true, 'Data Transfer Berhasil', $transfer);
    }


    public function show($id)
    {
        $transfer = Transfer::find($id);
        return new TransferResource(true, 'Detail Data Transfer', $transfer);
    }

    public function update(Request $request, Transfer $transfer)
{
    $request->validate([
        'nama' => 'required',
        'kelas' => 'required',
        'nominal' => 'required',
    ]);

    $transfer->update([
        'nama' => $request->nama,
        'kelas' => $request->kelas,
        'nominal' => $request->nominal,
    ]);

    return new TransferResource(true, 'Data Transfer Berhasil Di Perbarui', $transfer);
}


    public function destroy(Transfer $transfer)
    {
        $transfer->delete();
        return new TransferResource(true, 'Data Transfer Berhasil Di Hapus', $transfer);
    }
}
