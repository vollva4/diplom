@extends('layouts.app')
@section('content')
<div class="container">
 <h1>Создание вопроса.</h1>

  <hr>
<form class="form-horizontal" action="{{ route('home.storeQuestion') }}" method="post">
    {{ csrf_field() }}
    <label>Тема вопроса:
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
      </label>
    <hr>
    <label>Ваш email: <input type="email" name="authors_email" required></label>
    <label>Ваше имя: <input name="author" required></label>
    <hr>
    <label>Краткое описание. <br><textarea rows="2" cols="50" name="description" required></textarea>
    <hr>
    <label>Вопрос: <textarea rows="10" cols="50" name="question" required></textarea></label>
    <input class="btn btn-primary" type="submit" value="Создать вопрос">
</form>
</div>
@endsection