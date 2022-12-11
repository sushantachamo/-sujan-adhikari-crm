@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-3 bg-light">
                <h2 class="heading-section"><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></h2>
            </div>
        </div>
        <div class="row justify-content-center border py-5 bg-white">
            <div class="col-md-8 col-lg-8">

                @php $sliders = App\Models\Admin\Slider::where('status', 1)->orderBy('rank')->get(); @endphp
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($sliders as $slider)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $slider->rank }}" class="{{ $slider->rank == 1 ? 'active' : ''}}" ></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($sliders as $slider)
                        <div class="carousel-item {{ $slider->rank == 1 ? ' active ' : ''}}">
                            <img src="{{asset('images/sliders/'.$slider->image)}}" class="d-block w-100" alt="{{ $slider->alt }}">
                            <div class="carousel-caption" style="background:#0000004d;">
                                <h4 class="animated fadeInUp text-white">{{ isset($slider->caption_title)? $slider->caption_title :'' }}</h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="login-wrap  px-3 py-5">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-user-o"></span>
                    </div>
              <h3 class="text-center mb-4">{{ __('Login') }}</h3>

               @if (session()->has('success_message'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span class="fi fi-close" aria-hidden="true"></span>
                        </button>
                        <p>{!! session()->get('success_message') !!}</p>
                    </div>
                @endif

                @if (session()->has('error_message'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span class="fi fi-close" aria-hidden="true"></span>
                        </button>
                        <p>{!! session()->get('error_message') !!}</p>
                    </div>
                @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <input id="email" type="email" placeholder="Email" class="form-control rounded-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-flex">
                                <input id="password" type="password" placeholder="Password" class="form-control rounded-left @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">{{ __('Remember Me') }}
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    </label>
                                </div>
                                    
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">{{ __('Login') }}</button>
                            </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
