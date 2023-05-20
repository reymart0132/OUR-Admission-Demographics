<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/maps/resource/php/class/core/init.php';
    isLogin();
    $viewtable = new viewtable();
    $user = new user();
    isRegistrar($user->data()->groups);
    ?>


<style>
    #container {
        height: 100vh;
    min-width: 310px;
    max-width: 800px;
    margin: 0 auto;
}

.loading {
    margin-top: 10em;
    text-align: center;
    color: gray;
}
</style>



<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
<script type="text/javascript">


</script>
<div class="text-center mt-5 pt-5"><h5> Top 20 Cities / Municipalities / Districts with Most Number of Applicants</h5></div>

<canvas id="chart_locations" style="width:100%; max-width:750px;  display:block; margin:0 auto;"></canvas>
<?php
    
        echo"<div class='text-center mt-5 pt-5'><h5> Number of Applicants per Campus </h5></div>";
        echo"<canvas id='chart_campus' style='width:100%; max-width:500px; max-height:50%; display:block; margin:0 auto;'></canvas>";

        // do nothing
?>

<?php $view->chartDataCampus(); ?>

<script>
      const schoolbar = document.getElementById('chart_locations');

      new Chart(schoolbar, {
        type: 'horizontalBar',
        data: {
          labels: <?php 
                    if(!empty($_GET['campus'])){
                        echo'["' . implode('", "', $view->chartDataLocationC()) . '"]';
                    }else{
                        echo'["' . implode('", "', $view->chartDataLocation()) . '"]';
                    }?>,
          datasets: [{
            label: 'Number of Applicants',
            data: <?php echo '[' . implode(', ', $view->chartDataCount()) . ']' ?>,
            backgroundColor: [
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',
              'rgb(43, 58, 85)',


            //   'rgb(206, 119, 119)',
            //   'rgb(232, 196, 196)',
            //   'rgb(242, 229, 229)',
            //   'rgb(255, 115, 29)',
            //   'rgb(95, 157, 247)',
            //   'rgb(232, 196, 196)',
            //   'rgb(242, 229, 229)'
            ],
          }]
        },
        options: {
          scales: {
              xAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
        }
      });
    </script>

<script>
      const campusbar = document.getElementById('chart_campus');

      new Chart(campusbar, {
        type: 'pie',
        data: {
          labels: ['Manila', 'Makati', 'Malolos'],
          datasets: [{
            label: 'Number of Applicants',
            data: <?php echo "['".$view->countManila()."', '".$view->countMakati()."', '".$view->countMalolos()."']" ?>,
            backgroundColor: [
            //  'rgb(43, 58, 85)',
               'rgb(206, 119, 119)',
               'rgb(232, 196, 196)',
               'rgb(242, 229, 229)',
            //   'rgb(255, 115, 29)',
            //   'rgb(95, 157, 247)',
            //   'rgb(232, 196, 196)',
            //   'rgb(242, 229, 229)'
            ],
          }]
        },
        options: {
          scales: {
            //   xAxes: [{
            //       ticks: {
            //           beginAtZero: true
            //       }
            //   }]
          }
        }
      });
    </script>