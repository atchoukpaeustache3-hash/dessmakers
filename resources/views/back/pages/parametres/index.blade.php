@extends('back.layouts.master')
@section('title', 'Paramètres')
@section('content')

    <div class="row">
    <div class="col-lg-10 offset-lg-1">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">@yield('title')</h4>
                <p class="card-title-desc">Modifiez les informations ci-dessous</p>

                <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data" up-target=".main">
                    @csrf
                    @method('PUT')

                    <div class="row">

                         @foreach ($settings as $setting)

                            <div class="col-sm-6">

                                <div class="mb-3">
                                    <label for="name"> {{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>

                                     @if ($setting->key == 'logo' || $setting->key == 'authentification_logo')
                                        <input type="file" class="form-control" id="{{ $setting->key }}"
                                            name="settings[{{ $setting->key }}]">
                                    @elseif ($setting->key == 'seuil_commission' || $setting->key == 'seuil_recompenses' )
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="validationTooltipUsernamePrepend">FCFA</span>
                                            </div>
                                            <input type="number" class="form-control" id="{{ $setting->key }}"
                                             name="settings[{{ $setting->key }}]" min="1" value="{{ old('settings.' . $setting->key, $setting->value) }}">
                                       </div>
                                    @elseif($setting->key == 'notification')
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="{{ $setting->key }}">
                                                {{ ucwords(str_replace('_', ' ', $setting->key)) }}
                                            </label>
                                            <input class="form-check-input"
                                                type="checkbox"
                                                role="switch"
                                                id="{{ $setting->key }}"
                                                name="settings[{{ $setting->key }}]"
                                                value="1"
                                                {{ old('settings.' . $setting->key, $setting->value) ? 'checked' : '' }}
                                                onchange="return confirmToggle(this)">
                                        </div>

                                    @else

                                      <input type="text" class="form-control" id="{{ $setting->key }}"
                                            name="settings[{{ $setting->key }}]" value="{{ old('settings.' . $setting->key, $setting->value) }}">

                                    @endif

                                    @error('settings.' . $setting->key)
                                      <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>



                            </div>
                        @endforeach




                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Mettre à jour</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
        function confirmToggle(checkbox) {
            const isChecked = checkbox.checked;
            const message = isChecked
                ? 'Voulez-vous vraiment activer les notifications ?'
                : 'Voulez-vous vraiment désactiver les notifications ?';

            if (!confirm(message)) {
                // Revenir à l’état précédent si l’utilisateur annule
                checkbox.checked = !isChecked;
                return false;
            }

            return true;
        }
    </script>

@endsection

