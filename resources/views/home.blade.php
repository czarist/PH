@include('layout.header')
<div id="content" class=" pt-5 pb-5 bg-dark">
    <div class="container-fluid">
        <div class="row">
            @foreach ($data['videos'] as $video)
                <div class="col-xl-3 col-12 mb-3 text-white">
                    <a
                        href="{{ url('/video') }}/{{ $video['id'] }}/{{ preg_replace('/[\s\W]+/', '-', $video['title']) }}">
                        <img src="{{ $video['default_thumb']['src'] }}" width="427" alt="{{ $video['title'] }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('layout.footer')
