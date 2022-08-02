<?php

namespace App\Modules\Authentication\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Authentication extends BaseController
{

    public function __construct()
    {
        helper(['form']);
        $this->CommonModel = new CommonModel();
        // $this->table = "users";
    }

    public function index()
    {
        $SessionCheck = session()->get('TeacherSession');
        if (!empty($SessionCheck)) {
            return redirect()->to(base_url('teacher_dashboard'));
        }

        $data['main_modules'] = 'Authentication';
        $data['main_page'] = 'Authentication_login';

        echo view('Authentication/template', $data);
    }

    public function authenticate()
    {
        $SessionCheck = session()->get('TeacherSession');
        if (!empty($SessionCheck)) {
            return redirect()->to(base_url('teacher_dashboard'));
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $filter = array('email' => $email, 'is_deleted' => '0');
        $user = $this->CommonModel->get_single('students', $filter);

        if (is_null($user)) {
            return redirect()->back()->withInput()->with('error', 'Invalid Email.');
        }

        $pwd_verify = password_verify($password, $user->password);

        if (!$pwd_verify) {
            return redirect()->back()->withInput()->with('error', 'Invalid password.');
        }

        session()->set("StudentSession", array(
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'image'         => $user->image,
            'isLoggedIn'    => TRUE
        ));
        session()->setFlashdata('message', 'Login Successfully');
        return redirect()->to(base_url('student_dashboard'));
    }

    public function logout()
    {
        session()->remove("StudentSession");
        session()->setFlashdata('info', 'Logged Out Successfully');
        return redirect()->to(base_url());
    }

    public function register()
    {
        $SessionCheck = session()->get('TeacherSession');
        if (!empty($SessionCheck)) {
            return redirect()->to(base_url('teacher_dashboard'));
        }
        
        helper(['form', 'url']);

        $submit = $this->request->getVar('submit');

        if ($submit == 'submit') {
            $rules = [
                'name'              => ['rules' => 'required|min_length[3]'],
                'email'             => ['rules' => 'required|valid_email|is_unique[users.email]'],
                'password'          => ['rules' => 'required'],
                'confirm_password'  => ['rules' => 'matches[password]']
            ];

            if ($this->validate($rules)) {
                $data = [
                    'name'     => $this->request->getVar('name'),
                    'email'    => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'created'  => date('Y-m-d h:i:s')
                ];

                $insert = $this->CommonModel->common_insert_data($this->table, $data);
                session()->setFlashdata('message', 'New User Register Successfully.');
                return redirect()->to('/');
            } else {
                $data['main_modules'] = 'Authentication';
                $data['main_page'] = 'Authentication_register';
                $data['validation'] = $this->validator;
                echo view('Authentication/template', $data);
            }
        }


        $data['main_modules'] = 'Authentication';
        $data['main_page'] = 'Authentication_register';

        echo view('Authentication/template', $data);
    }
}
