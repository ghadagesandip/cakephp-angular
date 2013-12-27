
var app = angular.module('angularJsApp',[]);


app.config(function($routeProvider){

    $routeProvider.
        when('/posts',{controller : 'ListPostsCtrl',templateUrl : 'AngularViews/Posts/index.ctp'}).
        when('/newPost', {controller:'CreateCtrl',templateUrl:'AngularViews/Posts/add.ctp'}).
        otherwise({ redirectTo :'/posts'});

});


/*
app.factory("PostFactory", function($http){


    var PostFactory = {};


    PostFactory.getPosts = function(){

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

    return PostFactory;

});


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


app.controller('ListPostsCtrl',function($scope,PostFactory){
    $scope.posts = PostFactory.getPosts();
});

*/



app.controller('ListPostsCtrl', function($scope,$http){

    $http({method: 'GET', url: 'http://localhost/cakephp-angular/posts/getPosts.json'}).
        success(function(data, status, headers, config) {
            // this callback will be called asynchronously
            // when the response is available
            $scope.posts = data.posts.data;
        }).
        error(function(data, status, headers, config) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
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



