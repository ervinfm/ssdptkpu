<?php defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
        admin();
    }

    public function index()
    {
        $this->template->load('admin/template', 'admin/peta/index');
    }
}
