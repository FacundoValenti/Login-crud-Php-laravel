@extends('layouts.app')

@section('template_title')
    {{ $gimnasio->name ?? __('Show') . " " . __('Gimnasio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Cliente') }} Gimnasio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('gimnasio.index') }}"> {{ __('Salir') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>id:</strong>
                                    {{ $gimnasio->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Suscripcion:</strong>
                                    {{ $gimnasio->fecha_suscripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $gimnasio->estado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
