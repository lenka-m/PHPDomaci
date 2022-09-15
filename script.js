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
    
// ----- UPDATE  ------------------------------------------------------------------------------------------
