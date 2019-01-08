@extends('layouts.default')
@section('content')

{{-- var_dump($program) --}}
  <head>
    <title>Program {{ $program->id }}</title>
  </head>
  <body>
    <h1>Program {{ $program->id }}</h1>
    <ul>
      <li>Name: {{ $program->name }}</li>
      <li>Short Description: {{ $program->description }}</li>
    </ul>
@stop