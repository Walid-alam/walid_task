@extends('Layout.app')
@section('content')
    <div class="container">
        @if (Session::has('update'))
            <div class="flash-message">
                <div class="alert alert-info">
                    <h5>Your Task Has Been Updated Successfully!!!</h5>
                </div>
            </div>
        @elseif(Session::has('success'))
            <div class="flash-message">
                <div class="alert alert-success">
                    <h5>Your Task Has Been Created Successfully!!!</h5>
                </div>
                @elseif(Session::has('delete'))
                    <div class="flash-message">
                        <div class="alert alert-danger">
                            <h5>Your Task Has Been Deleted Successfully!!!</h5>
                        </div>
                    </div>
            @endif
            </div>
    </div>

    <div class="container">
        @include('common.error')
            {{ csrf_field() }}
            <center><h1>Add a New Task</h1>
            <p class="lead">Add to your task list below.</p></center>
            <hr>
            <!-- Create Task Modal-->
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Task</a>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Create Task</h4>
                        </div>
                        <div class="modal-body">
                            @include('adding_task')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Create Task Modal End-->

    </div> <!--upper part of main content-->

    <div class="container" style="padding: 0">
        @if (count($tasks) > 0)
                    <center style="background-color:#080908;color: rgba(235, 238, 243, 1);"><h1>Current Tasks</h1></center>

                    @foreach ($tasks as $task)
                        <div>
                            <h2>{{ $task->title }}</h2>
                                <form action="/task/{{ $task->id }}" method="POST">

                                    <!--Edit Modal -->
                                    <a href="#"  class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal1{{$task->id}}"><i class="fa fa-upload"></i> Edit Task</a>

                                    <div class="modal fade" id="myModal1{{$task->id}}" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title text-center" style="color:#d62728">Editing Task</h4>
                                                </div>
                                                <div class="modal-body">
                                                    @include('editing_task')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Edit Modal End -->

                                    <!--View Modal -->
                                    <a href="#"  class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal2{{$task->id}}" ><i class="fa fa-eye"></i> View Task</a>

                                    <div class="modal fade" id="myModal2{{$task->id}}" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title text-center" style="color: #BE5C00">Existing Task</h4>
                                                </div>
                                                <div class="modal-body">
                                                    @include('showing_task')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--View Modal End -->

                                    <!--Delete Modal -->
                                    <a href="#"  class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal3{{$task->id}}"><i class="fa fa-trash"></i> Delete Task</a>

                                    <form action="/task/{{$task->id}}/delete" method="POST">
                                    <div class="modal fade" id="myModal3{{$task->id}}" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title text-center" style="color:crimson">Delete Task</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><h2 align="center" style="color: #204d74"><i>Are You Sure You Want To Delete???</i></h2></p>
                                                    <br>
                                                    <center><label><button class="btn btn-danger" type="submit">
                                                                <span class="fa fa-trash"> Delete Task</span>
                                                        </button></label></center>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                    <!--Delete Modal End -->

                                </form>
                        </div>

                        <div>
                            <h3>{{ $task->description }}</h3>
                        </div>


                        <hr>

                    @endforeach

        @endif
    </div><!--main content(create,read,update,delete)-->

@endsection
