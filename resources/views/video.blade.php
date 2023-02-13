@include('layout.header')

<div id="content" class=" pt-5 pb-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-white">{{ $video['title'] }}</h1>
                <div class="d-flex justify-content-center align-items-center">
                    <iframe id="video" width="1100" height="550" src="{{ $video['embed'] }}"
                        title="{{ $video['keywords'] }}">
                    </iframe>
                </div>
                <div class="mt-3">
                    <span class="text-white">Tags:</span>
                    @foreach ($keywords as $key)
                        <span class="text-white">
                            <a href="{{ url('/') }}/tags/{{ preg_replace('/[\s\W]+/', '-', $key) }}">
                                {{ $key }}
                            </a>,
                        </span>
                    @endforeach
                </div>
            </div>
            <div class="col-12 mb-2 mt-2">
                <h3 class="text-white">Other Videos:</h3>
            </div>
            @foreach ($relateds['videos'] as $video)
                <div class="col-xl-3 col-12 mb-3 text-white">
                    <a href="{{ url('/video') }}/{{ $video['id'] }}/{{ preg_replace('/[\s\W]+/', '-', $video['title']) }}"
                        class="mw-100">
                        <img class="mw-100" src="{{ $video['default_thumb']['src'] }}" width="427"
                            alt="{{ $video['title'] }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('layout.footer')
