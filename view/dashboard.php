<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/dashboard.css">  

  <!--BOOTSTRAP EM PORTUGUêS -  NÃO USAR O GRINGO-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- jQuery UI JavaScript -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/5b9d82b6ee.js" crossorigin="anonymous"></script>


    <title>Dashboard</title>
    <style>
      @font-face {
    font-family: radikal-medium;
    src: url(../Radikal/Nootype\ -\ Radikal\ Medium.otf);
  }
  @font-face {
    font-family: radikal-bold;
    src: url(../Radikal/Nootype\ -\ Radikal\ Bold.otf);
  }
  @font-face {
    font-family: radikal-light;
    src: url(../Radikal/Nootype\ -\ Radikal\ Thin.otf);
  }
  .datepicker {
    font-family: radikal-light !important;
  width: 400px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 0 50px 0 rgba(0,0,0,0.2);
  margin: -10px auto;
  overflow: hidden;

  .ui-datepicker-inline {
    font-family: radikal-light !important;
    padding: 30px;
    width: 100%;
    height: 80%;
  }

  .ui-datepicker-header {
    text-align: center;
    text-transform: uppercase;
    letter-spacing: .1em;
    .ui-datepicker-prev,
    .ui-datepicker-next {
      display: inline;
      float: left;
      cursor: pointer;
      font-size: 1.4em;
      padding: 0 10px;
      margin-top: -10px;
      color: #CCC;
    }
    
    .ui-datepicker-next {
      float: right;
    }
  }

  .ui-datepicker-calendar {
    width: 100%;
    text-align: center;
    thead {
      color: #CCC;
    }
    
    tr {
      th, td {
        padding-bottom: 0em;
      }
    }
    a {
      color: #444;
      text-decoration: none;
      display: block;
      margin: 0 auto;
      width: 35px;
      height: 35px;
      line-height: 35px;
      border-radius: 50%;
      border: 1px solid transparent;
      cursor: pointer;
    }
    
    .ui-state-highlight {
      border-color: #D24D57;
      color: #D24D57;
    }
  }
}



    </style>
</head>
<body>
    <section>
        
            <div class="col-12 upper-cards-col">
                <div class="row upper-cards-row">
                <div class="col-2 dashboard-upper-cards">
                    
                <li class="upper-card">
                    <a href="" class="icon-card"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                      </svg>
                    </a>
                    <a href="" class="text-card">
                    <span class="data-card">134,8K</span>
                    <span class="name-card">Usuários</span>
                </a>
                                  
                        
                </li> 
                
                </div>
                <div class="col-2 dashboard-upper-cards">

                    <li class="upper-card">
                        <a href="" class="icon-card"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-transfer" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M20 10h-16l5.5 -6" />
                            <path d="M4 14h16l-5.5 6" />
                          </svg>
                          </svg>
                        </a>
                        <a href="" class="text-card">
                        <span class="data-card">657K</span>
                        <span class="name-card">Transações</span>
                    </a>
                      </li> 
                
                    
                </div>
                <div class="col-2 dashboard-upper-cards">
                    <li class="upper-card">
                        <a href="" class="icon-card"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                            <path d="M7 9l5 -5l5 5" />
                            <path d="M12 4l0 12" />
                          </svg>
                        </a>
                        <a href="" class="text-card">
                        <span class="data-card">204,8K</span>
                        <span class="name-card">Uploads</span>
                    </a>
                        
                    </li> 
                    
                </div>
                <div class="col-2 dashboard-upper-cards">

                    <li class="upper-card">
                        <a href="" class="icon-card"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8" />
                            <path d="M14 19l2 2l4 -4" />
                            <path d="M9 8h4" />
                            <path d="M9 12h2" />
                          </svg>
                        </a>
                        <a href="" class="text-card">
                        <span class="data-card">80K</span>
                        <span class="name-card">Chamados Atendidos</span>
                    </a>
                                      
                            
                    </li> 
                
                    
                </div>
            </div>
        </div>
      </section>


      <section>
        <div class="col-12 row-one">
            <div class="row col-row">
                <div class="col-9 graphic-col">
              <span class="graphic-one-title">
                Usuários por mês este ano
              </span>
                  <canvas id="chart_users" class="chart-one"></canvas>
                 
                  
                </div>
                <div class="col-2  graphic-pie">
                  <span class="graphic-one-title">
                    Transações e Lucro
                  </span>
                  <div class="canvas-div-pie"> <canvas id="chart_pie_users" class="chart-two"></canvas></div>
                </div>
            </div>
        </div>
       
      </section>

      <section>
        <div class="col-12">
          <div class="row col-row">
              <div class="col-6 graphic-col">
            <span class="graphic-one-title">
              Acessos
            </span>
                
           <canvas id="chart_view" class="chart_view"></canvas>
               
                
              </div>

              <div class="col-2 list-col">
                <span class="graphic-one-title">
                  Origem dos Usuários
                </span>
                <table class="list-table">
                  <tr>
                    <td class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M16.5 7.5l0 .01" />
                      </svg>
                    </td>
                    <td class="quant">
                      120
                    </td>
                  </tr>
                  <tr>
                    <td class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                      </svg>
                    </td>
                    <td class="quant">
                      120
                    </td>
                  </tr>
                </table>
              </div>
               
              <div class="col-2 list-col">
              <div class='datepicker'>
  <div class="datepicker-header"></div>
