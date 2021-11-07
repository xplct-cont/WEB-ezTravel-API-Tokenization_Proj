@extends('layouts.app')

@section('content')
    <div class="bg-dark">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Logs</h3>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('logs.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('logs.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        h3{
            position: relative;
            left: 400px;
            color:#FF6700;
            
        }

        </style>
@endsection

