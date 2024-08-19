<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //
    function index()
    {
        $blogs = DB::table('tests')->get();
        return view("blogs", compact('blogs'));
    }

    function about()
    {
        $name = "pasut srijaroen and Free man";
        $date =  "13 Aug 2024";
        return view("about", compact('name', 'date'));
    }
    function questions()
    {

        $question = DB::table('questionnaires')->get();
        return view(("questionnaires"), compact('question'));
    }
    function answer($id_questionnaire)
{
    // ดึง id ของผู้ใช้ที่ล็อกอินอยู่
    $userId = Auth::id();

    // ดึงข้อมูลคำถามที่เกี่ยวข้องกับ id_questionnaire
    $questions = DB::table('questions')
        ->where('id_questionnaires', $id_questionnaire)
        ->get();

    // ดึงข้อมูลคำตอบที่ผู้ใช้เคยตอบไว้สำหรับ id_questionnaire นี้
    $answeredQuestionIds = DB::table('answers')
        ->where('id_user', $userId)
        ->where('id_questionnaires', $id_questionnaire)
        ->pluck('id_questions')
        ->toArray();

    // กรองคำถามที่ยังไม่ได้รับการตอบจากผู้ใช้
    $unansweredQuestions = $questions->filter(function ($question) use ($answeredQuestionIds) {
        return !in_array($question->id, $answeredQuestionIds);
    });

    // ส่งข้อมูลไปยังหน้า view พร้อมข้อมูล questions และ id_questionnaire
    return view('answer', [
        'questions' => $unansweredQuestions,
        'id_questionnaire' => $id_questionnaire,
    ]);
}

    function storeAnswer(Request $request)
    {
        
        $id_questionnaire = $request->input('id_questionnaire');
        $answers = $request->input('answer'); // ตั้งค่าเริ่มต้นให้เป็น array ว่างถ้าหาก $answers เป็น null
        $userId = Auth::id();
       
        
foreach ($answers as $id_question => $answer_text) {
    
    DB::table('answers')->insert([
        'answer' => $answer_text,
        'id_questionnaires' => $id_questionnaire,
        'id_questions' => $id_question,
        'id_user' => $userId, // หรือดึงจากการ login ของ user
        'created_at' => now(),
        'updated_at' => now()
    ]);
}

        return redirect()->route('questionnaires')->with('success', 'คำตอบของคุณถูกบันทึกแล้ว!');
    }
    public function myAnswers()
{
    // Retrieve the current logged-in user's ID
    $userId = Auth::id();

    // Retrieve the answers that the user has provided
    $answers = DB::table('answers')
        ->where('id_user', $userId)
        ->get();

    // Retrieve the related questions
    $questionIds = $answers->pluck('id_questions');
    $questions = DB::table('questions')
        ->whereIn('id', $questionIds)
        ->get();

    return view('myAnswers', compact('answers', 'questions'));
}

public function storeQuestionnaire(Request $request)
{
    // สร้าง questionnaire ใหม่
    $questionnaireId = DB::table('questionnaires')->insertGetId([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // สร้าง questions
    $questions = $request->input('questions');
    foreach ($questions as $question) {
        if ($question) {
            DB::table('questions')->insert([
                'content' => $question,
                'id_questionnaires' => $questionnaireId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    return redirect()->route('questionnaires')->with('success', 'Questionnaire created successfully!');
}

    
}
