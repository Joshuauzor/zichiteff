<?php namespace App\Controllers;

use App\Models\RequestModel;
use App\Models\MasterModel;
use App\Models\ServicesModel;

class Home extends BaseController
{
	public function __construct()
	{
		helper(['form', 'url', 'date']);
	}
	/**
	 * This is the controller for the homepage
	*/
	
	public function index()
	{
		$data['title'] = 'Zichiteff | Your one stop shop for all your property needs';
		$MasterModel = new MasterModel();
		$data['masterInfo'] = $MasterModel->getOne();
		
        $ServiceModel = new ServicesModel();
		$data['totalServices'] = $ServiceModel->getAll();	
		

		echo view('homepage/home', $data);
	}

	//--------------------------------------------------------------------

	public function about(){
		$data['title'] = 'About | Zichiteff';
		$MasterModel = new MasterModel();
		$ServiceModel = new ServicesModel();

		$data['totalServices'] = $ServiceModel->getAll();	
        $data['masterInfo'] = $MasterModel->getOne();
		echo view ('homepage/about', $data);
	}

	//--------------------------------------------------------------------

	public function services(){
		$data['title'] = 'Services | Zichiteff';
		$MasterModel = new MasterModel();
		$RequestModel = new RequestModel();
        $data['totalRequest'] = $RequestModel->getAll();
        $data['masterInfo'] = $MasterModel->getOne();
		echo view ('homepage/services', $data);
	}

	//--------------------------------------------------------------------

	public function projects(){
		$data['title'] = 'Projects | Zichiteff';
		$MasterModel = new MasterModel();
		$ServiceModel = new ServicesModel();
		$data['totalServices'] = $ServiceModel->getAll();	
        $data['masterInfo'] = $MasterModel->getOne();
		echo view ('homepage/projects', $data);
	}

	//--------------------------------------------------------------------

	public function contact(){
		$data['title'] = 'Contact Us | Zichiteff';
		$MasterModel = new MasterModel();
		$ServiceModel = new ServicesModel();
		$data['totalServices'] = $ServiceModel->getAll();	
		$data['masterInfo'] = $MasterModel->getOne();
		
		echo view ('homepage/contact', $data);
	}

	//--------------------------------------------------------------------
	/**
	 * The request method below is used to make a request by the client which later redirects them to the homepage.
	*/
	public function request(){
		$session = session();
		if($this->request->getMethod() == 'post'){
			$rules = [
				'name' => 'required|trim',
				'email' => 'required|trim|valid_email',
				'phone' => 'required|numeric|min_length[5]',
				'location' => 'required',
				'service' => 'required',
				'message' => 'required'
			];

			if($this->validate($rules)){
				$RequestModel = new RequestModel();

				$data = [
					'name' => $this->request->getVar('name'),
					'email' => $this->request->getVar('email'),
					'phone' => $this->request->getVar('phone'),
					'location' => $this->request->getVar('location'),
					'date' => date('Y-m-d h:i:s'),
					'service_id' => $this->request->getVar('service'),
					'message' => $this->request->getVar('message'),
				];

				if($RequestModel->insert($data)){
					$session->setFlashdata('success', 'Your request has been submited, we will contact you soon!');
					return redirect()->to(base_url());
				}
				else{
					$session->setFlashdata('error', 'Unable to make request at the moment!');
					return redirect()->to(base_url());
				}
			}
			else{
				$data['validation'] = $this->validator;
				return redirect()->to(base_url());
			}
		}
	}
}
