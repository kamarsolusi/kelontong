<?php namespace App\Controllers;
use App\Models\Toko_detail_model;

class RajaOngkir extends BaseController
{
    protected $url = "https://api.rajaongkir.com/starter/";
    protected $apiKey = "80dc4bd8850eca85fd7a69793e673715";
    protected $toko_detail_model;
    public function __construct()
    {
        $this->toko_detail_model = new Toko_detail_model();
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

    public function ongkir(){
        $origin = $this->toko_detail_model->select('kota')->get()->getRowArray();
        $destination = $this->request->getPost('destination');
        $weight = $this->request->getPost('weight');
        $courier = $this->request->getPost('courier');
        $curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=".$origin['kota']."&destination=".$destination."&weight=".$weight."&courier=".$courier,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: ".$this->apiKey,
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		return $response;
    }
}