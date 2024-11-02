@extends('admin.layouts.app')
@section('title','Faq Lists')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Faq Lists</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.faqs.create') }}">Add New</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Data Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-md">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Qustion</th>
                            <th>Answer</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $faq->question ?? 'N/A' }}</td>
                                <td>{{ $faq->answer ?? 'N/A' }}</td>
                                <td><span>{{ $faq->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                                <td>
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-info btn-sm"><i
                                            class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm delete-data" data-id="{{ 'delete-faq-' . $faq->id }}"
                                        href="javascript:void(0);">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-faq-{{ $faq->id }}"
                                        action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-end">
                {{ $faqs->links() }}
            </div>
        </div>
    </div>
@endsection
