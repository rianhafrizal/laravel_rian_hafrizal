@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item" ><a  href="{!! route('outlet.index')!!}">Data Rumah Sakit</a></li>
                        <li class="list-group-item"><a  href="{!! route('pasien.index')!!}">Data Pasien</a></li>
                        
                      </ul>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
