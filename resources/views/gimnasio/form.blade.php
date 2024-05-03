<div class="row padding-1 p-1">
    <div class="col-md-12">
        
    <div class="form-group mb-2 mb20">
        <label for="user_id" class="form-label">{{ __('User ID') }}</label>
        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
            @foreach($cliente as $key => $cliente)
                <option value="{{ $key }}">
                    {{ $cliente }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_suscripcion" class="form-label">{{ __('Fecha Suscripcion') }}</label>
            <input type="text" name="fecha_suscripcion" class="form-control datepicker @error('fecha_suscripcion') is-invalid @enderror" value="{{ old('fecha_suscripcion', $gimnasio?->fecha_suscripcion) }}" id="fecha_suscripcion" placeholder="Fecha Suscripcion">
            {!! $errors->first('fecha_suscripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $gimnasio?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Cargar') }}</button>
    </div>
</div>