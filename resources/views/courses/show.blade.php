@extends('layouts.default')
@section('content')

{{-- var_dump($course) --}}
  <head>
    <title>Course {{ $course->id }}</title>
  </head>
  <body>
    <h1>Course {{ $course->id }}</h1>
    <ul>
      <li>Name: {{ $course->name }}</li>
      <li>Short Description: {{ $course->short_description }}</li>
      <li>Full Description: {!! $course->description !!}</li>
      <li>Year: {{ $course->year }}</li>
    </ul>
@stop