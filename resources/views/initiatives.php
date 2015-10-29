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

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"> </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type="text/javascript" src="http://www.argentmac.com/cdn/jquery.tokenize.js"></script>

    <script src="js/multifilter.min.js"></script>

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

        .token-class {

            width: 280px;

        }

        .Dropdown {

            width:450px !important;

        }

    </style>


    <script>

        var initiativeObject = JSON.parse('<?php echo ($list) ?>');

    </script>


    <script src="js/initiatives.js"></script> <!--prepares all the necessary data and provides all the functions referenced below-->


</head>

<body>

<br><br>

<h3><a href="/map"><-- Back to Map</a></h3>

<br>

<h1>Initiatives (<a href="initiatives/add">Add</a>) </h1>

<div ng-app="" ng-init='results=<?php echo ($list); ?>;stakeholders=<?php echo ($listOfStakeholders) ?>;'>

Hint : Just click on any field in the table and type to edit it!<br><br>

<span style="font-size:22">Filter by :

<input class="filter" ng-model="searchKeyword.name" id="namefilter" type="text" data-col="name" placeholder="Name"/>&nbsp;

<input class="filter" ng-model="searchKeyword.country" id="countryfilter" type="text" placeholder="Country" data-col="country"/>&nbsp;

<input class="filter" ng-model="searchKeyword.initiative_type" id="typefilter" type="text" placeholder="Initiative Type" data-col="type"/>&nbsp;

<input class="filter" ng-model="searchKeyword.date" id="yearfilter" type="text" placeholder="Year" data-col="date"/>&nbsp;

    </span>

<br><br>

    <table id="initiative-table" class="table table-striped">
        <thead style="font-weight: bold;"><tr><td>Name</td><td>Country</td><td style="width:300px;">Stakeholders</td><td>Initiative Type</td><td>Date</td><td style="width:200px;">URL</td><td style="width:90px;"></td></tr></thead>
        <tbody>
        <tr ng-repeat="initiative in results | filter : searchKeyword" id="initiative-{{ initiative.id }}">
            <td class="contentedit" contenteditable="true" id="name-{{ initiative.id }}">{{ initiative.name }}</td><td class="contentedit" contenteditable="true" id="country-{{ initiative.id }}">{{ initiative.country }}</td><td class="editable-stakeholders" id="stakeholders-{{ initiative.id }}"><ul><li ng-repeat="stakeholder in initiative.stakeholders">{{ stakeholder.name }} ({{ stakeholder.pivot.type }})<br></li></ul></td><td class="contentedit" contenteditable="true" id="type-{{ initiative.id }}">{{ initiative.initiative_type }}</td><td class="contentedit" contenteditable="true" id="date-{{ initiative.id }}">{{ initiative.date }}</td><td class="contentedit" contenteditable="true" id="url-{{ initiative.id }}">{{ initiative.initiative_url }}</td><td id="{{ initiative.id }}"><a href="/stakeholdermap/initiatives/delete/{{ x.id }}" onclick="return deleteInitiative( this.parentNode.id )">Delete</a></td>
        </tr>
        </tbody>
    </table>

    <div id="extraContainer">

        <div id="tokenize-boxes" style="display:none;">

            Leader(s) : <i>(Start typing to see suggestions)</i><br>

            <select id="tokenize-leader"  style="width:280px;" name="leaders[]" class="token-class">

                <option ng-repeat="x in stakeholders" value="{{ x.id }}">
                    {{ x.name }}
                </option>

            </select><br><br>

            Partner(s) : <i>(Start typing to see suggestions)</i><br>

            <select id="tokenize-partner"  style="width:280px;" name="partners[]" class="token-class">

                <option ng-repeat="x in stakeholders" value="{{ x.id }}">
                   {{ x.name }}
                </option>

            </select><!--<input type="text" name="country"/>--><br><br>

            Sponsor(s) : <i>(Start typing to see suggestions)</i><br>

             <select id="tokenize-sponsor"  style="width:280px;" name="sponsors[]" class="token-class">

              <option ng-repeat="x in stakeholders" value="{{ x.id }}">
                {{ x.name }}
               </option>

             </select><!--<input type="text" name="country"/>--><br><br>

           <button type="button" id="submitButton" onclick="submitStakeholdersDropdown($(this).closest('td').attr('id'))">Save Changes!</button>&nbsp;<button id="cancelButton" onclick="" type="button">Cancel!</button>

        </div>

    </div><!-- used to hold tokenize boxes when not in use-->

</div> <!-- end of ng app-->

</body>
</html>

