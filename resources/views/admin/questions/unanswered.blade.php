@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
	
	@component('admin.components.breadcrumbs')
	@slot('title') Список вопросов без ответа @endslot
	@slot('parent') Главная @endslot
	@slot('active') Вопросы без ответа @endslot
	@endcomponent

<hr>

<a href="{{route('admin.question.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i>Создать вопрос</a>
<table class="table table-striped">
	<thead>
		<th>Описание</th>
		<th>Дата создания</th>
		<th class="text-right">Действие</th>
	</thead>
	<tbody>
		@forelse ($questions as $question)
		<tr>
			<td>{{$question->created_at}}</td>
			<td>
				<a href="{{route('admin.question.edit', $question)}}">Редактировать<i class="fa fa-edit"></i></a>
			</td>
			<td>
				<a href="{{route('admin.question.answer', $question)}}">{{$question->answer == NULL ? 'Ответить' : ''}}</a>
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
		<tr>
			<td colspan="3">
				<ul class="pagination pull-right">
					{{$questions->links()}}
				</ul>
			</td>
		</tr>
	</tfoot>
	

</table>




</div>
@endsection