@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User Items</div>
                <div class="card-body">
                    <user-items myid="{{ Auth::user()->id }}"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
