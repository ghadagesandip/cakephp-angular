
<div class="col-md-12">

    <form novalidate name="myForm" class="css-form" >
        <div class="form-group">
            <a href="#/newPost" type="button" class="btn btn-primary">Add New Post</a>
            <input type="text" data-ng-model="search" class="search-query form-control" placeholder="Search name">
        </div>
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
                    <a href="#/edit/{{post.Post.id}}"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a ng-click="delete()" data-value="post.Post.id" ><i class="glyphicon glyphicon-trash"></i></a>
                </th>
            </tr>
            </tbody>
        </table>
    </form>
</div>


