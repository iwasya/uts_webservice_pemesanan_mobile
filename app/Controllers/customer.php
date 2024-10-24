<?php

namespace App\Controllers;

class customer extends BaseController
{
    public function index()
    {
        $url = 'http://10.10.24.65:8080/customer/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['customer1'] = json_decode($response->getBody(), true);

            return view('customerview', $data);
        } catch (\Exception $e) {
            return view('customerview', ['error' => $e->getMessage()]);
        }
    }

    public function tambahPelanggan()
    {
        return view('input-pelanggan');
    }

    public function sendData()
    {
        $data = [
            'id_customer' => $this->request->getPost('id_customer'),
            'nik_customer' => $this->request->getPost('nik_customer'),
            'nama_customer' => $this->request->getPost('nama_customer'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
        ];

        $url = 'http://10.10.24.65:8080/customer/store';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->setBody(json_encode($data))
                ->setHeader('Content-Type', 'application/json')
                ->request('POST', $url);

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/customer')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/customer')->with('error', 'Gagal menyimpan data!');
            }
        } catch (\Exception $e) {
            return redirect()->to('/customer')->with('error', $e->getMessage());
        }
    }

    public function edit($id_pemesanan)
    {
        $url = 'http://10.10.24.65:8080/pemesananmobil/show/' . $id_pemesanan;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['pemesananmobil1'] = json_decode($response->getBody(), true);

            if (!$data['pemesananmobil1']) {
                return redirect()->to('/pemesanan-mobil')->with('error', 'Pelanggan tidak ditemukan.');
            }

            return view('edit-pesananmobil', $data);
        } catch (\Exception $e) {
            return view('edit-pesananmobil', ['error' => $e->getMessage()]);
        }
    }

    public function editpesananmobil()
    {
        $data = [
            'id_pemesanan' => $this->request->getPost('id_pemesanan'),
            'id_mobil' => $this->request->getPost('id_mobil'),
            'id_customer' => $this->request->getPost('id_customer'),
            'id_sopir' => $this->request->getPost('id_sopir'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'total_harga' => $this->request->getPost('total_harga'),
            'status_pemesanan' => $this->request->getPost('status_pemesanan'),
        ];

        $url = 'http://10.10.24.65:8080/pemesananmobil/update/' . $this->request->getPost('id_pemesanan');
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        //print_r($response);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_status == 200) {
                return redirect()->to('/pemesanan-mobil')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/pemesanan-mobil')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }

        curl_close($ch);
    }
    public function hapus($id_customer)
    {
        $url = 'http://10.10.24.65:8080/customer/delete/' . $id_customer;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('DELETE', $url);

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/customer')->with('success', 'Pelanggan berhasil dihapus!');
            } else {
                return redirect()->to('/customer')->with('error', 'Gagal menghapus pelanggan!');
            }
        } catch (\Exception $e) {
            return redirect()->to('/customer')->with('error', $e->getMessage());
        }
        
        
    }
}