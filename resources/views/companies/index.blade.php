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
            
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">Create Company</a>

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($companies as $company)
                                <tr>    
                                    <td>{{ $company->id }}</td>
                       
                                    <td>{{ $company->name }}</td>
                       
                                    <td>{{ $company->email }}</td>
                            
                                    <td><img src="storage/{{ $company->logo }}" class="img-thumbnail" width="50" height="50"/></td>
                         
                                    <td><img src="{{ $company->Website }}" /></td>
                                    <td>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
           
                                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary">View</a>

                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" >
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
                                {{ $companies->links() }}
                            
                        
                        </div>
                        
                        

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection