@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    @component('admin.components.breadcrumbs')
    @slot('title') Создание вопроса @endslot
    @slot('parent') Главная @endslot
    @slot('active') Вопросы @endslot
    @endcomponent

    <hr>
<form class="form-horizontal" action="{{ route('admin.question.store') }}" method="post">
    {{ csrf_field() }}
    <label>Тема вопроса:
            <select name="category_id" required>
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
