 @include('common.error')

            <form action="/task/{{ $task->id }}" method="Post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT" />
                <label>Id :</label><input type="text" class="form-control" name="id" disabled value="{{$task->id}}">
                <br>
                <label>Title :</label><input type="text" class="form-control" name="title" value="{{$task->title}}">
                <br>
                <label>Description</label><input type="text" class="form-control" name="description" value="{{$task->description}}">
                <br>
                <label><button type="submit" class="btn btn-success">
                    <i class="fa fa-upload"></i> Update</button></label>
            </form>
