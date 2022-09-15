// ----- Dodaj ------------------------------------------------------------------------------------------
$(document).ready(function(){ 
$("#btnDodaj").click(function(){
        console.log("e bre");
        var naziv = $("#naziv").val();
        var trajanje = $("#trajanje").val();
        var sala = $("#sala").val();
        console.log(sala);
        let request = $.post("controller/upisi.php", {
            naziv: naziv,
            trajanje: trajanje,
            sala: sala
        })

        request.done(function(response){
            if(response == "Sakses"){
                alert("Uspesno je dodat novi film");
                location.reload(true);
                
            } else console.log("Greska" + response)
        })
    });
});
// ----- OBRISI ------------------------------------------------------------------------------------------
$(document).ready(function(){
    $(".btnObrisi").click(function(e){
    e.preventDefault();
    console.log("EJ");
    let filmID = $(this).attr('data-filmID');
    console.log(filmID);
    var $tr = filmID; 
    
    let request = $.post("controller/obrisi.php", {
        filmID: filmID
    });

    request.done(function(response){
        if(response == "Sakses"){
            
            alert("Uspesno je obrisan film");
            location.reload(true);
            
        } else console.log("Greska" + response)
    });
    });
});

// ----- UPDATE  ------------------------------------------------------------------------------------------
$(document).ready(function(){
$(".btnEdit").click(function(e){
    e.preventDefault();
    let filmID = $(this).attr('data-filmID');
    let naziv = $(this).attr('data-name');
    let sala = $(this).attr('data-sala');
    let trajanje = $(this).attr('data-trajanje');

    document.getElementById('nazivInput').value = naziv;
    document.getElementById('salaInput').value = sala;
    document.getElementById('trajanjeInput').value = trajanje;
    document.getElementById('forma').style.display = 'block';

    $("#btnCancel").click(function(e){
        e.preventDefault();
        document.getElementById('forma').style.display = 'none';
    })
    $("#btnUpdate").click(function(e){
        let naziv = $("#nazivInput").val();
        console.log(naziv);
        let sala = $("#salaInput").val();
        let trajanje = $("#trajanjeInput").val();
        e.preventDefault();
        let request = $.post('controller/update.php', {
            id: filmID,
            naziv:naziv,
            trajanje: trajanje,
            sala: sala
        });

        
        request.done(function(response){
            if(response == "Sakses"){
                alert("Uspesno su izmenjene informacije!");
                
                location.reload(true);
            } else console.log("Greska prilikom" + response);
        });


    })

});
});
// ----- SEARCH  ------------------------------------------------------------------------------------------
    $(document).ready(function(){
        $("#search").keyup(function(){

             var input = $(this).val();
                
             if(input != ""){
                 $.ajax({
                     url:"controller/search.php",
                     method :"POST",
                     data:{input: input},

                     success:function(data){
                         $("#result").html(data);
                     }
                 });
             }
             else{
                 $("result").css("display","none");
             }
        }); 
    });

     $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });
    

