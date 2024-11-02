@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Dashboard</h4>
                </div>
                <div class="col-md-6 text-end">

                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="four col-md-4 pb-3">
                    <div class="counter-box bg-info"> <i class="fa fa-calendar"></i> 
                        <span class="counter text-white">{{ count(upcommingEvents()) }}</span>
                        <p class="text-white">Upcomming Events</p>
                    </div>
                </div>
                <div class="four col-md-4 pb-3">
                    <div class="counter-box bg-primary"> <i class="fa fa-calendar-check-o"></i> 
                        <span class="counter text-white">{{ count(completeEvents()) }}</span>
                        <p class="text-white">Complete Events</p>
                    </div>
                </div>
                <div class="four col-md-4 pb-3">
                    <div class="counter-box bg-success"> <i class="fa fa-file-image-o"></i> 
                        <span class="counter text-white">{{ App\Models\Gallery::count() ?? 0 }}</span>
                        <p class="text-white">Gallery Images</p>
                    </div>
                </div>
                <div class="four col-md-4 pb-3">
                    <div class="counter-box bg-success"> <i class="fa fa-picture-o"></i> 
                        <span class="counter text-white">{{ count(sliderImages()) }}</span>
                        <p class="text-white">Slider Images</p>
                    </div>
                </div>
                <div class="four col-md-4 pb-3">
                    <div class="counter-box bg-info"> <i class="fa fa-text-width"></i> 
                        <span class="counter text-white">{{ count(allArticles()) }}</span>
                        <p class="text-white">Articles</p>
                    </div>
                </div>
                <div class="four col-md-4 pb-3">
                    <div class="counter-box bg-primary"> <i class="fa fa-question-circle-o"></i> 
                        <span class="counter text-white">{{ count(allFaqs()) }}</span>
                        <p class="text-white">Faq</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
