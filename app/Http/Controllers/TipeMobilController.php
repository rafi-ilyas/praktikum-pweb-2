<?php

namespace App\Http\Controllers;
use App\Models\TipeMobil;

use Illuminate\Http\Request;

class TipeMobilController extends Controller
{
    function index()
    {
        $tipeMobilData = TipeMobil::get();
        return view('pages.Tipe_Mobil.index', compact('tipeMobilData'));
    }

    function store(Request $request)
    {
        $tipeMobilData = $request->validate([
            'tipe' => 'required',
        ]);
        
        TipeMobil::create($tipeMobilData);
        return redirect()->to('/tipemobil');
    }

    function create()
    {
        return view('pages.tipe_mobil.create');
    }
    
    function update($id, Request $request)
    {
        
    }

    function edit($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        return view('pages/tipe_mobil.edit', compact('tipeMobilData'));
    }

    function delete($id)
    {
        
    }
}