
var app = angular.module('angularJsApp',['firebase']);


app.value('fbURL', 'https://cakephp-angular.firebaseio.com/')

app.config(function($routeProvider){
    $routeProvider.
        when('/users',{controller : 'ListUsersCtrl',templateUrl : 'AngularViews/Users/index.ctp'}).
        when('/newUser',{controller : 'AddUserCtrl',templateUrl : 'AngularViews/Users/add.ctp'}).

        when('/projects',{controller : 'ListProjectsCtrl',templateUrl : 'AngularViews/Projects/index.ctp'}).
        when('/newProject', {controller:'NewProjectCtrl', templateUrl:'AngularViews/Projects/add.ctp'}).

        when('/posts',{controller : 'ListPostsCtrl',templateUrl : 'AngularViews/Posts/index.ctp'}).
        when('/newPost', {controller:'CreateCtrl',templateUrl:'AngularViews/Posts/add.ctp'}).
        when('/edit/:postId', {controller:'EditCtrl',templateUrl:'AngularViews/Posts/add.ctp'}).
        otherwise({ redirectTo :'/posts'});

});


app.directive("unique-email",function(){
  return{
      restrict:"E",

      link:function(scope){

      }
  }

});


app.factory('Projects', function($firebase, fbURL) {
    return $firebase(new Firebase(fbURL));
});


app.factory("PostFactory", function($http){

    return {
            getPosts: function() {
                return $http.get(baseUrl+'posts/getPosts.json')
            },
            savePost: function(post) {
                return $http.post(baseUrl+'posts/savePost.json',post);
            },
            getPost : function (id) {
                return $http.get(baseUrl + 'posts/getPost/' + id+'.json');
            },
            deletePost: function(id){
                return $http.delete(baseUrl + 'posts/deletePost/'+ id+'.json');
            }
        };

});


app.factory("UserFactory",function($http){
   return {
       getUsers : function(){
           return $http.get(baseUrl+'users/getUsers.json')
       }
   }
});

app.controller('ListPostsCtrl',function($scope,PostFactory,$location){
        showPosts();
        function showPosts(){
            PostFactory.getPosts()
                .success(function (result) {
                    $scope.posts = result.posts.data;
                })
                .error(function (error) {
                    $scope.status = 'Unable to load customer data: ' + error.message;
                });

        }
        $scope.deletePost = function(id){
            PostFactory.deletePost(id)
                .success(function(){
                    showPosts();
                })
        }
});



app.controller("CreateCtrl",function($scope,$location,PostFactory){

    $scope.savePost = function(){

        PostFactory.savePost($scope.post)
            .success(function(){
                $location.path('/');
            });
            error(function(error) {
                $scope.status = 'Unable to insert post: ' + error.message;
            });
    }

});


app.controller("EditCtrl",function($scope,$routeParams,$location,PostFactory){

    PostFactory.getPost($routeParams.postId)
        .success(function (result) {
            $scope.post = result.post.data.Post;
        })
        .error(function (error) {
            $scope.status = 'Unable to load customer data: ' + error.message;
        });


    $scope.savePost = function() {
        PostFactory.savePost($scope.post)
            .success(function(){
                $scope.post = {};
                $location.path('/');
            })
    }


});

app.controller("deletePostCtrl",function($scope,$routeParas,$location,PostFactory){

    PostFactory.deletePost($routeParams.postId)
        .success(function(){
            $location.path('/');
    });

});





app.controller("ListProjectsCtrl",function($scope,Projects){
    $scope.projects = Projects;
});

app.controller("NewProjectCtrl",function($scope, $location, $timeout, Projects){
    $scope.save = function() {
        Projects.$add($scope.project, function() {
            $timeout(function() { $location.path('/projects'); });
        });
    };
});





app.controller("ListUsersCtrl",function($scope,UserFactory){
    getUsers();
    function getUsers(){
        UserFactory.getUsers()
            .success(function(result){
                $scope.users = result.users.data;
            })
    }
});

app.controller("AddUserCtrl",function($scope){

});
