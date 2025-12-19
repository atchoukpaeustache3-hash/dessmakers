@extends('back.layouts.master')

@section('title', 'Liste des Utilisateurs')
@section('page-title', 'Utilisateurs')

@section('breadcrumb')
    <li class="breadcrumb-item active">Liste</li>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des Utilisateurs</h4>
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route('user.create') }}" class="btn btn-success add-btn">
                                    <i class="ri-add-line align-bottom me-1"></i> Ajouter Utilisateur
                                </a>
                               
                            </div>
                        </div>
                <div class="d-flex align-items-center gap-2">
                    <input type="text" id="searchInput" class="form-control"
                        placeholder="🔍 Rechercher par Nom ou Prénom..."
                        style="width: 250px;">
                </div>
            </div>

            <div class="card-body">

                {{-- MESSAGE RECHERCHE --}}
                <div id="noResultMessage" class="text-center text-danger mb-3" style="display:none;">
                    Cet utilisateur n’existe pas.
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle" id="userTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Numéro</th>
                                <th>Sexe</th>
                                <th>Date Naissance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="cell-nom">{{ $user->lastname }}</td>
                                <td class="cell-prenom">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->numero }}</td>
                                <td>{{ $user->sexe }}</td>
                                <td>{{ $user->date_naissance }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="btn btn-info btn-sm">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                            <i class="ri-pencil-line"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($users->isEmpty())
                        <div class="text-center mt-3">
                            Aucun utilisateur trouvé.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT RECHERCHE --}}
<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#userTable tbody tr');
    let visibleCount = 0;

    rows.forEach(row => {
        const nom = row.querySelector('.cell-nom').textContent.toLowerCase();
        const prenom = row.querySelector('.cell-prenom').textContent.toLowerCase();

        if (nom.includes(filter) || prenom.includes(filter)) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    document.getElementById('noResultMessage').style.display =
        visibleCount === 0 ? 'block' : 'none';
});
</script>

@endsection
