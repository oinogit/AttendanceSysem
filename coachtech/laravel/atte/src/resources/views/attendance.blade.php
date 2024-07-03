@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="attendance-content">
    <div class="attendance-content__ttl">
        <form class="attendance-content_ttl-wrap" action="/attendance/date" method="get">
            @csrf
            <button class="date__change-button" name="prevDate"><</button>
            <input type="hidden" name="displayDate" value="{{ $displayDate }}">
            <h2>{{$displayDate->format('Y-m-d')}}</h2>
            <button class="date__change-button" name="nextDate">></button>
        </form>
    </div>

    <div class="attendance-content__table">
        <table class="attendance-table">
            <tr class="attendance-table__th">
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            @foreach($attendances as $attendance)
            <tr class="attendance-table_td">
                <td>{{$attendance->user->name}}</td>
                <td>{{substr($attendance->start_time,0,5) }}</td>
                <td>{{substr($attendance->end_time,0,5)}}</td>
                <td>{{substr($attendance->total_rest,0,5)}}</td>
                <td>{{substr($attendance->total_attendance,0,5)}}</td>
            </tr>
            @endforeach
        </table>
        <div class="pagination">
            {{$attendances->links()}}
        </div>
    </div>
</div>
@endsection