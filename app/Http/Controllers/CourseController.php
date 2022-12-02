<?php

namespace App\Http\Controllers;

use App\Models\Course;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(5);
        foreach ($courses as $course) {
            if ($course->methodology == 1) {
                $course['methodology_name'] = 'Presencial';
            } else if ($course->methodology == 2) {
                $course['methodology_name'] = 'Remota';
            }
        }
        return view('courses.index', compact('courses'));
    }

    public function search(Request $request)
    {
        $course = Course::where('code', $request['code'])->first();
        if (!$course) {
            return redirect()->to('/courses/edit')->withErrors('Curso no encontrado!');
        }
        $role = $course->role;
        return view('courses.edit', compact('course'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validations = [
            'code' => ['required', 'unique:courses,code'],
            'name' => 'required',
            'description' => 'required',
            'methodology2' => 'required'
        ];

        $request->validate($validations);

        $data = [
            'name' => $request['name'],
            'code' => $request['code'],
            'description' => $request['description'],
            'methodology' => $request['methodology2']
        ];

        Course::create($data);

        return redirect()->to('/courses/new')->with('success', 'Curso creado con éxito!');
    }

    public function edit(Course $course)
    {
        return view('courses.search', compact('course'))->with('type', 0);
    }

    public function update(Request $request)
    {
        $validations = [
            'name' => 'required',
            'code' => ['required', 'unique:courses,code,' . $request['id_course']],
            'description' => 'required',
            'methodology2' => 'required'
        ];
        $request->validate($validations);

        $data = [
            'name' => $request['name'],
            'code' => $request['code'],
            'description' => $request['description'],
            'methodology' => $request['methodology2']
        ];

        $course = Course::find($request['id_course']);

        $course->update($data);
        return redirect()->to('/courses/edit')->with('success', 'Curso editado con éxito!');
    }

    public function delete()
    {
        return view('courses.search')->with('type', 1);
    }

    public function destroy(Request $request)
    {
        $course = Course::where('code', $request['code'])->first();
        if (!$course) {
            return redirect()->to('/courses/delete')->withErrors('Curso no encontrado!');
        }
        $course->delete();
        return redirect()->to('/courses/delete')->with('success', 'Curso eliminado con éxito!');
    }
}
