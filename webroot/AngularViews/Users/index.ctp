
<div class="col-md-12">

    <form novalidate name="myForm" class="css-form" >
        <div class="form-group row">
            <div class="col-md-2"><a href="#/newUser" type="button" class="btn btn-primary">Add New User</a></div>
            <div class="col-md-3">status :{{status}}</div>
            <div class="col-md-7" >{{message}}</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="text" data-ng-model="search" class="search-query form-control" placeholder="Search name">
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr data-ng-repeat="user in users | filter:search | orderBy:'id'">
                    <td data-ng-bind="user.User.id"></td>
                    <td data-ng-bind="user.User.email"></td>
                    <td data-ng-bind="user.User.first_name"></td>
                    <td data-ng-bind="user.User.last_name"></td>
                    <td data-ng-bind="user.User.dob"></td>
                    <td data-ng-bind="user.User.gender"></td>
                    <th>
                        <a href="#/update-user/{{user.User.id}}"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a ng-click="deletePost(user.User.id)"  ><i class="glyphicon glyphicon-trash"></i></a>
                    </th>
                </tr>
            </tbody>
        </table>
    </form>
</div>


