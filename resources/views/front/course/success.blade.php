@extends('front.layout.master')
@section('content')
    <section style="padding: 56px 0;background: white;border-top: 1px solid #80808033;">
        <div class="container" style="display: flex;flex-direction: column;gap: 8px;justify-content: center;align-items: center;text-align: center;">

            <svg xmlns="http://www.w3.org/2000/svg" style="width: 100px;height: 100px;stroke: green;" class="icon icon-tabler icon-tabler-circle-check" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                <path d="M9 12l2 2l4 -4" />
            </svg>
            <h1>{{ __('home.thank_you', ['user_name' => $user_name ?? '']) }}</h1>
            <p>{{ __('home.received_request') }}</p>
        </div>
    </section>
@endsection
