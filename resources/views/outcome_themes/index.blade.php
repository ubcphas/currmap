<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
    <h1>Program Outcome Major Themes</h1>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('name', 'Name')</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($othemes as $theme)
      <tr>
        <td><a href={{ route('outcome_themes.show', $theme->id) }}>{{ $theme->id }}</a></td>
        <td>{{ $theme->name }}</td>
        
        <td><a href="{{action('OutcomeThemeController@edit', $theme->id)}}" class="btn btn-warning">Edit</a>
        </td>

        <td>
          {{ Form::open(['method' => 'DELETE', 'action' => ['OutcomeThemeController@destroy', $theme->id]]) }}

          {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

          {{ Form::close() }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@stop