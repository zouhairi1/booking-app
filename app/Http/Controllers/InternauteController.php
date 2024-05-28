<?php

namespace App\Http\Controllers;

use App\Models\Internaute;
use Illuminate\Http\Request;

class InternauteController extends Controller
{
    // public function index()
    // {
    //     $internautes = Internaute::all();
    //     return view('internautes.index', compact('internautes'));
    // }
    public function index(Request $request)
    {
        $query = Internaute::query();

        if ($request->has('cin')) {
            $cin = $request->input('cin');
            if (!empty($cin)) {
                $query->where('cin', 'like', "%$cin%");
            }
        }

        $internautes = $query->get();

        return view('internautes.index', compact('internautes'));
    }

    public function create()
    {
        return view('internautes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'date_naissance' => 'required|date',
            'cin' => 'required|unique:internautes',
        ]);

        Internaute::create($request->all());
        return redirect()->route('internautes.index')->with('success', 'Internaute created successfully.');
    }

    public function show(Internaute $internaute)
    {
        return view('internautes.show', compact('internaute'));
    }

    public function edit(Internaute $internaute)
    {
        return view('internautes.edit', compact('internaute'));
    }

    public function update(Request $request, Internaute $internaute)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'date_naissance' => 'required|date',
            'cin' => 'required|unique:internautes,cin,' . $internaute->id,
        ]);

        $internaute->update($request->all());
        return redirect()->route('internautes.index')->with('success', 'Internaute updated successfully.');
    }

    public function destroy(Internaute $internaute)
    {
        $internaute->delete();
        return redirect()->route('internautes.index')->with('success', 'Internaute deleted successfully.');
    }
  
}
