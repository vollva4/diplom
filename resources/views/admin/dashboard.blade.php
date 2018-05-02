@extends('admin.layouts.app_admin')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="lable labl-primary">Темы: {{$count_categories}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="lable labl-primary">Вопросов: {{$count_questions}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="lable labl-primary">Без ответа: {{$count_unanswered}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p><span class="lable labl-primary">Администраторов: {{$count_admins}}</span></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-block btn-default" href="{{route('admin.category.create')}}">Создать тему</a>
            @foreach($categories as $category)
                <a class="list-group-item" href="{{route('admin.category.edit', $category)}}">
                    <h4 class="list-group-item-heading">{{$category->name}}</h4>
                    <p class="list-group-item-text">
                    Кол-во вопросов без ответа:{{$category->question()->where('answer', NULL)->count()}}
                    </p>
                </a>
            @endforeach
        </div>
        <div class="col-sm-6">
            <a class="btn btn-block btn-default" href="{{route('admin.question.create')}}">Создать Вопрос</a>
            @foreach($questions->get() as $question)
                <a class="list-group-item" href="{{route('admin.question.answer', $question)}}">
                    <h4 class="list-group-item-heading">{{$question->description}}</h4>
                    <p class="list-group-item-text">
                    Тема:{{$question->category()->pluck('name')->implode(', ')}}
                    </p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