</div>
              </div>
             
             
                  
                </div>
  



      </div>

      </section>
     

    </body>
   

<!-- Script jQuery para inicializar o datepicker -->
<script>
 $(document).ready(function() {

$(".datepicker").datepicker({
  prevText: '<i class="fa-solid fa-angle-left"></i>',
  nextText: '<i class="fa-solid fa-angle-right"></i>'
});
});


</script>
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '', 'Expenses'],
          ['jan',  1000,      400],
          ['Fev',  1170,      460],
          ['Mar',  660,       1120],
          ['Abr',  1030,      540],
          ['Mai',  1030,      540],
          ['Jun',  1030,      540],
          ['Jul',  1030,      540],
          ['Ago',  1030,      540],
          ['Set',  1030,      540],
          ['Out',  1030,      540],
          ['Nov',  1030,      540],
          ['Dez',  1030,      540]
        
        ]);

        var options = {
          title: 'Novos usuários por mês',
          width: 800,
          height: 300,
          display: 'flex',
          curveType: 'function',
          font: 'verdana',
          legend: { position: 'right' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script> -->
 
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
      Chart.defaults.font.family = 'Radikal-Light';
      const ctx = document.getElementById('chart_users');
    
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
          datasets: [{
            label: '# of Votes',
            data: [4, 60, 3, 5, 2, 3],
            borderWidth: 1
          }]
        },
        
        options: {
        plugins: {
          legend: {
                        display: false,
                        position: 'top', // Positioning of the legend
                    },
            labels: {
                
                    // This more specific font property overrides the global property
                    font: {
                        size: 14,
                        family:'Times New Roman'
                    }
                }
            }
        
    }
      });

      const ctx_pie = document.getElementById('chart_pie_users');
    
    new Chart(ctx_pie, {
      type: 'doughnut',
            data: {
                labels: ['Lucro', 'Repassado'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19,],
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
              layout:{
              },
                responsive: true,
                cutout: '80%', // Customize the doughnut cutout size
                plugins: {
                  
                    legend: {
                      align: 'center',
                        display: true,
                        position: 'bottom', // Positioning of the legend
              
                    },
                    tooltip: {
                        enabled: true // Enable tooltips
                    }
                }
            }
        });

        const ctx_view = document.getElementById('chart_view');
    
      new Chart(ctx_view, {
        type: 'line',
        data: {
          labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
          datasets: [{
            label: '# of Votes',
            data: [4, 4, 3, 5, 2, 3],
            borderWidth: 1
          }]
        },
        
        options: {
        plugins: {
          legend: {
                        display: false,
                        position: 'top', // Positioning of the legend
                    }}
        
    }
      });
    
    </script>

</html>