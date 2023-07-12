<?php
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de habilidad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
    <style>
            .cabecera{
                margin:0 0 10px 0;
                background: #d39e0052;
                padding: 10px;
                width:100%;
            }
            .cabecera h1{
                color:#333;
            }
            input,label,select{
                margin-left:30px;
                height:30px;
            }
            button{
                font-size:12px !important;
                margin-left:10px;
                height:30px;
                
            }

            @media (max-width: 750px) {
                .cabecera img{
                    width:70px !important; 
                }
                .cabecera h1{
                    font-size:18px; 
                }
                .select,.inputs{
                    width:100% !important;
                    margin:auto;
                }
                .inputs input{
                    width:80% !important;
                    /* padding:5px; */
                }
                button{
                    margin:10px 0 0 30px;
                }
            }

    </style>
</head>
<body>
    <div>
        <div class='cabecera row'>
            <div class='col-3 text-center'> <img   src="logo.png" alt="" style='width:90px'></div>
            
            <h1 class='col-9 tex-center m-auto'>CONSULTA DE HABILIDAD</h1>
        </div>
        <div class='formulario'>
                <form action="" class='d-flex row m-0 p-0' id='datos_formulario'>
                    <div class='select'>
                        <label  for="">Busqueda por</label>
                        <select name="tipo_busqueda" id="tipo_busqueda" style='height: 30px;margin:0'  >
                            <option value="0">DNI</option>
                            <option value="1">NOMBRES</option>
                            <option value="2">CCP</option>
                        </select>
                    </div>

                    <!-- persona natural -->
                    <div id='' class='row inputs' >
                            <input type="text" id='dni' placeholder='DNI' name='dni'  style='width: 150px;'>
                            <input type="text" id='nombres' placeholder='NOMBRES Y APELLIDOS' name='nombres'  style='width: 350px;display:none'>
                            <input type="text" id='ccp' placeholder='CCP' name='ccp'  style='width: 150px;display:none'>
                            <button class='btn-sm btn-primary' id='btn_buscar'>Buscar</button>
                    </div>
                </form>
        </div>
        <div id='datos' class='mt-2 ' style='max-width:100%;overflow:auto;max-height:60vh'>

        </div>
    </div>

<script>
// evento cuando cambia el select 
$('#tipo_busqueda').change( function (e){

        var seleccion= $(this).children("option:selected");
        if(seleccion.val()==0)
        {
            $('#dni').show()
            $('#nombres').hide()
            $('#ccp').hide()
        }
        else if(seleccion.val()==1){
            $('#dni').hide()
            $('#nombres').show()
            $('#ccp').hide()
        }
        else{
            $('#dni').hide()
            $('#nombres').hide()
            $('#ccp').show()
        }
    });

     // evento para boton buscar
     $('#btn_buscar').click( function (e){
            e.preventDefault();
        $.ajax({
            url : 'consulta_ajax.php',
            type : 'POST',
            data:$('#datos_formulario').serialize(),  
            dataType : 'json',
            beforeSend : function(){
                $('#datos').html('<span class="ml-5 mt-2 spinner-border  text-primary"></span>')    
            },
            success : function(data) { 
         
                $('#datos').html(data)

            }
        })
    });
</script>
</body>
</html>
                            <!-- <span id='carga_dni' style='' class="spinner-border  text-primary"></span>  -->
