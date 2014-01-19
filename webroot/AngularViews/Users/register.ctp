<h2>Create your account</h2>

<form name="userform" novalidate ng-submit="registerUser()">
    <div class="control-group">
        <label>First Name : </label>
        <input type="text" name="first_name" data-ng-model="user.first_name" required ng-pattern="/^[a-zA-Z]+$/" ng-minlength="3">
        <div ng-show="userform.first_name.$error.required" class="error"> Please enter first name</div>
        <div ng-show="userform.first_name.$error.pattern" class="error"> Please enter alphabets only</div>
        <div ng-show="userform.first_name.$error.minlength" class="error"> please enter al least 3 characters</div>
        <br/>
    </div>

    <div class="control-group">
        <label>Last Name : </label>
        <input type="text" name="last_name" data-ng-model="user.last_name" required ng-pattern="/^[a-zA-Z]+$/" ng-minlength="3" />
        <div ng-show="userform.last_name.$error.required" class="error"> Please enter lasts name</div>
        <div ng-show="userform.first_name.$error.pattern" class="error"> Please enter alphabets only</div>
        <div ng-show="userform.first_name.$error.minlength" class="error"> please enter al least 3 characters</div>
        <br/>
    </div>

    <div class="control-group">
        <label>Email</label>
        <input type="email" name="email" ng-model="user.email" required>
        <div ng-show="userform.email.$error.email" class="error"> Please enter valid email</div>
        <div ng-show="userform.email.$error.required" class="error"> Please enter email address </div>
    </div>

    <div class="control-group">
        <label>Password</label>
        <input type="password" name="password" ng-model="user.password"   required  ng-minlength="3">
        <div ng-show="userform.password.$error.required" class="error"> Please enter password</div>
        <div ng-show="userform.first_name.$error.minlength" class="error"> please enter al least 3 characters</div>
    </div>

    <div class="control-group">
        <label>Confirm Password</label>
        <input  type="password" name="confirm_password" mismatch same-as="{{user.password}}" ng-model="user.confirm_password" class="confirm_pass_check"  required  ng-minlength="3" />
        <div ng-show="userform.confirm_password.$error.required" class="error"> Please enter confirm password</div>
        <div ng-show="userform.first_name.$error.minlength" class="error"> please enter al least 3 characters</div>
        <div ng-show="userform.confirm_password.$error.mismatch" class="error"> password doesnot match</div>

    </div>

    <div class="control-group">
        <label>Date Of Birth</label>
        <input class="datepicker" type="date" name="dob" ng-model="user.dob" required>
        <div ng-show="userform.dob.$error.required" class="error"> this field is required</div>

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
