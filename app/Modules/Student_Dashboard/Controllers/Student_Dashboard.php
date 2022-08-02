<?php

namespace App\Modules\Student_Dashboard\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

/**
 * Class Admin
 */
class Student_Dashboard extends BaseController
{

    /**
     * Constructor.
     */

    public function __construct()
    {
        $this->CommonModel = new CommonModel();
        $this->table = "students";
    }

    public function index()
    {
        $data['page_headline'] = "Student Dashboard";
        $data['page_title'] = "Student Dashboard";
        $data['main_modules'] = "Student_Dashboard";
        $data['main_page'] = "Student_Dashboard";
        $user  = session()->StudentSession;
        $filter = array('id' => $user['id']);
        $data['student'] = $this->CommonModel->get_single($this->table, $filter);

        echo view('Dashboard/template', $data);
    }

    public function create()
    {
        $user  = session()->StudentSession;
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

                    $file_destination = 'uploads/students/' . $file_name;
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
                    session()->setFlashdata('message', 'Student Details Updated! Some Update Will Showup After Relogin ');
                    return redirect()->to(base_url('student_dashboard'));
                } else {
                    session()->setFlashdata('info', 'No Changes Found!');
                    return redirect()->to(base_url('student_dashboard'));
                }
            }
        }

        $data = $this->fetch_data_from_db($id);
        $data['page_title'] = 'Update Student Details';
        $data['page_headline'] = 'Update Student Details';
        $data['main_modules'] = "Student_Dashboard";
        $data['main_page'] = "create";
        $filter = array('id' => 1);
        $data['student'] = $this->CommonModel->get_single($this->table, $filter);

        echo view('Dashboard/template', $data);
    }

    // Database Data
    public function fetch_data_from_db($id)
    {
        $filter = array('id' => $id);
        $student = $this->CommonModel->get_single($this->table, $filter);

        $data['id']             = $student->id;
        $data['name']           = $student->name;
        $data['email']          = $student->email;
        $data['address']        = $student->address;
        $data['standard']       = $student->standard;
        $data['grades']         = $student->grades;
        $data['age']            = $student->age;
        $data['image']          = $student->image;
        return $data;
    }

    // Post Data
    public function fetch_data_from_post()
    {
        $data['id']             = $this->request->getVar('id');
        $data['name']           = $this->request->getVar('name');
        $data['email']          = $this->request->getVar('email');
        $data['address']        = $this->request->getVar('address');
        $data['standard']       = $this->request->getVar('standard');
        $data['grades']         = $this->request->getVar('grades');
        $data['age']            = $this->request->getVar('age');
        $data['image']          = $this->request->getVar('image');
        $data['password']       = $this->request->getVar('password');
        return $data;
    }
}
