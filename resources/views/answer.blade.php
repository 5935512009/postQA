@extends('layouts.app')
@section('title','Answer questions')
@section('content')
    <div class="container">
      
        <form action="{{ route('store_answer') }}" method="POST">
            {{-- @csrf คือ สร้างฟิลด์อินพุตแบบซ่อน โดย มีโทเค็น CSRF (Cross-Site Request Forgery) อยู่ในฟอร์ม HTML --}}
            @csrf 
            @foreach ($questions as $question)
                <div class="form-group">
                    <div>
                        <label for="">คำถาม</label><br/>
                        <label for="">{{$question->content}}</label>
                    </div>
                    <label for="comment">Answer</label>
                    <textarea class="form-control" rows="5" name="answer[{{$question->id}}]"></textarea>
                </div>
            @endforeach
            <input type="hidden" name="id_questionnaire" value="{{ $id_questionnaire }}">
            <button class="btn btn-primary">ส่งคำตอบ</button>
        </form>
    </div>
@endsection
