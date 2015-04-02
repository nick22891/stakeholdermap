<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 3/23/15
 * Time: 8:46 AM
 */

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="http://localhost/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
</head>

<body>

<br><br>

<h1>Stakeholders (<a href="stakeholders/add">Add</a>) </h1>

<div ng-app="" ng-init='results=<?php echo ($list); ?>'>

    <table class="table table-striped">
        <thead style="font-weight: bold;"><tr><td>Country</td><td>Name</td><td>Type</td><td>Functional Area</td><td>URL</td></tr></thead>
        <tbody>
        <tr ng-repeat="x in results">
            <td>{{ x.country }}</td><td>{{ x.name }}</td><td>{{ x.type }}</td><td>{{ x.functional_area }}</td><td>{{ x.url }}</td>
        </tr>
        </tbody>
    </table>

</div>

</body>
</html>

