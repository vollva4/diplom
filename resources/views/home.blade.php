@extends('layouts.app')
@section('content')
@if(isset($category))
<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title"><strong>Тема: {{ $category->name }}</strong></h1>
    </div>
    <div class="panel-body">
            @foreach($questions as $question)
                @if($question->published == 1)
                        <h4>Вопрос:</h4>{{ $question->question }}
                        @if($question->answer != null)
                            <h4>Ответ:</h4>
                            {{ $question->answer }}
                            <hr>
                        @else
                            <h4>Ответ:</h4>
                            Ответа пока нет.
                            <hr>
                        @endif
                @endif
            @endforeach
    </div>
</div>
    <ul class="pagination pull-right">
            {{$questions->links()}}
    </ul>
@endif
@endsection
