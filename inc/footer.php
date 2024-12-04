  </div>
  </div>
  <br />
  </body>
  <script>
    new DataTable('#tableuser');
    new DataTable('#tableuser1');
    

        document.getElementById('btn').onclick = function() {
            var conteudo = document.getElementById('imprimir').innerHTML,
            tela_impressao = window.open();
            tela_impressao.document.write(conteudo);
            tela_impressao.window.print();
            tela_impressao.window.close();
        };
       

  </script>
  
  <script>
//Script do Google que define o TIPO do gráfico
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);
//Define o tipo de coluna e o nome
function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Dia');
      data.addColumn('number', 'Total pedidos');
    
      //Captura os dados em JSON e monta o gráfico, de acordo com os dados.
      data.addRows( <?php include "inc/chart.php"; ?>);
//Opções do gráfico:  
      var options = {
        hAxis: {
          title: 'Dia'
        },
        vAxis: {
          title: 'Total pedidos'
        },
        backgroundColor: '#f1f8e9'
      };
//Criação do Gráfico 
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
</script>
  </html>