<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
</head>
<style>
    @font-face {
    font-family: Raleway;
    src: url(../assets/fonts/Radikal/RadikalTrial-Black-BF642254c139184.otf);
  }
  @font-face {
    font-family: radikal-bold;
    src: url(../assets/Radikal/Nootype\ -\ Radikal\ Bold.otf);
  }
  @font-face {
    font-family: Raleway;
    src: url(../assets/Radikal/Nootype\ -\ Radikal\ Thin.otf);
  }
:root{
    /*****  cores  *****/
    --body-color: #E4E9F7;
    --sidebar-color: #FFF;
     --primary-color: lightblue;
    /*--secondary-color:;
    --toogle-color:; */
    --text-color:#707070;

    /* transições */

    --tran-02: all 0.2s ease;
    --tran-03: all 0.3s ease;
    --tran-04: all 0.4s ease;
    --tran-05: all 0.5s ease 

    /***** tipografia *****/
    

}

body{
  background-color: var(--body-color)!important ;
  overflow: hidden;
  border-radius: 6px;
  display: flex;
  align-items: center;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    height: 100vh !important;
  }
body.swal2-shown, body.swal2-height-auto{
    height: 100vh !important;
}
.main-container{
  box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
    background-color: white;
    height: 70%;
border-radius: 6px;
padding: 15px 25px;
    color: var(--text-color)
}
.title-table{
    width: 100%;
    font-size: 1.6em;
    font-family: Raleway;
}
.title, .value{
    padding: 15px;
}
.title{
    text-align: left;
    font-weight: 600;
}
.value{
    text-align: right;
    
    font-weight: 600;
    color: rgb(129, 209, 9);
}
.accordion{
    height: 100%;
    margin-top: 20px;
}
.card-header{
    background-color: none;
    text-align: left;
    font-family: Raleway;
    background-color: transparent
}
.card-header .btn{
    background-color: transparent;
    color: var(--text-color);
    outline: none !important;
    border: none !important;
}
.pix-table{
    width: 100%;
    height: 100%;
    font-family: Raleway;
    
}
.pix-table tr td{
    text-align: center;
    justify-content: center;
}
.copy{
    display: flex;
    align-items: center;
    width: 125%;
}
.copy input{
    margin-right: 10px;
   max-width: 70%;
}
.pix-table img{
    width: 200px;
    height: 200px;
}
.pay-icon{
    height: 20px;
    margin-left: 10px;
    margin-right: 5px;
    margin-top: -5px;
}
.input-padrao,.input-padrao-date, .input-padrao-cvv{  
 
  border: 1px #ececec solid ;
  border-radius: 6px;
  padding: 8px 16px;
  font-family: Raleway;
  transition: 0.2s;
}
.input-padrao{
  width: 90%;
}
.input-padrao-date{
  width: 43%;
  margin-right: 10px;

}
.input-padrao-cvv{
  
  width: 43%;
}
.label-padrao{
  font-family: Raleway;
  width: 100%;
  text-align: left;
}
.card-col{
  text-align: left;
  justify-content: left;
}
.cartao-back{
  background-image: url(Remove-bg.ai_1726617120290.png);
background-repeat: no-repeat;
  height: 90%;
  width: 70%;
  }
  .card-col-center{
    text-align: center;
    align-items: center;

  }
</style>
<body style=" height: 100vh !important;">
    <div class="container main-container">
        <div class="text-center">
          <table class="title-table">
            <tr>
                <td class="title">
                    Pagamento
                </td>
                <td class="value">
                  R$<?php echo $_REQUEST["amount"]?>
                </td>
            </tr>
          </table>

