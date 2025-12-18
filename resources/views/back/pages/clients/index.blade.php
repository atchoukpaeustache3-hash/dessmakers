@extends('back.layouts.master')

@section('title', 'Liste Clients')
@section('page-title', 'Liste Clients')

@section('breadcrumb')
    <li class="breadcrumb-item active">Liste Clients</li>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">LISTE DES CLIENTS</h4>
            </div>

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route('client.create') }}" class="btn btn-success add-btn">
                                    <i class="ri-add-line align-bottom me-1"></i> Ajouter Client
                                </a>
                               
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Sexe</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody class="list form-check-all">
                                @foreach ($clients as $client)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>

                                    <td class="customer_name">{{ $client->name }}</td>
                                    <td class="customer_lastname">{{ $client->lastname }}</td>
                                    <td class="phone">{{ $client->phone }}</td>
                                    <td class="date">{{ $client->adresse }}</td>
                                    <td class="status">
                                        <span class="badge bg-success-subtle text-success text-uppercase">
                                            {{ $client->sexe }}
                                        </span>
                                    </td>
                                    <td>{{ $client->email }}</td>
<td>
    <div class="d-flex gap-2">
        <!-- Voir Mesure -->
        <a href="{{ route('mesure.index', $client->id) }}" class="btn btn-info btn-sm" title="Voir Mesure">
            <i class="ri-eye-line"></i>
        </a>

        <!-- Editer Client -->
        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-primary btn-sm" title="Editer">
            <i class="ri-pencil-line"></i>
        </a>

        <!-- Supprimer Client -->
        <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce client ?')">
                <i class="ri-delete-bin-line"></i>
            </button>
        </form>

        <!-- Ajouter Mesure -->
        <a href="{{ route('mesure.create', $client->id) }}" class="btn btn-success btn-sm" title="Ajouter Mesure">
            <i class="ri-add-line"></i>
        </a>
    </div>
</td>


                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                        @if ($clients->count() == 0)
                        <div class="noresult text-center">
                            <lord-icon src="../../../msoeawqm.json" trigger="loop"
                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                            </lord-icon>
                            <h5 class="mt-2">No Result Found</h5>
                            <p class="text-muted mb-0">Aucun client trouvé.</p>
                        </div>
                        @endif

                    </div>

                    

                </div>
            </div>

        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search');
    const tbody = document.querySelector('#customerTable tbody');
    
    // On garde une copie de toutes les lignes originales
    const originalRows = Array.from(tbody.querySelectorAll('tr'));

    // Si tbody initialement vide
    if(originalRows.length === 0){
        tbody.innerHTML = `
            <tr>
                <td colspan="8" class="text-center">Aucun client enregistré</td>
            </tr>
        `;
    }

    searchInput.addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        let found = false;

        // Vider tbody pour réafficher les lignes filtrées
        tbody.innerHTML = '';

        originalRows.forEach(row => {
            const name = row.querySelector('.customer_name').textContent.toLowerCase();
            const lastname = row.querySelector('.customer_lastname').textContent.toLowerCase();

            if(searchValue === '' || name.includes(searchValue) || lastname.includes(searchValue)) {
                row.style.display = '';
                tbody.appendChild(row);
                found = true;
            }
        });

        // Aucun résultat trouvé
        if(searchValue !== '' && !found){
            tbody.innerHTML = `
                <tr class="no-result">
                    <td colspan="8" class="text-center">Ce client n'existe pas</td>
                </tr>
            `;
        }

        // Si recherche vide et tbody vide
        if(searchValue === '' && originalRows.length === 0){
            tbody.innerHTML = `
                <tr>
                    <td colspan="8" class="text-center">Aucun client enregistré</td>
                </tr>
            `;
        }
    });
});
</script>

@endsection