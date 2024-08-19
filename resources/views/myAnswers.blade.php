@extends('layouts.app')
@section('title','My Answers')
@section('content')
    <div class="container">
        <h3>My Answers</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Your Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($answers as $answer)
                    @php
                        $question = $questions->firstWhere('id', $answer->id_questions);
                    @endphp
                    @if($question)
                        <tr>
                            <td>{{ $question->content }}</td>
                            <td>{{ $answer->answer }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
