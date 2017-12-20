@extends('layouts.app')
@section('content')
    <div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            Syllabus
            <a href="{{ route('syllabus.create') }}" class="btn btn-info btn-sm float-right">Create Subject</a>
        </div>
        
        
<!--TABLE FOR Syllabus-->
<div class="container mt-4">
    <div class="card card-info">
        <div class="card-header">
            <h3>{{ $subjects->name }}</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <th>Actions</th>
                    <th>Syllabus</th>
                    <th>Description</th>
                   
                    
                </thead>
                <tbody>
                  
                </tbody>
            </table>
        </div>
        <div class="card-footer">
           
        </div>
        </div>
    </div>
</div>
</div>
@endsection



