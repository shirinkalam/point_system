@extends('layouts.app')

@section('title',__('topics.topics'))
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

    <form>
        @foreach ($topics as $topic)
        <div>
            <div>
                <div>
                    ارسال شده توسط {{$topic->user->name}} در {{$topic->created_at}}
                </div>
            </div>
            <div>
                <a href="{{route('topic.show',$topic->id)}}">
                    {{$topic->title}}
                </a>
            </div>
        </div>
        @endforeach
    </form>

    <div class="">
        @include('partials.validations-errors')
    </div>

</body>
</html>
@endsection

