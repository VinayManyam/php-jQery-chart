<html> 
   <head> 
      <title></title> 
      <script type="text/javascript" src="jquery.js"></script>
<script src="Chart.js"></script>
<script type="text/javascript" src="Chart.min.js"></script>	  
   
      <script type="text/javascript" language="javascript"> 
         $(document).ready(function() {
		 
       $("#load").click(function(event){
		
	
			$.post(  
                  "data.php", 
                  { ndata: "reports"}, 
                  function(data) {
						test= JSON.parse(data);
			for(var i=0;i<test.length;i++){
				  //alert(test[0][1]['11\/04']+Object.keys(test[0][1]));
						var  xValues=Object.keys(test[i][1]);
						var  yValues=Object.values(test[i][1]);
						

$(".content").append("<table style=\"width=100%;\"><tr><td><p>"+test[i][0]+"</p><canvas id=\""+test[i][0]+"\"></canvas></td><td><p>"+test[i][0]+"</p><canvas id=\"L"+test[i][0]+"\"></canvas></td></tr></table>")
						

new Chart(test[i][0], {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: yValues,
      borderColor: "blue",
      fill: true
    }]
  },
  options: {
    legend: {display: true}
  }
});				 

			}
				$.post(  
                  "data.php", 
                  { ndata: "reports1"}, 
                  function(data) {
						test= JSON.parse(data);
			for(var i=0;i<test.length;i++){
				  //alert(test[0][1]['11\/04']+Object.keys(test[0][1]));
						var  xValues=Object.keys(test[i][1]);
						var  yValues=Object.values(test[i][1]);
					

new Chart("L"+test[i][0], {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: yValues,
      borderColor: "blue",
      fill: true
    }]
  },
  options: {
    legend: {display: true}
  }
});				 

			}


				  }); 


				  }); 

				   
 
		 });

		 });
	
		 
      </script> 
   
   </head> 
    <head>
        <meta charset="UTF-8">
        <title>News updates</title>
            </head>
<style>
td {
  width: 100%;
}
img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
   width: 1px; height: 1px;
}
a:link {
  text-decoration: none;
}
[data-tag=Pass] {
  background-color: #CFFD92 ;
}

[data-tag=Fail] {
  background-color: #FEC7A7 ;
}
body {
  margin: 30;
}
.center {
  margin: auto;
  width: 95%;
  border: 1px solid #6059B9;
  padding: 10px;
}
.phide
{
    cursor: pointer;
}
div.absolute {
  position: absolute;
  left:10px;
}

</style>  

<body>
<input type="button" value="Load" id="load">
<div class="content">
					
</div> 

</body>
</html>
