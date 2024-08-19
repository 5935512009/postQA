@extends('layouts.app')
@section('title','questionnaires')
@section('content')
    <div class="container">

        <h3>questionnaires list .</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">แบบสอบถาม</th>
                <th scope="col">เวลาสร้าง</th>
                <th scope="col">ทำแบบสอบถาม</th>
              </tr>
            </thead>
            <tbody>
              @foreach($question as $item)
                <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->created_at}}</td>
                    <td><a href="{{ route('answer', ['id_questionnaire' => $item->id]) }}" class="btn btn-success">ตอบ</a></td>

                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection