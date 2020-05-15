@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trainee List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/add_trainee">
                        @csrf
                        <label for="name">Name : </label>
                          <input id="name" type="text" class="@error('name') is-invalid @enderror">
                        <label for="name">Surname : </label>
                          <input id="surname" type="text" class="@error('surname') is-invalid @enderror">
                        <button type="submit">Create new trainee </button>
                    </form>

                    {!! Form::open(['url' => 'add_trainee']) !!}
                      Name : {!! Form::text('name') !!}
                      Surname : {!! Form::text('surname') !!}
                        {!! Form::submit('Create a new trainee') !!}
                    {!! Form::close() !!}
                    <br/>
                    Trainees recorded :
                    <ul>
                      @foreach ($trainees as $trainee)
                      <li>
                          {{ $trainee->name }} {{ $trainee->surname }}
                      </li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
