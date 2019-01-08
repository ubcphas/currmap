@extends('layouts.default')
@section('content')

  <head>
    <title>Topic Level {{ $level->id }}</title>
  </head>
  <body>
    <h1>Level: {{ $level->level }}</h1>
    <ul>
      <li>Name: {{ $level->name }}</li>
    </ul>
@stop