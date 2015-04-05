function getInitiativeById(id) {
    var results = initiativeObject.filter(function(x) { return x.id == id });
    return (results.length > 0 ? results[0] : null);
}

//alert (getInitiativeById(45).stakeholders[3].pivot.type);

function selectAppropriateOptions (id) { //for tokenize plugin

    //alert(id);

    var arr = id.split("-");//extract initiative numerical id

    var init_id = arr[1];

    var initiative = getInitiativeById(init_id);

    $('select#tokenize-leader option').removeAttr("selected");

    $('select#tokenize-partner option').removeAttr("selected");

    $('select#tokenize-sponsor option').removeAttr("selected");

    for (var x = 0;x < initiative.stakeholders.length; x++){

        switch (initiative.stakeholders[x].pivot.type) {

            case 'Leader' : $('#tokenize-leader option[value="' + initiative.stakeholders[x].id + '"]').prop('selected',true);

                break;

            case 'Partner' : $('#tokenize-partner option[value="' + initiative.stakeholders[x].id + '"]').prop('selected',true);

                break;

            case 'Sponsor' : $('#tokenize-sponsor option[value="' + initiative.stakeholders[x].id + '"]').prop('selected',true);

                break;

        }

    }

}

function submitStakeholdersDropdown (id) {

    //alert(id);

    var arr = id.split("-");//extract initiative numerical id

    var initiative_id = arr[1];

    //alert(initiative_id);

    //alert(id);

    var leader_data=$("#tokenize-leader").serialize();

    var partner_data=$("#tokenize-partner").serialize();

    var sponsor_data=$("#tokenize-sponsor").serialize();

    var postString = "initiative_id=" + initiative_id + "&" + leader_data + "&" + partner_data + "&" + sponsor_data;

    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            $('#tokenize-boxes').appendTo($("#extraContainer"));

            $('#tokenize-boxes').hide();

            $("#" + id).html(xmlhttp.responseText);
            //alert("Reply received!");
        }

    }

    xmlhttp.open("POST","/initiatives/editStakeholders",true);

    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    //alert(postString);

    xmlhttp.send(postString);



}

function deleteInitiative (id) {

    if (confirm("Are you sure you want to delete this initiative?")) {

        $.get("/initiatives/delete/" + id);

        $("#initiative-" + id).hide();

    }

    return false;

}

function cancelBtn () {

    $("#tokenize-boxes").hide();

}

$( document ).ready(function() {

    //set up the three tokenized boxes

    $('#tokenize-leader').tokenize();

    $('#tokenize-partner').tokenize();

    $('#tokenize-sponsor').tokenize();

    $('select#tokenize-leader option').removeAttr("selected");

    $('select#tokenize-partner option').removeAttr("selected");

    $('select#tokenize-sponsor option').removeAttr("selected");

    $('li.Token').remove();



    $('.editable-stakeholders').click(function (event) {//get the boxes when the stakeholders td is clicked

        $(".Tokenize").remove();

        $('#tokenize-boxes').appendTo($(this));

        //alert($(this).attr("id"));

        selectAppropriateOptions($(this).attr("id"));

        $('#tokenize-leader').tokenize();

        $('#tokenize-partner').tokenize();

        $('#tokenize-sponsor').tokenize();

        $("#tokenize-boxes").show();

    });

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

        xmlhttp.open("POST","/initiatives/edit",true);

        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

        xmlhttp.send("id=" + stakeholderid + "&fieldname=" + fieldname + "&content=" + content);

        //alert("id=" + stakeholderid + "&fieldname=" + fieldname + "&content=" + content);

    });

});
