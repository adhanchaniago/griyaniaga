<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->library('Mobile_Detect');
    $this->load->helper('short_number'); //calling helper short number format
    $this->load->library('pagination');
    $this->load->model('meta_model');
    $this->load->model('property_model');


    // function detect_mobile()
    // {
    //   if (preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|playbook|sagem|sharp|sie-|silk|smartphone|sony|symbian|t-mobile|telus|up.browser|up.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']))
    //     return true;
    //   else
    //     return false;
    // }
  }
  public function index()
  {

    // $mobile = detect_mobile();

    $id = $this->session->userdata('id');
    $user = $this->user_model->user_detail($id);
    $meta = $this->meta_model->get_meta();
    $popular_property = $this->property_model->get_property_popular();


    // Tampilan Mobile Version
    $data = array(
      'title'       => 'Property',
      'deskripsi'   => 'Berita - ' . $meta->description,
      'keywords'    => 'Berita - ' . $meta->keywords,
      'user'        => $user,
      'meta'        => $meta,
      'popular_property'    => $popular_property,
      'pagination'    => $this->pagination->create_links(),
      'content'       => 'mobile/home/index_home'
    );
    $this->load->view('mobile/layout/wrapp', $data, FALSE);
  }
}
