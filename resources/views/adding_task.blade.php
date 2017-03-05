
    <!-- Display Validation Errors -->
    @include('common.error')

            <!-- New Task Form -->
    <form action="/create_task" method="POST" class="form-horizontal">
        {{ csrf_field() }}

                <!-- Task Name -->
        <div class="form-group">
            <h4><label for="task" class="col-sm-3 control-label">Task Title</label></h4>

            <div class="col-sm-5">
                <input type="text" name="title" id="task" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <h4><label for="task" class="col-sm-3 control-label">Description</label></h4>

            <div class="col-sm-5">
                <textarea type="text" name="description" id="task" class="form-control"></textarea>
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-8">
                <button type="submit" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i> Create New Task
                </button>
            </div>
        </div>
    </form>