
<div class="col-md-12">

    <form novalidate name="myForm" class="css-form" >
        <div class="form-group">
            <a href="#/newUser" type="button" class="btn btn-primary">Add New User</a>
            <input type="text" data-ng-model="search" class="search-query form-control" placeholder="Search name">
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
                    <a href="#/edit/{{user.User.id}}"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a ng-click="deletePost(user.User.id)"  ><i class="glyphicon glyphicon-trash"></i></a>
                </th>
            </tr>
            </tbody>
        </table>
    </form>
</div>


