@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
	

<hr>


<table class="table table-striped">
	<thead>
		<h1>Cписок вопросов по теме {{$category->name}}</h1>
		<th>Описание</th>
		<th>Состояние</th>
		<th>Дата создания</th>

		<th class="text-right">Действие</th>
	</thead>
	<tbody>
		@forelse ($questions as $question)
		<tr>
			<td>{{$question->description}}</td>
			<td>
				@if($question->answer == NULL)
				Ожидает Ответа.
				@else
					@if($question->published == 0)
						Скрыт
					@else 
						Опубликован	
					@endif

				@endif
			</td>
			<td>{{$question->created_at}}</td>

			<td>
				<a href="{{route('admin.question.edit', $question)}}">Редактировать<i class="fa fa-edit"></i></a>
			</td>
			<td>
				<a href="{{route('admin.question.hide', $question)}}">{{$question->published == 1 ? 'Скрыть' : 'Опубликовать'}}<i class="fa fa-edit"></i></a>
			</td>
			<td>
				<a href="{{route('admin.question.answer', $question)}}">{{$question->answer == NULL ? '' : 'Ответить'}}<i class="fa fa-edit"></i></a>
			</td>
			
			<td>
				 <form action="{{ route('admin.question.destroy', $question) }}" method="post">
                        <input class="delete" type="submit" value="Удалить вопрос">

                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </form>
			</td>
		</tr>
		@empty
		<tr>
			<td colspan="3" class="text-center"> <h2>Данных нет.</h2></td>
		</tr>
		@endforelse
	</tbody>
	<tfoot>
		