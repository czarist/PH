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
        </div>
    </div>
</div>

@include('layout.footer')
