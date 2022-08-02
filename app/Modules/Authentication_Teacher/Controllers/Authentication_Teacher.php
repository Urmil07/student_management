<?php

namespace App\Modules\Authentication_Teacher\Controllers;

use App\Controllers\BaseController;
use App\Modules\Authentication_Teacher\Models\Authentication_Teacher_Model;
use App\Models\CommonModel;

class Authentication_Teacher extends BaseController
{

    public function __construct()
    {
        helper(['form']);
        $this->Authentication_Teacher_Model = new Authentication_Teacher_Model();
        $this->CommonModel = new CommonModel();
        $this->table = "teachers";
    }

    public function index()
    {
        $data['main_modules'] = 'Authentication_Teacher';
        $data['main_page'] = 'Authentication_teacher_login';

        echo view('Authentication/template', $data);
    }

    public function authenticate()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $teachers = $this->Authentication_Teacher_Model->where('email', $email)->first();

        if (is_null($teachers)) {
            return redirect()->back()->withInput()->with('error', 'Invalid Email.');
        }

        $pwd_verify = password_verify($password, $teachers['password']);

        if (!$pwd_verify) {
            return redirect()->back()->withInput()->with('error', 'Invalid password.');
        }

        session()->set("TeacherSession", array(
            'id'            => $teachers['id'],
            'name'          => $teachers['name'],
            'email'         => $teachers['email'],
            'contact'       => $teachers['contact'],
            'image'         => $teachers['image'],
            'isLoggedIn'    => TRUE
        ));
        session()->setFlashdata('message', 'Login Successfully');
        return redirect()->to(base_url('teacher_dashboard'));
    }

    public function logout() {
        session()->remove("TeacherSession");
        session()->setFlashdata('info', 'Logged Out Successfully');
        return redirect()->to(base_url('authentication_teacher'));
    }

    public function register()
    {
        helper(['form', 'url']);

        $submit = $this->request->getVar('submit');

        if ($submit == 'submit') {
            $rules = [
                'name'              => ['rules' => 'required|min_length[3]'],
                'email'             => ['rules' => 'required|valid_email|is_unique[teachers.email]'],
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


        $data['main_modules'] = 'Authentication_Teacher';
        $data['main_page'] = 'Authentication_teacher_register';

        echo view('Authentication/template', $data);
    }
}
