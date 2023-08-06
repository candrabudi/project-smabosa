@extends('frontend.layouts.app')

@section('title')
Guru - Smabosa
@endsection

@section('content')
<section id="teachers" class="teachers section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-center gray-bg">
                    <span>Guru</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Data Guru SMA 1 BOPKRI Yogyakarta</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($teachersArray as $teacher)
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".2s">
                    <div class="row">
                        <div class="col-lg-5 col-12">

                            <div class="image">
                                <?php echo $teacher['teacher_photo'] ?>
                            </div>

                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="info-head">

                                <div class="info-box">
                                    <span class="designation">{{ $teacher['teacher_subjects'] }}</span>
                                    <h4 class="name"><a href="#">{{ $teacher['teacher_name'] }}</a></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
      
            @if ($paginator->hasPages())
                <div class="pagination center">
                    <ul class="pagination-list">
                        @if ($paginator->onFirstPage())
                            <li class="disabled"><span>&laquo;</span></li>
                        @else
                            <li><a href="/guru{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($paginator->links() as $element)
                            @if (is_string($element))
                                <li class="disabled"><span>{{ $element }}</span></li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="active"><span>{{ $page }}</span></li>
                                    @else
                                        <li><a href="guru/{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <li><a href="/guru{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
                        @else
                            <li class="disabled"><span>&raquo;</span></li>
                        @endif
                    </ul>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection