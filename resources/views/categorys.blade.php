@include('layout.header')
<script src="{{ asset('js/categorys.js') }}"></script>

<div id="content" class=" pt-5 pb-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-white mb-5">Categorys:</h1>
                <div id="normalList" class="d-flex flex-wrap mb-2"></div>
                <h1 class="text-white mb-5">Gay Categorys:</h1>
                <div id="gayList" class="d-flex flex-wrap mb-2"></div>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')
