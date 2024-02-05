@php use App\Enums\StatusEnum; @endphp
@extends('layout')

@section('style')
    h1 {
    text-align: center;
    margin: 30px!important;
    }

@endsection

@section('content')
    <div class="container container-sm">
        <h1>Админ - Обращения</h1>

        <div style="margin: 30px 0; display: flex; gap: 30px; flex-direction: column;">
            @foreach($appeals as $appeal)
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
                            <div class="col-auto"><a href="{{route('deleteAppeal',$appeal)}}" class="btn btn-outline-danger">Удалить</a></div>
                        </div>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$appeal->question}}</h5>
                        <div>Имя: {{$appeal->userName}}</div>
                        @empty($appeal->answer)
                            <div>
                                <form action="{{route('addAnswer',$appeal)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col"><input type="text" class="form-control" name="answer" placeholder="Ответ"></div>
                                        <div class="col-auto"><input type="submit"  class="btn btn-outline-info"></div>
                                    </div>
                                </form>
                            </div>
                        @endempty

                        @isset($appeal->answer)
                            <div>Ответ: {{$appeal->answer}}</div>
                        @endisset
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    </div>
@endsection
