<?php

/**
 * Created by PhpStorm.
 * User: andrew
 * Date: 16/08/2016
 * Time: 15:36
 */
class Pages extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('pages_model');
        $this->load->library('user_agent');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->imagefile='';
        $this->errorMessage='';

    }

    public function view($page = 'index')
    {
        if (!file_exists(APPPATH . '/views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $this->output->cache(15);
        $data['filename2']='inprogress.html';
        $data['title'] = 'Home';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
    public function edit()   {
        $data['title'] = 'Home';
        $page= "index";
        $this->output->cache(15);
        $data['filename2']=$this->pages_model->editPage();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
    public function chooseframe($file){
        $data['title'] = 'Home';
        $page= "index";
        $done=false;
        $this->output->cache(15);
        $done=$this->pages_model->copytemplate($file);

        if ($done ){
            $data['filename2']="inprogress.html";
            $this->load->view('templates/header', $data);
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer', $data);
        }
    }
    public function upload(){
        $data['title'] = 'Home';
        $this->output->cache(15);
        $page= "index";
        $data['filename2']='inprogress.html';
        $returns =$this->pages_model->uploadimg();
        $data['imagefile']=$returns[0];
        $this->errorMessage=$returns[1];
        $this->imagefile="<img src='".$data['imagefile']."'' alt='' height='42' width='42'>";

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data,$this->imagefile,$this->errorMessage);
        $this->load->view('templates/footer', $data);
    }

    public function downloadzip(){

       $this->pages_model->zipper();

    }
}