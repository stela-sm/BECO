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


#chart_bars {
    width: 100% !important; /* Faz o canvas ocupar 100% da largura do contêiner */
    height: auto; /* Ajusta a altura automaticamente */
}


    </style>
</head>
<body>
  <?php
  require "../model/manager.class.php";
  $manager = new Manager();
  $users = $manager-> quantidade("usuario");
  $acessos = $manager-> quantidade("acessos");
  $transactions = $manager->quantidade("compras");
  $pix = $manager->quantidadePayment("pix");
  $credito = $manager->quantidadePayment("credito");
  $debito = $manager->quantidadePayment("debito");
  $prod = $manager->quantidade("produtos");
  $serv = $manager->quantidade("servicos");
  $post = $prod + $serv;
  $access = $manager -> getAccessesByMonth(); //não tenho mais criatividade pra nome de variável

  $months = $manager -> getUsersByMonth();

  $artistas = $manager -> selectArtistas();
  $dados = array();
  $ii = 0;
  for($i = 0; $i < 3; $i++){
    $dados[$i] = $manager->getUserInfoArtists($artistas[$i]['vendedor']);
   
}
echo "
<script>
    let nome1 = " . json_encode($dados[0]['nome']) . ";
    let nome2 = " . json_encode($dados[1]['nome']) . ";
    let nome3 = " . json_encode($dados[2]['nome']) . ";
    let val1 = " . json_encode($artistas[0]['total_compras']) . ";
    let val2 = " . json_encode($artistas[1]['total_compras']) . ";
    let val3 = " . json_encode($artistas[2]['total_compras']) . ";
    
    console.log(nome1, nome2, nome3);
</script>
";


  ?>
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
                    <span class="data-card"><?php echo $users;?></span>
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
                        <span class="data-card"><?php echo $transactions ?></span>
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
                        <span class="data-card"><?php echo $post; ?></span>
                        <span class="name-card">Postagens</span>
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
                        <span class="data-card"><?php echo $users;?></span>
                        <span class="name-card">Acessos</span>
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
                    Pagamentos 
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

              <div class="col-2 list-col" style="max-height:300px">
              <span class="graphic-one-title">
              Top Criadores (Vendas) 
            </span>
                
              <canvas class="chart_bars" id="chart_bars"  style="padding-bottom:10px;"></canvas>
              </div>
               
              <div class="col-2 list-col" id="calendar-container">
             
        <div id="month-year-container">
            <button id="prev-month"><svg  xmlns="http://www.w3.org/2000/svg"  width="14"  height="14"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13.883 5.007l.058 -.005h.118l.058 .005l.06 .009l.052 .01l.108 .032l.067 .027l.132 .07l.09 .065l.081 .073l.083 .094l.054 .077l.054 .096l.017 .036l.027 .067l.032 .108l.01 .053l.01 .06l.004 .057l.002 .059v12c0 .852 -.986 1.297 -1.623 .783l-.084 -.076l-6 -6a1 1 0 0 1 -.083 -1.32l.083 -.094l6 -6l.094 -.083l.077 -.054l.096 -.054l.036 -.017l.067 -.027l.108 -.032l.053 -.01l.06 -.01z" /></svg></button>
            <div id="month-year"></div>
            <button id="next-month"><svg  xmlns="http://www.w3.org/2000/svg"  width="14"  height="14"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6c0 -.852 .986 -1.297 1.623 -.783l.084 .076l6 6a1 1 0 0 1 .083 1.32l-.083 .094l-6 6l-.094 .083l-.077 .054l-.096 .054l-.036 .017l-.067 .027l-.108 .032l-.053 .01l-.06 .01l-.057 .004l-.059 .002l-.059 -.002l-.058 -.005l-.06 -.009l-.052 -.01l-.108 -.032l-.067 -.027l-.132 -.07l-.09 -.065l-.081 -.073l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057l-.002 -12.059z" /></svg></button>
        </div>
        <div id="calendar"></div>
  
