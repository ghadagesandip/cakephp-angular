
 <form name="postform" novalidate ng-submit="savePost()">
     <div class="control-group" ng-class="{error: postform.title.$invalid}">
         <label>Title</label>
         <input type="text" name="title" ng-model="post.title" ng-minlength="3" required>
         <div ng-show="postform.title.$error.minlength" class="help-inline"> too short</div>
     </div>

     <label>Description : </label>
     <textarea name="description" data-ng-model="post.description"></textarea>
     <br/>
     <a href="#/" class="btn btn-default">Cancel</a>
     <button ng-disabled="postform.$invalid" type="submit" class="btn btn-success">Add</button>
 </form>