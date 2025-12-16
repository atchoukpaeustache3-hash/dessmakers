@extends('back.layouts.master')

@section('title', 'Liste des Apprentis')
@section('page-title', 'Apprentis')

@section('breadcrumb')
    <li class="breadcrumb-item active">Liste</li>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des Apprentis</h4>
                <div class="d-flex align-items-center gap-2">
                    <input type="text" id="searchInput" class="form-control"
                           placeholder="🔍 Rechercher par Nom ou Prénom..." 
                           style="width: 250px; padding: 6px 12px; border-radius: 5px; border: 1px solid #ced4da;">
                    <a href="{{ route('apprentis.create') }}" class="btn btn-success">
                        <i class="ri-add-line me-1"></i> Ajouter Apprenti
                    </a>
                </div>
            </div>

            <div class="card-body">

                {{-- MESSAGE RECHERCHE --}}
                <div id="noResultMessage" class="text-center text-danger mb-3" style="display:none;">
                    Cet apprenti n’existe pas.
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle" id="apprentiTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Sexe</th>
                                <th>Option</th>
                                <th>Niveau</th>
                                <th>Durée</th>
                                <th>Montant</th>
                                <th>Avance</th>
                                <th>Reste</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apprentis as $apprenti)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="cell-nom">{{ $apprenti->nom }}</td>
                                <td class="cell-prenom">{{ $apprenti->prenom }}</td>
                                <td>{{ $apprenti->sexe }}</td>
                                <td>{{ ucfirst($apprenti->option) }}</td>
                                <td>{{ $apprenti->niveau_etude }}</td>
                                <td>{{ $apprenti->duree_formation }}</td>
                                <td>{{ $apprenti->montant_contrat }}</td>
                                <td>{{ $apprenti->avance_paye }}</td>
                                <td>{{ $apprenti->reste_a_payer }}</td>
                                <td>{{ $apprenti->status ? 'Actif' : 'Inactif' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('apprentis.edit', $apprenti->id) }}" class="btn btn-primary btn-sm">
                                            <i class="ri-pencil-line"></i>
                                        </a>
                                        <a href="{{ route('apprentis.show', $apprenti->id) }}" class="btn btn-info btn-sm">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                        <form action="{{ route('apprentis.destroy', $apprenti->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($apprentis->isEmpty())
                        <div class="text-center mt-3">
                            Aucun apprenti trouvé.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT RECHERCHE SUR NOM ET PRÉNOM --}}
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#apprentiTable tbody tr');
    let visibleCount = 0;

    rows.forEach(row => {
        const nomCell = row.querySelector('.cell-nom');
        const prenomCell = row.querySelector('.cell-prenom');

        const nomText = nomCell.textContent.toLowerCase();
        const prenomText = prenomCell.textContent.toLowerCase();

        if (nomText.includes(filter) || prenomText.includes(filter)) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    const noResultMessage = document.getElementById('noResultMessage');
    noResultMessage.style.display = visibleCount === 0 ? 'block' : 'none';
});
</script>

@endsection
