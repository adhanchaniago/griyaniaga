<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('short_number'); //calling helper short number format
        $this->load->library('pagination');
        $this->load->model('meta_model');
          $this->load->model('property_model');

    }
    public function index()
    {


      $id = $this->session->userdata('id');
      $user = $this->user_model->user_detail($id);
      $meta = $this->meta_model->get_meta();



      $config['base_url']       = base_url('property/index/');
      $config['total_rows']     = count($this->property_model->total_row_user());
      $config['per_page']       = 3;
      $config['uri_segment']    = 3;

      //Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
      $config['last_link']        = 'Last';
      $config['next_link']        = 'Next';
      $config['prev_link']        = 'Prev';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';


      //Limit dan Start
      $limit                    = $config['per_page'];
      $start                    = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
      //End Limit Start
      $this->pagination->initialize($config);
      $property = $this->property_model->get_property($limit, $start);

      // End Listing Berita dengan paginasi
      $data = array(
        'title'       => 'Property',
        'deskripsi'   => 'Berita - ' . $meta->description,
        'keywords'    => 'Berita - ' . $meta->keywords,
        'user'        => $user,
        'meta'        => $meta,
        'property'    => $property,
        'pagination'    => $this->pagination->create_links(),
        'content'       => 'front/home/index_home'
      );
      $this->load->view('front/layout/wrapp', $data, FALSE);











    }
}
