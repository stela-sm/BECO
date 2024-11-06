<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<style>
.modal-dialogue{
    min-width: 80vw !important;
}
.modal-dialogue .row{

    padding: 20px 15px !important;
}
.aceitarCookies{
    background-color: #272727;
    color:white;
    border:none;
    border-radius:6px;
    cursor:pointer;
    padding: 5px 20px;
    /*font-family: Raleway;
*/}
.aceitarCookies2{
    background-color: white;
    color:black;
    border:1px solid #000;
    border-radius:6px;
    cursor:pointer;
    padding: 4px 16px;
    /*font-family: Raleway;
*/}
.modal-dialogue .row .colCookies{
    display:flex;
align-items: center;
justify-content: center;
}
.colCookies p{
    /*font-family: Raleway;*/
    padding-top: 10px;  
}
.buttons{
  align-items: center;
}
</style>
    <!--OI SAMUEL AQUI TEM O MODAL PRONTO E ESTILIZADO SÓ COPIAR E COLAR NO INDEX VIU SE TIVER ALGUMA DÚVIDA SÓ ME PERGUNTAR NÃO MEXE EM NADA DEPOIS EU SETO OS COOKIES DIREITINHO TMJJ-->
    <body>
        <!-- Botão para acionar o modal PODE TIRAR ESSE BOTÃO, O MODAL APARECE AUTOMATICO -->
        <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Modal extra grande</button>

        <div class="modal modalcookie  fade bd-example-modal-xl" id="modalCookies" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialogue fixed-bottom modal-xl">
            <div class="modal-content">
              
                <div class="row">
              <div class="col-1 colCookies">                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cookie" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M8 13v.01" />
                    <path d="M12 17v.01" />
                    <path d="M12 12v.01" />
                    <path d="M16 14v.01" />
                    <path d="M11 8v.01" />
                    <path d="M13.148 3.476l2.667 1.104a4 4 0 0 0 4.656 6.14l.053 .132a3 3 0 0 1 0 2.296c-.497 .786 -.838 1.404 -1.024 1.852c-.189 .456 -.409 1.194 -.66 2.216a3 3 0 0 1 -1.624 1.623c-1.048 .263 -1.787 .483 -2.216 .661c-.475 .197 -1.092 .538 -1.852 1.024a3 3 0 0 1 -2.296 0c-.802 -.503 -1.419 -.844 -1.852 -1.024c-.471 -.195 -1.21 -.415 -2.216 -.66a3 3 0 0 1 -1.623 -1.624c-.265 -1.052 -.485 -1.79 -.661 -2.216c-.198 -.479 -.54 -1.096 -1.024 -1.852a3 3 0 0 1 0 -2.296c.48 -.744 .82 -1.361 1.024 -1.852c.171 -.413 .391 -1.152 .66 -2.216a3 3 0 0 1 1.624 -1.623c1.032 -.256 1.77 -.476 2.216 -.661c.458 -.19 1.075 -.531 1.852 -1.024a3 3 0 0 1 2.296 0z" />
                  </svg>
                </div>
<div class="col-9 colCookies">
                  <p >Utilizamos cookies para melhorar sua experiência em nosso site. Ao continuar a navegar no site, você concorda com o uso de cookies. Consulte nossa <a href="/politica-de-cookies">Política de Cookies</a>
                  </p>
                </div>
            <div class="col-2 colCookies buttons">
            <button class="aceitarCookies" data-dismiss="modal" onclick="aceitar(1)">Aceitar</button>
            <button class="aceitarCookies2" style="margin-left:15px;"data-dismiss="modal" onclick="aceitar(0)">Recusar</button>
            </div>
            </div>
            </div>
          </div>
        </div>
        <script>
        
        //unseta um cookie
        function unsetCookie(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
}

//seta um cookie
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}





//botão de aceitar ou recusar
        function aceitar(num){
            if(num==1){
setCookie("acceptCookies", "1", 30); 
location.reload();

        }else if (num==0){          
setCookie("declinedCookies", "0", 1); 
          location.reload();

        }}
       
      </script>
        <?php
        
    
        if(!isset($_COOKIE["acceptCookies"])){
                echo "  <script>
            document.addEventListener('DOMContentLoaded', function () {
              var myModal = new bootstrap.Modal(document.getElementById('modalCookies'), {
                  keyboard: false, 
                  backdrop: 'static' 
              });
              myModal.show();
          });
      </script>";
        }
        ?>
    
</body>
</html>