@extends('layouts.site')

@section('title', 'Заголовок страницы')

@section('content')
    <p>Основной контент страницы</p>

    <a href="{{ url('/form1') }}">1</a>
    <a href="{{ url('/form2') }}">2</a>
    <a href="{{ url('/form3') }}">3</a>

    @endsection

