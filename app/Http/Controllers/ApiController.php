<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Services\GithubServices;

class ApiController extends Controller
{
    //Busca todos os estudantes
    public function getAllStudents(){
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students,200);
    }
    //lógica para buscar 1 estudante
    public function getStudent($id){
        
        if(Student::where('id',$id)->exists()) {
            $student = Student::where('id',$id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json([
                "message"=>"Estudante inexistente"],
                404);
            
        }
      
    }
    //lógica para criar 1 estudante
    public function createStudent(Request $request){
    
        $student = new Student;
        $student->name = $request->name;
        $student->course = $request->course;
        $student->save();

        return response()->json(
            ["message"=> "Student Created Successfull"],
            201);

    }

    //lógica para atualizar um estudante
    public function updateStudent(Request $request, $id) {
        
        if (Student::where('id',$id)->exists()){
        
            $student = Student::find($id);
            $student->name = $request->name;
            $student->course = $request->course;
            $student->save();

            return response()->json(
                ["message"=> "Student Updated Successfull"],
                201);
            } else {
                return response()->json(
                    ["message"=> "Student not found"],
                    404);
            }

    }
    
    //lógica de apagar um estudante
    public function deleteStudent($id){
        
        if(Student::where('id',$id)->exists()) {
            $student = Student::find($id);
            $student->delete();

            return response()->json([
                "message"=>"Estudante {$student->name} Apagado"
            ],202);            
        } else {
            return response()->json([
                "message"=>"Estudante inexistente"
            ],404);
        }
    }


    public function getEmojis(){
        
        $githubService = new GithubServices;
        $emojis = $githubService->getEmoji();

        return view('welcome', compact('emojis'));
    }




}
