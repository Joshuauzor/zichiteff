<?php namespace App\Controllers\Admin;
use CodeIgniter\Controller;
// import configurations
use Config\Services;
use Config\Database;

// import model
use App\Models\UsersModel;
use App\Models\MasterModel;
use App\Models\RequestModel;

class Activity extends Controller
{

    public function __construct()
    {
        helper(['form','url','date']);
    }

    public function index()
	{
        $data['title'] = 'Login Activity | Zichiteff';
        $session = session();
        
        if(! session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

        $RequestModel = new RequestModel();
        $UserModel = new UsersModel();

        $data['totalRequest'] = $RequestModel->getAll();
        $data['loginactivity'] = $UserModel->getloginActivity($session->uniid);
        $data['loggedInUser'] = $UserModel->getUniid($session->uniid);

        echo view('admin/activity', $data);
    }
}