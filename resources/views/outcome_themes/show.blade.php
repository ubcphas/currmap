@extends('layouts.default')
@section('content')

{{-- var_dump($course) --}}
  <head>
    <title>Learning Outcome Theme {{ $otheme->id }}</title>
  </head>
  <body>
    <h1>Outcome {{ $otheme->id }}</h1>
    <ul>
      <li>Name: {{ $otheme->name }}</li>
      <li>Description: {!! $otheme->description !!}</li>
    </ul>
@stop