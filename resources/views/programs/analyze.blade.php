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
        <table class="table table-striped">
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