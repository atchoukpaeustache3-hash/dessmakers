@extends('back.layouts.master')
@section('title', 'Liste des notifications')
@section('content')
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">@yield('title')</h4>
                </div>

                <div class="table-responsive">
                    
                    <table  class="table align-middle table-nowrap mb-0 datatable">
                        <thead class="table-light">
                            <tr>
                                <th>Titre</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($notifications as $notification)
                                @php
                                    $data = $notification->data;
                                @endphp
                                <tr>


                                    <td>
                                        <span class="badge bg-primary font-size-12">
                                            {{ $data['title'] ?? 'Notification' }}
                                        </span>
                                    </td>

                                    <td>
                                        @if(is_null($notification->read_at))
                                            <a href="{{ route('notifications.markRead', $notification->id) }}">
                                                <strong>{{ $data['message'] ?? 'Aucun message.' }}</strong>
                                            </a>
                                        @else
                                            {{ $data['message'] ?? 'Aucun message.' }}
                                        @endif
                                    </td>

                                    <td>
                                        @if($notification->read_at)
                                            <span class="badge bg-success">Lue</span>
                                        @else
                                            <span class="badge bg-warning">Non lue</span>
                                        @endif
                                    </td>

                                    <td>{{ \Carbon\Carbon::parse($notification->created_at)->format('d/m/Y H:i') }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>



@endsection
