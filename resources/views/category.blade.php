
<input type="hidden" name="page" id="page" value="{{ $page }}">
<input type="hidden" name="total_pages" id="total_pages" value="{{ $total_pages }}">
<input type="hidden" name="page_search" id="page_search" value="{{ $page }}">
<input type="hidden" name="search_query" id="search_query" value="{{ $cat }}">

@include('layout.header')


<div id="content" class=" pt-5 pb-5 bg-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-white mb-4">Category: {{ $cat }}</h1>
            </div>
            @foreach ($data['videos'] as $video)
                <div class="col-xl-3 col-12 mb-3 text-white">
                    <a href="{{ url('/video') }}/{{ $video['id'] }}/{{ preg_replace('/[\s\W]+/', '-', $video['title']) }}"
                        class="mw-100">
                        <img class="mw-100" src="{{ $video['default_thumb']['src'] }}" width="427"
                            alt="{{ $video['title'] }}">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="w-100 d-flex justify-content-center align-items-center">
            <div class="mb-4" id="pagination"></div>
        </div>
    </div>
</div>
@include('layout.footer')
