<?php

namespace App\Http\Controllers;

use App\Models\Classe;

use Illuminate\Http\Request;

class classeController extends Controller
{
    public function index()
    {
        $classes = Classe::orderBy('id', 'desc')->paginate(5);
        return view('classes.index', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_course' => 'required',
            'number' => 'required',
            'topic' => 'required'
        ]);

        $classe = new Classe;
        $classe->id_course = $request->id_course;
        $classe->number = $request->number;
        $classe->topic = $request->topic;
        $classe->save();

        return redirect()->to('classes')->with('success', 'Clase creada correctamente');
    }

    public function create()
    {
        return view('classes.create');
    }

    public function edit(Classe $classe)
    {
        return view('classes.search', compact('classe'))->with('type', 0);
    }

    public function search(Request $request)
    {
        $classe = Classe::where('id', $request['id'])->first();
        if (!$classe) {
            return redirect()->to('/classes/edit')->withErrors('Clase no encontrada!');
        }
        $role = $classe->role;
        return view('classes.edit', compact('classe'));
    }

    public function update(Request $request)
    {
        $validations = [
            'id_course' => 'required',
            'number' => 'required',
            'topic' => 'required'
        ];
        $request->validate($validations);

        $data = [
            'id_course' => $request['id_course'],
            'number' => $request['number'],
            'topic' => $request['topic'],
        ];
        $classe = Classe::find($request['id_course2']);

        $classe->update($data);
        return redirect()->to('/classes/edit')->with('success', 'Clase editada con éxito!');
    }

    public function delete()
    {
        return view('classes.search')->with('type', 1);
    }

    public function destroy(Request $request)
    {
        $classe = Classe::where('id', $request['id'])->first();
        if (!$classe) {
            return redirect()->to('/classes/delete')->withErrors('Clase no encontrada!');
        }
        $classe->delete();
        return redirect()->to('/classes/delete')->with('success', 'Clase eliminada con éxito!');
    }
}
