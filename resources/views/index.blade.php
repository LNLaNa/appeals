@extends('layout')

@section('style')
    h1 {
        text-align: center;
        margin: 30px!important;
    }

    form {
        max-width: 700px!important;
        margin: auto!important;
        text-align:center!important;
    }

    textarea {
        min-height: 100%!important;
        max-height: 300px!important;
        min-width: 200px;

    }

    input {
        min-width: 200px;
        width: 100%;
        max-width: 300px!important;
    }
@endsection

@section('content')
    <div class="container container-sm">
        <h1>Обращения</h1>
        <div class="center">
            <form action="{{route('appeals.store')}}" method="post">
                @csrf
                <div class="row gap-3" style="justify-content: center; "> {{-- row-cols-2 row-cols-sm-1 gx-4 justify-content-between --}}
                    <div class="col-auto" style="max-width: 300px;">
                        <div class="row gy-3">
                            <input type="text" class="form-control" name="userName" placeholder="Имя (не обязательно)">
                            <input class="btn btn-outline-info" type="submit" value="Добавить">
                        </div>
                    </div>
                    <div class="col">
                        <textarea name="question" class="form-control " placeholder="Задайте ваш вопрос"></textarea>
                    </div>
                </div>
            </form>
        </div>

        <div class="accordion" id="accordionExample" style="margin: 30px 0;">
            @foreach($appeals as $appeal)
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{$appeal->question}}
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       {{$appeal->answer}}
                    </div>
                </div>
            </div>
            @endforeach
{{--            <div class="accordion-item">--}}
{{--                <h2 class="accordion-header" id="headingTwo">--}}
{{--                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
{{--                        Accordion Item #2--}}
{{--                    </button>--}}
{{--                </h2>--}}
{{--                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">--}}
{{--                    <div class="accordion-body">--}}
{{--                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="accordion-item">--}}
{{--                <h2 class="accordion-header" id="headingThree">--}}
{{--                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                        Accordion Item #3--}}
{{--                    </button>--}}
{{--                </h2>--}}
{{--                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">--}}
{{--                    <div class="accordion-body">--}}
{{--                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
