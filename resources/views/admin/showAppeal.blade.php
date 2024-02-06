@php use App\Enums\StatusEnum; @endphp
@extends('layout')

@section('style')
    h1 {
    text-align: center;
    margin: 30px!important;
    }

    textarea {
    min-height: 100%!important;
    max-height: 500px!important;
    }

@endsection

@section('content')
    <div class="container container-sm">
        <h1>Обращение</h1>
        <a href="{{route('admin')}}" class="btn btn-outline-info">Назад</a>

        <div style="margin: 30px 0; display: flex; gap: 30px; flex-direction: column;">

                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                @foreach(StatusEnum::cases() as $status)
                                    @if($appeal->status == $status->name)
                                        {{$status->value}}
                                    @endif
                                @endforeach
                            </div>

                            <div class="col-auto">
{{--                                <div class="row">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <form action="">--}}
{{--                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">--}}
{{--                                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">--}}
{{--                                                <label class="btn btn-outline-primary" for="btncheck1">Закрепить</label>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}

{{--                                    </div>--}}
                                    <div class="col-auto"><a href="{{route('deleteAppeal',$appeal)}}" class="btn btn-outline-danger">Удалить</a></div>
{{--                                </div>--}}
                            </div>



                        </div>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$appeal->question}}</h5>
                        <div>Имя: {{$appeal->userName}}</div>
                        @isset($appeal->answer)
                            <div>Ответ: {{$appeal->answer}}</div>
                        @endisset
{{--                        @empty($appeal->answer)--}}
                            <div>
                                <form action="{{route('addAnswer',$appeal)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="row align-items-center">
                                        <div class="col"><textarea class="form-control" name="answer" placeholder="Ответ">@if(isset($appeal->answer)){{$appeal->answer}}@endif</textarea></div>
                                        <div class="col-auto">

                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" name="isFixed" @if($appeal->isFixed == 1) checked @endif >
                                                <label class="btn btn-outline-primary" for="btncheck1">Закрепить</label>
                                            </div>
                                            <input type="submit"  class="btn btn-outline-info">
                                        </div>
                                    </div>
                                </form>
                            </div>
{{--                        @endempty--}}
                    </div>
                </div>

        </div>

    </div>
    </div>
@endsection
