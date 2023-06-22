<?php

namespace App\Http\Controllers;
use App\Models\TipeMobil;

use Illuminate\Http\Request;

class TipeMobilController extends Controller
{
    function index()
    {
        $tipeMobilData = TipeMobil::get();
        return view('pages.tipemobil.index', compact('tipeMobilData'));
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
        return view('pages.tipemobil.create');
    }
    
    function update($id, Request $request)
    {
        $validasiTipeMobil = $request->validate([
            'tipe' => 'required'
        ]);
        
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->update($validasiTipeMobil);
        return redirect()->to('/tipemobil');
    }

    function edit($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        return view('pages.tipemobil.edit', compact('tipeMobilData'));
    }

    function delete($id)
    {
       TipeMobil::find($id)->delete();
       
        return redirect()->to('/tipemobil');
    }
}