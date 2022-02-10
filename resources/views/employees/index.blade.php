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
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
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
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">Create Employee</a>

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
                            @foreach ($employees as $employee)
                                <tr>    
                                    <td>{{ $employee->id }}</td>
                       
                                    <td>{{ $employee->first_name }}</td>
                       
                                    <td>{{ $employee->last_name }}</td>

                                    <td>{{ $employee->email }}</td>
                            
                                    <td>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
           
                                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary">View</a>

                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <div class="mx-auto center">
                                {{ $employees->links() }}
                            
                        
                        </div>
                        
                        

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection