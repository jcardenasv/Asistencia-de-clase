<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Models\Teacher;
use App\Models\Student;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(5);
        foreach ($users as $user) {
            if($user->role == '1'){
                $user['role_name'] = 'Administrador';
            }elseif($user->role == '2'){
                $user['role_name'] = 'Profesor';
            }else{
                $user['role_name'] = 'Estudiante';
            }

            if($user->active == '1'){
                $user['active_name'] = 'Activo';
                $user['active_color'] = 'green';
            }else{
                $user['active_name'] = 'Inactivo';
                $user['active_color'] = 'red';
            }
        }
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        if($request['role2']){

            $validations = [
                'name' => 'required',
                'num_id' => ['required', 'unique:users,num_id'],
                'email' => ['required', 'unique:users,email'],
                'username' => ['required', 'unique:users,username'],
                'password' => 'required'
            ];

            if ($request['role2'] == 2){
                $validations = Arr::add($validations, 'department', 'required');
                $validations = Arr::add($validations, 'knowledge_area', 'required');
            } else if ($request['role2'] == 3){
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

            if($request['role2'] == 2){

                $dataTeacher = [
                    'id_user' => $res['id'],
                    'department' => $request['department'],
                    'knowledge_area' => $request['knowledge_area']
                ];
                Teacher::create($dataTeacher);
            }else if($request['role2'] == 3){
                $dataStudent = [
                    'id_user' => $res['id'],
                    'career' => $request['career']
                ];
                Student::create($dataStudent);
            }
        }
        
        return redirect()->to('/users/new')->with('success','Usuario creado con éxito!');
    }
}
