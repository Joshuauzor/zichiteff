<?php namespace App\Controllers\Admin;
use CodeIgniter\Controller;
// import configurations
use Config\Services;
use Config\Database;

// import model
use App\Models\UsersModel;
use App\Models\MasterModel;
use App\Models\RequestModel;

class Home extends Controller
{

    public function __construct()
    {
        helper(['form','url','date']);
    }

    public function index()
	{
        $data['title'] = 'Dashboard | Zichiteff';
        $session = session();
        
        if(!  session()->get('isLoggedIn'))
		return  redirect()->to(base_url('auth'));

        $RequestModel = new RequestModel();
        $UserModel = new UsersModel();
        // var_dump(session()->get()); die;
        // var_dump(session()->get('email')); die;

        $data['totalRequest'] = $RequestModel->getAll();
        $data['getPending']  = $RequestModel->getPending();
        $data['getInProgress']  = $RequestModel->getInProgress();
        $data['getOnhold']  = $RequestModel->getOnhold();
        $data['getCompleted']  = $RequestModel->getCompleted();
        $data['getRecentReq'] =  $RequestModel->getRecentReq();
        $data['totalUsers'] =  $UserModel->getAll();
        $data['loggedInUser'] = $UserModel->getUniid($session->uniid);

        echo view('admin/dashboard', $data);
    }

    //--------------------------------------------------------------------
}