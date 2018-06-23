@extends('layouts.app')

@section('content')
<div class="container">
<div class="menu top-right links">
                    <a href="#" id="logout">Logout</a>
                </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы вошли, но здесь ничего нет:(
                    Для получения имён пользователей:
                    <button id="get_users">Get users</button> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection