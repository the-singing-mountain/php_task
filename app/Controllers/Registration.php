<?php
    namespace App\Controllers;
    use CodeIgniter\Controller;
    use App\Models\UserModel;

    class Registration extends Controller
    {
        public function index()
        {
            helper(['form']);
            $data = [];
            echo view('registration',$data);
        }

        //Storing Registration Information
        public function RegistrationStore()
        {
            $userModel = new UserModel();
            helper(['form']);
            $session = session();

            //Saving to Table
            if($this->validate($userModel -> validationRules)) {

                $data = [
                    'full_name' => $this->request->getVar('full_name'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'is_admin' => TRUE
                ];

                $userModel->save($data);

                //Setting Session Data
                $session_data = [
                    'user_id' => $userModel->where('email', $this->request->getVar('email'))->first(),
                    'name' => $data['full_name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($session_data);

                return redirect()->to('/home');

            }

            else {
                $data['validation'] = $this->validator;
                echo view('registration', $data);
            }
        }
    }
?>