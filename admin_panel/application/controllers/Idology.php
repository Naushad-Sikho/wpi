<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Idology extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Idology_model', 'idology');
        loggedin();
        error_reporting(0);
    }

    public function index() {
        $columns = array("id", "description", "is_active");
        $data['idology'] = $this->idology->getAllData($columns,"idology");
        $this->load->view('includes/header');
        $this->load->view('idology', $data);
        $this->load->view('includes/footer');
    }

    function add_idology() {

        $data = $_POST;

        $add_response = $this->idology->insertRow("idology", $data);
        if ($add_response >= 1) {
            echo 1;
        } else {
            echo 0;
        }
    }

// Getting banner data
    function get_idology_data() {
        $id = $this->input->post('id');
        $columns = array("id", "description");
        $idology_data = $this->idology->getSpecificData($columns, ["id" => $id]);
        echo json_encode($idology_data);
    }

// Editing idology
    function edit_idology() {
        $data = $_POST;
        $id = $data["hidden_id"];
        unset($data["hidden_id"]);

        $add_response = $this->idology->updateRow("idology", $data, ["id" => $id]);
        if ($add_response >= 1) {
            echo 1;
        } else {
            echo 0;
        }
    }

// Delete idology

    function delete_idology() {

        $id = $_POST['id'];

        $delete_response = $this->idology->delete_data("idology", ["id" => $id]);

        if ($delete_response >= 1) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function active_enactive() {

        $is_active = $this->input->post("is_active");
        $id = $this->input->post("id");
        $response = $this->idology->updateRow("idology", ["is_active" => $is_active], ["id" => $id]);
    }

}
