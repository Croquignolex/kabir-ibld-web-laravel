@extends('layouts.app', [
    'breadcrumb_name' => 'Information',
    'breadcrumb_icon' => 'mdi mdi-information-outline',
    'breadcrumb_chain' => ['Outils', 'Information']
]))

@section('app.master.title', page_title('Information du site'))

@section('app.master.body')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2>Information du site</h2>
                </div>
                <!-- body -->
                <div class="card-body">
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        @include('partials.form.input', [
                            'name' => 'Localisation',
                            'id' => 'town',
                            'icon' => 'mdi mdi-map-marker-outline',
                            'type' => 'text',
                            'value' => old('town') ?? $setting->town,
                        ])
                        @include('partials.form.input', [
                            'name' => 'Téléphone',
                            'id' => 'phone',
                            'icon' => 'mdi mdi-deskphone',
                            'type' => 'text',
                            'value' => old('phone') ?? $setting->phone,
                        ])
                        @include('partials.form.submit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
