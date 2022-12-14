<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class attendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::orderBy('id', 'desc')->paginate(10);
        return view('attendances.index', compact('attendances'));
    }

    public function store(Request $request)
    {
        $validations = [
            'id_class' => ['required', 'exists:classes,id'],
            'id_student' => ['required', 'exists:users,num_id']
        ];
        $request->validate($validations);

        $data = [
            'id_class' => $request['id_class'],
            'id_student' => $request['id_student']
        ];

        Attendance::create($data);

        return redirect()->to('attendances')->with('success', 'Asistencia creada correctamente');
    }

    public function create()
    {
        return view('attendances.create');
    }

    public function edit(Attendance $attendance)
    {
        return view('attendances.search', compact('attendance'))->with('type', 0);
    }

    public function search(Request $request)
    {
        $attendance = Attendance::where('id', $request['id'])->first();
        if (!$attendance) {
            return redirect()->to('/attendances/edit')->withErrors('Asistencia no encontrada!');
        }
        $role = $attendance->role;
        return view('attendances.edit', compact('attendance'));
    }

    public function update(Request $request)
    {
        $validations = [
            'id_class' => ['required', 'exists:classes,id'],
            'id_student' => ['required', 'exists:users,num_id']
        ];
        $request->validate($validations);

        $data = [
            'id_class' => $request['id_class'],
            'id_student' => $request['id_student']
        ];
        $attendance = Attendance::find($request['id_student2']);

        $attendance->update($data);
        return redirect()->to('/attendances/edit')->with('success', 'Asistencia editada con éxito!');
    }

    public function delete()
    {
        return view('attendances.search')->with('type', 1);
    }

    public function destroy(Request $request)
    {
        $attendance = Attendance::where('id', $request['id'])->first();
        if (!$attendance) {
            return redirect()->to('/attendances/delete')->withErrors('Asistencia no encontrada!');
        }
        $attendance->delete();
        return redirect()->to('/attendances/delete')->with('success', 'Asistencia eliminada con éxito!');
    }

    public function searchStudent()
    {
        return view('attendances.searchStudent');
    }

    public function indexStudent(Request $request)
    {
        $attendances = Attendance::where('id_student', $request['id'])->orderBy('id', 'desc')->get();
        return view('attendances.index', compact('attendances'));
    }
}
