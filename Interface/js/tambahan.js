//Passing data dari PHP ke HTML dengan Ajax

var slider = document.getElementById("range");
var output = document.getElementById("outputVar");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}

var auto_refresh = setInterval(
    function () {
       $.ajax({
	    url         : "getdata.php",
	    type        : "GET",
	    dataType    : "JSON",
	    data        : {get_param : 'value'},
		    success     : function(data){
				var len = data.length;
                for(var i=0; i<len; i++){

                var waktu   = data[i]['waktu']
				var inputsuhu = data[i]['inputsuhu']
				var suhuatas = data[i]['suhuatas']
                var deltainputsuhu = data[i]['deltainputsuhu']
                var deltasuhu =  data[i]['deltasuhu']
                var outputKipas = data[i]['outputKipas']
                var outputPeltier =  data[i]['outputPeltier']
                var pwmValueK  =  data[i]['pwmValueK']
                var pwmValueP  =  data[i]['pwmValueP']
                var outputFuzzyK = data[i]['outputFuzzyK']
                var outputFuzzyp = data[i]['outputFuzzyP']
                }
				document.getElementById("waktu").innerHTML = waktu;
				document.getElementById("inputsuhu").innerHTML = inputsuhu;
                document.getElementById("outputFuzzyK").innerHTML = outputFuzzyK;
                document.getElementById("outputFuzzyP").innerHTML = outputFuzzyp;
				document.getElementById("suhuatas").innerHTML = suhuatas;
                document.getElementById("deltainputsuhu").innerHTML = deltainputsuhu;
                document.getElementById("deltasuhu").innerHTML = deltasuhu;
                document.getElementById("outputKipas").innerHTML = outputKipas;
                document.getElementById("outputPeltier").innerHTML = outputPeltier;
                document.getElementById("pwmValueK").innerHTML = pwmValueK;
                document.getElementById("pwmValueP").innerHTML = pwmValueP;
        
			}
		});
    }, 3000);

    $(document).ready(function(){
        $("#setpoint").click(function(){
            alert(output.innerHTML);
            $.ajax({
                url: "./upload.php", //the url that you are sending data to
                type: 'post', //the method you want to use can change to 'GET'
                 data: {"inputsuhu" : output.innerHTML}, //the data you want to send as an object , to receive in on the PHP end you would use $_POST['data']
                success: function(){
                    window.alert('Input Suhu sudah diset');
         //do something with the returned data, either put it in html or you don't need to do anything with it
                    }
    });
        });
      });

      