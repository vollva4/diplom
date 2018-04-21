@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
	
	@component('admin.components.breadcrumbs')
	@slot('title') Список тем @endslot
	@slot('parent') Главная @endslot
	@slot('active') Темы @endslot
	@endcomponent

<hr>

<a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i>Создать тему</a>
<table class="table table-striped">
	<thead>
		<th>Наименование</th>
		<th>Вопросов</th>
		<th>Без ответа</th>
		<th>Опубликовано</th>

		<th class="text-right">Действие</th>
	</thead>
	<tbody>
		@forelse ($categories as $category)
		<tr>
			<td><a href="{{route('admin.category.questions', $category)}}">{{$category->name}}</a></td>
			<td>{{$category->question()->count()}}</td>
			<td>{{$category->question()->where('answer', NULL)->count()}}</td>
			<td>{{$category->question()->where('published', 1)->count()}}</td>

			<td>
				<a href="{{route('admin.category.edit', $category)}}">Редактировать<i class="fa fa-edit"></i></a>
			</td>
			<td>
				 <form action="{{ route('admin.category.destroy', $category) }}" method="post">
                        <input class="delete" type="submit" value="Удалить тему и все вопросы в ней">

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
					{{$categories->links()}}
				</ul>
			</td>
		</tr>
	</tfoot>

</table>
</div>
@endsection