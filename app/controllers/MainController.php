<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class MainController extends Controller {
	
    public function home()
    {
        $this->call->model('user_model');
        $data['users'] = $this->user_model->getUsers();
        $this->call->view('home',$data);
    }
    public function adduser()
    {
        $fname = $this->io->post('firstname');
        $lname = $this->io->post('lastname');
        $age = $this->io->post('age');
        $bind = array(
            "first_name" => $fname,
            "last_name" => $lname,
            "age" => $age,
        );
        $this->db->table('crud')->insert($bind);
        redirect('/home');
    }
    public function edit($id)
    {
        $this->call->model('user_model');
        $data['users'] = $this->user_model->getUsers();
        $data['edit'] = $this->user_model->searchUsers($id);
        $this->call->view('home', $data);
       
    }
    public function delete($id)
    {
        if(isset($id)){
            $this->db->table('crud')->where("id", $id)->delete();
        redirect('/home');
        }else{
            $_SESSION['delete'] = "failed to delete";
            redirect('/home');
        }
    }
    public function submitedit($id)
    {
        if(isset($id)){
            $fname = $this->io->post('firstname');
            $lname = $this->io->post('lastname');
            $age = $this->io->post('age');
            $data = [
                "first_name" => $fname,
                "last_name" => $lname,
                "age" => $age,
            ];
            $this->db->table('crud')->where('id', $id)->update($data);
            redirect('/home');
        }
    }
}
?>
