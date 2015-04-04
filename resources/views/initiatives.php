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


    <style>

        table {

            table-layout: fixed;
            max-width:900px;
            text-align: center;

        }

        td {

            white-space: normal;
            word-wrap:break-word;

        }

    </style>

</head>

<body>

<br><br>

<h1>Initiatives (<a href="initiatives/add">Add</a>) </h1>

<div ng-app="" ng-init='results=<?php echo ($list); ?>'>

    <table class="table table-striped">
        <thead style="font-weight: bold;"><tr><td>Name</td><td>Country</td><td style="width:300px;">Stakeholders</td><td>Initiative Type</td><td>Date</td><td style="width:200px;">URL</td></tr></thead>
        <tbody>
        <tr ng-repeat="initiative in results">
            <td>{{ initiative.name }}</td><td>{{ initiative.country }}</td><td><ul><li ng-repeat="stakeholder in initiative.stakeholders">{{ stakeholder.name }} ({{ stakeholder.pivot.type }})<br></li></ul></td><td>{{ initiative.initiative_type }}</td><td>{{ initiative.date }}</td><td>{{ initiative.initiative_url }}</td>
        </tr>
        </tbody>
    </table>

</div>

</body>
</html>

