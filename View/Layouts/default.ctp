
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>

		<?php echo $title_for_layout; ?>
	</title>
    <script>
        var baseUrl = "<?php echo Router::url('/',true);?>";
        console.log(baseUrl)
    </script>
	<?php

		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');
        echo $this->Html->script(array('bootstrap.min','angularApp'),array('inline'=>false));
		echo $this->fetch('meta');
		echo $this->fetch('css');

	?>
</head>

<body ng-app="angularJsApp">

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
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</div>

<div class="jumbotron">
    <div class="container" ng-view>
        loading...
    </div>
</div>

<hr>
<footer>
    <p>&copy; Company 2013</p>
</footer>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.6/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular-resource.min.js"></script>
<script src="https://cdn.firebase.com/v0/firebase.js"></script>
<script src="https://cdn.firebase.com/libs/angularfire/0.5.0/angularfire.min.js"></script>
<?php echo $this->fetch('script'); ?>
</body>
</html>
