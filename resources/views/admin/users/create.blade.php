@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
	@component('admin.components.breadcrumbs')
	@slot('title') Создание дминистратора @endslot
	@slot('parent') Главная @endslot
	@slot('active') Администраторы @endslot
	@endcomponent

	<div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.user.store') }}">
                        {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <label for="">Имя</label>
                    <input type="text" class="form-control" name="name" placeholder="Имя" value="@if(old('name')){{old('name')}}@else{{$user->name or ""}}@endif" required>

                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="@if(old('email')){{old('email')}}@else{{$user->email or ""}}@endif" required>

                    <label for="">Пароль</label>
                    <input type="password" class="form-control" name="password">

                    <label for="">Подтверждение</label>
                    <input type="password" class="form-control" name="password_confirmation">

                    <hr />

                    <input class="btn btn-primary" type="submit" value="Сохранить">               
                    </form>
                </div>
</div>
@endsection