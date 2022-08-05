@extends('master_page.frontend')

@section('content')
    <div class="header-text" style="padding-top:4%;">
        {{-- css code start here --}}
        <style>
            /*****************globals*************/
            body {
            font-family: 'open sans';
            overflow-x: hidden; }

            img {
            max-width: 100%; }

            .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
                -ms-flex-direction: column;
                    flex-direction: column; }
            @media screen and (max-width: 996px) {
                .preview {
                margin-bottom: 20px; } }

            .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
                -ms-flex-positive: 1;
                    flex-grow: 1; }

            .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px; }
            .preview-thumbnail.nav-tabs li {
                width: 18%;
                margin-right: 2.5%; }
                .preview-thumbnail.nav-tabs li img {
                max-width: 100%;
                display: block; }
                .preview-thumbnail.nav-tabs li a {
                padding: 0;
                margin: 0; }
                .preview-thumbnail.nav-tabs li:last-of-type {
                margin-right: 0; }

            .tab-content {
            overflow: hidden; }
            .tab-content img {
                width: 100%;
                -webkit-animation-name: opacity;
                        animation-name: opacity;
                -webkit-animation-duration: .3s;
                        animation-duration: .3s; }

            .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em; }

            @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex; } }

            .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
                -ms-flex-direction: column;
                    flex-direction: column; }

            .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
                -ms-flex-positive: 1;
                    flex-grow: 1; }

            .product-title, .price, .sizes, .colors {
            text-transform: UPPERCASE;
            font-weight: bold; }

            .checked, .price span {
            color: #ff9f1a; }

            .product-title, .rating, .product-description, .price, .vote, .sizes {
            margin-bottom: 15px; }

            .product-title {
            margin-top: 0; }

            .size {
            margin-right: 10px; }
            .size:first-of-type {
                margin-left: 40px; }

            .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px; }
            .color:first-of-type {
                margin-left: 20px; }

            .add-to-cart, .like {
            background: #ff9f1a;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
                    transition: background .3s ease; }
            .add-to-cart:hover, .like:hover {
                background: #b36800;
                color: #fff; }

            .not-available {
            text-align: center;
            line-height: 2em; }
            .not-available:before {
                font-family: fontawesome;
                content: "\f00d";
                color: #fff; }

            .orange {
            background: #ff9f1a; }

            .green {
            background: #85ad00; }

            .blue {
            background: #0076ad; }

            .tooltip-inner {
            padding: 1.3em; }

            @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                        transform: scale(3); }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                        transform: scale(1); } }

            @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                        transform: scale(3); }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                        transform: scale(1); } }

        </style>
        {{-- css code end here --}}

        <div class="container">
            <div class="card">
                @foreach ($about_service_info as $about_service )
                    <p>{{$about_service->short_description}}</p>
                @endforeach
                <div class="row mt-4">
                    <div class="col-2">
                        <a href="{{url()->previous()}}" class="btn btn-success">Previous</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection