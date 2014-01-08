
 <form name="postform" novalidate>
     <div class="control-group">
         <label>Title</label>
         <input type="text" name="title" ng-model="post.title" ng-minlength="3" required>
         <div ng-show="postform.title.$error.minlength" class="error"> too short</div>
     </div>

     <label>Description : </label>
     <textarea name="description" data-ng-model="post.description"></textarea>
     <br/>
     <a href="#/" class="btn btn-default">Cancel</a>
     <button ng-disabled="postform.$invalid" type="button" ng-click="savePost()" class="btn btn-success">Add</button>
 </form>