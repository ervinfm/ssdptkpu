<?php defined('BASEPATH') or exit('No direct script access allowed');

class Statistik extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        login();
    }

    public function index()
    {
        $this->template->load('user/template', 'user/statistik/index');
    }
}
