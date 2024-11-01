@extends('admin.layouts.app')
@section('title',$article->title)
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Article Details</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.articles.index') }}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Data Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-md">
                    <tr>
                        <th>Created On</th>
                        <td>{{ date('d m, y',strtotime($article->created_at)) }}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="{{ asset($article->image) }}" alt="" class="img-responsive" height="400" width="50%">
                        </td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $article->title ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!! $article->description ?? '' !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
