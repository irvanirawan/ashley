<div class="form-group {{ $errors->has('booking_id') ? 'has-error' : ''}}">
    {!! Form::label('booking_id', 'Booking Id', ['class' => 'control-label']) !!}
    {!! Form::number('booking_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('booking_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('terapis_perawatan_id') ? 'has-error' : ''}}">
    {!! Form::label('terapis_perawatan_id', 'Terapis Perawatan Id', ['class' => 'control-label']) !!}
    {!! Form::number('terapis_perawatan_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('terapis_perawatan_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tanggal_datang') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_datang', 'Tanggal Datang', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal_datang', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('tanggal_datang', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('waktu_hari_id') ? 'has-error' : ''}}">
    {!! Form::label('waktu_hari_id', 'Waktu Hari Id', ['class' => 'control-label']) !!}
    {!! Form::number('waktu_hari_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('waktu_hari_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
