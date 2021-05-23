<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);

        //dd($request->all());

        $student = new Student();
        $student->nama = $request->nama;
        $student->alamat = $request->alamat;
        $student->no_telp = $request->no_telp;
        $student->save();

        return response()->json([
            'message' => 'Student berhasil di tambahkan',
            'data_student' => $student
        ], 200);
    }

    public function read()
    {
        $student = Student::all();
        return response()->json([
            'student' => $student
        ], 201);
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        
        return response()->json([
            'message' => 'success',
            'data_student' => $student
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
        ]);

        return response()->json([
            'message' => 'Data berhasil di ubah',
            'data_student' => $student
        ], 200);

    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json([
            'message' => 'data berhasil di hapus'
        ], 200);
    }
}
