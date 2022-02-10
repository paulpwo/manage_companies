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

                        <div class="box-body">
                         <img src="{{ url('storage/'.$company->logo)}}"
                                width="100"
                                alt="Image image"
                            >
                           
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    required
                                    placeholder="name"
                                    value="{{ old('name', $company->name) }}"
                                    id="name"
                                    disabled
                                >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text"
                                    class="form-control"
                                    name="email"
                                    required
                                    placeholder="email"
                                    value="{{ old('email', $company->email) }}"
                                    id="email"
                                    disabled
                                >
                            </div>
                             <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text"
                                    class="form-control"
                                    name="website"
                                    required
                                    placeholder="website"
                                    value="{{ old('website', $company->website) }}"
                                    id="website"
                                    disabled
                                >
                            </div>

                           
                           
                          <h2>Employees</h2>
                           <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th> 
                                    <th scope="col">Email</th>                
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($company->employees as $employee)
                                <tr>    
                                    <td>{{ $employee->id }}</td>
                       
                                    <td>{{ $company->firt_name }}</td>
                       
                                    <td>{{ $company->last_name }}</td>

                                    <td>{{ $company->email }}</td>
                            
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                           
                        </div>

                        
                        

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection