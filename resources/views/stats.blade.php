@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-md-offset-1">

                <h1>{{ $user->name }}</h1>
                <hr/>
                <p class="lead">There are {{ $firstNameCount }} users with the same first name as you.</p>
                <p class="lead">There are {{ $lastNameCount }} users with the same last name as you.</p>
                <p class="lead">There are {{ $middleNameCount }} users with the same middle name as you.</p>
                <hr/>
                <h1>All Users</h1>

                <p class="lead">{{ $allUserCount }}</p>
            </div>
        </div>
    </div>
@endsection