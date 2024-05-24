@extends('components.layout')

@section('content')

{{-- Banner Starts --}}
<div class="zol-banner zol-banner--blog t-pt-150 t-pb-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2 class="mt-0 t-text-light">
                    {{$title}}
                </h2>
                <ul class="t-list breadcrumbs d-flex justify-content-center align-items-center">
                    <li class="breadcrumbs__list">
                        <a href="#" class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                            home
                        </a>
                    </li>
                    <li class="breadcrumbs__list">
                        <a href="#" class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                            {{$title}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- Banner Ends --}}

<div class="t-pt-120 t-pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{route('registration')}}">

                            @csrf

                            <h4>Creat an account</h4>
                            <hr>
                            <div class="mb-3">
                                <input type="text" class="form-controll" placeholder="full name">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-controll" placeholder="User name">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-controll" placeholder="photo url">
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-controll" placeholder="Email address">
                            </div>

                            <div class="mb-3">
                                <input type="password" class="form-controll" placeholder="password">
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="create account">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
