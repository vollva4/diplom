@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    @component('admin.components.breadcrumbs')
    @slot('title') Редактирование вопроса @endslot
    @slot('parent') Главная @endslot
    @slot('active') Вопросы @endslot
    @endcomponent

    <hr>
<form class="form-horizontal" action="{{ route('admin.question.update', $question) }}" method="post">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}
    <span class="text-center">Вопрос:{{$question->question}}</span>
    <hr>
    <label>Ответ: <textarea rows="10" cols="50" name="answer" required></textarea></label>
    <hr>
    <i>Опубликовать:</i>
    <input type="checkbox" name="published" value="1" >
    <hr>
    <input class="btn btn-primary" type="submit" value="Сохранить">
</form>
</div>
@endsection
