<?php

namespace App\Modules\Teacher_Dashboard\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

/**
 * Class Admin
 */
class Teacher_Dashboard extends BaseController
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
        $data['page_headline'] = "Teacher Dashboard";
        $data['page_title'] = "Teacher Dashboard";
        $data['main_modules'] = "Teacher_Dashboard";
        $data['main_page'] = "Teacher_Dashboard";


        $filter = array("is_deleted" => '0');
        $data['students'] = $this->CommonModel->get_by_condition($this->table, $filter);
        echo view('Dashboard/template', $data);
    }

    // Create And Update Function
    public function create()
    {
        $update_id = $this->request->uri->getSegment(3);
        $submit = $this->request->getVar('submit');

        if ($submit == "Submit") {
            $data = $this->fetch_data_from_post();
            if (is_numeric($update_id)) {

                if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $filter = array("id" => $update_id);
                    $query = $this->CommonModel->get_single('students', $filter);
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
                    $filter = array("id" => $update_id);
                    $query = $this->CommonModel->get_single($this->table, $filter);
                    $data['password'] = $query->password;
                }

                $update = $this->CommonModel->common_update_data($this->table, $update_id, $data);

                if ($update != false) {
                    session()->setFlashdata('message', 'Student Details Updated!');
                    return redirect()->to(base_url('teacher_dashboard'));
                } else {
                    session()->setFlashdata('info', 'No Changes Found!');
                    return redirect()->to(base_url('teacher_dashboard'));
                }
            } else {

                if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $data['image'] = "";
                } else {
                    $data['image'] = $_FILES['image']['name'];
                    $file_name = $_FILES['image']['name'];
                    $file_path = $_FILES['image']['tmp_name'];
                    $file_error = $_FILES['image']['error'];

                    $file_destination = 'uploads/students/' . $file_name;
                    move_uploaded_file($file_path, $file_destination);
                }

                $filter = array("email" => $data['email']);
                $query = $this->CommonModel->get_single('students', $filter);

                if (!is_null($query)) {
                    return redirect()->back()->withInput()->with('error', 'Email Already Exist.');
                }

                $data['created']    = date('Y-m-d h:i:s');
                $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

                $insert = $this->CommonModel->common_insert_data($this->table, $data);

                $query = $this->CommonModel->custome_query('SELECT id FROM students WHERE id = (SELECT MAX(id) FROM students)');

                if ($insert != false) {
                    session()->setFlashdata('message', 'New Student Added!');
                    return redirect()->to(base_url('teacher_dashboard/create/' . $query[0]->id));
                } else {
                    session()->setFlashdata('error', 'Something Went Wrong!');
                    return redirect()->to(base_url('teacher_dashboard/create'));
                }
            }
        }

        if ((is_numeric($update_id)) && ($submit != "Submit")) {
            $data = $this->fetch_data_from_db($update_id);
        } else {
            $data = $this->fetch_data_from_post();
        }

        if (!is_numeric($update_id)) {
            $data['page_title'] = "Add New Student";
            $data['page_headline'] = "Add New Student";
        } else {
            $data['page_title'] = "Update Student Details";
            $data['page_headline'] = "Update Student Details";
        }

        $data['main_modules'] = "Teacher_Dashboard";
        $data['main_page'] = "create";
        $data['update_id'] = $update_id;

        echo view('Dashboard/template', $data);
    }

    // Database Data
    public function fetch_data_from_db($update_id)
    {
        $filter = array("id" => $update_id);
        $query = $this->CommonModel->get_by_condition($this->table, $filter);
        foreach ($query as $row) {
            $data['name']       = $row->name;
            $data['email']      = $row->email;
            $data['age']        = $row->age;
            $data['standard']   = $row->standard;
            $data['address']    = $row->address;
            $data['grades']     = $row->grades;
            $data['image']      = $row->image;
        };
        return $data;
    }

    // Post Data
    public function fetch_data_from_post()
    {
        $data['name']               = $this->request->getVar('name');
        $data['email']              = $this->request->getVar('email');
        $data['password']           = $this->request->getVar('password');
        $data['age']                = $this->request->getVar('age');
        $data['standard']           = $this->request->getVar('standard');
        $data['address']            = $this->request->getVar('address');
        $data['grades']             = $this->request->getVar('grades');
        $data['image']              = $this->request->getVar('image');
        return $data;
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);
        $update_data = array(
            "is_deleted"    => 1,
            "id"            => $id,
        );

        $update = $this->CommonModel->common_update_data($this->table, $id, $update_data);

        if ($update != false) {
            session()->setFlashdata('message', 'Student Deleted!');
            return redirect()->to(base_url('teacher_dashboard'));
        } else {
            session()->setFlashdata('error', 'Something Went Wrong!');
            return redirect()->to(base_url('teacher_dashboard'));
        }
    }
}
