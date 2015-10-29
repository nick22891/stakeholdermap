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
        <link rel="stylesheet" type="text/css" href="http://www.argentmac.com/cdn/jquery.tokenize.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://www.argentmac.com/cdn/jquery.tokenize.js"></script>

        <script>

        $( document ).ready(function() {

            $('#tokenize-leader').tokenize();

            $('#tokenize-partner').tokenize();

            $('#tokenize-sponsor').tokenize();

            $('select#tokenize-leader option').removeAttr("selected");

            $('select#tokenize-partner option').removeAttr("selected");

            $('select#tokenize-sponsor option').removeAttr("selected");

            $('li.Token').remove();
        });

        </script>

        <style>

            .token-class { width: 500px }

        </style>

    </head>

    <body style="text-align: center;">

    <br><br>

    <h3><a href="/initiatives"><-- Back to Initiative List</a></h3>

    <br>

    <h1>Add Initiative</h1>

    <div ng-app="" ng-init='countries=<?php echo ($listOfCountries); ?>;types=<?php echo ($listOfTypes) ?>;stakeholders=<?php echo ($listOfStakeholders) ?>;'>

        <form action="" method="POST">

            <input type="hidden" name="_token" value="<?php echo(csrf_token()); ?>" />

            Country : <select name="country">

                <option ng-repeat="x in countries" value="{{ x.country }}">
                    {{ x.country }}
                </option>

            </select><!--<input type="text" name="country"/>--><br><br>

            Name : <input type="text" name="name"/><br><br>

            Leader(s) : <i>(Start typing to see suggestions)</i><br><select id="tokenize-leader"  style="width:500px;" name="leaders[]" class="token-class">

                <option ng-repeat="x in stakeholders" value="{{ x.id }}">
                    {{ x.name }}
                </option>

            </select><!--<input type="text" name="country"/>--><br><br>

            Partner(s) : <i>(Start typing to see suggestions)</i><br><select id="tokenize-partner"  style="width:500px;" name="partners[]" class="token-class">

                <option ng-repeat="x in stakeholders" value="{{ x.id }}">
                    {{ x.name }}
                </option>

            </select><!--<input type="text" name="country"/>--><br><br>

            Sponsor(s) : <i>(Start typing to see suggestions)</i><br><select id="tokenize-sponsor"  style="width:500px;" name="sponsors[]" class="token-class">

                <option ng-repeat="x in stakeholders" value="{{ x.id }}">
                    {{ x.name }}
                </option>

            </select><!--<input type="text" name="country"/>--><br><br>

            Type : <select name="initiative_type">

                <option ng-repeat="x in types" value="{{ x.initiative_type }}">
                    {{ x.initiative_type }}
                </option>

            </select><!--<input type="text" name="country"/>--><br><br>

            Year : <input type="text" name="date"/><br><br>

            Url : <input type="text" name="initiative_url"/><br><br>

            <input type="submit" value="Add Initiative!"/><br><br><br>

        </form>

    </div>

    </body>
    </html>

<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 3/23/15
 * Time: 2:36 PM
 */


