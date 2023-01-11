@extends('layouts.default')

@section('content')
    <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <th><a href="{{ route('companies.create') }}" class="btn btn-primary">{{ __('Add Company') }}</a></th>
                            <tr>
                                <th>{{ __('Id') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Logo') }}</th>
                                <th>{{ __('Website') }}</th>
                                <th>{{ __('Operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td><img src="{{asset('images/'.$company->logo) }}" width='70px' height='70px'></td>
                                    <td>{{ $company->website }}</td>
                                    <td>
                                        <a href="{{ route('companies.edit', $company->id) }}"
                                            class="btn btn-primary">{{ __('Edit') }}</a>&nbsp;
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="post"
                                            style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                oclick="return confirm('Sure to Delete')">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $companies->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
