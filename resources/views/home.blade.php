@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Data Rumah Sakit</li>
                        <li class="list-group-item">Data Pasien</li>
                        
                      </ul>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
