@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    @component('admin.components.breadcrumbs')
    @slot('title') Редактирование категории @endslot
    @slot('parent') Главная @endslot
    @slot('active') Категории @endslot
    @endcomponent

    <hr>
<form class="form-horizontal" action="{{ route('admin.category.update', $category) }}" method="post">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}
    <label>Название темы: <input name="name" required></label>
    <hr>
    <input class="btn btn-primary" type="submit" value="Сохранить">
</form>
</div>
@endsection
