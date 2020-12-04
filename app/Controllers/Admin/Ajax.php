<?php namespace App\Controllers\Admin;
use CodeIgniter\Controller;
// import configurations

// import model

use App\Models\RequestModel;

class Ajax extends Controller
{

    public function __construct()
    {
        helper(['form','url','date']);
    }

    public function action()
	{
        // $data['title'] = 'Login Activity | Zichiteff';
        $session = session();
        
        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

        $RequestModel = new RequestModel();
       
    //   begin
        if($this->request->getMethod() == 'post'){
            $id = $this->request->getVar('id');
            $status_id = $this->request->getVar('action');
            $data = [
                'status_id' => $status_id,
                'action_by' => $session->get('firstname').' '.$session->get('lastname')
            ];

            $update = $RequestModel->updateReq($id, $data);
            if($update){
                echo json_encode('success');
            }
            else{
                echo json_encode('failed');
            }   
        }
    }
}