<form action="">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn button-pay" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <input type="radio" name="pay" id="" checked>
                    <label for=""><svg xmlns="http://www.w3.org/2000/svg" class="pay-icon"viewBox="0 0 512 512"><path fill="#459aa0" d="M242.4 292.5C247.8 287.1 257.1 287.1 262.5 292.5L339.5 369.5C353.7 383.7 372.6 391.5 392.6 391.5H407.7L310.6 488.6C280.3 518.1 231.1 518.1 200.8 488.6L103.3 391.2H112.6C132.6 391.2 151.5 383.4 165.7 369.2L242.4 292.5zM262.5 218.9C256.1 224.4 247.9 224.5 242.4 218.9L165.7 142.2C151.5 127.1 132.6 120.2 112.6 120.2H103.3L200.7 22.8C231.1-7.6 280.3-7.6 310.6 22.8L407.8 119.9H392.6C372.6 119.9 353.7 127.7 339.5 141.9L262.5 218.9zM112.6 142.7C126.4 142.7 139.1 148.3 149.7 158.1L226.4 234.8C233.6 241.1 243 245.6 252.5 245.6C261.9 245.6 271.3 241.1 278.5 234.8L355.5 157.8C365.3 148.1 378.8 142.5 392.6 142.5H430.3L488.6 200.8C518.9 231.1 518.9 280.3 488.6 310.6L430.3 368.9H392.6C378.8 368.9 365.3 363.3 355.5 353.5L278.5 276.5C264.6 262.6 240.3 262.6 226.4 276.6L149.7 353.2C139.1 363 126.4 368.6 112.6 368.6H80.8L22.8 310.6C-7.6 280.3-7.6 231.1 22.8 200.8L80.8 142.7H112.6z"/></svg></svg>  PIX </label>
                  </button>
                </h5>
              </div>
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                 <table class="pix-table">
                    <tr>
                        <td> Escaneie o QR Code
                        </td>
                        <td>
                            ou copie o código PIX e cole no seu banco
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://quickchart.io/qr?text=00020126420014BR.GOV.BCB.PIX0111405276478100205teste52040000530398654040.015802BR5925STELA DOS SANTOS MONTENEG6009SAO PAULO62070503TES63048265" alt="" srcset="">
                        </td>
                        <td>
                            <div class="copy">
                            <input type="text" id="myInput" class="form-control" value="00020126420014BR.GOV.BCB.PIX0111405276478100205teste52040000530398654040.015802BR5925STELA DOS SANTOS MONTENEG6009SAO PAULO62070503TES63048265" readonly>
                            <button class="btn" onclick="copyText(event)">Copiar</button>
                        </div>
                        </td>
                    </tr>
                 </table>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <input type="radio" name="pay" id="">
                    <label for=""> <svg xmlns="http://www.w3.org/2000/svg" class="pay-icon" viewBox="0 0 576 512"><path fill="#1e5ac2" d="M512 80c8.8 0 16 7.2 16 16l0 32L48 128l0-32c0-8.8 7.2-16 16-16l448 0zm16 144l0 192c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16l0-192 480 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24l48 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-112 0z"/></svg> Cartão de Crédito (À vista)</label>
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                 
                  <div class="row card-row">
                    <div class="col-6 card-col">
                      <label for="" class="label-padrao">Nome do Titular</label><br>
                    <input type="text" name="name" id="" class="input-padrao"><br><br>

                    
                    <label for="" class="label-padrao">Número do Cartão</label><br>
                    <input type="text" name="name" id="" class="input-padrao"><br><br>
                    
                    <label for="" class="label-padrao" style="width: 45%;">Data de Vencimento</label> 
                    <label for="" class="label-padrao" style="width: 40%;">CVV</label><br>
                    <input type="month" name="dueDate" id="" class="input-padrao-date">
                    <input type="text" maxlength="3" name="cvv" id="" class="input-padrao-cvv">
                  </div>
                    <div class="col-6 card-col-center">
                      <button class="confirm" type="button"onclick="confirm(event)">Confirmar</button>


                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <input type="radio" name="pay" id="">
                    <label for=""> <svg xmlns="http://www.w3.org/2000/svg" class="pay-icon" viewBox="0 0 576 512"><path fill="#8e2525" d="M512 80c8.8 0 16 7.2 16 16l0 32L48 128l0-32c0-8.8 7.2-16 16-16l448 0zm16 144l0 192c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16l0-192 480 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24l48 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-112 0z"/></svg> Cartão de Débito </label>
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  
                  <div class="row card-row">
                    <div class="col-6 card-col">
                      <label for="" class="label-padrao">Nome do Titular</label><br>
                    <input type="text" name="name" id="" class="input-padrao"><br><br>

                    
                    <label for="" class="label-padrao">Número do Cartão</label><br>
                    <input type="text" name="name" id="" class="input-padrao"><br><br>
                    
                    <label for="" class="label-padrao" style="width: 45%;">Data de Vencimento</label> 
                    <label for="" class="label-padrao" style="width: 40%;">CVV</label><br>
                    <input type="month" name="dueDate" id="" class="input-padrao-date">
                    <input type="text" maxlength="3" name="cvv" id="" class="input-padrao-cvv">
                  </div>
                    <div class="col-6 card-col-center">
                   </div>


                    </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <button onclick="cancelar(event)"> cancelar </button>
</form>
    
    
   <?php
for ($i = 0; $i < $_SESSION['ativos']['number']; $i++) {
        echo '<a id="file" href="../assets/media/port_ativos/' . $_SESSION['ativos'][$i]['arquivo'] . '" download style="display: none;"></a>';
  } 
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function copyText(event) {
            event.preventDefault(); 

            var copyText = document.getElementById("myInput");

            copyText.select();
            copyText.setSelectionRange(0, 99999); // Para dispositivos móveis

            navigator.clipboard.writeText(copyText.value)
                .then(() => {
                  Swal.fire({
  title: "Texto Copiado",
  text: "Agora é só colar no aplicativo do seu banco",
  icon: "success",
  allowOutsideClick: false,
  })
                })
                .catch(err => {
                    console.error('Erro ao copiar: ', err);
                });
        }
    function confirm(event){
      event.preventDefault(); 

      var links = document.querySelectorAll('a[id^="file"]');
    links.forEach(function(link) {
        link.click();
    });
      
      
      Swal.fire({
  title: "Compra confirmada",
  text: "Parabéns, seu material já está sendo baixado!",
  icon: "success",
  allowOutsideClick: false,
  footer: '<a href="#" style="font-family:Raleway; color:#156eb8;">Caso o download não tenha começado, clique aqui</a>',
  confirmButtonText: "Ok",
    }).then((result) => {
  if (result.isConfirmed) {
    window.location.href = "index.php";
  } 
  });


}


function cancelar(event){
  event.preventDefault(); 

          Swal.fire({
  title: "Tem certeza?",
  text: "Deseja cancelar sua compra?",
  icon: "warning",
  showCancelButton: true,
  allowOutsideClick: false,
  confirmButtonText: "Sim", 
  cancelButtonText: "Não", 
    }).then((result) => {
  if (result.isConfirmed) {
    window.location.href = "../controller/controller.php?cancelar=1";
  } 
  });


}

</script>
</body>
</html>