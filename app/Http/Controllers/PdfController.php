<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordene;
use PDF;

class PdfController extends Controller
{
    public function pdf($id)
    {
        // return view('orden');
        $item = Ordene::find($id);
        // return $item;

        $pdf = PDF::loadView('pdf', compact('item'));
        return $pdf->download('Orden '.$item->formulario.'.pdf');
    }
}
