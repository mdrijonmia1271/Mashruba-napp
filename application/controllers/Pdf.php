<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * PDF content
 *
 * @author iPLUS DATA
 * Date : 02-March-2014
 */
class Pdf extends CI_Controller{
    private $record_per_page = 3;
    private $record_num_links = 5;
    private $pdf_limit = 25; /*no. of pdf generate per submit */
    private $data = '';
    
    public function __construct() {
        parent::__construct();

		$this->load->helper('url');
               
        $this->data['module_name']= "PDF";
             
        $this->load->model('Mod_pdf');
        $this->load->model('Mod_invoice');
        $this->load->library('form_validation'); /* load validation library*/
        $this->load->library('pagination');/*  load pagination library */
        $this->load->helper('pdf_helper');
        
        $this->data['current_year'] = date('Y');
        $this->data['current_month'] = date('m');
        $this->data['year_array'] = $this->common_lib->get_year_array(); /* get year name as array */
        $this->data['month_array'] = $this->common_lib->get_month_array(); /* get year name as array */
        $this->data['month_array'] = $this->common_lib->get_month_array();

    }
    
    function MakePdf($InvoiceAutoId, $CustomerType,$InvoiceMonth,$InvoiceYear) {
        $this->data['rec'] = $this->Mod_invoice->InternetCustomerInvoiceDetails($InvoiceAutoId, $CustomerType);
        
        if($CustomerType == 'internet') {
            
            $this->data['pending_rec'] = $this->Mod_invoice->InternetCustomerPendingInvoice($this->data['rec']->customer_auto_id,$InvoiceYear,$InvoiceMonth);
        
            tcpdf();
            $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            //$obj_pdf->SetCreator(PDF_CREATOR);
            $title = "Customer Invoice";
            $obj_pdf->SetTitle($title);
            // remove default header/footer
            $obj_pdf->SetLeftMargin(17);

            $obj_pdf->setPrintHeader(false);
            $obj_pdf->setPrintFooter(false);
            $obj_pdf->AddPage();

            ob_start();
            //     we can have any view part here like HTML, PHP etc
            $this->load->view('pdf/view_internet_invoice',$this->data);
            $content = ob_get_contents();
            ob_end_clean();
            $obj_pdf->writeHTML($content, true, false, true, false, '');

            $obj_pdf->Output($this->data['rec']->invoice_id.'.pdf', 'I');
            
        }
        else {
            tcpdf();
            $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            //$obj_pdf->SetCreator(PDF_CREATOR);
            $title = "Customer Invoice";
            $obj_pdf->SetTitle($title);
            // remove default header/footer
            $obj_pdf->SetLeftMargin(17);

            $obj_pdf->setPrintHeader(false);
            $obj_pdf->setPrintFooter(false);
            $obj_pdf->AddPage();

            ob_start();
            //     we can have any view part here like HTML, PHP etc
            $this->load->view('pdf/view_others_invoice',$this->data);
            $content = ob_get_contents();
            ob_end_clean();
            $obj_pdf->writeHTML($content, true, false, true, false, '');

            $obj_pdf->Output($this->data['rec']->invoice_id.'.pdf', 'I');
            
        }
        

    }
    
    function gici() {
        $this->load->view('pdf/view_generate_internet_invoice_pdf',$this->data);
    }
           
    function process_pdf() {
        $customer_type = $this->security->xss_clean($this->input->post('customer_type'));
        $month = $this->security->xss_clean($this->input->post('month'));
        $year = $this->security->xss_clean($this->input->post('year'));
        $InvoiceList = $this->Mod_pdf->InvoiceList($customer_type,$month,$year,$this->pdf_limit);
        
        $Completed = count($InvoiceList);
        $InvoiceListTotal = $this->Mod_pdf->InvoiceListTotal($customer_type,$month,$year);
        $remining = $InvoiceListTotal - $Completed;
        if(!empty($InvoiceList)) {
            
            tcpdf();
            $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $title = "Customer Invoice";
            $obj_pdf->SetTitle($title);

            // remove default header/footer
            $obj_pdf->SetLeftMargin(17);

            $obj_pdf->setPrintHeader(false);
            $obj_pdf->setPrintFooter(false);
            $obj_pdf->AddPage();
            ob_start();
            foreach($InvoiceList as $rec) {
                $InvoiceMonth = $rec->invoice_month;
                $InvoiceYear = $rec->invoice_year;
                $this->data['pending_rec'] = $this->Mod_invoice->InternetCustomerPendingInvoice($rec->customer_auto_id,$InvoiceYear,$InvoiceMonth);
            ?>
            <div style="page-break-inside:avoid;">
                <?php $this->data['rec'] = $rec;
                if($customer_type == 'internet') {
                    $this->load->view('pdf/view_internet_invoice',$this->data);
                }
                
                ?>
            </div>
            <?php    } $content = ob_get_contents();
            ob_end_clean();
            $obj_pdf->writeHTML($content, true, false, true, false, '');
            if($customer_type == 'internet') {
                $obj_pdf->Output(PDF_FILE_PATH.'internet_customer/'.'Internet_Customer_Bill_'.date('Y_m_d_H_i_s').'.pdf', 'FD');
            }
                                    
            $UpdateFlag = $this->Mod_pdf->UpdateFlag($InvoiceList);
            $this->session->set_flashdata('flashOK', $Completed.' PDF generated successfully, remaining '.$remining);
            if($customer_type == 'internet') {
                redirect('pdf/gici');
            }
            
        }
        else {
            $this->session->set_flashdata('flashError', 'Failed to generate PDF');
            if($customer_type == 'internet') {
                redirect('pdf/gici');
            }
            
        }
        
    }
    
    function reset() {
        $this->load->view('pdf/view_reset_internet_invoice',$this->data);
    }
    
    function reset_process() {
        $month = $this->security->xss_clean($this->input->post('month'));
        $year = $this->security->xss_clean($this->input->post('year'));
        $Reset = $this->Mod_pdf->reset($month,$year);
        if($Reset != 0) {
            $this->session->set_flashdata('flashOK', 'Reset successfully');
            redirect('pdf/reset');
        }
        else {
            $this->session->set_flashdata('flashError', 'Failed to Reset');
            redirect('pdf/reset');
        }
        
        
    }
    
}
