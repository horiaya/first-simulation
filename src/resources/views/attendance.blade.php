@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="attendance__group">
    <table class="attendance__content">
        <tr>
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
        @foreach ($items as $item)
        
        <tr>
            <td>{{Auth::user()->name}}</td>
            <td>{{$item->startwork}}</td>
            <td>{{$item->endwork}}</td>
        <!-- 休憩時間がある場合はそれも表示 -->
        @if ($posts->isNotEmpty())
        @foreach ($posts as $post)
            <td>{{$post->startbreak}}</td>
            <td>{{$post->endbreak}}</td>
            @endforeach
            @else
                <!-- postsが空の場合は何も表示しない -->
                <td colspan="2"></td> <!-- 空のセルを表示する場合 -->
            @endif
        </tr>
        @endforeach
    </table>
</div>
@endsection