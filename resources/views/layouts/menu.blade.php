@foreach($categories as $category)

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$category->name}}</a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('home.list', $category)}}">Опубликованных вопросов:{{$category->question()->where('published', 1)->count()}}</a></li>
        </ul>
    </li>
@endforeach
