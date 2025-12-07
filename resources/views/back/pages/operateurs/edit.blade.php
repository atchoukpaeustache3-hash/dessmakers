@extends('back.layouts.master')
@section('title', 'Ajouter un préfixe')
@section('content')

    <div class="row">
    <div class="col-lg-10 offset-lg-1">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('operators.update', $operator) }}" up-target=".main">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 col-6">
                        <label for="label">Nom</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $operator->name) }}" placeholder="Ex : Orange Money, Wave">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new-prefix" class="form-label">Ajouter un préfixe</label>
                        <div class="d-flex gap-2">
                            <input type="text" id="new-prefix" class="form-control" style="max-width: 150px;" placeholder="Ex: 91">
                            <button type="button" class="btn btn-outline-primary" id="add-prefix-btn">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                        </div>
                    </div>

                    <table   class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Préfixe</th>
                                <th style="width: 50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="prefixes-table-body">
                            @foreach(json_decode($operator->prefix, true) ?? [] as $prefix)
                                <tr>
                                    <td>
                                        <input type="hidden" name="prefixes[]" value="{{ $prefix }}">
                                        {{ $prefix }}
                                    </td>
                                    <td class="text-center ">

                                            <button type="button" class="btn btn-sm btn-danger remove-prefix" title="Supprimer">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center py-2">
                            <a href="{{ route('operators.index') }}" class="btn btn-secondary">
                                <i class="mdi mdi-arrow-left"></i> Retour à la liste
                            </a>

                            <!-- Bouton droite -->
                            <button type="submit" class="btn btn-primary">
                                Enregistrer
                            </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-prefix-btn').addEventListener('click', function () {
        const input = document.getElementById('new-prefix');
        const value = input.value.trim();

        if (!value) {
            alert('Veuillez entrer un préfixe.');
            return;
        }

        // Facultatif : vérifier si le préfixe existe déjà
        const existingInputs = document.querySelectorAll('input[name="prefixes[]"]');
        for (const el of existingInputs) {
            if (el.value === value) {
                alert('Ce préfixe existe déjà.');
                return;
            }
        }

        const tableBody = document.getElementById('prefixes-table-body');

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <input type="hidden" name="prefixes[]" value="${value}">
                ${value}
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-sm btn-danger remove-prefix" title="Supprimer">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        `;

        // Ajoute la nouvelle ligne en haut de la table
        tableBody.insertBefore(row, tableBody.firstChild);

        input.value = ''; // Reset le champ d'entrée
    });

    document.addEventListener('click', function (e) {
        if (e.target.closest('.remove-prefix')) {
            // Demander confirmation
            if (confirm('Êtes-vous sûr de vouloir supprimer ce préfixe ?')) {
                // Si l’utilisateur confirme, on supprime la ligne
                e.target.closest('tr').remove();
            }
            // Sinon, on ne fait rien (annule la suppression)
        }
    });

</script>

@endsection




