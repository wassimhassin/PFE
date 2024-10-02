<?php

// app/Http/Controllers/VoitureController.php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index()
    {
        $voitures = Voiture::all();
        return view('voiture.index', compact('voitures'));
    }
    
    public function create()
    {
        return view('voiture.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|unique:voitures',
            'marque' => 'required',
            'nature' => 'required',
        ]);
    
        Voiture::create($request->all());
        return redirect()->route('voiture.index')->with('success', 'Voiture created successfully.');
    }
    
    public function edit(Voiture $voiture)
    {
        return view('voiture.edit', compact('voiture'));
    }
    
    public function update(Request $request, Voiture $voiture)
    {
        $request->validate([
            'matricule' => 'required|unique:voitures,matricule,' . $voiture->id,
            'marque' => 'required',
            'nature' => 'required',
        ]);
    
        $voiture->update($request->all());
        return redirect()->route('voiture.index')->with('success', 'Voiture updated successfully.');
    }
    
    public function destroy(Voiture $voiture)
    {
        $voiture->delete();
        return redirect()->route('voiture.index')->with('success', 'Voiture deleted successfully.');
    }
}
