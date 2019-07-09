<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('Manager.Schedule.Index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Manager.Schedule.Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data  = [
                "start" => $request->input('start'),
                "end"   => $request->input('end'),
            ];
            $saved = Schedule::create($data);

            if ($saved) {
                return redirect()->route('manager.schedule.index')
                                 ->with('success', __('definitions.message.save.success'));
            } else {
                return redirect()->back()->with('error', __('definitions.message.save.error'));
            }
        } catch (Exception $ex) {
            report($ex);

            return redirect()->back()->with('error', __('definitions.message.save.error'));
        }
    }

    /**
     * Display the specified resource.
     * @param  \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->active_flag = $request['active_flag'];
        $schedule->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule  = Schedule::find($id);
        $delete = $schedule->delete();

        return redirect()->back()->with('success', 'deletado com sucesso!');
    }
}
