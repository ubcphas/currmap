<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
    <h1>Course Topic Major Themes</h1>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($tthemes as $theme)
      <tr>
        <td><a href={{ route('topic_themes.show', $theme->id) }}>{{ $theme->id }}</a></td>
        <td>{{ $theme->name }}</td>
        
        <td><a href="{{action('TopicThemeController@edit', $theme->id)}}" class="btn btn-warning">Edit</a>
        </td>

        <td>
          {{ Form::open(['method' => 'DELETE', 'action' => ['TopicThemeController@destroy', $theme->id]]) }}

          {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

          {{ Form::close() }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@stop