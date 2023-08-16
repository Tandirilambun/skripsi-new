<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreActivityLogRequest;
use App\Http\Requests\UpdateActivityLogRequest;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activity_log = DB::table('activity_log')
            ->select(
                'activity_log.*',
                'users.name'
            )
            ->leftJoin('users', 'users.id_user', '=', 'activity_log.id_user')
            ->orderBy('created_at', 'desc')
            ->get();
        $x = 'All';
        $jenis_activity = collect(['all', 'insert', 'update', 'delete']);
        return view('Renstra.audit-log', [
            'x' => $x,
            'activity_log' => $activity_log,
            'jenis_activity' => $jenis_activity,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityLog $activityLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityLog $activityLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityLogRequest $request, ActivityLog $activityLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityLog $activityLog)
    {
        //
    }

    public function filterAction(Request $request)
    {
        if ($request->btn_value == 'insert') {
            $activity_log = DB::table('activity_log')
                ->select(
                    'activity_log.*',
                    'users.name'
                )
                ->leftJoin('users', 'users.id_user', '=', 'activity_log.id_user')
                ->where('tipe_log', '=', 'insert')
                ->orderBy('created_at', 'desc')
                ->get();
            $x = 'Insert';
        } elseif ($request->btn_value == 'update') {
            $activity_log = DB::table('activity_log')
                ->select(
                    'activity_log.*',
                    'users.name'
                )
                ->leftJoin('users', 'users.id_user', '=', 'activity_log.id_user')
                ->where('tipe_log', '=', 'update')
                ->orderBy('created_at', 'desc')
                ->get();
            $x = 'Update';
        } elseif ($request->btn_value == 'delete') {
            $activity_log = DB::table('activity_log')
                ->select(
                    'activity_log.*',
                    'users.name'
                )
                ->leftJoin('users', 'users.id_user', '=', 'activity_log.id_user')
                ->where('tipe_log', '=', 'delete')
                ->orderBy('created_at', 'desc')
                ->get();
            $x = 'Delete';
        } elseif ($request->btn_value == 'all') {
            $x = 'All';
            return redirect('/activity-log');
        }
        $jenis_activity = collect(['all', 'insert', 'update', 'delete']);
        return view("Renstra.audit-log", [
            'x' => $x,
            'activity_log' => $activity_log,
            'jenis_activity' => $jenis_activity,
        ]);
    }
}
