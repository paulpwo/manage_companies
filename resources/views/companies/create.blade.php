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

                     <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('companies.store') }}">
                      @csrf
                        @method('POST')

                        <div class="box-body">

                            <div class="form-group">
                                <label for="logo">logo</label>
                                <input type="file"
                                    class="form-control"
                                    name="logo"
                                    value="{{ old('logo') }}"
                                    id="logo"
                                >
                            </div>

                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    required
                                    placeholder="name"
                                    value="{{ old('name') }}"
                                    id="name"
                                    
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
                                <label for="website">Website</label>
                                <input type="text"
                                    class="form-control"
                                    name="website"
                                    
                                    placeholder="website"
                                    value="{{ old('website') }}"
                                    id="website"
                                    
                                >
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