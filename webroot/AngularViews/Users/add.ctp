
<form name="userform" novalidate ng-submit="saveUser()">
    <div class="control-group">
        <label>First Name : </label>
        <input type="text" name="first_name" data-ng-model="post.first_name" required/>
        <div ng-show="userform.first_name.$error.required" class="error"> Please enter first name</div>
        <br/>
    </div>

    <div class="control-group">
        <label>Last Name : </label>
        <input type="text" name="last_name" data-ng-model="post.last_name" required/>
        <div ng-show="userform.last_name.$error.required" class="error"> Please enter lasts name</div>
        <br/>
    </div>

    <div class="control-group">
        <label>Email</label>
        <input type="email" name="email" ng-model="user.email" required>
        <div ng-show="userform.email.$error.email" class="error"> Please enter valid email</div>
    </div>

    <div class="control-group">
        <label>Password</label>
        <input type="password" name="password" ng-model="user.password"   required>
        <div uniqueemail></div>
        <div ng-show="userform.password.$error.required" class="error"> Please enter valid password</div>

    </div>

    <div class="control-group">
        <label>Date Of Birth</label>
        <input type="date" name="dob" ng-model="user.dob" required>
        <div ng-show="userform.email.$error.required" class="error"> Please enter valid dob</div>
        <div ng-show="userform.email.$error.date" class="error"> Please enter valid date</div>
    </div>

    <div class="control-group">
        <label>Gender</label>
        <select name="gender" ng-model="user.gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
       <div ng-show="userform.gender.$error.required" class="error"> Please select gender</div>

    </div>

    <a href="#/users" class="btn btn-default">Cancel</a>
    <button ng-disabled="userform.$invalid" type="submit" class="btn btn-success">Add</button>
</form>
