@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

    @component('admin.components.breadcrumbs')
    @slot('title') Список администраторов @endslot
    @slot('parent') Главная @endslot
    @slot('active') Администраторы @endslot
    @endcomponent

<hr>

<a href="{{route('admin.user.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i>Добавить администратора</a>
<table class="table table-striped">
    <thead>
        <th>Имя</th>
        <th>Почта</th>
        <th class="text-right">Действие</th>
    </thead>
    <tbody>
        @forelse ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{route('admin.user.edit', $user)}}"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form action="{{ route('admin.user.destroy', $user) }}" method="post">
                        <input class="delete" type="submit" value="Удалить Администратора">
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
                    {{$users->links()}}
                </ul>
            </td>
        </tr>
    </tfoot>


</table>




</div>
@endsection