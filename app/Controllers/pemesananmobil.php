<?php

namespace App\Controllers;

class PemesananMobil extends BaseController
{
    public function index()
    {
        $url = 'http://10.10.25.24:8080/pemesananmobil/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['pemesananmobil'] = json_decode($response->getBody(), true);

            return view('PemesananMobileView', $data);
        } catch (\Exception $e) {
            return view('PemesananMobileView', ['error' => $e->getMessage()]);
        }
    }

    public function tambahPelanggan()
    {
        return view('input-pelanggan');
    }

    public function sendData()
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

        $url = 'http://10.10.25.24:8080/pemesananmobil/store';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->setBody(json_encode($data))
                ->setHeader('Content-Type', 'application/json')
                ->request('POST', $url);

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/pemesanan-mobil')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/pemesanan-mobil')->with('error', 'Gagal menyimpan data!');
            }
        } catch (\Exception $e) {
            return redirect()->to('/pemesanan-mobil')->with('error', $e->getMessage());
        }
    }

    public function edit($id_pemesanan)
    {
        $url = 'http://10.10.25.24:8080/pemesananmobil/show/' . $id_pemesanan;
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

        $url = 'http://10.10.25.24:8080/pemesananmobil/update/' . $this->request->getPost('id_pemesanan');
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
    public function hapus($id)
    {
        $url = 'http://10.10.25.24:8080/pemesananmobil/delete/' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('DELETE', $url);

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/pemesanan-mobil')->with('success', 'Pelanggan berhasil dihapus!');
            } else {
                return redirect()->to('/pemesanan-mobil')->with('error', 'Gagal menghapus pelanggan!');
            }
        } catch (\Exception $e) {
            return redirect()->to('/pemesanan-mobil')->with('error', $e->getMessage());
        }
    }
}