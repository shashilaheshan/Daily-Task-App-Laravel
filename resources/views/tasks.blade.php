<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="text-center">
    <h1>Daily Tasks</h1>
            <div class="row">
                    <div class="col-md-12">

                      @foreach($errors->all() as $error)

                        <div class="alert alert-danger" role="alert">
                           {{$error}}

                        </div>

                      @endforeach

                      <form method="post" action="/saveTask">
                      {{csrf_field()}}

                      <input type="text" class="form-control" name="task" placeholder="Enter Your Task Here">
                         </br>
                          <input type="submit" class="btn btn-primary" value="SAVE" >
                          <input type="button" class="btn btn-warning" value="CLEAR" >

                      </form>
                          <table class="table table-dark">
                            <th>ID</th>
                            <th>Task</th>
                            <th>Completed</th>
                            <th>Action</th>


                            @foreach($tasks as $task)
                                    <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->task}}</td>
                                    <td>
                                    @if($task->iscompleted)
                                    <button class="btn btn-success">Completed</button>
                                    @else
                                    <button class="btn btn-warning">Not Completed</button>
                                    @endif
                                    </td>
                                    <td>
                                    @if(!$task->iscompleted)

                                    <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark As  Completed</a>

                                   @else
                                   <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-danger">Mark As Not Completed</a>
                                   @endif
                                    <a href="/deletetask/{{$task->id}}" class="btn btn-warning">Delete</a>
                                    <a href="/updatetask/{{$task->id}}" class="btn btn-success">Update</a>
                                    </td>

                                    </tr>
                            @endforeach


                          </table>

                    </div>

            </div>
    </div>
    </div>
</body>
</html>
