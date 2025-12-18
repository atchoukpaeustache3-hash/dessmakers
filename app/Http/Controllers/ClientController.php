<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $clients = Client::all(); // Tu peux mettre paginate si tu veux

    return view('back.pages.clients.index', compact('clients'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('back.pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{

    // Validation
    $request->validate([
        'name'          => ['required', 'string', 'max:255'],
        'lastname'      => ['required', 'string', 'max:255'],
        'adresse'       => ['required', 'string', 'max:255'],
        'phone'         => ['required', 'string', 'max:20'],
        'email'         => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:clients,email'],
        'sexe'          => ['required', 'in:homme,femme'],
        'date_venue'    => ['required', 'date'],
        //'profession'    => ['nullable', 'string', 'max:255'],
       //'date_naissance'=> ['nullable', 'date'],
       // 'photo'         => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
    ]);

    // Gestion de la photo
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('clients', 'public');
    }
    $client = Client::create([
        'name'           => $request->name,
        'lastname'       => $request->lastname,
        'adresse'        => $request->adresse,
        'phone'          => $request->phone,
        'email'          => $request->email,
        'sexe'           => $request->sexe,
        'date_venue'     => $request->date_venue,
        //'profession'     => $request->profession,
      //  'date_naissance' => $request->date_naissance,
       // 'photo'          => $photoPath,
        'user_id'        => auth()->id(),
    ]);


return redirect()->route('client.index')
                     ->with('success', 'Client ajouté avec succès.');
}


    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
{
    return view('back.pages.clients.edit', compact('client'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
{
    // 1️⃣ Validation
    $request->validate([
        'name'        => ['required', 'string', 'max:255'],
        'lastname'    => ['required', 'string', 'max:255'],
        'adresse'     => ['required', 'string', 'max:255'],
        'phone'       => ['required', 'string', 'max:20'],
        'email'       => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:clients,email,'.$client->id],
        'sexe'        => ['required', 'in:homme,femme'],
        'date_venue'  => ['required', 'date'],
        //'profession'    => ['nullable', 'string', 'max:255'],
        //'date_naissance'=> ['nullable', 'date'],
        //'photo'         => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
    ]);

    // 2️⃣ Gestion de la photo si tu veux
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('clients', 'public');
        $client->photo = $photoPath; // on met à jour la photo
    }

    // 3️⃣ Modification
    $client->update([
        'name'       => $request->name,
        'lastname'   => $request->lastname,
        'adresse'    => $request->adresse,
        'phone'      => $request->phone,
        'email'      => $request->email,
        'sexe'       => $request->sexe,
        'date_venue' => $request->date_venue,
        //'profession' => $request->profession,
        //'date_naissance' => $request->date_naissance,
        'user_id'    => auth()->id(),
    ]);

    // 4️⃣ Redirection ou debug
    // dd($request); // si tu veux debuguer
    return redirect()->route('client.index')->with('success', 'Client modifié avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
{
    // Supprimer d'abord toutes les mesures du client
    if ($client->mesures()->exists()) {
        $client->mesures()->delete();
    }

    // Puis supprimer le client
    $client->delete();

    return redirect()->route('client.index')
        ->with('success', 'Client supprimé avec succès.');
}

 public function profile()
    {
                 return view('back.pages.profiles.create');

    }
    public function edite()
    {
                 return view('back.pages.profiles.edite');

    }

    // Modifier le nom
    public function updat(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'numero'       => ['nullable', 'string', 'max:20'],
            'sexe'        => ['nullable', 'in:homme,femme'],
            'date_naissance'  => ['nullable', 'date'],
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->numero = $request->numero;
        $user->sexe = $request->sexe;
        $user->date_naissance = $request->date_naissance;
        $user->save();

            return redirect()->route('profile.create')->with('success', 'Profil modifié avec succès.');

    }

    // Modifier le mot de passe
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors([
                'current_password' => 'Ancien mot de passe incorrect',
            ]);
        }

        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Mot de passe modifié avec succès');
    }

    // Modifier la photo
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        // Supprimer l’ancienne photo
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        // Enregistrer la nouvelle
        $path = $request->file('photo')->store('profiles', 'public');

        $user->photo = $path;
        $user->save();

        return back()->with('success', 'Photo mise à jour avec succès');
    }

     public function users()
    {
                 return view('back.pages.utilisateurs.create');

    }
     public function storeuser(Request $request): RedirectResponse
{

    // Validation
    $request->validate([
        'name'          => ['required', 'string', 'max:255'],
        'lastname'      => ['required', 'string', 'max:255'],
        'numero'         => ['required', 'string', 'max:20'],
        'role'          => ['required', 'in:patron,sous_patron,administrateur'],
        'sexe' => 'required|in:homme,femme',

        //'date_venue'    => ['required', 'date'],
        //'profession'    => ['nullable', 'string', 'max:255'],
       'date_naissance'=> ['nullable', 'date'],
        'photo'         => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Gestion de la photo
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('utilisateurs', 'public');
    }
    $user = User::create([
        'name'           => $request->name,
        'lastname'       => $request->lastname,
        'numero'          => $request->numero,
        'email'          => $request->email,
        'role'           => $request->role,
        'sexe'           => $request->sexe,
        'date_naissance'     => $request->date_naissance,
        //'profession'     => $request->profession,
      //  'date_naissance' => $request->date_naissance,
        'photo'          => $photoPath,
            'password' => Hash::make($request->password),

    ]);


return redirect()->route('user.index')
                     ->with('success', 'Utilisateur ajouté avec succès.');
}

public function indexe()
{
    $users = User::latest()->get();
    return view('back.pages.utilisateurs.index', compact('users'));
}



}
