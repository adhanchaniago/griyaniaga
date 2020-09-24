<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myaccount extends CI_Controller
{

    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('short_number'); //calling helper short number format
        $this->load->library('pagination');
        $this->load->model('meta_model');
        $this->load->model('property_model');
        $this->load->model('images_model');
        $this->load->model('type_model');
        $this->load->model('province_model');
        $this->load->model('city_model');
    }

    //main page - Berita
    public function index()
    {
        $id = $this->session->userdata('id');
        $user = $this->user_model->user_detail($id);
        $meta = $this->meta_model->get_meta();


        $config['base_url']       = base_url('myaccount/index/');
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
        $property = $this->property_model->get_property_user($limit, $start, $id);

        // End Listing Berita dengan paginasi
        $data = array(
            'title'       => 'Akun Saya',
            'deskripsi'   => 'Berita - ' . $meta->description,
            'keywords'    => 'Berita - ' . $meta->keywords,
            'user'        => $user,
            'meta'        => $meta,
            'property'    => $property,
            'pagination'    => $this->pagination->create_links(),
            'content'     => 'front/myaccount/index_account'
        );
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }

    public function account(){
      $id = $this->session->userdata('id');
      $user = $this->user_model->user_detail($id);

      $meta = $this->meta_model->get_meta();

      // End Listing Berita dengan paginasi
      $data = array(
          'title'       => 'Akun Saya',
          'deskripsi'   => 'Berita - ' . $meta->description,
          'keywords'    => 'Berita - ' . $meta->keywords,
          'user'        => $user,
          'meta'        => $meta,
          'content'     => 'front/myaccount/account'
      );
      $this->load->view('front/layout/wrapp', $data, FALSE);
    }

    public function update()
    {
        $id = $this->session->userdata('id');
        $user = $this->user_model->user_detail($id);
        $meta = $this->meta_model->get_meta();

        $this->form_validation->set_rules(
            'user_name',
            'Nama',
            'required',
            [
                'required'         => 'Nama harus di isi'
            ]
        );
        if ($this->form_validation->run()) {
            //Kalau nggak Ganti gambar
            if (!empty($_FILES['user_image']['name'])) {

                $config['upload_path']          = './assets/img/avatars/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000; //Dalam Kilobyte
                $config['max_width']            = 5000; //Lebar (pixel)
                $config['max_height']           = 5000; //tinggi (pixel)
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('user_image')) {

                    //End Validasi
                    $data = [
                        'title'                 => 'Ubah Profile',
                        'deskripsi'             => 'Update Akun Saya',
                        'keywords'              => 'update Account',
                        'meta'                  => $meta,
                        'error_upload'          => $this->upload->display_errors(),
                        'content'               => 'front/myaccount/update_account'
                    ];
                    $this->load->view('front/layout/wrapp', $data, FALSE);

                    //Masuk Database

                } else {

                    //Proses Manipulasi Gambar
                    $upload_data    = array('uploads'  => $this->upload->data());
                    //Gambar Asli disimpan di folder assets/upload/image
                    //lalu gambar Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/img/avatars/' . $upload_data['uploads']['file_name'];
                    //Gambar Versi Kecil dipindahkan
                    // $config['new_image']        = './assets/img/artikel/thumbs/' . $upload_data['uploads']['file_name'];
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 500;
                    $config['height']           = 500;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

                    // Hapus Gambar Lama Jika Ada upload gambar baru
                    if ($user->user_image != "") {
                        unlink('./assets/img/avatars/' . $user->user_image);
                        // unlink('./assets/img/artikel/thumbs/' . $berita->berita_gambar);
                    }
                    //End Hapus Gambar

                    $data  = [
                        'id'                    => $id,
                        'user_name'             => $this->input->post('user_name'),
                        'email'                 => $this->input->post('email'),
                        'user_image'            => $upload_data['uploads']['file_name'],
                        'user_phone'            => $this->input->post('user_phone'),
                        'user_address'          => $this->input->post('user_address'),
                        'date_updated'          => time()
                    ];
                    $this->user_model->update($data);
                    $this->session->set_flashdata('message', 'Data telah di Update');
                    redirect(base_url('myaccount'), 'refresh');
                }
            } else {
                //Update Berita Tanpa Ganti Gambar
                // Hapus Gambar Lama Jika ada upload gambar baru
                if ($user->user_image != "")
                    $data  = [
                        'id'                    => $id,
                        'user_name'             => $this->input->post('user_name'),
                        'email'                 => $this->input->post('email'),
                        'user_phone'            => $this->input->post('user_phone'),
                        'user_address'          => $this->input->post('user_address'),
                        'date_updated'          => time()
                    ];
                $this->user_model->update($data);
                $this->session->set_flashdata('message', 'Data telah di Update');
                redirect(base_url('myaccount'), 'refresh');
            }
        }

        $data = [
            'title'                 => 'Ubah Profile',
            'deskripsi'             => 'Update Akun Saya',
                        'keywords'              => 'update Account',
            'meta'                  => $meta,
            'user'                  => $user,
            'content'               => 'front/myaccount/update_account'
        ];
        $this->load->view('front/layout/wrapp', $data, FALSE);
    }

    public function ubah_password()
    {
        $id = $this->session->userdata('id');
        $user = $this->user_model->user_detail($id);
        $meta = $this->meta_model->get_meta();

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'required'      => 'Password harus Di isi',
                'matches'         => 'Password tidak sama',
                'min_length'     => 'Password Min 3 karakter'
            ]
        );
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // End Listing Berita dengan paginasi
            $data = array(
                'title'       => 'Ubah Password',
                'deskripsi'             => 'Update Password Saya',
                        'keywords'              => 'update Password',
                'user'        => $user,
                'meta'        => $meta,
                'content'     => 'front/myaccount/password_account'
            );
            $this->load->view('front/layout/wrapp', $data, FALSE);
        } else {
            $data = [
                'id'            => $id,
                'password'        => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];
            $this->user_model->update($data);
            $this->session->set_flashdata('message', 'Data telah di ubah');
            redirect(base_url('myaccount'), 'refresh');
        }
    }


    // Listing Iklan Property

    // Create Iklan Property
    public function create(){

      // Get type
      $type = $this->type_model->get_type();
      $province = $this->province_model->get_province();
        // Validasi
        $this->form_validation->set_rules('property_title','Judul Property','required',
          ['required'      => 'Judul Property harus di isi',]
        );
        $this->form_validation->set_rules('province_id','Provinsi','required',
          ['required'      => 'Anda harus memilih Provinsi',]
        );
        $this->form_validation->set_rules('city_id','Kota','required',
          ['required'      => 'Anda harus memilih Kota',]
        );
        $this->form_validation->set_rules('property_status','Status Property','required',
          ['required'      => 'Anda harus memilih Status Property',]
        );
        $this->form_validation->set_rules('property_surfacearea','Luas Tanah','required',
          ['required'      => 'Luas tanah Harus di isi',]
        );
        $this->form_validation->set_rules('property_buildingarea','Luas Bangunan','required',
          ['required'      => 'Luas Bangunan Harus di isi',]
        );
        $this->form_validation->set_rules('property_floor','Jumlah lantai','required',
          ['required'      => 'Jumlah lantai Harus di isi',]
        );
        $this->form_validation->set_rules('property_bed','Jumlah Kamar Tidur','required',
          ['required'      => 'Jumlah Kamar Tidur Harus di isi',]
        );
        $this->form_validation->set_rules('property_bath','Jumlah Kamar mandi','required',
          ['required'      => 'Jumlah Kamar mandi Harus di isi',]
        );
        $this->form_validation->set_rules('property_electrical','Daya Listrik','required',
          ['required'      => 'Daya Listrik Harus di isi',]
        );
        $this->form_validation->set_rules('property_certificate','Jenis Sertifikat','required',
          ['required'      => 'Jenis Sertifikat Harus di isi',]
        );
        $this->form_validation->set_rules('property_price','Harga','required',
          ['required'      => 'Harga Property Harus di isi',]
        );
        $this->form_validation->set_rules('property_negotiable','Nego','required',
          ['required'      => 'Nego Harga Harus di isi',]
        );
        $this->form_validation->set_rules('property_desc','Deskripsi','required',
          ['required'      => 'Deskripsi Harus di isi',]
        );
        $this->form_validation->set_rules('property_keywords','Kata Kunci','required',
          ['required'      => 'Kata Kunci Harus di isi',]
        );


        if ($this->form_validation->run()) {

          $config['upload_path']          = './assets/img/property/';
          $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
          $config['max_size']             = 5000; //Dalam Kilobyte
          $config['max_width']            = 5000; //Lebar (pixel)
          $config['max_height']           = 5000; //tinggi (pixel)
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('property_image')) {

          $data = [
              'title'        => 'Tambah Berita',
              'deskripsi'     => 'deskripsi',
              'keywords'      => 'keywords',
              'type'          => $type,
              'province'      => $province,
              'content'       => 'front/myaccount/create_listing'
          ];
          $this->load->view('front/layout/wrapp', $data, FALSE);
        }else{

          //Proses Manipulasi Gambar
          $upload_data    = array('uploads'  => $this->upload->data());
          //Gambar Asli disimpan di folder assets/upload/image
          //lalu gambara Asli di copy untuk versi mini size ke folder assets/upload/image/thumbs

          $config['image_library']    = 'gd2';
          $config['source_image']     = './assets/img/property/' . $upload_data['uploads']['file_name'];
          //Gambar Versi Kecil dipindahkan
          // $config['new_image']        = './assets/img/artikel/thumbs/' . $upload_data['uploads']['file_name'];
          $config['create_thumb']     = TRUE;
          $config['maintain_ratio']   = TRUE;
          $config['width']            = 500;
          $config['height']           = 500;
          $config['thumb_marker']     = '';

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $slugcode       = random_string('numeric', 5);
          $property_slug  = url_title($this->input->post('property_title'), 'dash', TRUE);

          $data = [
            'user_id'                   => $this->session->userdata('id'),
            'province_id'               => $this->input->post('province_id'),
            'city_id'                   => $this->input->post('city_id'),
            'type_id'                   => $this->input->post('type_id'),
            'property_address'          => $this->input->post('property_address'),
            'property_slug'             => $slugcode . '-' . $property_slug,
            'property_title'            => $this->input->post('property_title'),
            'property_status'           => $this->input->post('property_status'),
            'property_surfacearea'      => $this->input->post('property_surfacearea'),
            'property_buildingarea'     => $this->input->post('property_buildingarea'),
            'property_floor'            => $this->input->post('property_floor'),
            'property_bed'              => $this->input->post('property_bed'),
            'property_bath'             => $this->input->post('property_bath'),
            'property_bath_maid'        => $this->input->post('property_bath_maid'),
            'property_bed_maid'         => $this->input->post('property_bed_maid'),
            'property_electrical'                => $this->input->post('property_electrical'),
            'property_garage'           => $this->input->post('property_garage'),
            'property_certificate'      => $this->input->post('property_certificate'),
            'property_price'            => $this->input->post('property_price'),
            'property_negotiable'       => $this->input->post('property_negotiable'),
            'property_desc'             => $this->input->post('property_desc'),
            'property_image'                 => $upload_data['uploads']['file_name'],
            'property_keywords'         => $this->input->post('property_keywords'),
            'date_created'              => time()
          ];
          $insert_id = $this->property_model->create($data);
          $this->upload_images($insert_id);
          $this->session->set_flashdata('message', 'Data Iklan telah ditambahkan');
          redirect(base_url('myaccount'), 'refresh');

        }
      }

        $data = [
            'title'        => 'Tambah Berita',
            'deskripsi'     => 'deskripsi',
            'keywords'      => 'keywords',
              'type'          => $type,
              'province'      => $province,
            'content'       => 'front/myaccount/create_listing'
        ];
        $this->load->view('front/layout/wrapp', $data, FALSE);


    }
    // Update Iklan Property
    public function update_listing($id){
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

      $config['upload_path']          = './assets/img/property/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5000; //Dalam Kilobyte
      $config['max_width']            = 5000; //Lebar (pixel)
      $config['max_height']           = 5000; //tinggi (pixel)
      $config['encrypt_name']         = TRUE;
      $this->load->library('upload', $config);

      for ($i=1; $i <=3 ; $i++) {
        if(!empty($_FILES['images'.$i]['name'])){
          if(!$this->upload->do_upload('images'.$i));
          // $data2 = $this->upload->data();



          //Proses Manipulasi Gambar
          $upload_data    = array('uploads'  => $this->upload->data());

          // Resize Image
          $config['image_library']    = 'gd2';
          $config['source_image']     = './assets/img/property/' . $upload_data['uploads']['file_name'];
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
          $config['source_image']     = './assets/img/property/' . $upload_data['uploads']['file_name'];
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
            'property_id'      => $insert_id,
            'images'         =>  $upload_data['uploads']['file_name'],
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


    // get sub category by category_id
  	function get_city(){
  		$province_id = $this->input->post('id',TRUE);
  		$data = $this->city_model->get_provinceid($province_id)->result();
  		echo json_encode($data);
  	}




// Nanti Hapus Aja

    public function myformAjax($id) {

           $result = $this->db->where("province_id",$id)->get("city")->result();

           echo json_encode($result);

       }

}

/* End of file Myaccount.php */
/* Location: ./application/controllers/Myaccount.php */
