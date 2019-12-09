<div class="form-group {{ $errors->has('terapis_id') ? 'has-error' : ''}}">
    {!! Form::label('terapis_id', 'Terapis Id', ['class' => 'control-label']) !!}
    {!! Form::number('terapis_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('terapis_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('perawatan_id') ? 'has-error' : ''}}">
    {!! Form::label('perawatan_id', 'Perawatan Id', ['class' => 'control-label']) !!}
    {!! Form::number('perawatan_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('perawatan_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    {!! Form::label('keterangan', 'Keterangan', ['class' => 'control-label']) !!}
    {!! Form::text('keterangan', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
