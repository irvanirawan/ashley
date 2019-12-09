<div class="row">
    @foreach (\App\PerawatanKategori::with(['Perawatan.TerapisPerawatan'=>function ($query) use($data) {
                    $query->select('*')->where('terapis_id','=',$data);
                }])->get()
                as
                $item)
    <div class="col-md-4">
        <!-- TREEVIEW CODE -->
        <ul class="treeview form">
            <li><b style="font-size: x-large;">{{$item->nama}}</b>
                <ul>
                    @foreach ($item->Perawatan as $item2)
                    <li style="padding-right: 0px;">
                        <label class="label" style="width: 35px;">
                        <input name="perawatan[]" value="{{$item2->id}}" class="label__checkbox" type="checkbox" {{ (count($item2->TerapisPerawatan) == 0) ? '' : 'checked' }} {{ $show ? 'disabled' : '' }}/>
                            <span class="label__text">
                                <span class="label__check">
                                    <i class="fa fa-check icon"></i>
                                </span>
                            </span>
                        </label>
                        <i>{{$item2->nama}} - {{$item2->harga}}k</i>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <!-- TREEVIEW CODE -->
    </div>
    @endforeach
</div>
