@extends('front.layout.master')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <section style="background-color: #ffffff;border-top: 1px solid rgba(128, 128, 128, 0.203);padding: 32px 0">
        <div class="container">
            <p>
                {!! $settingsArray['terms_and_conditions' . (App::getLocale() == 'ar' ? '_ar' : '')]['value'] !!}
            </p>
        </div>
    </section>
@endsection
