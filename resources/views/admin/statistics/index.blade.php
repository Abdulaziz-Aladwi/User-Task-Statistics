@extends('admin.base')

@section('title')
    {{ $title }}
@endsection

@section('body')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Assigned Name</th>
                        <th>Tasks Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statistics as $key => $statistic)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$statistic->assignee->name}}</td>
                            <td>{{$statistic->tasks_count}}</td>
                        </tr>
                    @endforeach

                </tbody>
                
            </table>
        </div>
    </div>
@endsection