</div>
              </div>
             
             
                  
                </div>
  



      </div>

      </section>
     

    </body>
   


 
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
      Chart.defaults.font.family = 'Radikal-Light';









      const ctx = document.getElementById('chart_users');
      var data = {
    "jan":  <?php echo json_encode($months[1]); ?>,
    "feb":  <?php echo json_encode($months[2]); ?>,
    "mar": <?php echo json_encode($months[3]); ?>,
    "apr": <?php echo json_encode($months[4]); ?>,
    "may": <?php echo json_encode($months[5]); ?>,
    "jun": <?php echo json_encode($months[6]); ?>,
    "jul": <?php echo json_encode($months[7]); ?>,
    "aug": <?php echo json_encode($months[8]); ?>,
    "sep": <?php echo json_encode($months[9]); ?>,
    "oct": <?php echo json_encode($months[10]); ?>,
    "nov": <?php echo json_encode($months[11]); ?>,
    "dec": <?php echo json_encode($months[12]); ?>
  
};


      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
          datasets: [{
            label: '# of Votes',
            data: [data['jan'], data['feb'], data['mar'], data['jun'], data['jul'], data['aug'], data['sep'], data['oct'],data['nov'],data['dec']],
            borderWidth: 3,
            borderColor: 'rgb(156, 155, 255)',
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
      var data = {
    "pix":  <?php echo json_encode($pix); ?>,
    "credito":  <?php echo json_encode($credito); ?>,
    "debito": <?php echo json_encode($debito); ?>}
    new Chart(ctx_pie, {
      type: 'doughnut',
            data: {
                labels: ['Débito', 'Crédito', 'Pix'],
                datasets: [{
                    label: 'Pagamentos',
                    data: [data['debito'], data['credito'], data['pix']],
                    backgroundColor: [
                        '#e7e6fb',
            '#b8b4ce',
            '#9c9bff'
                    ],
                    borderColor: [
                       '#e7e6fb',
            '#b8b4ce',
            '#9c9bff'
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











        //chart acessos
        const ctx_view = document.getElementById('chart_view');
        var data = {
    "jan": <?php echo json_encode($access[1]); ?>,
    "feb": <?php echo json_encode($access[2]); ?>,
    "mar": <?php echo json_encode($access[3]); ?>,
    "apr": <?php echo json_encode($access[4]); ?>,
    "may": <?php echo json_encode($access[5]); ?>,
    "jun": <?php echo json_encode($access[6]); ?>,
    "jul": <?php echo json_encode($access[7]); ?>,
    "aug": <?php echo json_encode($access[8]); ?>,
    "sep": <?php echo json_encode($access[9]); ?>,
    "oct": <?php echo json_encode($access[10]); ?>,
    "nov": <?php echo json_encode($access[11]); ?>,
    "dec": <?php echo json_encode($access[12]); ?>
};
      new Chart(ctx_view, {
        
        type: 'line',
        
        data: {
          labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
          datasets: [{
            label: '# of Votes',
            data: [data['jan'], data['feb'], data['mar'], data['jun'], data['jul'], data['aug'], data['sep'], data['oct'],data['nov'],data['dec']],
            borderWidth: 3,
            borderColor: 'rgb(156, 155, 255)',
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
    










//chart bars
const ctx_bars = document.getElementById('chart_bars').getContext('2d');

const datab = {
    labels: [nome1, nome2, nome3],
    datasets: [{
        label: 'Vendas',
        data: [val1,val2, val3],
        backgroundColor: [
            'rgb(156, 155, 255)',
            'rgb(156, 155, 255)',
            'rgb(156, 155, 255)'
        ],
        borderColor: [
            'rgb(156, 155, 255)',
            'rgb(156, 155, 255)',
            'rgb(156, 155, 255)'
        ],
        borderWidth: 2
    }]
};

const config = {
    type: 'bar',
    data: datab,
    options: {
        responsive: true, /* Torna o gráfico responsivo */
        maintainAspectRatio: false, /* Permite que o gráfico ocupe todo o espaço */
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
    plugins:{
      legend:{
        display:false
        }

    }
};

const myChart = new Chart(ctx_bars, config);

    </script>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    const calendar = document.getElementById('calendar');
    const monthYear = document.getElementById('month-year');
    const prevMonthBtn = document.getElementById('prev-month');
    const nextMonthBtn = document.getElementById('next-month');
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    const monthNames = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
    const dayNames = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"];

    function generateCalendar(month, year) {
        calendar.innerHTML = '';
        monthYear.textContent = `${monthNames[month]} ${year}`;

 
        dayNames.forEach(day => {
            const dayHeader = document.createElement('div');
            dayHeader.classList.add('header');
            dayHeader.innerText = day;
            calendar.appendChild(dayHeader);
        });

     
        const firstDay = new Date(year, month).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

  
        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.classList.add('day');
            calendar.appendChild(emptyCell);
        }

  
        for (let day = 1; day <= daysInMonth; day++) {
            const dayCell = document.createElement('div');
            dayCell.classList.add('day');
            if (day === new Date().getDate() && month === new Date().getMonth() && year === new Date().getFullYear()) {
                dayCell.classList.add('today');
            }
            dayCell.innerText = day;
            calendar.appendChild(dayCell);
        }
    }

    function updateCalendar() {
        calendar.classList.remove('show');
        setTimeout(() => {
            generateCalendar(currentMonth, currentYear);
            calendar.classList.add('show');
        }, 50); // Pequeno atraso para a animação de fade funcionar
    }

    prevMonthBtn.addEventListener('click', function() {
        if (currentMonth === 0) {
            currentMonth = 11;
            currentYear--;
        } else {
            currentMonth--;
        }
        updateCalendar();
    });

    nextMonthBtn.addEventListener('click', function() {
        if (currentMonth === 11) {
            currentMonth = 0;
            currentYear++;
        } else {
            currentMonth++;
        }
        updateCalendar();
    });

    updateCalendar();
});



</script>
</html>