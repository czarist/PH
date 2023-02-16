@include('layout.header')

<input type="hidden" name="page" id="page" value="{{ $page }}">
<input type="hidden" name="total_pages" id="total_pages" value="{{ $total_pages }}">

<div id="content" class=" pt-5 pb-5 bg-dark">
    <div class="container">
        <div class="row">
            @foreach ($data['stars'] as $star)
                <div class="col-xl-3 col-12 mt-4 star">
                    <a class="position-relative" target="_blank" href="{{url('/')}}/pornstar/{{ $star['star'] }}/page/1">
                        <div class="position-relative">
                            <img class="w-100" src="{{ $star['star_thumb'] }}" alt="{{ $star['star'] }}">
                            <div class="filter"></div>
                        </div>
                    </a>
                    <h6 class="mt-2 text-ffbf00">{{ $star['star'] }}</h6>
                </div>
            @endforeach
        </div>
        <div class="w-100 d-flex justify-content-center align-items-center">
            <div class="mb-4" id="pagination"></div>
        </div>
    </div>
</div>
@include('layout.footer')
