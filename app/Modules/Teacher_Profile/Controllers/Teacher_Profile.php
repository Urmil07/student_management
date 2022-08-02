<?php

namespace App\Modules\Teacher_Profile\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

/**
 * Class Admin
 */
class Teacher_Profile extends BaseController
{

    /**
     * Constructor.
     */

    public function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->table = "teachers";
    }

    public function index()
    {
        $data['page_headline'] = "Teacher Profile";
        $data['page_title'] = "Teacher Profile";
        $data['main_modules'] = "Teacher_Profile";
        $data['main_page'] = "Teacher_Profile";

        $user  = session()->TeacherSession;
        $filter = array('id' => $user['id']);
        $data['teacher'] = $this->CommonModel->get_single($this->table, $filter);
        // print_r($data['teacher']); die;

        echo view('Dashboard/template', $data);
    }

    public function create()
    {
        $user  = session()->TeacherSession;
        $id = $user['id'];
        $submit = $this->request->getVar('submit');

        if ($submit == "Submit") {
            $data = $this->fetch_data_from_post();

            if (is_numeric($id)) {
                if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $filter = array("id" => $id);
                    $query = $this->CommonModel->get_single($this->table, $filter);
                    $data['image'] = $query->image;
                } else {
                    $data['image'] = $_FILES['image']['name'];
                    $file_name = $_FILES['image']['name'];
                    $file_path = $_FILES['image']['tmp_name'];
                    $file_error = $_FILES['image']['error'];

                    $file_destination = 'uploads/teachers/' . $file_name;
                    move_uploaded_file($file_path, $file_destination);
                }
                if (!empty($data['password'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                } else {
                    $filter = array("id" => $id);
                    $query = $this->CommonModel->get_single($this->table, $filter);
                    $data['password'] = $query->password;
                }
                $update = $this->CommonModel->common_update_data($this->table, $id, $data);

                if ($update != false) {
                    session()->setFlashdata('message', 'Teacher Details Updated! Some Update Will Showup After Relogin ');
                    return redirect()->to(base_url('teacher_profile'));
                } else {
                    session()->setFlashdata('info', 'No Changes Found!');
                    return redirect()->to(base_url('teacher_profile'));
                }
            }
        }

        $data = $this->fetch_data_from_db($id);
        $data['page_title'] = 'Update Teacher Details';
        $data['page_headline'] = 'Update Teacher Details';
        $data['main_modules'] = "Teacher_Profile";
        $data['main_page'] = "create";
        $filter = array('id' => 1);
        $data['teacher'] = $this->CommonModel->get_single($this->table, $filter);

        echo view('Dashboard/template', $data);
    }

    // Database Data
    public function fetch_data_from_db($id)
    {
        $filter = array('id' => $id);
        $setting = $this->CommonModel->get_single($this->table, $filter);

        $data['id']             = $setting->id;
        $data['name']           = $setting->name;
        $data['email']          = $setting->email;
        $data['address']        = $setting->address;
        $data['contact']        = $setting->contact;
        $data['image']          = $setting->image;
        return $data;
    }

    // Post Data
    public function fetch_data_from_post()
    {
        $data['id']             = $this->request->getVar('id');
        $data['name']           = $this->request->getVar('name');
        $data['email']          = $this->request->getVar('email');
        $data['address']        = $this->request->getVar('address');
        $data['contact']        = $this->request->getVar('contact');
        $data['image']          = $this->request->getVar('image');
        $data['password']       = $this->request->getVar('password');
        return $data;
    }
}
