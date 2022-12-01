<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Models\Teacher;
use App\Models\Student;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
        foreach ($users as $user) {
            if ($user->role == '1') {
                $user['role_name'] = 'Administrador';
            } elseif ($user->role == '2') {
                $user['role_name'] = 'Profesor';
            } else {
                $user['role_name'] = 'Estudiante';
            }

            if ($user->active == '1') {
                $user['active_name'] = 'Activo';
                $user['active_color'] = 'green';
            } else {
                $user['active_name'] = 'Inactivo';
                $user['active_color'] = 'red';
            }
        }
        return view('users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $user = User::where('num_id', $request['num_id'])->first();
        if (!$user) {
            return redirect()->to('/users/edit')->withErrors('Usuario no encontrado!');
        }
        $role = $user->role;
        if ($role == 2) {
            $user = User::where('num_id', $request['num_id'])->select('users.id as id', 'name', 'username', 'password', 'email', 'active', 'num_id', 'role', 'knowledge_area', 'department', 'teacher.id as id_teacher')->join("teachers", "teachers.id_user", "=", "users.id")->first();
        } else if ($role == 3) {
            $user = User::where('num_id', $request['num_id'])->select('users.id as id', 'name', 'username', 'password', 'email', 'active', 'num_id', 'role', 'career', 'students.id as id_student')->join("students", "students.id_user", "=", "users.id")->first();
        }
        return view('users.edit', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        if ($request['role2']) {

            $validations = [
                'name' => 'required',
                'num_id' => ['required', 'unique:users,num_id'],
                'email' => ['required', 'unique:users,email'],
                'username' => ['required', 'unique:users,username'],
                'password' => 'required'
            ];

            if ($request['role2'] == 2) {
                $validations = Arr::add($validations, 'department', 'required');
                $validations = Arr::add($validations, 'knowledge_area', 'required');
            } else if ($request['role2'] == 3) {
                $validations = Arr::add($validations, 'career', 'required');
            }
            $request->validate($validations);

            $data = [
                'name' => $request['name'],
                'num_id' => $request['num_id'],
                'email' => $request['email'],
                'username' => $request['username'],
                'password' =>  Hash::make($request['password']),
                'role' => $request['role2']
            ];
            $res = User::create($data);

            if ($request['role2'] == 2) {

                $dataTeacher = [
                    'id_user' => $res['id'],
                    'department' => $request['department'],
                    'knowledge_area' => $request['knowledge_area']
                ];
                Teacher::create($dataTeacher);
            } else if ($request['role2'] == 3) {
                $dataStudent = [
                    'id_user' => $res['id'],
                    'career' => $request['career']
                ];
                Student::create($dataStudent);
            }
        }

        return redirect()->to('/users/new')->with('success', 'Usuario creado con éxito!');
    }

    public function edit(User $user)
    {
        return view('users.search', compact('user'))->with('type', 0);
    }

    public function update(Request $request)
    {
        $role = $request['role2'];

        $validations = [
            'name' => 'required',
            'num_id' => 'required',
            'email' => 'required',
            'username' => 'required',
            'active2' => 'required'
        ];

        if ($role == 2) {
            $validations = Arr::add($validations, 'department', 'required');
            $validations = Arr::add($validations, 'knowledge_area', 'required');
        } else if ($role == 3) {
            $validations = Arr::add($validations, 'career', 'required');
        }
        $request->validate($validations);

        $data = [
            'name' => $request['name'],
            'num_id' => $request['num_id'],
            'email' => $request['email'],
            'username' => $request['username'],
            'active' =>  boolVal($request['active2'])
        ];

        $user = User::find($request['id_user']);
        $user->update($data);

        if ($role == 2) {
            $data = [
                'knowledge_area' => $request['knowledge_area'],
                'department' => $request['department']
            ];
            $teacher = Teacher::where('id_user', $request['id_user'])->first();
            $teacher->update($data);
        } else if ($role == 3) {
            $data = [
                'career' => $request['career'],
            ];
            $student = Student::where('id_user', $request['id_user'])->first();
            $student->update($data);
        }
        return redirect()->to('/users/edit')->with('success', 'Usuario editado con éxito!');
    }

    public function delete()
    {
        return view('users.search')->with('type', 1);
    }

    public function destroy(Request $request){
        $user = User::where('num_id', $request['num_id'])->first();
        if (!$user) {
            return redirect()->to('/users/delete')->withErrors('Usuario no encontrado!');
        }
        $user->delete();
        return redirect()->to('/users/delete')->with('success', 'Usuario eliminado con éxito!');
    }
}
