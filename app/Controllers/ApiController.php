<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class ApiController extends ResourceController
{
    protected $apiKey;
    protected $user;
    protected $transaction;
    protected $transaction_detail;

    public function __construct()
    {
        $this->apiKey = env('API_KEY');
        $this->user = new UserModel();
        $this->transaction = new TransactionModel();
        $this->transaction_detail = new TransactionDetailModel();
    }

    /**
     * Endpoint API untuk mengambil seluruh transaksi dengan detail
     */
    public function index()
    {
        $data = [ 
            'results' => [],
            'status' => ["code" => 401, "description" => "Unauthorized"]
        ];

        $headers = $this->request->headers();

        // Ubah header jadi array sederhana
        array_walk($headers, function (&$value, $key) {
            $value = $value->getValue();
        });

        if (array_key_exists("Key", $headers)) {
            if ($headers["Key"] == $this->apiKey) {
                $penjualan = $this->transaction->findAll();
                
                foreach ($penjualan as &$pj) {
                $details = $this->transaction_detail
                    ->where('transaction_id', $pj['id'])
                    ->findAll();

                $pj['details'] = $details;

                // Hitung total item dalam transaksi
                $jumlah_item = 0;
                foreach ($details as $d) {
                    $jumlah_item += $d['jumlah'];
                }

                $pj['jumlah_item'] = $jumlah_item; // Tambahkan ke response
            }

                $pj['status'] = ($pj['status'] == 'selesai') ? 'Sudah Selesai' : 'Belum Selesai';

                $data['results'] = $penjualan;
            }
        } 

        return $this->respond($data);
    }

    /**
     * Halaman user (non-API) untuk menampilkan profil dan riwayat pembelian
     */
    public function profilIndex()
{
    helper('number');

    $username = session()->get('username');

    if (!$username) {
        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $buy = $this->transaction
        ->where('username', $username)
        ->orderBy('created_at', 'DESC')
        ->findAll();

    $db = \Config\Database::connect(); // akses database

    $product = [];

    foreach ($buy as $row) {
        $query = $db->table('transaction_detail td')
            ->select('td.*, p.nama, p.harga, p.foto')
            ->join('product p', 'p.id = td.product_id')
            ->where('td.transaction_id', $row['id'])
            ->get();

        $product[$row['id']] = $query->getResultArray();
    }

    return view('v_profil', [
        'username' => $username,
        'buy' => $buy,
        'product' => $product
    ]);
}

}