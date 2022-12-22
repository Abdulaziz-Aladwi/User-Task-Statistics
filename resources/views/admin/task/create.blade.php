@extends('admin.base')

@section('title')
    {{ $title }}
@endsection

@section('body')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>

        <form action="{{route('admin.tasks.store')}}" method="POST">
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">title</label>
                    <div class="col-sm-10">
                        <input type="text" name='title' class="form-control" id="title" placeholder="Title">
                        @error('title')<span style="color: red">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea type="textarea" name='description' class="form-control" id="description"></textarea>
                        @error('description')<span style="color: red">{{ $message }}</span>@enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Admins</label>
                    <div class="col-sm-10">
                        <select name="assigned_by_id" class="custom-select">
                            <option value="">--- Select Admin ---</option>
                            @foreach ($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                        @error('assigned_by_id')<span style="color: red">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Normal Users</label>
                    <div class="col-sm-10">
                        <select name="assigned_to_id" class="custom-select">
                            <option value="">--- Select Users ---</option>
                            @foreach ($normalUsers as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('assigned_to_id')<span style="color: red">{{ $message }}</span>@enderror
                    </div>
                </div>                

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>
    </div>
@endsection
