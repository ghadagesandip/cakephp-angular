<input type="text" ng-model="search" class="search-query" placeholder="Search">
<table>
    <thead>
    <tr>
        <th>Project</th>
        <th>Description</th>
        <th><a href="#/newProject">Add New</a></th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat="project in projects | orderByPriority | filter:search | orderBy:'name'">
        <td><a href="{{project.site}}" target="_blank">{{project.name}}</a></td>
        <td>{{project.description}}</td>
        <td>
            <a href="#/edit/{{project.$id}}">Update</i></a>
        </td>
    </tr>
    </tbody>
</table>