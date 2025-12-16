<?php

namespace App\Http\Controllers;

use App\Models\Apprenti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApprentiController extends Controller
{
    public function index()
    {
        $apprentis = Apprenti::latest()->get();
        return view('back.pages.apprentis.index', compact('apprentis'));
    }

    public function create()
    {
        return view('back.pages.apprentis.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:Homme,Femme',
            'date_naissance' => 'nullable|date',
            'adresse' => 'nullable|string|max:255',
            'option' => 'required|in:stage,perfectionnement,formation',
            'niveau_etude' => 'nullable|string|max:255',
            'duree_formation' => 'nullable|integer|min:1',
            'date_debut_apprentissage' => 'nullable|date',
            'date_fin_apprentissage' => 'nullable|date|after_or_equal:date_debut_apprentissage',
            'montant_contrat' => 'required|numeric|min:0',
            'avance_paye' => 'nullable|numeric|min:0',
            'numero_parent' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
          //  'status' => 'required|boolean',
        ]);

        $data['reste_a_payer'] = $data['montant_contrat'] - ($data['avance_paye'] ?? 0);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('apprentis', 'public');
        }

        Apprenti::create($data);

        return redirect()->route('apprentis.index')->with('success', 'Apprenti ajouté avec succès !');
    }

    public function edit(Apprenti $apprenti)
    {
        return view('back.pages.apprentis.edit', compact('apprenti'));
    }

    public function update(Request $request, Apprenti $apprenti)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:Homme,Femme',
            'date_naissance' => 'nullable|date',
            'adresse' => 'nullable|string|max:255',
            'option' => 'required|in:stage,perfectionnement,formation',
            'niveau_etude' => 'nullable|string|max:255',
            'duree_formation' => 'nullable|integer|min:1',
            'date_debut_apprentissage' => 'nullable|date',
            'date_fin_apprentissage' => 'nullable|date|after_or_equal:date_debut_apprentissage',
            'montant_contrat' => 'required|numeric|min:0',
            'avance_paye' => 'nullable|numeric|min:0',
            'numero_parent' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            //'status' => 'required|boolean',
        ]);

        $data['reste_a_payer'] = $data['montant_contrat'] - ($data['avance_paye'] ?? 0);

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($apprenti->photo) {
                Storage::disk('public')->delete($apprenti->photo);
            }
            $data['photo'] = $request->file('photo')->store('apprentis', 'public');
        }

        $apprenti->update($data);

        return redirect()->route('apprentis.index')->with('success', 'Apprenti modifié avec succès !');
    }

    public function show(Apprenti $apprenti)
{
    return view('back.pages.apprentis.show', compact('apprenti'));
}
public function payer(Apprenti $apprenti)
{
    $apprenti->avance_paye = $apprenti->montant_contrat;
    $apprenti->reste_a_payer = 0;
    $apprenti->save();

    return back()->with('success', 'Paiement effectué avec succès');
}


    public function destroy(Apprenti $apprenti)
    {
        if ($apprenti->photo) {
            Storage::disk('public')->delete($apprenti->photo);
        }

        $apprenti->delete();

        return redirect()->route('apprentis.index')->with('success', 'Apprenti supprimé avec succès !');
    }
}
