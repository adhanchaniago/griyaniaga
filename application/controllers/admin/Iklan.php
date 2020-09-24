<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iklan extends CI_Controller
{
  //load data
  public function __construct()
  {
    parent::__construct();
    $this->load->model('category_model');
    $this->load->model('images_model');
    $this->load->model('iklan_model');
    $this->load->library('pagination');

    $id = $this->session->userdata('id');
    $user = $this->user_model->user_detail($id);
    if ($user->role_id == 2) {
      redirect('admin/dashboard');
    }
  }
  //listing data berita
  public function index()
  {
    $iklan = $this->iklan_model->get_alliklan();
    $data = [
      'title'         => 'Iklan Saya',
      'iklan'         => $iklan,
      'pagination'    => $this->pagination->create_links(),
      'content'       => 'admin/iklan/index_iklan'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);
  }
  // Create Iklan Property
  public function create(){
      // Validasi
      $this->form_validation->set_rules(
        'iklan_title',
        'Judul Iklan',
        'required',
        [
          'required'      => 'Judul Iklan harus di isi',
        ]
      );

      if ($this->form_validation->run()) {

        $data = [
          'iklan_title'   => $this->input->post('iklan_title'),
          // 'file1'         => $file1,
          // 'file2'         => $file2
        ];
        $insert_id = $this->iklan_model->create($data);
        $this->upload_images($insert_id);
        $this->session->set_flashdata('message', 'Data Iklan telah ditambahkan');
        redirect(base_url('admin/iklan'), 'refresh');

      }else{

        $data = [
          'title'         => 'Pasang Iklan Property',
          'pagination'    => $this->pagination->create_links(),
          'category'      => $category,
          'content'       => 'admin/iklan/create_property'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);

      }


  }
  // Update Iklan Property
  public function update($id){
      // Validasi
      $this->form_validation->set_rules(
        'iklan_title',
        'Judul Iklan',
        'required',
        [
          'required'      => 'Judul Iklan harus di isi',
        ]
      );

      if ($this->form_validation->run()) {

        $data = [
          'iklan_title'   => $this->input->post('iklan_title'),
          // 'file1'         => $file1,
          // 'file2'         => $file2
        ];
        $insert_id = $this->iklan_model->create($data);
        $this->upload_images($insert_id);
        $this->session->set_flashdata('message', 'Data Iklan telah ditambahkan');
        redirect(base_url('admin/iklan'), 'refresh');

      }else{

        $data = [
          'title'         => 'Pasang Iklan Property',
          'pagination'    => $this->pagination->create_links(),
          'category'      => $category,
          'content'       => 'admin/iklan/create_property'
        ];
        $this->load->view('admin/layout/wrapp', $data, FALSE);

      }

  }

  public function upload_images($insert_id){

    $config['upload_path']          = './assets/img/iklan/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 5000; //Dalam Kilobyte
    $config['max_width']            = 5000; //Lebar (pixel)
    $config['max_height']           = 5000; //tinggi (pixel)
    $config['encrypt_name']         = TRUE;
    $this->load->library('upload', $config);

    for ($i=1; $i <=3 ; $i++) {
      if(!empty($_FILES['file'.$i]['name'])){
        if(!$this->upload->do_upload('file'.$i));
        // $data2 = $this->upload->data();



        //Proses Manipulasi Gambar
        $upload_data    = array('uploads'  => $this->upload->data());

        // Resize Image
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/img/iklan/' . $upload_data['uploads']['file_name'];
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 500;
        $config['height']           = 500;
        $config['thumb_marker']     = '';
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();

        // Watermark Image
        $config['image_library']    = 'gd2';
        $config['source_image']     = './assets/img/iklan/' . $upload_data['uploads']['file_name'];
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './assets/img/logo/logo-watermark.png';
        $config['wm_opacity'] = 50;
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();



        // $file = $data2['file_name'];


        $data = [
          'iklan_id'      => $insert_id,
          'file'         =>  $upload_data['uploads']['file_name'],
          'date_created'  => time()
        ];
        $this->images_model->create($data);
      }

    }

  }

  // View

  public function view($id){
    $iklan = $this->iklan_model->iklan_detail($id);
    $gambar = $this->images_model->gambar_iklan($id);

    $data = [
      'title'        => 'View iklan',
      'iklan'     => $iklan,
      'gambar'    => $gambar,
      'content'          => 'admin/iklan/view_iklan'
    ];
    $this->load->view('admin/layout/wrapp', $data, FALSE);

  }

  public function delete($id){
    //Proteksi delete
    is_login();

    $iklan = $this->iklan_model->iklan_detail($id);
    $images = $this->images_model->gambar_iklan($id);
    //Hapus gambar

    if ($images->file != "") {
      unlink('./assets/img/iklan/' . $images->file);
      // unlink('./assets/img/artikel/thumbs/' . $berita->berita_gambar);
    }
    //End Hapus Gambar
    $data = ['id'   => $iklan->id];
    $this->iklan_model->delete($data);
    $this->session->set_flashdata('message', 'Data telah di Hapus');
    redirect($_SERVER['HTTP_REFERER']);
  }


}
