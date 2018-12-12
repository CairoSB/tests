<html ng-app="CQlinks">
<head>
    <!-- old version of CQlinks.html, it was supose to use php to conect, get and add date to the database. -->
    <title>Links of Colt Quest</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.css">
    <style>
        .jumbotron{
            width: 600px;
            text-align: center;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }
        .table{
            margin-top: 20px;
        }
        .form-control {
            margin-bottom: 5px;
        }
    </style>
    <script src="lib/js/angular.min.js"></script>
    <script>
        angular.module("CQlinks", []);
        angular.module("CQlinks").controller("CQlinksCtrl", function ($scope, $http) {
            $scope.app = "CQlinks";
            $scope.dadosRecebidos = [];

            $scope.add = function (chapter) {
                var url = "https://data.anonpone.com/serve/thread/coltquest/";
                url.concat(chapter.threadNumber);
                url.concat('?type=epub');
                chapter.epub = url;
                $scope.chapters.push(angular.copy(chapter));
                delete $scope.chapter;
                $scope.chapterForm.$setPristine();
            };
            var carregarData = function() {
                $http.get('http://localhost:7000/phpToJson.php').then(successCallback, errorCallback);
                function successCallback(response){
                    $scope.dadosRecebidos = response.data.records;
                    console.log($scope.dadosRecebidos);
                };
                function errorCallback(error){
                    //error code
                };
            };
            carregarData();
        });  
    </script>
</head>
<body ng-controller="CQlinksCtrl">
    <div class="jumbotron">
        <h3>{{app}}</h3>
        <form name="chapterForm">
            <input class="form-control" type="text" ng-model="chapter.chapterNumber" name="chapter" ng-required="true" placeholder="Chapter number" ng-minlength="1"/>
            <input class="form-control" type="text" ng-model="chapter.threadNumber" name="thread" ng-required="true"  placeholder="Thread number" ng-minlength="8"/>
        </form>
        <button class="btn btn-primary btn-block" ng-click="add(chapter)" ng-disabled="chapterForm.$invalid">ADD</button>
        <table class="table table-striped">
            <tr>
                <th>Chapters</th>
                <th>Threads</th>
                <th>EPUB Download</th>
            </tr>
            <tr ng-class="" ng-repeat="row in dadosRecebidos">
                <td>{{dadosRecebidos.chapterNumber}}</td>
                <td>{{dadosRecebidos.threadNumber}}</td>
                <td>{{dadosRecebidos.epub}}</td>
            </tr>         
        </table>
        <hr/>
    </div>
</body>
</html>