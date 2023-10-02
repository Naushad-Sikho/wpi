<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Constitution extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Constitution_model', 'constitution');
        loggedin();
        error_reporting(0);
    }

    public function index() {
        $columns = array("id", "description", "is_active");
        $data['constitution'] = $this->constitution->getAllData($columns,"constitution");
        $this->load->view('includes/header');
        $this->load->view('constitution', $data);
        $this->load->view('includes/footer');
    }

    function add_constitution() {

        $data = $_POST;

        $add_response = $this->constitution->insertRow("constitution", $data);
        if ($add_response >= 1) {
            echo 1;
        } else {
            echo 0;
        }
    }

// Getting constitution data
    function get_constitution_data() {
        $id = $this->input->post('id');
        $columns = array("id", "description");
        $constitution_data = $this->constitution->getSpecificData($columns, ["id" => $id]);
        echo json_encode($constitution_data);
    }

// Editing constitution
    function edit_constitution() {
        $data = $_POST;
        $id = $data["hidden_id"];
        unset($data["hidden_id"]);

        $add_response = $this->constitution->updateRow("constitution", $data, ["id" => $id]);
        if ($add_response >= 1) {
            echo 1;
        } else {
            echo 0;
        }
    }

// Delete constitution

    function delete_constitution() {

        $id = $_POST['id'];

        $delete_response = $this->constitution->delete_data("constitution", ["id" => $id]);

        if ($delete_response >= 1) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function active_enactive() {

        $is_active = $this->input->post("is_active");
        $id = $this->input->post("id");
        $response = $this->constitution->updateRow("constitution", ["is_active" => $is_active], ["id" => $id]);
    }

}
