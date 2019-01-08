@extends('layouts.default')
@section('content')

{{-- var_dump($course) --}}
  <head>
    <title>Course Topic {{ $topic->id }}</title>
  </head>
  <body>
    <h1>Outcome {{ $topic->id }}</h1>
    <ul>
      <li>Name: {{ $topic->name }}</li>
      <li>Description: {!! $topic->description !!}</li>
    </ul>
@stop