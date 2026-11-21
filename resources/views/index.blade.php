@extends('layouts.site')

@section('title', 'Заголовок страницы')

@section('content')
    <h1>Основной контент страницы</h1>
    <img src="{{ asset('img/sog.jpg') }}">
    <button onclick="rent()">Забронировать</button>
    @endsection

