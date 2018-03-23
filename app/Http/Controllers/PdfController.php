<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatagoryModel;
use PDF;
class PdfController extends Controller
{
    public function catagory_pdf()
    {
      $catagory_data=CatagoryModel::all();
      $pdf=PDF::loadView('Admin.Medicine.Export.catagory_pdf',['catagory_data'=>$catagory_data]);
      return $pdf->download('catagory_pdf.pdf');
    }
}
