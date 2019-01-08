@extends('layouts.default')
@section('content')

{{-- var_dump($course) --}}
  <head>
    <title>Learning Outcome {{ $outcome->id }}</title>
  </head>
  <body>
    <h1>Outcome {{ $outcome->id }}</h1>
    <ul>
      <li>Name: {{ $outcome->name }}</li>
      <li>Description: {!! $outcome->description !!}</li>
    </ul>
@stop