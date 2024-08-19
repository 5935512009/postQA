@extends('layouts.app')
@section('title','blogs')
@section('content')
    <div>
      <h1>Food story </h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            
            <th scope="col">Manu</th>
            <th scope="col">Details</th>
            <th scope="col">Stauts</th>
          </tr>
        </thead>
       
        <tbody>
          
            
            @foreach ($blogs as $item)
            <tr> 
                <td>{{$item->title}}</td>
                <td>{{$item->created_at}}</td>
                
            </tr>    
            @endforeach
          
        </tbody>
      </table>


      {{-- @foreach ($blogs as $item)
          <h3>Manu name : {{$item["title"]}}</h3>
          <h4>Content : {{$item["content"]}}</h4>
          @if ($item['status']==true)
            <h5 class="text text-success">Allow</h5>
          
          @else
            <h5 class="text text-danger">not Allow</h5>
          
          @endif
          ------------------
      @endforeach --}}
      
    </div>
@endsection