<input type="hidden" name="page" id="page" value="{{ $page }}">
<input type="hidden" name="total_pages" id="total_pages" value="{{ $total_pages }}">
<input type="hidden" name="page_search" id="page_search" value="{{ $page }}">
<input type="hidden" name="search_query" id="search_query" value="{{ $cat }}">

@include('layout.header')


<div id="content" class=" pt-5 pb-5 bg-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-white mb-4">Term: {{ $cat }}</h1>
            </div>
            @foreach ($data['videos'] as $video)
                @include('layout.videobox')
            @endforeach
        </div>
        <div class="w-100 d-flex justify-content-center align-items-center">
            <div class="mb-4" id="pagination"></div>
        </div>
    </div>
</div>
@include('layout.jdjson')
@include('layout.footer')
