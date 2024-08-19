@extends('layouts.app')
@section('title','Create Questionnaire')
@section('content')
    <div class="container">
        <h3>Create a New Questionnaire</h3>
        <form action="{{ route('storeQuestionnaire') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Questionnaire Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            @for ($i = 1; $i <= 10; $i++)
                <div class="form-group">
                    <label for="question{{ $i }}">Question {{ $i }}</label>
                    <input type="text" name="questions[]" id="question{{ $i }}" class="form-control">
                </div>
            @endfor

            <button type="submit" class="btn btn-primary">Create Questionnaire</button>
        </form>
    </div>
@endsection
