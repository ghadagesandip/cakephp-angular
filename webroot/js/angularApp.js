
var app = angular.module('angularJsApp',['firebase']);

app.value('fbURL', 'https://cakephp-angular.firebaseio.com/')

app.config(function($routeProvider){
    $routeProvider.
        when('/projects',{controller : 'ListProjectsCtrl',templateUrl : 'AngularViews/Projects/index.ctp'}).
        when('/newProject', {controller:'NewProjectCtrl', templateUrl:'AngularViews/Projects/add.ctp'}).
        when('/posts',{controller : 'ListPostsCtrl',templateUrl : 'AngularViews/Posts/index.ctp'}).
        when('/newPost', {controller:'CreateCtrl',templateUrl:'AngularViews/Posts/add.ctp'}).
        when('/edit/:postId', {controller:'EditCtrl',templateUrl:'AngularViews/Posts/add.ctp'}).
        otherwise({ redirectTo :'/posts'});

});


app.factory('Projects', function($firebase, fbURL) {
    return $firebase(new Firebase(fbURL));
});

app.factory("PostFactory", function($http){

    return {
            getPosts: function(callback) {
                $http.get('http://localhost/cakephp-angular/posts/getPosts.json').success(callback);
            }
        };

});



/*
app.service("PostsService",function($http){
    this.getPosts = function(){
            $http({method: 'GET', url: 'http://localhost/cakephp-angular/posts/getPosts.json'}).
            success(function(data, status, headers, config) {
                // this callback will be called asynchronously
                // when the response is available
               return data.posts
            }).
            error(function(data, status, headers, config) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });

    }
});
*/

app.controller('ListPostsCtrl',function($scope,PostFactory){


    PostFactory.getPosts(function(results) {
        $scope.posts = results.posts.data;
    });




});

app.controller("CreateCtrl",function($scope,$location,$http){

    $scope.savePost = function(){

        $http.post('http://localhost/cakephp-angular/posts/savePost.json', $scope.post).
        success(function(){
            $scope.post = {};
            $location.path('/');
        });
    }

});


app.controller("EditCtrl",function($scope,$routeParams,$location,$http){
    console.log($routeParams.postId)
    $scope.post=[];
    $http.get('http://localhost/cakephp-angular/posts/getPost/'+$routeParams.postId+'.json')
        .then(function(result) {
            console.log(result.data.post.data.Post);
            $scope.post = result.data.post.data.Post;

        });


    $scope.savePost = function() {
        $http.post('http://localhost/cakephp-angular/posts/savePost.json', $scope.post).
        success(function(){
            $scope.post = {};
            $location.path('/');
        });
    };
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
})
