@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2>Departement</h2> <a href="/departement/departement">Departement</a> <br>
                    <h2>Student</h2> <a href="/student/student">Student</a> <br>
                    <h2>Borrow</h2> <a href="/borrow/borrow">Borrow</a> <br>
                    <h2>Book</h2> <a href="/book/book">Book</a> <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
