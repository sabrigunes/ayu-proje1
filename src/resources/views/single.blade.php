@extends('layout')

@section('title', $car->title )

@section('content')
    <!-- inventory-section -->
<section class="inventory-section pb-0 layout-radius mb-5">
    <div class="boxcar-container">
        <div class="boxcar-title-three">
        </div>
        <div class="row">
            <div class="inspection-column v2 col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="gallery-sec">
                        <div class="image-column wrap-gallery-box">
                            <div class="inner-column inventry-slider-two">
                                @if(isset($car->images[0]))
                                    @foreach($car->images as $image)
                                        <div class="image-box">
                                            <figure class="image"><a href="{{ '/uploads/'.$image->image }}" data-fancybox="gallery"><img src="{{ '/uploads/'.$image->image }}" alt=""></a></figure>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="image-box">
                                        <figure class="image"><a href="/images/not_found.png" data-fancybox="gallery"><img src="/images/not_found.png" style="margin-top: -10rem;" alt=""></a></figure>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                    <!-- description-sec -->
                    <div class="description-sec">
                        <h4 class="title">Açıklama</h4>
                        <div class="text two">{{ $car->description }}
                        </div>

                    </div>
                    <!-- features-sec -->
                    <div class="contact-box-three">
                        <div class="content-box" style="margin-left: -120px;">
                            <div class="inner-box">
                                <h6 class="title" style="margin-bottom: 1.5rem;">İlan Sahibi İletişime Geçin</h6>
                                <div class="text" style="font-size: large"><b>{{ $car->user->name.' '.$car->user->surname }}</b></div>
                                <ul class="contact-list">
                                    <li><a href="mailto:{{ $car->user->email }}"><div class="image-box"><img src="/images/resource/insep1-7.svg"></div>{{ $car->user->email }}</a></li>
                                    <li><a href="tel:{{ $car->user->phone }}"><div class="image-box"><img src="/images/resource/phone1-2.svg"></div>{{ $car->user->phone }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="review-sec v2">
                        <h4 class="title">Yorumlar</h4>
                    </div>
                    <div class="reviews">
                        @foreach($car->comments as $comment)
                        <div class="content-box mt-5">
                            <div class="auther-name">
                                <span>{{ strtoupper(substr($comment->name, 0, 1). substr($comment->surname, 0, 1)) }}</span>
                                <h6 class="name">{{ $comment->name.' '. $comment->surname }}</h6>
                                <small>{{ $comment->created_at }}</small>
                            </div>
                            {!! (\App\Models\Comment::prepareCommentSection($comment->rate)) !!}
                            <div class="text"> {{ $comment->comment }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if(isset(\Illuminate\Support\Facades\Auth::user()->id))
                        <div class="Reply-sec">
                            <h6 class="title">Bir Yorum Yapın</h6>
                        </div>
                        <form class="row" action="{{ route('post_add_comment') }}" method="post">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                            <div class="col-lg-12">
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label for="star5">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3">3 stars</label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label for="star2">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1">1 star</label>
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <div class="form_boxes v2">
                                    <label>Yorumunuz</label>
                                    <textarea name="comment" placeholder="Lorem Ipsum Dolar Sit Amet" required=""></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-submit">
                                    <button type="submit" class="theme-btn">Yorumunuzu Yayınlayın <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                                            <g clip-path="url(#clip0_711_3214)">
                                                <path d="M13.6106 0H5.05509C4.84013 0 4.66619 0.173943 4.66619 0.388901C4.66619 0.603859 4.84013 0.777802 5.05509 0.777802H12.6719L0.113453 13.3362C-0.0384687 13.4881 -0.0384687 13.7342 0.113453 13.8861C0.189396 13.962 0.288927 14 0.388422 14C0.487917 14 0.587411 13.962 0.663391 13.8861L13.2218 1.3277V8.94447C13.2218 9.15943 13.3957 9.33337 13.6107 9.33337C13.8256 9.33337 13.9996 9.15943 13.9996 8.94447V0.388901C13.9995 0.173943 13.8256 0 13.6106 0Z" fill="white"></path>
                                            </g>
                                            <defs>
                                                <clippath id="clip0_711_3214">
                                                    <rect width="14" height="14" fill="white"></rect>
                                                </clippath>
                                            </defs>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="Reply-sec">
                            <div class="alert alert-primary" role="alert">
                               Yorum yapmak için giriş yapın
                            </div>                        </div>
                    @endif

                </div>
            </div>
            <div class="side-bar-column v2 v3 col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="contact-box-two">
                        <div class="content-box">
                            <h2>{{ $car->title }}</h2>
                            <div class="text">{{ $car->keywords }}</div>
                            <ul class="list">
                                <li>{{ $car->kilometers }} km</li>
                                <li>{{ $car->fuel_type }}</li>
                                <li>{{ $car->transmission }}</li>
                            </ul>
                        </div>
                        <span>Fiyat</span>
                        <h3 class="title">{{ number_format($car->price, 0, ',', '.') }} TL</h3>
                    </div>
                    <!-- overview-sec -->
                    <div class="overview-box">
                        <h4 class="title">Araç Bilgileri</h4>
                        <ul class="list">
                            <li><span><img src="/images/resource/insep1-1.svg">Marka</span>{{ $car->brand->title }}</li>
                            <li><span><img src="/images/resource/insep1-1.svg">Kasa Tipi</span>{{ $car->category->title }}</li>
                            <li><span><img src="/images/resource/insep1-2.svg">Kilometre</span>{{ number_format(intval($car->kilometers), 0, ',', '.') }} km</li>
                            <li><span><img src="/images/resource/insep1-3.svg">Yakıt Türü</span>{{ $car->fuel_type }}</li>
                            <li><span><img src="/images/resource/insep1-4.svg">Yıl</span>{{ $car->year }}</li>
                            <li><span><img src="/images/resource/insep1-5.svg">Vites</span>{{ $car->transmission }}</li>
                            <li><span><img src="/images/resource/insep1-6.svg">Çekiş Türü</span>{{ $car->drivetrain }}</li>
                            <li><span><img src="/images/resource/insep1-7.svg">Durum</span>{{ $car->kilometers == 0 ? "Sıfır" : "İkinci El" }}</li>
                            <li><span><img src="/images/resource/insep1-8.svg">Motor Hacmi</span>{{ $car->avg_fuel_consumption }}</li>
                            <li><span><img src="/images/resource/insep1-8.svg">Motor Gücü</span>{{ $car->engine_power }} cc</li>
                            <li><span><img src="/images/resource/insep1-10.svg">Ort. Yakıt Tüketimi</span>{{ $car->avg_fuel_consumption }} @if($car->fuel_type != 'Elektrik') lt @else kw @endif / 100 km</li>
                            <li><span><img src="/images/resource/insep1-11.svg">Color</span>{{ $car->color }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End inventory-section -->

@endsection


@section('css')
    <style>
        .rating {
            float: left;
            border: none;
        }

        .rating:not(:checked) > input {
            position: absolute;
            clip: rect(0, 0, 0, 0);
        }

        .rating:not(:checked) > label {
            float: right;
            width: 1em;
            padding: 0 .1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 200%;
            line-height: 1.2;
            color: #ddd;
        }

        .rating:not(:checked) > label:before {
            content: '★ ';
        }

        .rating > input:checked ~ label {
            color: #405FF2;
        }

        .rating:not(:checked) > label:hover, .rating:not(:checked) > label:hover ~ label {
            color: #405FF2;
        }

        .rating > input:checked + label:hover, .rating > input:checked + label:hover ~ label, .rating > input:checked ~ label:hover, .rating > input:checked ~ label:hover ~ label, .rating > label:hover ~ input:checked ~ label {
            color: #405FF2;
        }

        .rating > label:active {
            position: relative;
        }
    </style>
@endsection
