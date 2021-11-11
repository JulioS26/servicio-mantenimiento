<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordene;

class OrdenController extends Controller
{
    public function show($id)
    {
        $ordenVista = Ordene::find($id);

        return $ordenVista;
        // return view('orden', compact('ordenVista'));
    }
}
