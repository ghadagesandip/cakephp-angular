<div class="col-md-12" xmlns="http://www.w3.org/1999/html">


    <form novalidate name="myForm" class="css-form" >
        <div class="form-group row">
            <div class="col-md-2"><a href="#/newPost" type="button" class="btn btn-primary">Add New Post</a></div>
            <div class="col-md-3">status :{{status}}</div>
            <div class="col-md-7" >{{message}}</div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <input type="text" data-ng-model="search" class="search-query form-control" placeholder="Search post by title ">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-ng-repeat="post in posts | filter:search | orderBy:'id'">
                        <td data-ng-bind="post.Post.id"></td>
                        <td data-ng-bind="post.Post.title"></td>
                        <td data-ng-bind="post.Post.description"></td>
                        <td data-ng-bind="post.Post.created"></td>
                        <td data-ng-bind="post.Post.modified"></td>
                        <th>
                            <a ng-href="#/edit/{{post.Post.id}}" confirm-delete><i class="glyphicon glyphicon-pencil"></i></a>
                            <a ng-click="deletePost(post.Post.id)"  ><i class="glyphicon glyphicon-trash"></i></a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

