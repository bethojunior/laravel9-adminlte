@extends('layouts.page')

@section('title', 'Painel ')
@section('content_header')
    <div class="col-lg-12">
        <h1 class="m-0 text-dark">
            Enviar Sms
        </h1>
    </div>
@stop

@section('content')
    @include('layouts.includes.layout')
    <div class="row pt-2">
        <div class="col-lg-12">
            <form method="post" action="{{ route('sms.create') }}">
                @csrf
                @method('POST')

                <input type="text" hidden name="client_id" value="1">
                <input hidden name="status" value="{{ false }}">

                <div class="form-group col-lg-2">
                    <label for="phone">Número</label>
                    <input  onkeypress="mask(this, mphone);" type="text" name="phone" id="phone" class="form-control">
                </div>

                <div class="form-group col-lg-12">
                    <label for="message">Mensagem</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group col-lg-12">
                    <input type="submit" value="Enviar" class="btn btn-secondary">
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/modules/sms/index.js') }}"></script>
@endsection
