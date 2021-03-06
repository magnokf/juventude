@extends('layouts.appold')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">

            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" col-12 col-md-7" style="margin-top: 2%">
                <div class="box">
                    <img class="img-fluid" src="{{asset('storage/img/folder1.jpeg')}}" alt="">
                    <h3 class="box-title">Verifique seu e-mail!!</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">Um novo link de verificação foi enviado para
                                seu endereço de e-mail
                            </div>
                        @endif
                        <p>Antes de prosseguir, verifique se há um link de verificação em seu e-mail. Se você não recebeu
                            o e-mail,</p>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link text-orange p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
