<div
    class="col-xl-3 col-12 mb-3 text-white mt-4 video-box position-relative d-flex align-items-center flex-column justify-content-center">
    <a class="position-relative mw-100 h-100"
        href="{{ url('/video') }}/{{ $video['id'] }}/{{ preg_replace('/[\s\W]+/', '-', $video['title']) }}">
        <img class="mw-100 img-box-video" src="{{ $video['default_thumb']['src'] }}" width="427"
            alt="{{ $video['title'] }}">
        <div class="filter-video d-flex justify-content-center align-items-center">
            <i class="bi bi-play-circle h1 text-ffbf00"></i>
        </div>
    </a>
    <div class="content-box-info d-flex  mw-100 justify-content-center align-items-center">
        <div class="bg-black box-info mw-100 p-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="h5 titulo-video text-ffbf00">
                        {{ $video['title'] }}
                    </h2>
                </div>
                <div class="col-12 d-flex">
                    <div class="mr-4">
                        <i class="bi bi-clock text-ffbf00"></i>
                        <span class="text-ffbf00">{{ $video['length_min'] }}</span>
                    </div>
                    <div class="mr-4">
                        <i class="bi bi-eye text-ffbf00"></i>
                        <span class="text-ffbf00">{{ $video['views'] }}</span>
                    </div>
                    <div class="mr-4">
                        <i class="bi bi-calendar text-ffbf00 mr-1"></i>
                        <span class="text-ffbf00">{{ date('Y/m/d', strtotime($video['added'])) }}</span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
