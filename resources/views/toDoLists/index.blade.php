@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-6">
      <h1>Lista notatek</h1>
    </div>
    <div class="col-6">
      <a class="float-right" href="{{ route('toDoLists.create') }}">
      <button type="button" class="btn btn-primary">Dodaj notke</button>
      </a>
    </div>
  </div>

  <div class="row">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Day</th>
          <th scope="col">Description</th>
          <th scope="col">Note</th>
          <th scope="col">Priority</th>
        </tr>
      </thead>
      <tbody>
        @foreach($toDoLists as $toDoList)
        <tr>
          <th scope="row">{{$toDoList->id}}</th>
          <td>{{$toDoList->day}}</td>
          <td>{{$toDoList->description}}</td>
          <td>{{$toDoList->note}}</td>
          <td>{{$toDoList->prioroty}}</td>
          <td>
            <a href="{{route('toDoLists.edit', $toDoList->id)}}">
              <button class="btn btn-danger btn-sm">
                E
              </button>
            </a>
            <button class="btn btn-danger btn-sm delete1" data-id="{{$toDoList->id}}">
              x
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $toDoLists->links() }}
  </div>
  <div>

    <script src="/js/main.js"></script>
    @endsection