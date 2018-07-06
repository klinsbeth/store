@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Products

                <a href ="{{ route("products.create")}}">
                add
                    {{ $Product->name }}
                    </a>
                
                </div>

                <div class="card-body">
                 @foreach ($products as $Product)
                    <a href="{{route("products.edit", [$Product])}}">
                    {{$Product->name }}
                    </a>
                        *
                     <a href class="{{ route('products.delete', [ $Product ]) }}" onclick="event.preventDefault();document.getElementById("delete-form={{$Product->id}}").submit();">
                                        {{ __('Delete') }}
                                    </a>

                                    <form id="delete-form={{$Product->id}}" action="{{ route('products.delete', [ $Product ]) }}" method="POST" style="display: none;">
                                        @csrf
                                        {{ Method_Field("DELETE") }}
                                        {{ csrf_field() }}
                                    </form>
                                    <br>
                 @endforeach  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
