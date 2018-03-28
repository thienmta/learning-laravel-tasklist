<!DOCTYPE html>
<html>
<head>
	<title>Task manager</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
    <style type="text/css">
    	.clear{
    		clear: both;
    	}
    	.btn{
    		margin: 10px 0;
    	}
    </style>
</head>
<body style="padding-top: 10px;">
	<div class="container">
		<div class="col-xs-12 col-sm-6 col-sm-push-3">
			<nav class="navbar navbar-inverse" style="margin-bottom: 20px;">
				<div class="navbar-header">
                    <a href="" class="navbar-brand" style="color: #FFFFFF">Task Manager</a>
                </div>
			</nav>
		</div>
		<div class="clear"></div>
		<div class="col-xs-12 col-sm-6 col-sm-push-3" style="margin-bottom: 30px; padding: 0 40px;">
			<form class="form-group" action="{{url('createTask')}}" method="post">
				{{ csrf_field() }}
				<nav class="navbar navbar-default" style="margin-bottom: 20px;">
					<div class="navbar-header">
	                    <a href="" class="navbar-brand">New Task</a>
	                </div>
				</nav>
				<label>Task</label>
				<input class="col-xs-12 form-control" type="text" name="taskName" placeholder="Task name">
				<div class="clear"></div><br>
				<input class="col-xs-12 form-control" type="text" name="taskTime" placeholder="Task time">
				<div class="clear"></div>
				<input class="btn btn-success" type="submit" name="" value="Add Task">
			</form>
		</div>

		<br>
		<div class="clear"></div>
		<div class="col-xs-12 col-sm-6 col-sm-push-3" style="margin-bottom: 30px; padding: 0 40px;">
			<form class="form-group" action="" method="post">
				{{ csrf_field() }}
				<nav class="navbar navbar-default" style="margin-bottom: 20px;">
					<div class="navbar-header">
	                    <a href="" class="navbar-brand">Current Tasks</a>
	                </div>
				</nav>
				<table class="table table-striped">
					<tr>
						<th>Task name</th>
						<th>Task time</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
					<?php
					foreach ($task as $task) {?>
						<tr>
							<td style="margin-right: 20px;"><?php echo $task->taskName; ?></td>
							<td style="margin-right: 20px;"><?php echo $task->taskTime; ?></td>
							<td><a href="deleteTask/<?php echo $task->taskId; ?>" class="btn btn-danger">Delete</a></td>
							<td><a href="editTask/<?php echo $task->taskId; ?>" class="btn btn-info">Edit</a></td>
						</tr>
					<?php } ?>
				</table>
			</form>
		</div>

	</div>





	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
</body>
</html>