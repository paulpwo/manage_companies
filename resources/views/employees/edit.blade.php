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

                     <form role="form" method="POST" action="{{ route('employees.update', ['employee' => $employee]) }}">
                      @csrf
                        @method('PUT')


                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text"
                                    class="form-control"
                                    name="first_name"
                                    required
                                    placeholder="first_name"
                                    value="{{ old('first_name', $employee->first_name) }}"
                                    id="first_name"
                                    
                                >
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text"
                                    class="form-control"
                                    name="last_name"
                                    required
                                    placeholder="last_name"
                                    value="{{ old('last_name', $employee->last_name) }}"
                                    id="last_name"
                                    
                                >
                            </div>
                             <div class="form-group">
                                <label for="website">Email</label>
                                <input type="text"
                                    class="form-control"
                                    name="email"
                                    required
                                    placeholder="email"
                                    value="{{ old('email', $employee->email) }}"
                                    id="email"
                                >
                            </div>
                          

                          
                           
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>

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