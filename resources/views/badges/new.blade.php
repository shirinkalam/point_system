@extends('layouts.app')

@section('title','new badge')
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

  <form action="{{route('badge.store')}}" method="POST">
    @csrf

    <fieldset>
        <label for="title">@lang('badge.title') :</label>
        <input value="{{old('title')}}" type="text" id="title" name="title">

        <label  for="quorum">@lang('badge.quorum'):</label>
        <input value="{{old('quorum')}}" type="number" id="mail" name="required_number">

        <label for="icon">@lang('badge.icon'):</label>
        <input type="url" id="icon" name="icon_url">

        <label for="type">@lang('badge.type'):</label>
        <select name="type">
            <option value="0">xp</option>
            <option value="1">تاپیک</option>
            <option value="2">پاسخ</option>
        </select>

        <label for="description">@lang('badge.description'):</label>
        <input type="text" name="description">

    </fieldset>

    <div class="">
        @include('partials.validations-errors')
    </div>

    <button id="sumbit" type="submit">@lang('badge.send')</button>
  </form>

</body>
</html>
@endsection

