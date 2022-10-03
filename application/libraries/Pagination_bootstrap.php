<?php defined('BASEPATH') OR exit('No direct script access allowed');


/**
*----------------------------------------------------------------
*------------  CODEIGNITER  PAGINATION  BOOTSTRAP   -------------
*----------------------------------------------------------------
*
* Pagination_Bootstrap is a codeigniter solution for pagination _layout_bootstrap
*
* Call library: $this->load->library("pagination_bootstrap");
* Set: $this->pagination_bootstrap->config("/myControler/index", $this->db->get('table'));
* Get result: $this->pagination_bootstrap->result()
* Render pagination : <?php echo $this->pagination_bootstrap->render(); ?>
*
* @author Thiago Lima <thiagolima86gmail.com>
* @version 1.0
* @access public
*/



class Pagination_Bootstrap extends CI_Model {

   public function index()
  {

        $config['per_page'] = 10;
         $config['num_links'] = 1;
        // styling
         $config['full_tag_open'] = '<nav"><ul class="pagination justify-content-center">';
         $config['full_tag_close'] = '</ul></nav>';

         $config['first_link'] = 'First';
         $config['first_tag_open'] = '<li class="page-item">';
         $config['first_tag_close'] = '</li">';

         $config['last_link'] = 'Last';
         $config['last_tag_open'] = '<li class="page-item">';
         $config['last_tag_close'] = '</li">';

         $config['next_link'] = '&raquo';
         $config['next_tag_open'] = '<li class="page-item">';
         $config['next_tag_close'] = '</li">';

         $config['prev_link'] = '&laquo';
         $config['prev_tag_open'] = '<li class="page-item">';
         $config['prev_tag_close'] = '</li">';

         $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
         $config['cur_tag_close'] = '</a></li">';

         $config['num_tag_open'] = '<li class="page-item">';
         $config['num_tag_close'] = '</li">';

         $config['attributes'] = array('class' => 'page-link');
        //  initialize
         $this->pagination->initialize($config);     

         $data['start'] = $this->uri->segment(6);
  }

}
