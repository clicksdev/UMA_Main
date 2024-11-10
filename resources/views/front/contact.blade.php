@extends('front.layout.master')

@section('content')
<section class="contact_wrapper" style="margin-bottom: 80px;border-top: 1px solid rgba(0, 0, 0, .2);padding-top: 40px">
    <div class="container">
        <div class="text">
            <h1>{{ __('contact.contact_us') }}</h1>
            <br>
            <p>
                {{ __('contact.reach_out') }}
                <a href="mailto:info@uma-eg.com">
                    info@uma-eg.com
                </a>
            </p>
            <br>
            <br>
            <p>
                <h3>{{ __('contact.address') }}:</h3>
                <br>
                {{ __('contact.address_details') }}
            </p>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3454.6672461205135!2d30.998891875552804!3d30.01770967493709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDAxJzAzLjgiTiAzMcKwMDAnMDUuMyJF!5e0!3m2!1sen!2seg!4v1722896003749!5m2!1sen!2seg" height="250" style="border:0;width: 100%;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;border-radius: 12px;padding: 12px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
@endsection
