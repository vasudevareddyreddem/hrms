<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//@include_once( APPPATH . 'controllers/In_frontend.php');
class downloadfile extends CI_Controller
{

// down load file
  public function download(){
    $id=base64_decode($this->uri->segment(3));
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            $path = rtrim(FCPATH,"/");
            $pdfFilePath = $path."/assets/payslips/".$id;
            
            
            //file path
            //$file = 'uploads/files/'.$fileInfo['file_name'];
            
            //download file from directory
            force_download($pdfFilePath, NULL);
        }
    }



}


