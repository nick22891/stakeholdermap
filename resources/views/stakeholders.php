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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <style>

        table {

            table-layout: fixed;
            max-width:900px;

        }

        td {

            white-space: normal;
            word-wrap:break-word;

        }

    </style>

    <script>

        function deleteStakeholder (id) {

            if (confirm("Are you sure you want to delete this stakeholder?")) {

                $.get("/stakeholders/delete/" + id);

                $("#stakeholder-" + id).hide();

            }

            return false;

        }

        $( document ).ready(function() {

            //this function makes the contenteditables fire a change event

            $('body').on('focus', '[contenteditable]', function () {
                var $this = $(this);
                $this.data('before', $this.html());
                return $this;
            }).on('blur paste', '[contenteditable]', function () {
                var $this = $(this);
                if ($this.data('before') !== $this.html()) {
                    $this.data('before', $this.html());
                    $this.trigger('change');
                }
                return $this;
            });

            $('.contentedit').on('change', function (event) {

                xmlhttp=new XMLHttpRequest();

                xmlhttp.onreadystatechange=function() {

                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        //alert("Reply received!");
                    }

                }

                //$.get("/stakeholders/edit/" + id);

                //event.target.id

                var str = event.target.id;

                var arr = str.split("-");

                var fieldname = arr[0];

                var stakeholderid = arr[1];

                var content = event.target.innerHTML;

                xmlhttp.open("POST","/stakeholders/edit",true);

                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                xmlhttp.send("id=" + stakeholderid + "&fieldname=" + fieldname + "&content=" + content);

                //alert("id=" + stakeholderid + "&fieldname=" + fieldname + "&content=" + content);

            });

        });

    </script>

</head>

<body><br><br>

<h3><a href="/map"><-- Back to Map</a></h3>

<br>

<h1>Stakeholders (<a href="stakeholders/add">Add</a>) </h1>



Hint : Just click on any field in the table and type to edit it!<br><br>

<div ng-app="" ng-init='results=<?php echo ($list); ?>'>

    <table class="table table-striped">
        <thead style="font-weight: bold;"><tr><td>Country</td><td>Name</td><td>Type</td><td>Functional Area</td><td style="width:200px;">URL</td><td style="width:90px;"></td></tr></thead>
        <tbody>
        <tr ng-repeat="x in results" id="stakeholder-{{ x.id }}">
            <td class="contentedit" id="country-{{ x.id }}" contenteditable="true">{{ x.country }}</td><td class="contentedit" id="name-{{ x.id }}" contenteditable="true">{{ x.name }}</td><td class="contentedit" id="type-{{ x.id }}" contenteditable="true">{{ x.type }}</td><td class="contentedit" id="functional-{{ x.id }}" contenteditable="true">{{ x.functional_area }}</td><td class="contentedit" id="url-{{ x.id }}" contenteditable="true">{{ x.url }}</td><td id="{{ x.id }}"><a href="/stakeholders/delete/{{ x.id }}" onclick="return deleteStakeholder( this.parentNode.id )">Delete</a></td>
        </tr>
        </tbody>
    </table>

</div>

</body>
</html>

