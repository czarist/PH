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
                <div class="d-flex flex-wrap mb-2 mt-5">
                    <h4 class="text-white mr-4">Tags:</h4>
                    @foreach ($keywords as $key)
                        <a class="category_tag"
                            href="{{ url('/') }}/tag/{{ preg_replace('/[\s\W]+/', '', $key) }}/page/1">
                            {{ $key }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-12 mb-2 mt-2">
                <h3 class="text-white">Other Videos:</h3>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach ($relateds['videos'] as $video)
                @include('layout.videobox')
            @endforeach
        </div>
    </div>
</div>

@include('layout.footer')
