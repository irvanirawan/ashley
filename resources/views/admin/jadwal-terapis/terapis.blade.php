@extends('layouts.app')

@section('style')
<link href='{{ asset('fullcalender/packages/core/main.css') }}' rel='stylesheet' />
<link href='{{ asset('fullcalender/packages/daygrid/main.css') }}' rel='stylesheet' />
<link href='{{ asset('fullcalender/packages/timegrid/main.css') }}' rel='stylesheet' />
<link href='{{ asset('fullcalender/packages-premium/timeline/main.css') }}' rel='stylesheet' />
<link href='{{ asset('fullcalender/packages-premium/resource-timeline/main.css') }}' rel='stylesheet' />
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #script-warning {
    display: none;
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    text-align: center;
    font-weight: bold;
    font-size: 12px;
    color: red;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
    max-width: 900px;
    margin: 50px auto;
  }

</style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Jadwal</div>
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script src='{{ asset('fullcalender/packages/core/main.js') }}'></script>
<script src='{{ asset('fullcalender/packages/interaction/main.js') }}'></script>
<script src='{{ asset('fullcalender/packages/daygrid/main.js') }}'></script>
<script src='{{ asset('fullcalender/packages/timegrid/main.js') }}'></script>
<script src='{{ asset('fullcalender/packages-premium/timeline/main.js') }}'></script>
<script src='{{ asset('fullcalender/packages-premium/resource-common/main.js') }}'></script>
<script src='{{ asset('fullcalender/packages-premium/resource-timeline/main.js') }}'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'resourceTimeline' ],
      now: '2020-02-07',
      editable: true,
      aspectRatio: 1.8,
      scrollTime: '00:00',
      header: {
        left: 'today prev,next',
        center: 'title',
        right: 'timeGridWeek,dayGridMonth'
      },
      defaultView: 'dayGridMonth',
      events: {!! json_encode($data) !!}
    });

    calendar.render();
  });
</script>
@endsection
