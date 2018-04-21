@extends('layouts.app')
@section('content')
@if(isset($category)) 
 <h1 class="cards-section-header text-cards-section text-default">Тема: {{ $category->name }}</h1>
          <div class="cards-inner-container">
            @foreach($questions as $question)
              @if($question->published == 1)
              <div class="card">
                <hr>
                <p class="q-and-a"><strong><h3>Вопрос:</h3>{{ $question->question }}</strong>
                  <br>
                  <br>
                  @if($question->answer != null)
                  <h3>Ответ:</h3>
                  {{ $question->answer }}
                  @else
                  <h3>Ответ:</h3>
                  Ответа пока нет.
                  @endif  
                </p>
              </div>
              @endif
          </div>
        @endforeach
      </div>
    </div>
    <ul class="pagination pull-right">
		{{$questions->links()}}
	</ul>
@endif    
@endsection
