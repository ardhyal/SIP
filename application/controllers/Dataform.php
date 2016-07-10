<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataform extends CI_Controller {

	/*
	 * ***************************************************************
	 * Script :
	 * Version :
	 * Date :
	 * Author : ardhyal
	 * Email : ardialhadi@gmail.com
	 * Description :
	 * ***************************************************************
	 */

	/**
	 * Description of Dashboard
	 *
	 * @author ardhyal
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dataform_model');
		$this->load->library(array('form_validation','PHPExcel'));
                
	}

	public function index()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			$data['active']     = "Dataform";
			$data['golongan']   = $this->Dataform_model->get_golongan();
			$data['jabatan']    = $this->Dataform_model->get_jabatan();
			$this->load->view('/admin/header', $data);
			$this->load->view('/admin/dataform', $data);
			$this->load->view('/admin/footer');
		}
		else
		{
			redirect(site_url('login/index'), 'refresh');
		}
	}

        /** fungsi update data to database */
        public function update($data)
        {
                if(isset($this->session->userdata['logged_in'])){
                    $id = $this->input->post('id');
                    if ($data == "golongan"){
                        $this->form_validation->set_rules('golongan', 'Golongan', 'require');
                        if ($this->form_validation->run() === 'FALSE'){
                            $this->session->set_flashdata('golongan', 'Field golongan is empty !');
                            redirect(site_url('dataform/index'), 'refresh');
                        }else{
                            $data = array ('nm_golongan' => set_value('golongan'));
                           $data_form = array('golongan', $data, $id);
                            if ($this->Dataform_model->update($data_form) === TRUE){
                                $this->session->set_flashdata('golongan', 'Update success data Golongan!');
                            }else{
                                $this->session->set_flashdata('golongan', 'Error input data Golongan!');
                            }
                            redirect(site_url('dataform/index'), 'refresh');
                        }
                    }else if ($data == "jabatan"){
                        $this->form_validation->set_rules('jabatan', 'Jabatan', 'require');
                        if ($this->form_validation->run() === 'FALSE'){
                            $this->session->set_flashdata('jabatan', 'Field jabatan is empty !');
                            redirect(site_url('dataform/index'), 'refresh');
                        }else{
                           $data = array ('nm_jabatan' => set_value('jabatan'));
                           $data_form = array('jabatan', $data, $id);
                            if ($this->Dataform_model->update($data_form) === TRUE){
                                $this->session->set_flashdata('jabatan', 'Update success data Jabatan!');
                            }else{
                                $this->session->set_flashdata('jabatan', 'Error input data Jabatan!');
                            }
                            redirect(site_url('dataform/index'), 'refresh');
                        }
                    }
                }
        }
        
	// fungsi insert data to database
	public function create($data) {
        if (isset($this->session->userdata['logged_in'])) {
            if ($data == "golongan") {
                $this->form_validation->set_rules('golongan', 'Golongan', 'required');
                if ($this->form_validation->run() === FALSE) {
                    $this->session->set_flashdata('golongan', 'Please input your Golongan!');
                    redirect(site_url('dataform/index'), 'refresh');
                } else {
                    $tipe = 'golongan';
                    $data_form = array
                        (
                        'nm_golongan' => set_value('golongan')
                    );
                    
                    var_dump($this->Dataform_model->insert($data_form, $tipe));
                    die();
                    if ($this->Dataform_model->insert($data_form, $tipe) === TRUE) {
                        $this->session->set_flashdata('golongan', 'Save Success data Golongan');
                        redirect(site_url('dataform/index'), 'refresh');
                    } else {
                        $this->session->set_flashdata('golongan', 'Error Input data Golongan !!!');
                        redirect(site_url('dataform/index'), 'refresh');
                    }
                }
            } else if ($data == "jabatan") {
                $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
                if ($this->form_validation->run() === FALSE) {
                    $this->session->set_flashdata('jabatan', 'Please input data Jabatan!');
                    redirect(site_url('dataform/index'), 'refresh');
                } else {
                    $tipe = 'jabatan';
                    $data_form = array
                        (
                        'nm_jabatan' => set_value('jabatan')
                    );
                    if ($this->Dataform_model->insert($data_form, $tipe) === TRUE) {
                        $this->session->set_flashdata('jabatan', 'Success save data Jabatan !!!');
                        redirect(site_url('dataform/index'), 'refresh');
                    } else {
                        $this->session->set_flashdata('jabatan', 'Error Input data Jabatan!!!');
                        redirect(site_url('dataform/index'), 'refresh');
                    }
                }
            }
        } else {
            redirect(site_url('login/index'), 'refresh');
        }
    }
    
    public function delete_check(){
        $data = $this->input->post('[checkid]');
        $n = count($data);
        for ($i=0; $i<$n; $i++){
            echo $data[$i];
        }
//        die();
    }
    
    public function export(){
        
        $ambildata = $this->Dataform_model->get_golongan();
        if(count($ambildata)>0){
            
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                    ->setCreator("A . A") //creator
                    ->setTitle("IT Developer PT. Inti Bangun Sejahtera. Tbk");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
            
            $objget->setTitle('Sample Sheet'); //sheet title
            
            //Warna header tabel
            $objget->getStyle("A1:C1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );
            
 
            //table header
            $cols = array('A','B','C');
            $val = array('Nama ','Alamat','Kontak');
             
            for ($a=0;$a<3; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
             
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
             
            $baris  = 2;
            foreach ($ambildata as $frow){
                 
               //pemanggilan sesuaikan d    engan nama kolom tabel
                $objset->setCellValue("A".$baris, $frow->id_golongan); //membaca data nama
                $objset->setCellValue("B".$baris, $frow->nm_golongan); //membaca data alamat
                $objset->setCellValue("C".$baris, $frow->desc_golongan); //membaca data alamat

                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++;
            }
            
            $objPHPExcel->setActiveSheetIndex(0); 
            
            $filename = "Data_".date("Y-m-d H:i:s").".xls";
             
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
               
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }else{
            redirect('Excel');
        }		
        }
}

