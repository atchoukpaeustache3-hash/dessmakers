<?php

namespace App\Http\Controllers;
use App\Models\Client;

use App\Models\Mesure;
use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
class MesureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function all()
{
    // On récupère toutes les mesures avec leur client
    $mesures = Mesure::with('client')->latest()->get();

    return view('back.pages.mesures.all', compact('mesures'));
}
   
    public function index($client_id)
{
    // Récupérer le client
    $client = Client::findOrFail($client_id);

    // Récupérer uniquement SES mesures
    $mesures = Mesure::where('client_id', $client_id)->get();

    return view('back.pages.mesures.index', compact('client', 'mesures'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create($client_id)
{
    return view('back.pages.mesures.create', compact('client_id'));
}

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 🔍 Validation
    //dd($request->client_id);

    $request->validate([
        'client_id'          => ['required', 'exists:clients,id'],
        
        'encolure'           => ['nullable', 'numeric'],
        'tr_poitrine'        => ['nullable', 'numeric'],
        'tr_sous_poitrine'   => ['nullable', 'numeric'],
        'tr_taille'          => ['nullable', 'numeric'],
        'tr_bassin'          => ['nullable', 'numeric'],
        'tr_cuisse'          => ['nullable', 'numeric'],
        'tr_ceinture'        => ['nullable', 'numeric'],
        'tr_bras'            => ['nullable', 'numeric'],
        'tr_manche'          => ['nullable', 'numeric'],
        'tr_bas'             => ['nullable', 'numeric'],
        'tr_tete'            => ['nullable', 'numeric'],
        'hr_poitrine'        => ['nullable', 'numeric'],
        'hr_sous_poitrine'   => ['nullable', 'numeric'],
        'lg_epaule'          => ['nullable', 'numeric'],
        'lg_taille'          => ['nullable', 'numeric'],
        'lg_taille_dos'      => ['nullable', 'numeric'],
        'lg_manche'          => ['nullable', 'numeric'],
        'lg_pantalon'        => ['nullable', 'numeric'],
        'lg_genoux'          => ['nullable', 'numeric'],
        'lg_chemise'         => ['nullable', 'numeric'],
        'carrure_devant'     => ['nullable', 'numeric'],
        'carrure_dos'        => ['nullable', 'numeric'],
        'demi_dos'           => ['nullable', 'numeric'],
    ]);
//dd($request);

    // 🏗️ CREATION — totalement séparée
    $mesure = Mesure::create([
        'client_id'         => $request->client_id,
        'encolure'          => $request->encolure,
        'tr_poitrine'       => $request->tr_poitrine,
        'tr_sous_poitrine'  => $request->tr_sous_poitrine,
       'tr_taille'         => $request->tr_taille,
        'tr_bassin'         => $request->tr_bassin,
        'tr_cuisse'         => $request->tr_cuisse,
       'tr_ceinture'       => $request->tr_ceinture,
        'tr_bras'           => $request->tr_bras,
        'tr_manche'         => $request->tr_manche,
        'tr_bas'            => $request->tr_bas,
        'tr_tete'           => $request->tr_tete,
        'hr_poitrine'       => $request->hr_poitrine,
        'hr_sous_poitrine'  => $request->hr_sous_poitrine,
        'lg_epaule'         => $request->lg_epaule,
        'lg_taille'         => $request->lg_taille,
        'lg_taille_dos'     => $request->lg_taille_dos,
        'lg_manche'         => $request->lg_manche,
        'lg_pantalon'       => $request->lg_pantalon,
        'lg_genoux'         => $request->lg_genoux,
        'lg_chemise'        => $request->lg_chemise,
        'carrure_devant'    => $request->carrure_devant,
        'carrure_dos'       => $request->carrure_dos,
        'demi_dos'          => $request->demi_dos,
    ]);
   return redirect()->route('mesure.all')
    ->with('success', 'Mesure ajoutée avec succès.');
}
    /**
     * Display the specified resource.
     */
    public function show(Mesure $mesure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $mesure = Mesure::findOrFail($id);
    return view('back.pages.mesures.edit', compact('mesure'));
}

public function update(Request $request, $id)
{
    $mesure = Mesure::findOrFail($id);

    $request->validate([
        'encolure' => 'nullable|numeric',
        'tr_poitrine' => 'nullable|numeric',
        'tr_sous_poitrine' => 'nullable|numeric',
        'tr_taille' => 'nullable|numeric',
        'tr_bassin' => 'nullable|numeric',
        'tr_cuisse' => 'nullable|numeric',
        'tr_ceinture' => 'nullable|numeric',
        'tr_bras' => 'nullable|numeric',
        'tr_manche' => 'nullable|numeric',
        'tr_bas' => 'nullable|numeric',
        'tr_tete' => 'nullable|numeric',
        'hr_poitrine' => 'nullable|numeric',
        'hr_sous_poitrine' => 'nullable|numeric',
        'lg_epaule' => 'nullable|numeric',
        'lg_taille' => 'nullable|numeric',
        'lg_taille_dos' => 'nullable|numeric',
        'lg_manche' => 'nullable|numeric',
        'lg_pantalon' => 'nullable|numeric',
        'lg_genoux' => 'nullable|numeric',
        'lg_chemise' => 'nullable|numeric',
        'carrure_devant' => 'nullable|numeric',
        'carrure_dos' => 'nullable|numeric',
        'demi_dos' => 'nullable|numeric',
    ]);

    $mesure->update($request->all());

    return redirect()->route('mesure.all')->with('success', 'Mesure modifiée avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mesure $mesure)
    {
        //
    }
}
