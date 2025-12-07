
@extends('back.layouts.master')
@section('title', 'Liste des logs')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">@yield('title')</h4>

                    </div>

                    <div class="table-responsive">
                        <table  class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Adresse IP</th>
                                <th>Navigateur</th>
                                <th>Plateforme</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>

                            <tbody>


                                @foreach($userlogs as $log)

                                    <tr>

                                        <td>{{ $log->user->firstname.' '.$log->user->lastname }}</td>
                                        <td>{{ $log->ip_address }}</td>
                                        <td>{{ $log->browser }}</td>
                                        <td>{{ $log->platform }}</td>
                                        <td>{{ $log->created_at->locale('fr')->isoFormat('D MMMM YYYY, HH:mm') }}</td> <!-- Date de connexion -->
                                        <td>
                                            <span class="{{ $log->status  ? 'badge bg-success' : 'badge bg-danger' }} ">
                                                {{ $log->status  ? 'Succès' : 'Echoué' }}
                                            </span>
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

