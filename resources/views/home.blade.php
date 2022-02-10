@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    <div class="d-flex flex-row justify-content-center align-items-center" style="height: 100px;">
                        <div class="p-2">
                            <a role="button" class="btn btn-primary btn-lg" href="{{ url('companies') }}">Companies</a>
                        </div>
                        <div class="p-2">
                            <a role="button" class="btn btn-info btn-lg" href="{{ url('employees') }}">Employees</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
