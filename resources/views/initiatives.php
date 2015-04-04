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
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"> </script>
</head>

<body>

<br><br>

<h1>Initiatives (<a href="initiatives/add">Add</a>) </h1>

<div ng-app="" ng-init='results=<?php echo ($list); ?>'>

    <table class="table table-striped">
        <thead style="font-weight: bold;"><tr><td>Name</td><td>Country</td><td>Stakeholder</td><td>Initiative Type</td><td>Date</td><td>URL</td></tr></thead>
        <tbody>
        <tr ng-repeat="x in results">
            <td>{{ x.name }}</td><td>{{ x.country }}</td><td>{{ x.stakeholder }}</td><td>{{ x.initiative_type }}</td><td>{{ x.date }}</td><td>{{ x.initiative_url }}</td>
        </tr>
        </tbody>
    </table>

</div>

</body>
</html>

