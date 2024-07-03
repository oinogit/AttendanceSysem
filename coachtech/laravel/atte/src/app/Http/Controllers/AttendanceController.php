<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class AttendanceController extends Controller
{
    public function index() {
        $now_date = Carbon::now()->format('Y-m-d');
        $user_id = Auth::user()->id;
        $confirm_date = Attendance::where('user_id', $user_id)
            ->where('date', $now_date)
            ->first();

        $user = auth()->user();
        return view('index', compact('user'));
    }

    public function startWork(Request $request) {
        $now_date = Carbon::now()->format('Y-m-d');
        $now_time = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->id;
        if ($request->has('start_rest') || $request->has('end_rest')) {
            $attendance_id = Attendance::where('user_id', $user_id)
                ->where('date', $now_date)
                ->first()
                ->id;
        }

        $attendance = new Attendance();
        $attendance->user_id = $user_id;
        $attendance->date = $now_date;
        $attendance->start_time = $now_time;
        $attendance->save();

        return redirect('/');
    }

    public function startRest() {
        $now_date = Carbon::now()->format('Y-m-d');
        $now_time = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->id;
        $attendance_id = Attendance::where('user_id', $user_id)
        ->where('date', $now_date)
            ->first()
            ->id;

        $attendance = new Rest();
        $attendance->attendance_id = $attendance_id;
        $attendance->start_rest = $now_time;
        // $attendance->end_rest = $now_time;
        $attendance->save();

        return redirect('/');
    }

    public function endRest() {
        $now_date = Carbon::now()->format('Y-m-d');
        $now_time = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->id;
        $attendance = Attendance::where('user_id', $user_id)
            ->where('date', $now_date)
            ->first();

        $attendance->update([
            'end_rest' => $now_time
        ]);

        $attendance->save();

        return redirect('/');
    }

    public function endWork() {
        $now_date = Carbon::now()->format('Y-m-d');
        $now_time = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->id;
        $attendance = Attendance::where('user_id', $user_id)
            ->where('date', $now_date)
            ->first();

        $attendance->update([
            'end_time' => $now_time
        ]);

        $attendance->save();

        return redirect('/');
    }

    public function admin() {
        $attendances = Attendance::all();
        $attendances = Attendance::paginate(5);
        $displayDate = Carbon::now();
        $user = auth()->user();
        $total = Attendance::where('user_id')->sum('start_time','end_time');
        // dd($attendances);
        return view('attendance', compact('attendances','displayDate','user','total'));
    }

    public function attendanceDate(Request $request) {
        $displayDate = Carbon::parse($request->input('displayDate'));

        if ($request->has('prevDate')) {
            $displayDate->subDay();
        }

        if ($request->has('nextDate')) {
            $displayDate->addDay();
        }

        return view('attendance', compact('displayDate'));
    }
}