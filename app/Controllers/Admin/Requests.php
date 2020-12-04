<?php namespace App\Controllers\Admin;
use CodeIgniter\Controller;
// import configurations
use Config\Services;
use Config\Database;

// import model
use App\Models\UsersModel;
use App\Models\MasterModel;
use App\Models\RequestModel;

class Requests extends Controller
{

    public function __construct()
    {
        helper(['form','url','date']);
    }

    public function total()
	{
        $data['title'] = 'Total Request | Zichiteff';
        $session = session();

        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));
        
        $RequestModel = new RequestModel();
        $data['totalRequest'] = $RequestModel->getAll();
        echo view('admin/totalReq', $data);
    }
    //--------------------------------------------------------------------

    public function pending(){
        $data['title'] = 'Pending Request | Zichiteff';
        $session = session();
        
        if(! session()->get('isLoggedIn'))
        return redirect()->to(base_url('auth'));

        $RequestModel = new RequestModel();
        $data['totalRequest'] = $RequestModel->getAll();
        $data['totalPending'] = $RequestModel->getPending();
        echo view('admin/pending', $data);

    }

    //--------------------------------------------------------------------

    public function inProgress(){
        $data['title'] = 'Request In Progress | Zichiteff';
        $session = session();
        
        if(! session()->get('isLoggedIn'))
        return redirect()->to(base_url('auth'));

        $RequestModel = new RequestModel();
        $data['totalRequest'] = $RequestModel->getAll();
        $data['totalInProgress'] = $RequestModel->getInProgress();
        echo view('admin/inProgress', $data);

    }

    //--------------------------------------------------------------------

    public function onHold(){
        $data['title'] = 'Request On Hold | Zichiteff';
        $session = session();
        
        if(! session()->get('isLoggedIn'))
        return redirect()->to(base_url('auth'));

        $RequestModel = new RequestModel();
        $data['totalRequest'] = $RequestModel->getAll();
        $data['totalOnHold'] = $RequestModel->getOnhold();
        echo view('admin/onHold', $data);

    }
    //--------------------------------------------------------------------

    //--------------------------------------------------------------------

    public function completed(){
        $data['title'] = 'Completed Request | Zichiteff';
        $session = session();
        
        if(! session()->get('isLoggedIn'))
        return redirect()->to(base_url('auth'));

        $RequestModel = new RequestModel();
        $data['totalRequest'] = $RequestModel->getAll();
        $data['totalCompleted'] = $RequestModel->getCompleted();
        echo view('admin/completed', $data);

    }
    //--------------------------------------------------------------------

    public function editReq(){
        $session = session();

        if(! session()->get('isLoggedIn'))
        return  redirect()->to(base_url('auth'));
        
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
                    'service_id' => $this->request->getVar('service'),
                    'message' => $this->request->getVar('message'),
                ];

                if($RequestModel->updateReq($this->request->getVar('id'), $data)){
                    $session->setFlashdata('success', 'Request updated!');
                    return redirect()->to(base_url('admin/requests/total'));
                }
                else{
                    $session->setFlashdata('error', 'Unable to make changes at the moment!');
                    return redirect()->to(base_url('admin/requests/total'));
                }
            }
            else{
                $data['validation'] = $this->validator;
                return redirect()->to(base_url('admin/requests/total'));
            }
        }
    }

    //--------------------------------------------------------------------
    
    public function deleteTotal($id){
        $session = session();

        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

        // var_dump($this->request->getMethod());
        if($this->request->getMethod() == 'get'){
            $RequestModel = new RequestModel();
            if($RequestModel->delete($id)){
                $session->setFlashdata('success', 'Request deleted');
                return redirect()->to(base_url('admin/requests/total'));
            }
            else{
                $session->setFlashdata('error', 'Unable to delete request at the moment. Try again later!');
                return redirect()->to(base_url('admin/requests/total'));
            }
        }
    }
}