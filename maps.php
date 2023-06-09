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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<div id="container"></div> <!-- Target Container for MAP -->

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
<script type="text/javascript">
    (async () => {
        
        const topology = await fetch(
            'https://code.highcharts.com/mapdata/countries/ph/ph-all.topo.json'
            ).then(response => response.json());
            
            // Prepare demo data. The data is joined to map using value of 'hc-key'
            // property by default. See API docs for 'joinBy' for more info on linking
            // data and map.
            const data = [
                <?php 
                    if(!empty($_GET['campus'])){
                        $view->getdataC();
                    }
                    else{
                        $view->getdata();
                    }?>

        // ['ph-au', 10],['ph-bu', 10],['ph-pm', 10],['ph-ba', 10],['ph-ne', 10],['ph-tr', 10],['ph-zm', 10],['ph-7017', 10],['ph-7018', 10],
     
    ];

    // Create the chart
    Highcharts.mapChart('container', {
        chart: {
            map: topology
        },

        title: {
            <?php
                $AdmYear = ltrim($_GET['year'],"A");
                if(!empty($_GET['campus'])){
                    echo "text: 'Centro Escolar University $_GET[campus] Admission Demographics for Admission Year $AdmYear'";
                }
                else{
                    echo "text: 'Centro Escolar University Admission Demographics for <br> Admission Year $AdmYear'";
                }
            ?>
        },

        subtitle: {
            text: 'Source map: <a href="http://code.highcharts.com/mapdata/countries/ph/ph-all.topo.json">Philippines</a>'
        },

        tooltip: {
            headerFormat: '<span style="color:{point.color}">\u25CF</span> {point.key}:<br/>',
            pointFormat: 'Admission Count: <b>{point.value}</b>'
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        colorAxis: {
            min: 0
        },

        series: [{
            data: data,
            keys: ['hc-key', 'value'],
            joinBy: 'hc-key',
            name: 'Admission',
            states: {
                hover: {
                    color: '#f2c1c1'
                }
            },
            dataLabels: {
                enabled: true,
                format: '{point.properties.name}'
            }
        }]
    });

})();

</script>
<div class="text-center mt-5 pt-5"><h5> Top 20 Cities / Municipalities / Provinces with Most Number of Applicants 

    <?php 
        if(!empty($_GET['campus'])){
            echo "for CEU ".$_GET['campus']; 
        }else{ 
            // display nothing
        }
    ?></h5></div>

    
<canvas id="chart_locations" style="width:100%; max-width:750px;  display:block; margin:0 auto;"></canvas>

<?php
    if(!empty($_GET['campus'])){
        echo "<div class='text-center mt-5 pt-5'><h5> Top 50 Districts with Most Number of Applicants ";
 
        if(!empty($_GET['campus'])){
            echo "for CEU ".$_GET['campus']; 
        }else{ 
            // display nothing
        }

        echo "</h5></div><canvas id='chart_locations_districts' style='width:100%; max-width:900px; display:block; margin:0 auto;'></canvas>";
    }
?>

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
            data: <?php 
                    if(!empty($_GET['campus'])){
                        echo '[' . implode(', ', $view->chartDataCountC()) . ']';
                    }else{
                        echo '[' . implode(', ', $view->chartDataCount()) . ']';
                    }     
                ?>,
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
        aspectRatio: 1,
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
      const schoolbar2 = document.getElementById('chart_locations_districts');

      new Chart(schoolbar2, {
        type: 'horizontalBar',
        data: {
          labels: <?php echo'["' . implode('", "', $view->chartDataLocationD()) . '"]'; ?>,
          datasets: [{
            label: 'Number of Applicants',
            data: <?php echo '[' . implode(', ', $view->chartDataCountD()) . ']'; ?>,
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
        aspectRatio: 0.5,
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