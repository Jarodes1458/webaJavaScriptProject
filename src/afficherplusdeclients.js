$(document).ready(function ()
{
    var nbrowafficher = 5;
    $("#afficherplus").click(function () {
        var lastclientid = nbrowafficher;
        nbrowafficher = nbrowafficher + 5;
        $.ajax(
            {
                type: "GET",
                url: "./chargerdonnee.php?lastid="+lastclientid,
                data: {lastclientid:lastclientid},
                async: true,
                contentType: "application/json; charset=utf-8",
                dataType: "JSON",
                cache: false,
                success: function (data) {
                    if (data){
                        var ligne = '';
                            $.each(data, function (i, item) {
                                ligne += '<tr><td>' + item.CLI_NOM + '</td><td>' + item.CLI_PRENOM +
                                    '</td><td>' + item.CLI_TEL + '</td><td>' + item.CLI_EMAIL + '</td><td>';
                            });
                            $('#dtBasicExample').append(ligne);
                    }

                }
            });
    });
});
