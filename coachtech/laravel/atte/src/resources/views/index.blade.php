@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="stamp-content">
        <div class="stamp-content__ttl">
            <h2>{{$user->name}}さんお疲れ様です！</h2>
        </div>

    <div class="stamp-panel">
        <form class="form" action="/attendance/start" method="get">
        @csrf
            <div class="work-radiobutton">
                <div class="work-stamp_radiobutton">
                        <input id="radio1" class="work-stamp_radiobutton_start" name="start_time" type="radio" value="start_time">
                        <label for="radio1">勤務開始</label>
                </div>
        </form>
        <form class="form" action="/attendance/end" method="get">
            @csrf
                <div class="work-stamp_radiobutton">
                        <input id="radio2" class="work-stamp_radiobutton_end" name="end_time" type="radio" value="end_time">
                        <label for="radio2">勤務終了</label>
                </div>
        </form>
            </div>
            <div class="rest-radiobutton">
        <form class="form" action="/rest/start" method="get">
            @csrf
                <div class="rest-stamp_radiobutton">
                        <input id="radio3" class="rest-stamp_radiobutton_start" name="start_rest" type="radio" value="start_rest">
                        <label for="radio3">休憩開始</label>
                </div>
        </form>
        <form class="form" action="/rest/end" method="get">
            @csrf
                <div class="rest-stamp_radiobutton">
                        <input id="radio4" class="rest-stamp_radiobutton_end" name="end_rest" type="radio" value="end_rest">
                        <label for="radio4">休憩終了</label>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection