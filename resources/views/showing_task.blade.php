
    @include('common.error')

    <div class="container">
        <div class="row">
            <div>
                <strong>Id :</strong>{{$task->id}}
            </div>
            <br>
            <div>
                <strong>Title :</strong> {{$task->title}}
            </div>
            <br>
            <div>
                <strong>Description : </strong>{{$task->description}}
            </div>
            <br>
            <div>
                <strong>Created at : </strong>{{$task->created_at}}
            </div>
            <br>
            <div>
                <strong>Updated at : </strong>{{$task->updated_at}}
            </div>

        </div>
    </div>
