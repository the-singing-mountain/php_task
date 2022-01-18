<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\Files\File;

class Home extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('home', $data);
    }

    //FileUpload Functionality
    public function FileUpload()
    {
        helper(['form']);

        $session = session();

        $header=true;
        $count = 0;

        $userModel = new UserModel();

        $fileName = $this->request->getFile('userfile');
        $ext = esc($fileName->guessExtension());

        if($ext != "csv")
        {
            $session->setFlashdata('error', 'Only CSV accepted. Please insert a CSV file.');
            return redirect()->to('/home');
        }
        $path = WRITEPATH . 'uploads/' . $fileName->store();
        
        $handle = fopen($path, "r");

        while (($details = fgetcsv($handle, 1000, ",")) !== FALSE)
        {
            if ($header == true)
            {
                $header = false;
                continue;
            }
    
            if ($details[0] == '' || $details[1] == '' )
            {
                break;                        
            }            

            //Generating A Random Password
            $chrList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $chrRepeatMin = 1;            
            $chrRepeatMax = 10;
            $chrRandomLength = 10;

            $a = (string) trim($details[0]);
            $b = (string) trim($details[1]);                 
            $c = (string) substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))), 1, $chrRandomLength);

            //Validation
            if(strlen($a) <= 2)
            {
                $session->setFlashdata('error', 'Full name field invalid.');
                return redirect()->to('/home');
            }

            if(filter_var($b, FILTER_VALIDATE_EMAIL) == FALSE)
            {
                $session->setFlashdata('error', 'Email field invalid.');
                return redirect()->to('/home');
            }

            if($userModel->where('email', $b)->first() != NULL){
                $session->setFlashdata('error', 'Email field is not unique.');
                return redirect()->to('/home');
            }

            //Saving To Table
            else
            {
                $admin_id = (int) session()->get('user_id');
                $userModel = new UserModel();
                $data = [
                    'full_name' => $a,
                    'email' => $b,
                    'password' => password_hash($c, PASSWORD_DEFAULT),
                    'created_by' => $admin_id,
                    'is_admin' => FALSE
                ];

                $userModel->save($data);

                $count = $count+1;
            }

            session()->setFlashdata('count',$count);

        }
        return redirect()->to('/home');    
    }

    public function Logout()
    {
        $array = array('name','email','isLoggedIn');
        session()->set('isLoggedIn',FALSE);
        return redirect()->to('/signin');
    }
}
?>