@extends('back.layouts.master')
@section('title', 'Modifier un moyen de paiement')
@section('content')

    <div class="row">
    <div class="col-lg-10 offset-lg-1">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">@yield('title')</h4>
                <p class="card-title-desc">Modifiez les informations ci-dessous</p>

                 <form method="POST" action="{{ route('paymentmodes.update', $mode) }}" up-target=".main">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-sm-10">
                            <div class="mb-3">
                                <label for="label">Nom du mode</label>
                                <input name="label" type="text" class="form-control @error('label') is-invalid @enderror" value="{{ old('label', $mode->label) }}" placeholder="Ex : Orange Money, Wave">
                                @error('label')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Mettre à jour</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

