@extends('layouts.app')

@section('template_title')
    Gimnasio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cliente gimnasio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('gimnasio.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Asignar nuevo cliente a gimnasio') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Nombre</th>
									<th >Fecha Suscripcion</th>
									<th >Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gimnasios as $gimnasio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $gimnasio->cliente->nombre }}</td>
										<td >{{ $gimnasio->fecha_suscripcion }}</td>
										<td >{{ $gimnasio->estado }}</td>

                                            <td>
                                                <form action="{{ route('gimnasio.destroy', $gimnasio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('gimnasio.show', $gimnasio->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('gimnasio.edit', $gimnasio->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $gimnasios->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
