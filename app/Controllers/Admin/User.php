<?php namespace App\Controllers\Admin;
use CodeIgniter\Controller;
// import configurations
use Config\Services;
use Config\Database;

// import model
use App\Models\UsersModel;
use App\Models\MasterModel;
use App\Models\RequestModel;

class User extends Controller
{

    public function __construct()
    {
        helper(['form','url','date']);
    }

    public function index()
	{
        $data['title'] = 'User Management | Zichiteff';
        $session = session();
        $email = \Config\Services::email();
        $RequestModel = new RequestModel();
        $MasterModel = new MasterModel();
        $UserModel = new UsersModel();

        $data['totalRequest'] = $RequestModel->getAll();
        $data['masterInfo'] = $MasterModel->getOne();
        $data['AllUsers'] = $UserModel->getAll();

        if(! session()->get('isLoggedIn'))
        return  redirect()->to(base_url('auth'));
        
        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => [
                    'rules' =>  'required|min_length[5]|valid_email',
                    'errors' => [
                        'valid_email' => 'Please Enter A Valid Email',
                        'required' => 'Email is required'
                    ]
                ], 
                'password' => 'required|min_length[5]',
                'confirmPass' => [
                    'rules' => 'matches[password]|required',
                    'errors' => [
                        'matches' => 'Both Password do not match!'
                    ]
                ]
            ];
            // var_dump($session->firstname); die;
            if($this->validate($rules)){
                $UserModel = new UsersModel();
                $hashedPassword = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
                $UserMail = $UserModel->getEmail($this->request->getVar('email'));
                // var_dump($UserMail->firstname); die;
                $data = [
                    'password' => $hashedPassword
                ];

                if($UserModel->updateEmail($this->request->getVar('email'), $data)){
                    // $session->setFlashdata('success', 'User Password Updated!');
                    // return redirect()->to(base_url('admin/user'));
                    $to = $this->request->getVar('email');
                    $subject = 'Security Info';
                    $message = 'Hello '.$UserMail->firstname.' '.$UserMail->lastname.', <br><br> Your Password has been changed by '.$session->firstname.' '.$session->lastname.'<br>
                    If you are not aware of this changes click on the button below to reset your password and report the activity to the admin.<br><br>
                    <a href="'.base_url().'/auth/forgotPass" target="_blank"><button class="mt-1 btn btn-primary btn-lg">Reset Now</button><br>
                    Regards, Zeal Technologies<br>';

                    $email->setTo($to);
                    $email->setFrom('Zealtechnologies10@gmail.com', 'Security');
                    $email->setSubject($subject);
                    $email->setMessage($message);

                    if($email->send()){
                        $session->setFlashdata('success', 'User Password Updated!');
                        return redirect()->to(base_url('admin/user'));
                    }
                    else{
                        $data = $email->printDebugger(['headers']);
                        print_r($data);
                    }
                }
                else{
                    $session->setFlashdata('error', 'Unable to handle request at the moment. Try again later!');
                    return redirect()->to(base_url('admin/user'));
                }
            }
            else{
                $data['validation'] = $this->validator;
            }
        }
        echo view('admin/user', $data);
    }

    //--------------------------------------------------------------------
    
    public function status()
	{
        $session = session();
        $email = \Config\Services::email();
        $RequestModel = new RequestModel();
        $MasterModel = new MasterModel();
        $UserModel = new UsersModel();

        $data['totalRequest'] = $RequestModel->getAll();
        $data['masterInfo'] = $MasterModel->getOne();
        $data['AllUsers'] = $UserModel->getAll();

        if(! session()->get('isLoggedIn'))
        return  redirect()->to(base_url('auth'));
        
        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => [
                    'rules' =>  'required|min_length[5]|valid_email',
                    'errors' => [
                        'valid_email' => 'Please Enter A Valid Email',
                        'required' => 'Email is required'
                    ]
                ], 
                'status' => 'required|trim',
                'password' => 'required',
            ];
            // var_dump($session->firstname); die;
            if($this->validate($rules)){
                $UserModel = new UsersModel();
                $UserMail = $UserModel->getEmail($this->request->getVar('email'));
                // var_dump($UserMail->firstname); die;
                // get session data from db
                $UserSession = $UserModel->getEmail($session->email);

                if(password_verify($this->request->getVar('password'), $UserSession->password)){
                    $data = [
                        'status' => $this->request->getVar('status', FILTER_SANITIZE_STRING)
                    ];
    
                    if($UserModel->updateEmail($this->request->getVar('email'), $data)){
                        // $session->setFlashdata('success', 'User Password Updated!');
                        // return redirect()->to(base_url('admin/user'));
                        $to = $this->request->getVar('email');
                        $subject = 'Security Info';
                        $message = 'Hello '.$UserMail->firstname.' '.$UserMail->lastname.', <br><br> Your Account status has been changed by '.$session->firstname.' '.$session->lastname.'<br>
                        If you are not aware of this changes, report the activity to the admin.<br><br>
                        Regards, Zeal Technologies<br>';
    
                        $email->setTo($to);
                        $email->setFrom('Zealtechnologies10@gmail.com', 'Security');
                        $email->setSubject($subject);
                        $email->setMessage($message);
    
                        if($email->send()){
                            $session->setFlashdata('success', 'User Status Updated!');
                            return redirect()->to(base_url('admin/user'));
                        }
                        else{
                            $data = $email->printDebugger(['headers']);
                            print_r($data);
                        }
                    }
                    else{
                        $session->setFlashdata('error', 'Unable to handle request at the moment. Try again later!');
                        return redirect()->to(base_url('admin/user'));
                    }
                }
                else{
                    $session->setFlashdata('error', 'Incorrect Password. Unable to change user status!');
                    return redirect()->to(base_url('admin/user'));
                }
            }
            else{
                $data['validation'] = $this->validator;
                return redirect()->to(base_url('admin/user'));
            }
        }
    }

    
    //--------------------------------------------------------------------

    public function right(){
        $session = session();
        $email = \Config\Services::email();
        $RequestModel = new RequestModel();
        $MasterModel = new MasterModel();
        $UserModel = new UsersModel();

        $data['totalRequest'] = $RequestModel->getAll();
        $data['masterInfo'] = $MasterModel->getOne();
        $data['AllUsers'] = $UserModel->getAll();

        if(! session()->get('isLoggedIn'))
        return  redirect()->to(base_url('auth'));
        
        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => [
                    'rules' =>  'required|min_length[5]|valid_email',
                    'errors' => [
                        'valid_email' => 'Please Enter A Valid Email',
                        'required' => 'Email is required'
                    ]
                ], 
                'right' => 'required|trim',
                'password' => 'required',
            ];
            // var_dump($session->firstname); die;
            if($this->validate($rules)){
                $UserModel = new UsersModel();
                $UserMail = $UserModel->getEmail($this->request->getVar('email'));
                // get session data from db
                $UserSession = $UserModel->getEmail($session->email);

                if(password_verify($this->request->getVar('password'), $UserSession->password)){
                    $data = [
                        'rights' => $this->request->getVar('right', FILTER_SANITIZE_STRING)
                    ];
    
                    if($UserModel->updateEmail($this->request->getVar('email'), $data)){
       
                        $to = $this->request->getVar('email');
                        $subject = 'Security Info';
                        $message = 'Hello '.$UserMail->firstname.' '.$UserMail->lastname.', <br><br> Your Account right has been changed by '.$session->firstname.' '.$session->lastname.'<br>
                        . If you are not aware of this changes, report the activity to the admin.<br><br>
                        Regards, Zeal Technologies<br>';
    
                        $email->setTo($to);
                        $email->setFrom('Zealtechnologies10@gmail.com', 'Security');
                        $email->setSubject($subject);
                        $email->setMessage($message);
    
                        if($email->send()){
                            $session->setFlashdata('success', 'User Right Updated!');
                            return redirect()->to(base_url('admin/user'));
                        }
                        else{
                            $data = $email->printDebugger(['headers']);
                            print_r($data);
                        }
                    }
                    else{
                        $session->setFlashdata('error', 'Unable to handle request at the moment. Try again later!');
                        return redirect()->to(base_url('admin/user'));
                    }
                }
                else{
                    $session->setFlashdata('error', 'Incorrect Password. Unable to change user right!');
                    return redirect()->to(base_url('admin/user'));
                }
            }
            else{
                $data['validation'] = $this->validator;
                return redirect()->to(base_url('admin/user'));
            }
        }
    }
}
