<?php namespace App\Controllers\Admin;
use CodeIgniter\Controller;
// import configurations
use Config\Services;
use Config\Database;

// import model
use App\Models\UsersModel;
use App\Models\MasterModel;
use App\Models\RequestModel;
use App\Models\ServicesModel;

class Master extends Controller
{

    public function __construct()
    {
        helper(['form','url','date']);
    }

    //--------------------------------------------------------------------

    public function index(){
        $data['title'] = 'Master Setup | Zichiteff';
        $session = session();
        $RequestModel = new RequestModel();
        $MasterModel = new MasterModel();
        $ServiceModel = new ServicesModel();
        $UserModel = new UsersModel();

        $data['totalRequest'] = $RequestModel->getAll();
        $data['masterInfo'] = $MasterModel->getOne();
        $data['totalService'] = $ServiceModel->getAll();
        $data['loggedInUser'] = $UserModel->getUniid($session->uniid);

        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

       if($this->request->getMethod() == 'post'){
           $rules = [
               'email' => 'required|trim|valid_email',
               'phone' => 'required|trim',
               'address' => 'required|trim',
               'project' => 'required|trim|numeric',
               'client' => 'required|trim|numeric'
           ];
        //    var_dump($this->request->getPost()); die;
           if($this->validate($rules)){
               

                $masterData = [
                    'com_email' => $this->request->getVar('email'),
                    'com_phone' => $this->request->getVar('phone'),
                    'com_address' => $this->request->getVar('address'),
                    'project_completed' => $this->request->getVar('project'),
                    'happy_clients' => $this->request->getVar('client'),

                ];

                if($MasterModel->updateMaster($masterData)){
                    $session->setFlashdata('success', 'Master Setup Successfully Updated!');
                    return redirect()->to(current_url());
                }
                else{
                    $session->setFlashdata('error', 'Unable to Make Changes at the Moment!. Try Again!');
                    return redirect()->to(current_url());
                }
           }
           else{
               $data['validation'] = $this->validator;
           }
       }
        echo view('admin/master', $data);
    }

    //--------------------------------------------------------------------

    public function social()
	{
        $session = session();
        $RequestModel = new RequestModel();
        $MasterModel = new MasterModel();
        $UserModel = new UsersModel();

        $data['totalRequest'] = $RequestModel->getAll();
        $data['masterInfo'] = $MasterModel->getOne();
        $data['loggedInUser'] = $UserModel->getUniid($session->uniid);

        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

       if($this->request->getMethod() == 'post'){
           $rules = [
               'facebook' => 'required|trim|valid_url',
               'twitter' => 'required|trim|valid_url',
               'instagram' => 'required|trim|valid_url',
               'linkedin' => 'required|trim|valid_url',
           ];
        //    var_dump($this->request->getPost()); die;
           if($this->validate($rules)){
               

                $masterData = [
                    'facebook' => $this->request->getVar('facebook'),
                    'twitter' => $this->request->getVar('twitter'),
                    'instagram' => $this->request->getVar('instagram'),
                    'linkedin' => $this->request->getVar('linkedin'),
                ];

                if($MasterModel->updateSocial($masterData)){
                    $session->setFlashdata('success', 'Social Setup Successfully Updated!');
                    return redirect()->to(base_url('admin/master'));
                }
                else{
                    $session->setFlashdata('error', 'Unable to Make Changes at the Moment!. Try Again!');
                    return redirect()->to(base_url('admin/master'));
                }
           }
           else{
               $data['validation'] = $this->validator;
            //    return redirect()->to(base_url('admin/master'));
           }
       }
    }

    public function services(){
        $data['title'] = 'Services | Zichiteff';
        $session = session();
        $RequestModel = new RequestModel();
        $MasterModel = new MasterModel();
        $ServiceModel = new ServicesModel();
        $UserModel = new UsersModel();

        $data['totalRequest'] = $RequestModel->getAll();
        $data['masterInfo'] = $MasterModel->getOne();
        $data['totalService'] = $ServiceModel->getAll();
        $data['loggedInUser'] = $UserModel->getUniid($session->uniid);

        if(! session()->get('isLoggedIn'))
        return  redirect()->to(base_url('auth'));
        
        if($this->request->getMethod() == 'post'){
            $rules = [
                'service' => 'required',
                'description' => 'required'
            ];

            if($this->validate($rules)){
                $data = [
                    'type' => $this->request->getVar('service',FILTER_SANITIZE_STRING),
                    'description' => $this->request->getVar('description',FILTER_SANITIZE_STRING),
                    'date' => date('Y-m-d h:i:s')
                ];

                if($ServiceModel->insert($data)){
                    $session->setFlashdata('success', 'Service Added!');
                    return redirect()->to(current_url());
                }
                else{
                    $session->setFlashdata('error', 'Unable to handle request at the moment!');
                    return redirect()->to(current_url());
                }
            }
            else{
                $data['validation'] = $this->validator;
            }
        }

        echo view('admin/services', $data);
    }

    public function deleteService(){
        $session = session();
        if($this->request->getMethod() == 'post'){
            $rules = [
                'service' => 'required'
            ];
            // var_dump($this->request->getPost()); die;
            if($this->validate($rules)){
                $ServiceModel = new ServicesModel();
                // var_dump($this->request->getVar('service')); die;
                if($ServiceModel->deleteService($this->request->getVar('service'))){
                    $session->setFlashdata('success', 'Service Deleted!');
                    return redirect()->to(base_url('admin/master/services'));
                }
                else{
                    $session->setFlashdata('error', 'Unable to handle request at the moment!');
                    return redirect()->to(base_url('admin/master/services'));
                }
            }
            else{
                $data['validation'] = $this->validator;
            }
        }
    }
}