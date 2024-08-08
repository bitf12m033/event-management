 <!-- [ breadcrumb ] start -->
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                <h5>{{ $pageTitle }}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                    @foreach ($breadcrumbs as $breadcrumb)
                        <li class="breadcrumb-item">
                            @if ($breadcrumb['url'])
                                <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
                            @else
                                {{ $breadcrumb['title'] }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- <div class="col-md-4 text-md-right">
                <button class="btn btn-sm btn-secondary rounded-pill" type="button">Action</button>
                <div class="btn-group ml-2">
                    <button class="btn btn-sm btn-primary dropdown-toggle arrow-none rounded-pill" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="plus"></i></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#!">Action</a>
                        <a class="dropdown-item" href="#!">Another action</a>
                        <a class="dropdown-item" href="#!">Something else here</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->