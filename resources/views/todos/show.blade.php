@extends('app')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('todos-update', ['id' => $todo->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif


            <label for="title" class="form-label">Título da tarefa</label>
            <input type="text" class="form-control mb-2" name="title" id="exampleFormControlInput1" placeholder="Nome da tarefa" value="{{ $todo->title }}">

             <label for="category_id" class="form-label">Categoria da tarefa</label>
             <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Atualizar tarefa" class="btn btn-primary my-2" />
        </div>

    </form>    
    </div>
    
</div>
@endsection