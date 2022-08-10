@extends('layouts.page')

@section('content')
<div class="container pt-2">
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
                    {{ auth()->user()->createToken('tokens')->plainTextToken  }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
