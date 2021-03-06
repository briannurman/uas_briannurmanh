<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OngkirController extends BaseController
{
	var $weight = 1;
	var $key 	= '9440d475e2a1f9ecb0e9ff7cb2413816';
	var $base_url = 'https://api.rajaongkir.com/starter';
	var $headers = array( 'Accept: application/json', 'Content-Type: application/json' );
	var $requesData= [];

	public function __construct()
	{
		$this->requesData['key'] = $this->key;
	}

	public function index()
	{
		return view('ongkir');
	
	}

	public function ongkir(){
		$mode = $this->request->getGet('mode');
		$output = [];
		switch($mode){
			case 'Province':
				$output = $this->getProvince();
			break;
			case 'City': 
				$output = $this->getCity();
			break;
			case 'Cost':
				$output = $this->getConst();
			break;
			case 'Postal':
				$output = $this->getPostal();
			break;
			default;
				$output=[];
		}

		return $this->response->setJSON($output);
	}

	private function getProvince(){
		
		$province = [];
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->base_url."/province?key=".$this->key);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->requesData));

		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

		$response = curl_exec($ch);
		$province = json_decode($response);
		curl_close($ch);

		return $province->rajaongkir->results;
	}

	private function getCity(){
		$province= $this->request->getGet('province');
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->base_url."/city?key=".$this->key.'&province='.$province);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->requesData));

		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

		$response = curl_exec($ch);
		$city = json_decode($response);
		curl_close($ch);

		return $city->rajaongkir->results;
	}

	private function getPostal(){
		$city = $this->request->getGet('city');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->base_url."/city?key=".$this->key.'&id='.$city);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->requesData));

		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

		$response = curl_exec($ch);
		$city = json_decode($response);
		curl_close($ch);

		return $city->rajaongkir->results;
	}

	private function getConst(){
		$curl = curl_init();
		$destination =  $this->request->getGet('destination');
		$origin = $this->request->getGet('origin');
		$kurir = $this->request->getGet('kurir');

		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->base_url."/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=".$origin.
				"&destination=".$destination.
				"&weight=". $this->weight.
				"&courier=". $kurir,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: ". $this->key
			),
		));

			$response = curl_exec($curl);
			$cost = json_decode($response);
			$err = curl_error($curl);

			curl_close($curl);

			return $cost->rajaongkir->results;
	}
}
