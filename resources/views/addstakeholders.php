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
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

    </head>

    <body style="text-align: center;">

    <br><br>

    <h3><a href="/stakeholders"><-- Back to Stakeholder List</a></h3>

    <br>

    <h1>Add Stakeholder</h1>

    <div ng-app="" ng-init='countries=<?php echo ($listOfCountries); ?>;types=<?php echo ($listOfTypes) ?>;'>

    <form action="" method="POST">

        Country : <select name="country">

            <option ng-repeat="x in countries" value="{{ x.country }}">
                {{ x.country }}
            </option>

        </select><!--<input type="text" name="country"/>--><br><br>

        Name : <input type="text" name="name"/><br><br>

        Type : <select name="type">

            <option ng-repeat="x in types" value="{{ x.type }}">
                {{ x.type }}
            </option>

        </select><!--<input type="text" name="country"/>--><br><br>

        Functional Area : <input type="text" name="functional_area"/><br><br>

        Url : <input type="text" name="url"/><br><br>

        <input type="submit" value="Add Stakeholder!"/>

    </form>

    </body>
    </html>

<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 3/23/15
 * Time: 2:36 PM
 */


