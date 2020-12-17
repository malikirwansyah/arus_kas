<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


 
  var $kiri = "kiri";
  var $title  =   "Data ";

  
  function __construct(){
    parent::__construct();
   
      $this->load->model('home_model');
  }
  protected function template($page,$data)
  {
      $this->load->view('header',$data);     
      $this->load->view($this->kiri);
      $this->load->view($page);   
      $this->load->view('footer');
  }

  public function index()
  {
    redirect('home/data_coa');
  }

  public function nothing()
    {   
        $data = array();
        $row = array();
        $row[] = "";
        $row[] = "";
        $row[] ="";
        $row[] = "";
        $row[] ="";
        $row[] ="";
        $row[] = "";
        $row[] = "";
        $row[] = "";
        $row[] = "";
        $row[] = "";
        $row[] ="";
        $row[] ="";
        $row[] = "";
        $row[] = "";
        $row[] = "";
        $row[] = "";
        $row[] = "";
        $data[] = $row;
        $output = array(
              // "draw" => 0,
                    "recordsTotal" => 0,
                    "recordsFiltered" => 0,
                    "data" => $data,
                );
        echo json_encode($output);
    }

   public function dt_json()
    {
        $data = array();
        $no = $_POST['start'];
        $list = $this->home_model->getData();
        foreach ($list as $customers) {
            $no++;
            
            $row = array();
            
            $row[] = $customers->tgl;
            $row[] = $customers->coa.' - '.$customers->nama;
            $row[] = number_format($customers->debit,2);
            $row[] = number_format($customers->credit,2);
            $row[] = $customers->jurnal_akhir;
            
             
            $data[] = $row;
        }
 
        $output = array(
                        
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->home_model->count_all(),
                        "recordsFiltered" => $this->home_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


  public function data_coa()
  {
      $data['title']  = $this->title;                             
      $data['judul']  = "Data ";
      $data['dt_coa']  =$this->db->get('master_coa');
      $page     = "coa";             
      $this->template($page,$data); 
  }

  public function jurnal()
  {
      $data['title']  = $this->title;                             
      $data['judul']  = "Data ";
      $data['dt_jurnal']  =$this->home_model->getJurnal();
      $page     = "jurnal";             
      $this->template($page,$data); 
  }

  public function arus_kas()
  {
      $data['title']  = $this->title;                             
      $data['judul']  = "Data ";
      $data['dt_coa']  =$this->db->get('master_coa');
      $page     = "arus_kas";             
      $this->template($page,$data); 
  }

 

  
}