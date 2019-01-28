@extends('layouts.master')

@section('content')

    <div class="row mt-5">
    
        <div class="col-md-6">


            @if (session()->has('msg'))

                <div class="alert alert-success">{{ session()->get('msg') }}</div>

            @endif
        
            <div class="card">
            
                <div class="card-header">
                    Add Task
                </div>

                <div class="card-body">
                
                    <form action="{{ route('task.create') }}" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="task">Task</label>
                            <input type="text" name="title" id="task" placeholder="Task" 
								   value="{{old('title')}}"
								   class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{ $errors->has('title') ? $errors->first('title') : '' }}
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                        </div>

                    </form>
                
                </div>
            
            </div>
        
        </div>
    
    </div>

    <div class="row mt-5">
    
    <div class="col-md-6">
    
        <div class="card">
        
            <div class="card-header">
                View Tasks
            </div>

            <div class="card-body">
            
                <table class="table table-bordered">
                
                    <tr>
                        <th>Task</th>
                        <th style="width: 2em;">Action</th>
                    </tr>

                    @foreach ($tasks as $task)

                        <tr>
                        
                            <td>{{ $task->title }}</td>
                            <td>
                                <form action="{{ route('task.destroy', $task->id) }}" method="post">
                                    @csrf
                                    @method('delete')    
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>

                        </tr>

                    @endforeach
                
                </table>

            </div>
        
        </div>
    
    </div>

</div>

@endsection