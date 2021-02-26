@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mx-auto float">Bienvenido a Start</h1>
@stop

@section('content')


<div class="wrapper">

    <div class="clock">
        <div class="clock-circles">
            <div class="clock-circles__item"></div>
            <div class="clock-circles__item"></div>
            <div class="clock-circles__item"></div>
            <div class="clock-circles__item">
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
            </div>
        </div>
        <div class="clock-indicators">
            <div class="clock-indicators__item"></div>
            <div class="clock-indicators__item"></div>
            <div class="clock-indicators__item"></div>
            <div class="clock-indicators__item"></div>
            <div class="clock-indicators__item"></div>
            <div class="clock-indicators__item"></div>
            <div class="clock-indicators__item"></div>
            <div class="clock-indicators__item"></div>
        </div>
        <div class="clock-times">
            <div class="clock-times__second"></div>
            <div class="clock-times__minute"></div>
            <div class="clock-times__hour"></div>
        </div>
    </div>
</div>
@stop

@section('css')

    <link rel="stylesheet" href="{{ asset('css/customclock.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
