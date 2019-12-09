@extends('layouts.app')

@section('style')

<link href="{{ asset('css/checkboxmark.css') }}" rel="stylesheet">
<link href="{{ asset('css/treeview.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 10px;">
                            <div class="card">
                                    <div class="card-header">Terapi {{ $terapi->id }}</div>
                                    <div class="card-body">

                                        <a href="{{ url('/admin/terapis') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                        <a href="{{ url('/admin/terapis/' . $terapi->id . '/edit') }}" title="Edit Terapi"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['admin/terapis', $terapi->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete Terapi',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            ))!!}
                                        {!! Form::close() !!}
                                        <br/>
                                        <br/>

                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <th>ID</th><td>{{ $terapi->id }}</td>
                                                    </tr>
                                                    <tr><th> Nama </th><td> {{ $terapi->nama }} </td></tr><tr><th> Foto </th><td> <img style="width: 150px" src="{{ asset('terapis').'/'.$terapi->foto }}" > </td></tr><tr><th> Keterangan </th><td> {{ $terapi->keterangan }} </td></tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Spesialis</div>
                            <div class="card-body">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        @include('admin.perawatan-terapis',['data'=>$terapi->id,'show'=>true])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
$.fn.extend({
	treeview:	function() {
		return this.each(function() {
			// Initialize the top levels;
			var tree = $(this);

			tree.addClass('treeview-tree');
			tree.find('li').each(function() {
				var stick = $(this);
			});
			tree.find('li').has("ul").each(function () {
				var branch = $(this); //li with children ul

				branch.prepend("<i class='tree-indicator glyphicon glyphicon-chevron-right'></i>");
				branch.addClass('tree-branch');
				branch.on('click', function (e) {
					if (this == e.target) {
						var icon = $(this).children('i:first');

						icon.toggleClass("glyphicon-chevron-down glyphicon-chevron-right");
						$(this).children().children().toggle();
					}
				})
				branch.children().children().toggle();

				/**
				 *	The following snippet of code enables the treeview to
				 *	function when a button, indicator or anchor is clicked.
				 *
				 *	It also prevents the default function of an anchor and
				 *	a button from firing.
				 */
				branch.children('.tree-indicator, button, a').click(function(e) {
					branch.click();

					e.preventDefault();
				});
			});
		});
	}
});

/**
 *	The following snippet of code automatically converst
 *	any '.treeview' DOM elements into a treeview component.
 */
$(window).on('load', function () {
	$('.treeview').each(function () {
		var tree = $(this);
		tree.treeview();
	})
})
/**
 *	Checkbox JS
 */

</script>
@endsection
