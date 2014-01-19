
<!DOCTYPE html>
<html ng-app="angularJsApp">
<head>
	<?php echo $this->Html->charset(); ?>
	<title data-ng-bind="title">
		Home
    </title>
    <script>
        var baseUrl = "<?php echo Router::url('/',true);?>";
    </script>
	<?php

		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');
        echo $this->Html->script(array('bootstrap.min','angularApp'),array('inline'=>false));
		echo $this->fetch('meta');
		echo $this->fetch('css');

	?>
</head>

<body >

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#/posts">Posts</a>
            <a class="navbar-brand" href="#/projects">Projects</a>
            <a class="navbar-brand" href="#/users">Users</a>
        </div>
        <div class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" role="form">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
                <a class="btn btn-primary" href="#/register">Register</a>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</div>

<div class="jumbotron">
    <div class="container" ng-view ng-animate=" 'animate' " >
        loading...
    </div>
</div>

<hr>
<footer>
    <p>&copy; Company 2013</p>
</footer>
<?php echo $this->Html->script(array('jquery-1.10.2.min','angular.min','angular-animate.min','firebase','angularfire.min'));?>
<?php echo $this->fetch('script'); ?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" />

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
<script>
    $(function() {
        $( ".datepicker" ).datepicker();
    });
</script>
</body>
</html>
