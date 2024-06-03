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
                        <a href="{{route('login')}}" class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                            home
                        </a>
                    </li>
                    <li class="breadcrumbs__list">
                        <a href="{{route('loginProcess')}}" class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
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

                        <h3 class="text-center"> Hello  {{ auth()->user()->name }} </h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
