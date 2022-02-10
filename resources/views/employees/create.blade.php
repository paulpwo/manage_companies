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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                     <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('employees.store') }}">
                      @csrf
                        @method('POST')

                        <div class="box-body">

                         

                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input type="text"
                                    class="form-control"
                                    name="first_name"
                                    required
                                    placeholder="First Name"
                                    value="{{ old('first_name') }}"
                                    id="first_name"
                                    
                                >
                            </div>
                             <div class="form-group">
                                <label for="name">Last Name</label>
                                <input type="text"
                                    class="form-control"
                                    name="last_name"
                                    
                                    placeholder="last Name"
                                    value="{{ old('last_name') }}"
                                    id="last_name"
                                    
                                >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text"
                                    class="form-control"
                                    name="email"

                                    placeholder="email"
                                    value="{{ old('email') }}"
                                    id="email"
                                    
                                >
                            </div>

                            <div class="form-group">
                                <label for="company-id">Company</label>
                                <select class="form-control"
                                    name="company_id"
                                    required
                                    id="company-id"
                                >
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ old('company_id') == $company->id ? 'selected' : '' }}
                                        >
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                          
                           
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Create</button>

                            <a href="{{ route('companies.index') }}" class="btn btn-default">
                                Cancel
                            </a>
                        </div>
                    </form>
                        
                        

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection