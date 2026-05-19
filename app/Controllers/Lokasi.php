<?php

namespace App\Controllers;
use App\Models\ModelLokasi;
class Lokasi extends BaseController
{
    public function __construct()
    {
        $this->ModelLokasi = new ModelLokasi();
    }
    public function index()
    {
        $data = [
            'judul' => 'data_Lokasi',
            'page' => 'lokasi/v_data_lokasi',

        ];
        return view('v_template', $data);
    }

    public function inputLokasi()
    {
        $data = [
            'judul' => 'input_Lokasi',
            'page' => 'lokasi/v_input_lokasi',

        ];
        return view('v_template', $data);
    }

    //insesrt data ke database
    public function insertData()
    {

        if ($this->validate([
            'nama_lokasi' => [
                'label' => 'Nama Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],

            'alamat_lokasi' => [
                'label' => 'Alamat Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],

            'latitude' => [
                'label' => 'Latitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],

            'longitude' => [
                'label' => 'Longitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !!!'
                ]
            ],

            'foto_lokasi' => [
                'label' => 'Foto Lokasi',
                'rules' => 'uploaded[foto_lokasi]|max_size[foto_lokasi,1024]|mime_in[foto_lokasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong !!!',
                    'max_size' => 'Ukuran {field} Maksimal 2014 KB !!',
                    'mime_in' => 'Format {field} Harus jpg, jpeg, png'
                ]
            ]

        ])) {
            $foto_lokasi = $this->request->getFile('foto_lokasi');
            $nama_file_foto = $foto_lokasi->getRandomName();
            //jika lolos validasi
            $data = [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'foto_lokasi' => $nama_file_foto
            ];
            $foto_lokasi->move('foto', $nama_file_foto);
            //kirim data ke funcion modelLokasi
            $this->ModelLokasi->insertData($data);
            //notofikasi data berhasil disimpoan
            session()->setFlashdata('pesan', 'Data Lokasi Berhasil Ditambahkan !!!');
            return redirect()->to('Lokasi/inputLokasi');
        }
    }
}
