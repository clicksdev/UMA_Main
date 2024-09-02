<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Outfit:wght@100..900&family=Reddit+Sans:ital,wght@0,200..900;1,200..900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}?v={{time()}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/swiper.css')}}">
    <meta name="description" content="United Media Academy (UMA), a leading Egyptian training institute, empowering media creatives across Egypt and the Arab World.">
    <style>
        /* HTML: <div class="loader"></div> */
.loader {
  width: 50px;
  padding: 8px;
  aspect-ratio: 1;
  border-radius: 50%;
  background: #f2685b;
  --_m:
    conic-gradient(#0000 10%,#000),
    linear-gradient(#000 0 0) content-box;
  -webkit-mask: var(--_m);
          mask: var(--_m);
  -webkit-mask-composite: source-out;
          mask-composite: subtract;
  animation: l3 1s infinite linear;
}
@keyframes l3 {to{transform: rotate(1turn)}}
    </style>
    <title>{{ $settingsArray['site_name']['value'] }}</title>
</head>
