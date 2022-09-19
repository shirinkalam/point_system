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
        <label for="title">@lang('topics.title') :</label>
        <input value="{{old('title')}}" type="text" id="title" name="title">

        <label for="text">@lang('topics.text'):</label>
        <input type="text" id="text" name="text">

    </fieldset>

    <div class="">
        @include('partials.validations-errors')
    </div>

    <button id="sumbit" type="submit">@lang('topics.send')</button>
  </form>

</body>
</html>
@endsection

