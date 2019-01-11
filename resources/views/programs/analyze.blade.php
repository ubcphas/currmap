@extends('layouts.default')
@section('content')

  <head>
    <title>Program Analysis{{ $program->id }}</title>
  </head>
  <body>
    <h1>Program {{ $program->id }}</h1>
    <ul>
      <li>Name: {{ $program->name }}</li>
      <li>Short Description: {{ $program->description }}</li>
    </ul>

    <div class="form-group col-md-12">
        <table id="dtable" class="table table-striped">
            <thead>
                <tr>
                    <th>Outcome</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outcomes as $o)
                <tr>
                    <td> {{ $o->name }} </td>
                    <td>{{ $o->amount }}</td>
               </tr>
               @endforeach
           </tbody>
       </table>
   </div>
@stop

@section('js')
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
<script>
  $(document).ready(function(){
    $("#dtable").DataTable( {
      dom: 'Bfrtip',
      buttons: ['csv', 'pdf'],
      "paging": false,
      "info": false
    });
  });
</script>
@stop
