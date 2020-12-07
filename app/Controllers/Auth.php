<?php namespace App\Controllers;

// import configurations
use Config\Services;
use Config\Database;

// import model
use App\Models\UsersModel;
use App\Models\MasterModel;

class Auth extends BaseController
{

    public function __construct()
    {
        helper(['form','url','date']);
    }
    /**
	 * The login method is below
	*/
    public function index(){
        $session = session();
        $data['title'] = 'Login | Zichiteff';

        // validation rules
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
            ];

            if($this->validate($rules)){
               	// CHECK LOGIN ATTEMPT
                $throttler = \Config\Services::throttler();
                $allow = $throttler->check('login',3,MINUTE);

                if($allow){
                    $UserModel = new UsersModel();

                    $user = $UserModel->getEmail($this->request->getVar('email'), FILTER_SANITIZE_EMAIL); //get user emaii from user tables
                    if($user){
                        $confirmPass = password_verify($this->request->getVar('password'), $user->password); //confirm if the password is same with encrypted pw in table
                        if($confirmPass){
                            // confirm user status
                            if($user->status == 'active'){
                                // save login activity
                                $loginInfoData = [
                                    'uniid' => $user->uniid,
                                    'agent' => $this->getUserAgentInfo(), // get from the private method below
                                    'ip' => $this->request->getIPAddress(),
                                    'login_time' => date('Y-m-d h:i:s')
                                ];
                                $loginActivityID = $UserModel->insertLoginInfo($loginInfoData); //save into login activity table
                                if($loginActivityID){
                                    $session->set('loggedInfo', $loginActivityID);
                                } //set info into a session data
                                // ends here
                                $this->setUserSession($user); //set user into another session
                                return redirect()->to(base_url('admin/home'));
                            }
                            else{
                                //if user account is not active then show message
                                $session->setFlashdata('error', 'Please check your mail to activate your account or contact Admin');
                                return redirect()->to(current_url());
                            }
                        }
                        else{
                            //if user password is wrong then show message
                            $session->setFlashdata('error', 'Incorrect Email and/or Password');
                            redirect()->to(base_url());
                        }
                    }
                    else{
                        //if user email does not exist in database then show message
                        $session->setFlashdata('error', 'Incorrect Email and/or Password');
                        redirect()->to(base_url('auth'));
                    }
                }
                else{
                    //if throttler fails then block attempt and show message
                    $session->setFlashdata('error', 'Max no. of failed login attempts. Try again after a minute!');
					return redirect()->to(base_url('auth'));
                }
            }
            else{
                //else throw all error occured during validation
                $data['validation'] = $this->validator;
            }
        }
        echo view('auth/login', $data);
	}

	//--------------------------------------------------------------------

    // Registration algorithm
    public function register(){
        $data['title'] = 'Register | Zichiteff';
        $email = \config\Services::email();
        $session = session();

        if(! $session->get('isLoggedIn'))
        return redirect()->to(base_url('auth')); //only logged in user can have access to the method

        if($this->request->getMethod() == 'post'){
            $rules = [
				// user info validation
				'firstname' => 'required|trim',
				'lastname' => 'required|trim',
				'email' => [
					// custom error message for used emails
					'rules' => 'required|min_length[6]|valid_email|is_unique[users.email]|trim',//is unique checks table and the column name and fails if it exist
					'errors' => [
						'is_unique' => '{value} is not available!', //value is user to display the value of that field in the error message
						'valid_email' => 'Use a valid email'
					]
                ],
                'gender' => 'required|trim',
				'phone' => 'required|trim|min_length[8]|numeric',
				'password' => [
					'rules' => 'required|min_length[5]',
					'errors' => [
						'min_length' => 'Password is too short'
					]
				],
				'confirm_pass' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'matches' => 'Both Password do not match '
                    ]
                ],
                'master_code' => 'required',
            ];

            if($this->validate($rules)){
                $UserModel = new UsersModel();

                $uniid = md5(str_shuffle('hahhahueidnkaas939eaeadewiq722g3eddajndf')); //create unique user id using md5 hash algorithm
                $hashedPass = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT); //hash the given password
                $userdata = [
                    'uniid' => $uniid,
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'gender' => $_POST['gender'],
                    'phone' => $_POST['phone'],
                    'password' => $hashedPass,
                ];

                if($UserModel->insert($userdata)){ //if data is insert send mail for account activation as the datatype is enum which makes all new users inactive at first
                    $to = $this->request->getVar('email');
                    $subject = 'Account Activation';
                    $message = 'Dear '.$this->request->getVar('firstname', FILTER_SANITIZE_STRING).' '.$this->request->getVar('lastname', FILTER_SANITIZE_STRING).',<br><br> Your Zichiteff Account has been created successfully. <br><br> Kindly click the button below to activate your account.<br>
                    Click here.<a href="'.base_url().'/auth/activate/'.$uniid.'" target="_blank"><button class="mt-1 btn btn-primary btn-lg">Activate Now</button>
                    </a><br>Thanks, Zeal Technologies<br>';

                    $email->setTo($to);
                    $email->setFrom('Zealtechnologies10@gmail.com', 'Info');
                    $email->setSubject($subject);
                    $email->setmessage($message);
                    /*$filepath = '';
                    $email->attach($filepath); */
                    
                    if($email->send()){
                        // echo "success";
                        $session->setFlashdata('success', 'Account created successfully. Please check your mail to activate your account within an hour.');
                        return redirect()->to(current_url());
                    }
                    else{
                        $data = $email->printDebugger(['headers']);
                        print_r($data);
                    }
                }
                else{
                    $session->setFlashdata('error', 'Opps!!! An Error occured');
                    return redirect()->to(current_url());
                }
            }
            else{
                $data['validation'] = $this->validator;
            }
        }

        echo view('auth/register', $data);

    }

    //--------------------------------------------------------------------
    // activate registered account
    public function activate($uniid = null){
        $session = session();
        $data['title'] = 'Activate Account | Zichiteff';

        if(!empty($uniid)){ //unique id must not be empty
            $UserModel = new UsersModel();
            $user = $UserModel->getUniid($uniid);
            if($user){ //check if uniid exist
                if($this->checkRegExpTIme($user->created_at)){ //check if the registration time is less than an hour
                    if($user->status == 'inactive'){
                        $data = [
                            'status' => 'active'
                        ];
                        // change status

                        if($UserModel->updateUser($uniid, $data)){
                            $session->setFlashdata('success', 'Account activated!. You can now Login');
							return redirect()->to(base_url('auth'));
                        }
                        else{
                            $data['error'] = 'Opps! Operation cannot be performed at the moment. Contact Admin!';
                        }
                    }
                    else{
						$session->setFlashdata('success', 'Account already activated. Login');
                        return redirect()->to(base_url('auth'));
                    }
                }
                else{
                    $data['error'] = 'Activation link expired. Contact admin';
                }
            }
            else{
                $data['error'] = 'Opps! Account does not exist!';
            }
        }
        else{
            $data['error'] = 'Opps! Unable to handle your request at the moment';
        }
        echo view('auth/activate', $data);
    }
     //--------------------------------------------------------------------
    // check if registration activation time is less than an hour
     private function checkRegExpTIme($regTime){
        $currTime = now();
		$regTime = strtotime($regTime);
		$diffTime = $currTime - $regTime;

		if(3600 > $diffTime){
			return true;
		}
		else{
			return false;
		}
     }

    // Registration algorithm ends
    //--------------------------------------------------------------------
    //  forgot password algorithm
    /**
     * use the email to check the database and get the uniid 
     */
    public function forgotPass(){
        $session = session();
        $email = \Config\Services::email();

        $data['title'] = 'Forgot Password | Zichiteff';

        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => [
					// custom error message for used emails
					'rules' => 'required|min_length[6]|valid_email|trim',
					'errors' => [
						'is_unique' => '{value} is not available!',
						'valid_email' => 'Use a valid email'
					]
                ],
            ];

            if($this->validate($rules)){
                $UserModel = new UsersModel();
                $user = $UserModel->getEmail($this->request->getVar('email'), FILTER_SANITIZE_EMAIL);
                if($user){
                    $userdata = [
						'updated_at' => date('Y-m-d h:i:s')
                    ];
                    
                    if($UserModel->updateUser($user->uniid, $userdata)){
                        $to = $this->request->getVar('email');
                        $subject = 'Reset Password';
                        $message = 'Hello '.$this->request->getVar('firstname', FILTER_SANITIZE_STRING).' '.$this->request->getVar('lastname', FILTER_SANITIZE_STRING).',<br><br> A password request link has been sent to you, if this activity was not done by you please contact the admin to secure your account. <br><br> Click on the button below to reset your password.<br><br>
                        <br><a href="'.base_url().'/auth/resetPass/'.$user->uniid.'" target="_blank"><button class="mt-1 btn btn-primary btn-lg">Reset Password</button>
                        </a><br>Thanks, Joshua<br>';

                        $email->setTo($to);
                        $email->setFrom('zealtechnologies10@gmail.com', 'Info');
                        $email->setSubject($subject);
                        $email->setmessage($message);

                        if($email->send()){
                            $session->setFlashdata('success', 'A password reset link has been sent to your email. Please verify within 15mins');
                            return redirect()->to(current_url());
                        }
                        else{
                            $data = $email->printDebugger(['headers']);
                            print_r($data);
                        }
                    }
                    else{
                        $session->setFlashdata('error', 'Unable to reset. Try again!');
                        return redirect()->to(current_url());
                    }
                }
                else{
                    $session->setFlashdata('error', 'Opps! User not available!');
                    return redirect()->to(current_url());
                }
            }
            else{
                $data['validation'] = $this->validator;
            }
        }
        echo view('auth/forgotPass', $data);
    }

    //--------------------------------------------------------------------

    public function resetPass($uniid = null){
        $session = session();
        $email = \Config\Services::email();

        $data['title'] = 'Reset Password | Zichiteff';

        if(!empty($uniid)){
            $UserModel = new UsersModel();

            $user = $UserModel->getUniid($uniid); //check if uniid exist
            if($user){
                if($this->checkResetExpTime($user->updated_at)){ //confirm reset time from reset time method
                    if($this->request->getMethod() == 'post'){
                        $rules = [
                            'password' => [
                                'rules' => 'required|min_length[5]',
                                'errors' => [
                                    'min_length' => 'Password is too short'
                                ],
                            ],
                            'confirmPass' => [
                                'rules' => 'matches[password]',
                                'errors' => [
                                    'matches' => 'Both Password do not match'
                                ]
                            ]
                        ];
    
                        if($this->validate($rules)){
                            $hashedPassword = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
							$userdata = [
								'password' => $hashedPassword
							];
							$updateUser = $UserModel->updateUser($uniid, $userdata);

							if($updateUser){
								$session->setFlashdata('success', 'Password successfully updated!. You can now login');
                                return redirect()->to(base_url('auth'));
							}
							else{
								$session->setFlashdata('error', 'Unable to update password');
                                return redirect()->to(base_url());
							}
                        }
                        else{
                            $data['validation'] = $this->validator;
                        }
                    }
                }
                else{
                    $data['error'] = 'Reset link was  expired!!'; //use data to avoid page reload but maintain logic in the view
                }
            }
            else{
                $data['error'] = 'Opps! Unable to find your account!!';
            }
        }
        else{
			$data['error'] = 'Opps! Unauthorised access!';
        }
        echo view('auth/resetPass', $data);
    }

    //--------------------------------------------------------------------

    // check if password reset time is less than 15mins
    private function checkResetExpTime($resetTime){
        $currTime = now();
		$regTime = strtotime($resetTime);
		$diffTime = ($currTime - $regTime)/60;

		
		if(737 > $diffTime){
			return true;
		}
		else{
			return false;
		}
    }
    //  forgot password algorithm
    //--------------------------------------------------------------------
    // save the user data into a session data
    private function setUserSession($user){
        $db = \Config\Database::connect();
        $UserModel = new UsersModel();
        $data = [
            'id' => $user->id,
            'email' => $user->email,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            // 'position' => $user->position,
            'sex' => $user->gender,
            'phone' => $user->phone,
            'isLoggedIn' => true,
            'uniid' => $user->uniid,
        ];
        session()->set($data);
        return true;

    }

    //--------------------------------------------------------------------

    // get browser info
    private function getUserAgentInfo(){
        $agent = $this->request->getUserAgent();

        if($agent->isBrowser()){
            $currentAgent = $agent->getBrowser();
        }
        elseif($agent->isRobot()){
            $currentAgent = $this->agent->robot();
        }
        elseif($agent->isMobile()){
            $currentAgent = $agent->getMobile();
        }
        else{
            $currentAgent = 'Unidentified User Agent';
        }

        return $currentAgent;
    }

    //--------------------------------------------------------------------
    //destroy logged in session
    public function logout(){
        $session = session();
        $UserModel = new UsersModel();
        if($session->has('loggedInfo')){
            $id = $session->get('loggedInfo'); //that model return only insertID
            $UserModel->updateLogoutTime($id);
        }

        $session->destroy();
        return redirect()->to(base_url('auth'));
    }
}
