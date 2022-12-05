<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\TeacherAssignment;
use App\Models\Registration;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id_course', 'desc')->select('courses.id as id_course', 'courses.code', 'courses.name', 'courses.description', 'courses.methodology', 'users.name as name_user')
            ->leftJoin("teacher_assignments", "teacher_assignments.id_course", "=", "courses.id")
            ->leftJoin("users", "users.id", "=", "teacher_assignments.id_teacher")
            ->paginate(5);
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

    public function teacherAssign()
    {
        return view('courses.search')->with('type', 2);
    }

    public function searchCourse(Request $request)
    {
        $course = Course::where('code', $request['code'])->first();
        if (!$course) {
            return redirect()->to('/courses/teacher_assign')->withErrors('Curso no encontrado!');
        }
        $assignment = TeacherAssignment::where('id_course', $course['id'])->first();
        if($assignment){
            return redirect()->to('/courses/teacher_assign')->withErrors('El curso ya tiene un profesor asignado!');
        }
        $id_course = $course->id;
        return view('courses.teacherAssign', compact('id_course'));
    }

    public function assign(Request $request)
    {
        $teacher = User::where(['num_id' => $request['num_id'], 'role' => 2])->select('teachers.id')->join("teachers", "teachers.id_user", "=", "users.id")->first();
        if (!$teacher) {
            return redirect()->to('/courses/teacher_assign')->withErrors('Profesor no encontrado!');
        }
        TeacherAssignment::create(['id_teacher' => $teacher['id'], 'id_course' =>  $request['id_course']]);
        return redirect()->to('/courses/teacher_assign')->with('success', 'Profesor asignado con éxito!');
    }


    public function enrollStudent()
    {
        return view('courses.search')->with('type', 3);
    }

    public function searchCourseEnroll(Request $request)
    {
        $course = Course::where('code', $request['code'])->first();
        if (!$course) {
            return redirect()->to('/enroll')->withErrors('Curso no encontrado!');
        }
        $id_course = $course->id;
        return view('enroll.index', compact('id_course'));
    }

    public function enroll(Request $request)
    {
        $student = User::where(['num_id' => $request['num_id'], 'role' => 3])->select('students.id')->join("students", "students.id_user", "=", "users.id")->first();
        if (!$student) {
            return redirect()->to('/enroll')->withErrors('Estudiante no encontrado!');
        }
        $enroll = Registration::where(['id_course' => $request['id_course'], 'id_student' => $student['id']])->first();
        if($enroll){
            return redirect()->to('/enroll')->withErrors('El estudiante ya tiene el curso matriculado!');
        }
        Registration::create(['id_student' => $student['id'], 'id_course' =>  $request['id_course']]);
        return redirect()->to('/enroll')->with('success', 'Estudiante matriculado con éxito!');
    }
}
