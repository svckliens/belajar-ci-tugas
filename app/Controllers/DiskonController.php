<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskon;

    public function __construct()
    {
        $this->diskon = new DiskonModel();

        // Cegah akses jika bukan admin
        if (session()->get('role') !== 'admin') {
            exit('Akses ditolak!');
        }
    }

    public function index()
    {
        $data['diskon'] = $this->diskon->findAll();
        return view('v_diskon', $data);
    }

    public function create()
    {
        return view('v_diskon_create');
    }

    public function store()
    {
        $tanggal = $this->request->getPost('tanggal');

        // Cek duplikat tanggal
        if ($this->diskon->where('tanggal', $tanggal)->first()) {
            return redirect()->back()->with('error', 'Diskon untuk tanggal ini sudah ada.');
        }

        $this->diskon->save([
            'tanggal' => $tanggal,
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['diskon'] = $this->diskon->find($id);
        return view('v_diskon_edit', $data);
    }

    public function update($id)
    {
        $this->diskon->update($id, [
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->diskon->delete($id);
        return redirect()->to('/diskon')->with('success', 'Diskon berhasil dihapus.');
    }
}