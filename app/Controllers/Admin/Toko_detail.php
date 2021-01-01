<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Toko_detail_model;

class Toko_detail extends BaseController
{
    protected $url = "https://api.rajaongkir.com/starter/";
    protected $apiKey = "80dc4bd8850eca85fd7a69793e673715";
    protected $toko_detail_model;

    public function __construct()
    {
        helper(['form']);
        $this->toko_detail_model = new Toko_detail_model();
    }

    public function index(){
        $data['title'] = 'Options Toko';
        return view('admin/toko/index', $data);
    }

    public function show(){
        $data['results'] = $this->toko_detail_model->findAll();
        return json_encode($data);
    }

    public function simpan($id = null){
        if($id==null){
            $nama = $this->request->getPost('nama');
            $telphone = $this->request->getPost('telphone');
            $provinsi = $this->request->getPost('provinsi');
            $kota = $this->request->getPost('kota');
            $alamat = $this->request->getPost('alamat');

            $data = [   
                'name'      => $nama,
                'telphone'  => $telphone,
                'provinsi'  => $provinsi,
                'kota'      => $kota,
                'alamat'    => $alamat
            ];

            if($this->toko_detail_model->insert($data)){
                $response['results'] = 200;

                return json_encode($response);
            }
        }else{

            $nama = $this->request->getPost('nama');
            $telphone = $this->request->getPost('telphone');
            $provinsi = $this->request->getPost('provinsi');
            $kota = $this->request->getPost('kota');
            $alamat = $this->request->getPost('alamat');

            $data = [   
                'nama'      => $nama,
                'telphone'  => $telphone,
                'provinsi'  => $provinsi,
                'kota'      => $kota,
                'alamat'    => $alamat
            ];

            if($this->toko_detail_model->update($id,$data)){
                $response['results'] = 200;

                return json_encode($response);
            }
        }
    }

    public function rajaongkir($method, $id_province = null){
        
        $endPoint = $this->url.$method;

        if($id_province){
            $endPoint = $endPoint."?province=". $id_province;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->apiKey
            ),
        ));

        $reponse = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $reponse;
    }
}