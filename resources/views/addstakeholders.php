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

        <script>

            function addStakeholders () {



            }

        </script>

    </head>

    <body style="text-align: center;">

    <br><br>

    <h1>Add Stakeholder</h1>

    <form action="http://localhost/stakeholdermap/postStakeholder" method="post">

        Country : <input name="country"/><br><br>

        Name : <input name="name"/><br><br>

        Type : <input name="type"/><br><br>

        Functional Area : <input name="functional_area"/><br><br>

        Url : <input name="url"/><br><br>

        <input type="submit" value="Add Stakeholder!" onclick="addStakeholder()"/>

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