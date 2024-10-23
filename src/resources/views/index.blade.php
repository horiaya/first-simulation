@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__group">
    <div class="attendance__alert">
        @if (Auth::check())
        <p>{{Auth::user()->name}}さんお疲れ様です！！</p>
        @endif
    </div>
    <div class="todo__alert">
        @if(session('message'))
        <div class="todo__alert--success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="attendance__content">
        <div class="attendance__form-submit">
            <form class="timestamp" action="/attendance/start" method="post">
                @csrf
                <input type="submit" name="startwork" value="勤務開始" id="startwork">
            </form>
            <form class="timestamp" action="/attendance/end" method="post">
                @csrf
                <input type="submit" name="endwork" value="勤務終了" id="endwork">
            </form>
            <form class="timestamp" action="/break/start" method="post">
                @csrf
                <input type="submit" name="startbreak" value="休憩開始" id="startbreak">
            </form>
            <form class="timestamp" action="/break/start" method="post">
                @csrf
                <input type="submit" name="endbreak" value="休憩終了" id="endbreak">
            </form>
        </div>
    </div>
</div>
@endsection