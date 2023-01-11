@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="class-header">
                        <h3>Register</h3>
                    </div>
                    <div class="card-body">
                        @if (Session()->has('success'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                                <strong>{{ Session()->get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session()->has('fail'))
                            <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                <strong>{{ Session()->get('fail') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('companies.store') }}" name="user">
                            @csrf
                            <div class="form-group">
                                <label for="firstname">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Your name">
                            </div>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter Your Email">
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="logo">{{ __('Logo') }}</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                            </div>
                            @if ($errors->has('logo'))
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="website">{{ __('Website') }}</label>
                                <input type="text" class="form-control" id="website" name="website"
                                    placeholder="Enter Your Website">
                            </div>
                            @if ($errors->has('website'))
                                <span class="text-danger">{{ $errors->first('website') }}</span>
                            @endif
                            <button type="submit" id="user" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
