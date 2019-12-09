<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    {!! Form::label('nama', 'Nama', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('perawatan_kategori_id') ? 'has-error' : ''}}">
    {!! Form::label('perawatan_kategori_id', 'Kategori Perawatan', ['class' => 'control-label']) !!}
    {{-- {!! Form::number('perawatan_kategori_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
    {!! Form::select('perawatan_kategori_id', DB::table('perawatan_kategori')->pluck('nama', 'id'), null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('perawatan_kategori_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('harga') ? 'has-error' : ''}}">
    {!! Form::label('harga', 'Harga', ['class' => 'control-label']) !!}
    {!! Form::number('harga', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    {!! Form::label('keterangan', 'Keterangan', ['class' => 'control-label']) !!}
    {!! Form::textarea('keterangan', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
