@extends('layouts.default')
@section('content')

{{-- var_dump($course) --}}
  <head>
    <title>Topic Theme{{ $ttheme->id }}</title>
  </head>
  <body>
    <h1>Outcome {{ $ttheme->id }}</h1>
    <ul>
      <li>Name: {{ $ttheme->name }}</li>
      <li>Description: {!! $ttheme->description !!}</li>
    </ul>
@stop