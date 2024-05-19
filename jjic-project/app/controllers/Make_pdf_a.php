<?php

class Make_pdf_a extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
        redirect('login');
    }

    $appoint = new Appointment();
    $rows_d = $appoint->viewDoneAppoint();


    $folder = 'Generated_pdf/';
    if(!file_exists($folder)){
        mkdir($folder, 0777, true);
    }

    require_once __DIR__ . '/../models/mpdf/autoload.php';
    $currentDate = date('Y-m-d');
    $mpdf = new \Mpdf\Mpdf();

    $html = file_get_contents(ROOT.'/make_appointment_pdf');
    $mpdf->WriteHTML($html);

    $file_name = $folder.'Appointment_Done_Date_'.$currentDate.'.pdf';
    $mpdf->Output($file_name);

    if(file_exists($file_name)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Pragma: public');
        header('Content-Length: '.filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        exit();
    }
  }
}