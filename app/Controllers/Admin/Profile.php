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

class Profile extends Controller
{

    public function __construct()
    {
        helper(['form','url','date']);
    }

    //--------------------------------------------------------------------

    public function index(){
        $data['title'] = 'Profile | Zichiteff';
        $session = session();
        $RequestModel = new RequestModel();
        $MasterModel = new MasterModel();
        $ServiceModel = new ServicesModel();
        $UserModel = new UsersModel();

        $data['totalRequest'] = $RequestModel->getAll();
        $data['masterInfo'] = $MasterModel->getOne();
        $data['totalService'] = $ServiceModel->getAll();
        $data['loggedInUser'] = $UserModel->getUniid($session->uniid);
        // var_dump($data['loggedInUser']); die;

        if(! session()->get('isLoggedIn'))
        return  redirect()->to(base_url('auth'));
        

        echo view('admin/profile', $data);
    }

    //--------------------------------------------------------------------

    public function upload(){
        $data['title'] = 'Profile | Zichiteff';
        $session = session();
        $RequestModel = new RequestModel();
        $MasterModel = new MasterModel();
        $ServiceModel = new ServicesModel();
        $UserModel = new UsersModel();

        $data['totalRequest'] = $RequestModel->getAll();
        $data['masterInfo'] = $MasterModel->getOne();
        $data['totalService'] = $ServiceModel->getAll();
        $data['loggedInUser'] = $UserModel->getUniid($session->uniid);
        // var_dump($data['loggedInUser']); die;
        header('Content-Type: application/json');
        if(! session()->get('isLoggedIn'))
        return  redirect()->to(base_url('auth'));
        
        if($this->request->getMethod() == 'post'){
            $rules = [
				'avatar' => 'uploaded[avatar] |max_size[avatar,1024] |ext_in[avatar,png,jpg,jpeg]'
            ];

            if($this->validate($rules)){
                // code
                $file = $this->request->getFile('avatar');
                if($file->isValid() && !$file->hasMoved()){
                    //provide random name for file to avoid clash
                    if($file->move(FCPATH.'public\avatar', $file->getRandomName())){
                        $path = base_url().'/public/avatar/'.$file->getName();
                        // insert into db
                        $data = [
                            'profile_pics' => $path
                        ];
                        $uploadAvatar = $UserModel->updateUser($session->uniid, $data);
                        if($uploadAvatar == true){
                            echo json_encode('success');
                        }
                        else{
                            echo json_encode('error');
                            // $session->setFlashdata('error', 'Sorry! Unable to upload Avatar');
                            // return redirect()->to(base_url('admin/profile'));
                        }
                    }
                    else{
                        echo json_encode('error');
                        // $session->setFlashdata('error', $file->getErrorString());
                        // return redirect()->to(base_url('admin/profile'));
                    }
                }
                else{
                    echo json_encode('error');
                    // $session->setFlashdata('error', 'Opps!, You have uploaded an invalid file');
                    // return redirect()->to(base_url('admin/profile'));
                }
            }
            else{
                // $data['validation'] = $this->validator;
                // return redirect()->to(base_url('admin/profile'));
                echo json_encode('error');
            }
        }
    }
}