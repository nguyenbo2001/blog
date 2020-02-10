@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="cart-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p class="card-text">{{ $user->email }}</p>
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
        </tr>
      </thead>
    </table>
  </div>
@endsection
