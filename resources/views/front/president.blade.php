@extends('front.layout.master')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <section class="presedentSection" style="background-color: #ffffff">
        <div class="container">
            <div class="img">
                <img src="{{ $settingsArray['persident_img']['media_url'] ?? asset('/assets/media/persident_img-placeholder.png') }}">
                <div class="breif">
                    {{$settingsArray['presedent_name']['value'] }}
                    <h1></h1>
                    <p>
                    {{$settingsArray['presedent_position']['value'] }}
                    </p>
                </div>
            </div>
            <div class="text">
                <svg width="42" height="36" viewBox="0 0 42 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42 0.355L40.9401 7.85229C38.8202 7.67691 37.0978 8.02766 35.7729 8.90454C34.4479 9.73757 33.5205 10.9652 32.9905 12.5874C32.5047 14.1658 32.4164 16.0072 32.7256 18.1117H42V36H23.9811V18.1117C23.9811 11.7982 25.4606 7.01926 28.4196 3.77482C31.3785 0.486533 35.9054 -0.653407 42 0.355ZM18.0189 0.355L16.959 7.85229C14.8391 7.67691 13.1167 8.02766 11.7918 8.90454C10.4669 9.73757 9.53943 10.9652 9.00946 12.5874C8.52366 14.1658 8.43533 16.0072 8.74448 18.1117H18.0189V36H0V18.1117C0 11.7982 1.4795 7.01926 4.43849 3.77482C7.39748 0.486533 11.9243 -0.653407 18.0189 0.355Z" fill="#5BA8D9"/>
                </svg>
                <p>
                    {!! $settingsArray['presedent_word_full']['value'] !!}
                </p>
            </div>
        </div>
    </section>
@endsection
