
var app = angular.module('angularJsApp',['firebase']);


app.value('fbURL', 'https://cakephp-angular.firebaseio.com/')

app.config(['$routeProvider',function($routeProvider){
    $routeProvider.
        when('/users',{ title: 'Users',controller : 'ListUsersCtrl',templateUrl : 'AngularViews/Users/index.ctp'}).
        when('/newUser',{title:"Add User",controller : 'AddUserCtrl',templateUrl : 'AngularViews/Users/add.ctp'}).
        when('/register',{title:"Registration",controller : 'RegisterUserCtrl',templateUrl : 'AngularViews/Users/register.ctp'}).
        when('/update-user',{title:"Update Profile",controller : 'UpdateUserCtrl',templateUrl : 'AngularViews/Users/register.ctp'}).

        when('/projects',{ title: 'Project',controller : 'ListProjectsCtrl',templateUrl : 'AngularViews/Projects/index.ctp'}).
        when('/newProject', {title:"Add Project", controller:'NewProjectCtrl', templateUrl:'AngularViews/Projects/add.ctp'}).


        when('/posts',{ title: 'Posts',controller : 'ListPostsCtrl',templateUrl : 'AngularViews/Posts/index.ctp'}).
        when('/newPost', {title:"Add Post",controller:'CreateCtrl',templateUrl:'AngularViews/Posts/add.ctp'}).
        when('/edit/:postId', {title:"Update Post", controller:'EditCtrl',templateUrl:'AngularViews/Posts/add.ctp'}).
        otherwise({ redirectTo :'/posts'});

}]);

app.run(['$location', '$rootScope', function($location, $rootScope) {
    $rootScope.$on('$routeChangeSuccess', function (event, current) {
        $rootScope.title = current.$$route.title;
    });
}]);








app.directive("unique-email",function(){
  return{
      restrict:"E",
      link:function(scope){

      }
  }

});


app.directive("confirmPassCheck",function(){
   return{
       restrict:"C",
       require:'ngModel',
       link:function(scope,element,attrs,ctrl){
           scope.$watch(attrs.ngModel,function(value){
              if(attrs.sameAs === value){
                console.log('password matched');
                  ctrl.$setValidity('mismatch',true);
              }
           });
       }
   }
});



app.directive('datepicker', function() {
    return {
        restrict: 'A',
        require : 'ngModel',
        link : function (scope, element, attrs, ngModelCtrl) {


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
       },
       saveUser : function(user){
           return $http.post(baseUrl+'users/saveUser.json',user);
       },
       getUser : function(id){
           return $http.get(baseUrl+'users/getUser'+id+'.json');
       }
   }
});





app.controller('ListPostsCtrl',['$scope','PostFactory','$location',function($scope,PostFactory,$location){
        $scope.title ="Posts";
        showPosts();
        function showPosts(){
            PostFactory.getPosts()
                .success(function (result) {
                    $scope.posts = result.posts.data;
                    $scope.status = result.posts.status;
                    $scope.message = result.posts.message;
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
}]);





app.controller("CreateCtrl",['$scope','$rootScope','$location','PostFactory',function($scope,$rootScope,$location,PostFactory){
    $rootScope.title = "add post";
    $scope.savePost = function(){

        PostFactory.savePost($scope.post)
            .success(function(){
                $location.path('/');
            })
            .error(function(error) {
                $scope.status = 'Unable to insert post: ' + error.message;
            });
    }

}]);







app.controller("EditCtrl",['$scope','$routeParams','$location','PostFactory',function($scope,$routeParams,$location,PostFactory){

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


}]);



app.controller("deletePostCtrl",['$scope','$routeParas','$location','PostFactory',function($scope,$routeParas,$location,PostFactory){

    PostFactory.deletePost($routeParams.postId)
        .success(function(){
            $location.path('/');
    });

}]);





app.controller("ListProjectsCtrl",['$scope','Projects',function($scope,Projects){
    $scope.projects = Projects;
}]);





app.controller("NewProjectCtrl",['$scope','$location','$timeout','Projects',function($scope, $location, $timeout, Projects){
    $scope.save = function() {
        Projects.$add($scope.project, function() {
            $timeout(function() { $location.path('/projects'); });
        });
    };
}]);





app.controller("ListUsersCtrl",['$scope','UserFactory',function($scope,UserFactory){
    getUsers();
    $scope.title ="Users";

    function getUsers(){
        UserFactory.getUsers()
            .success(function(result){
                $scope.users = result.users.data;
                $scope.status = result.users.status;
                $scope.message = result.users.message;
            })
    }
}]);



app.controller("AddUserCtrl",['$scope',function($scope){

}]);


app.controller("RegisterUserCtrl",['$scope','$location','UserFactory',function($scope,$location,UserFactory){
    $scope.registerUser = function(){
        console.log($scope.user)
        UserFactory.saveUser($scope.user)
            .success(function(){
                $location.path('/users');
            })
            .error(function(error) {
                $scope.status = 'Unable to register user: ' + error.message;
            });
    }
}]);


app.controller("UpdateUserCtrl",['$scope','UserFactory',function($scope,UserFactory){
    UserFactory.getUser()
        .success(function(){

        })
}]);