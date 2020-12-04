<?php namespace App\Controllers;

// import configurations
use Config\Services;
use Config\Database;

// import model
use App\Models\UsersModel;
use App\Models\MasterModel;

class Zealmaster extends BaseController
{

    public function __construct()
    {
        helper(['form','url','date']);
    }

    public function update()
	{
        $data['title'] = 'Zealtech | Master';
        $session = session();

        if($this->request->getMethod() == 'post'){
            $rules = [
                // 'old_pass' => [
                //     'rules' => 'required|min_length[8]|numeric',
                //     'errors' =>[
                //         'min_length' => 'Failed contact admin!',
                //         'required' => 'Failed contact admin!',
                //         'numeric' => 'Failed contact admin!'
                //     ]
                // ],

                'password' => [
                    'rules' => 'required|min_length[8]|numeric',
                    'errors' =>[
                        'min_length' => 'Failed contact admin!',
                        'required' => 'Failed contact admin!',
                        'numeric' => 'Failed contact admin!'
                    ]
                ],

                // 'confirm_pass' => [
                //     'rules' => 'required|min_length[8]|numeric|matches[password]',
                //     'errors' =>[
                //         'min_length' => 'Failed contact admin!',
                //         'required' => 'Failed contact admin!',
                //         'numeric' => 'Failed contact admin!',
                //         'matches' => 'Both Password do not match'
                //     ]
                // ],
            ];

            if($this->validate($rules)){
                $MasterModel = new MasterModel();
                $hashCode = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

                $data = [
                    'master_code' => $hashCode,
                    'expires_at' => date('Y-m-d h:i:s', strtotime('+1 year'))
                ];

                if($MasterModel->updateUser($data)){
                    $session->setFlashdata('success', 'Successfully updated!');
                    return redirect()->to(current_url());
                }
                else{
                    $session->setFlashdata('error', 'Unable to perform action at the moment!');
                    return redirect()->to(current_url());
                }
            }
            else{
                $data['validation'] = $this->validator;
            }
        }
        echo view('master/zealmaster', $data);
	}

	//--------------------------------------------------------------------
}