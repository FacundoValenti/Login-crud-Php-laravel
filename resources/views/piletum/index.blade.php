@extends('layouts.app')

@section('template_title')
    Pileta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cliente pileta') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pileta.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Asignar nuevo cliente a pileta') }}
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
                                    @foreach ($pileta as $piletum)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $piletum->cliente->nombre }}</td>
										<td >{{ $piletum->fecha_suscripcion }}</td>
										<td >{{ $piletum->estado }}</td>

                                            <td>
                                                <form action="{{ route('pileta.destroy', $piletum->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pileta.show', $piletum->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pileta.edit', $piletum->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $pileta->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
