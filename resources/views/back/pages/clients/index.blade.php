@extends('back.layouts.master')
@section('title', 'Liste des clients')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add, Edit & Remove</h4>
            </div>

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route('client.create') }}" class="btn btn-success add-btn">
                                    <i class="ri-add-line align-bottom me-1"></i> Add
                                </a>
                                <button class="btn btn-soft-danger" onclick="deleteMultiple()">
                                    <i class="ri-delete-bin-2-line"></i>
                                </button>
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
    <div class="dropdown">
        <!-- Bouton trois points -->
        <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton{{ $client->id }}" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ri-more-2-fill"></i>
        </button>

        <!-- Menu déroulant -->
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $client->id }}">
            <li>
                <a class="dropdown-item" href="{{ route('client.edit', $client->id) }}">
                    <i class="ri-pencil-line me-2"></i> Edit
                </a>
            </li>
                        <li>
                <a class="dropdown-item" href="{{ route('mesure.index', $client->id) }}">
                    <i class="ri-eye-line me-2"></i> Voir Mesure
                </a>
            </li>
            <li>
            
                <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item">
                        <i class="ri-delete-bin-line me-2"></i> Remove
                    </button>
                </form>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('mesure.create', $client->id) }}">
                    <i class="ri-add-line me-2"></i> Ajouter Mesure
                </a>
            </li>
        </ul>
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