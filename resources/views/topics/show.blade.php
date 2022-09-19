@extends('layouts.app')

@section('title',__('topics.new'))
@section('links')
<link rel="stylesheet" href="{{asset('css/register-style.css')}}">
<script src="{{asset('/js/script.js')}}"></script>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/main.css">
@section('content')

<body>

    <div>
        @include('partials.alerts')
    </div>

  <form action="{{route('topic.store')}}" method="POST">
    @csrf

    <fieldset>
        <div>
            <h3>{{$topic->title}}</h3>
        </div>
        <div>
            <p>{{$topic->text}}</p>
            <div>
                <p>ارسال شده توسط {{$topic->user->name}} در {{$topic->created_at}}</p>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <label for="reply">@lang('topics.reply'):</label>
        <p>سه روز پیش توسط من</p>
        <input type="text" id="text" name="reply">

    </fieldset>

    <div class="">
        @include('partials.validations-errors')
    </div>

    <button id="sumbit" type="submit">@lang('topics.send')</button>
  </form>

</body>
</html>
@endsection

