<div class="form-group {{ $errors->has('terapis_id') ? 'has-error' : ''}}">
    <select name="terapis_id" class="form-control">
        <option value="">-- Pilih Terapis --</option>
        @foreach (\App\Terapi::all() as $item)
            <option value="{{$item->id}}">{{$item->nama}}</option>
        @endforeach
    </select>
    {!! $errors->first('terapis_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <input type="date" class="form-control datepick" name="tanggal">
    {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
