<?php include "header.php";?>
<!-- Begin page content -->
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><center>Logger</h3>
    </div>
    
    <?php
    if(isset($_GET['sdate']) || isset($_GET['edate']))
    {
      
      $sdate = $_GET['sdate'];
      $edate = $_GET['edate'];	
      $sqlAdmin = mysqli_query($konek, "SELECT id,waktu,inputsuhu,suhuatas,deltainputsuhu,deltasuhu,outputKipas,outputPeltier,pwmValueK,pwmValueP,outputFuzzyK,outputFuzzyP FROM biobox WHERE waktu BETWEEN ' $sdate ' AND ' $edate ' ORDER BY ID DESC LIMIT 0,100");
    }
    else
    {
      $sqlAdmin = mysqli_query($konek, "SELECT id,waktu,inputsuhu,suhuatas,deltainputsuhu,deltasuhu,outputKipas,outputPeltier,pwmValueK,pwmValueP,outputFuzzyK,outputFuzzyP FROM biobox ORDER BY ID DESC LIMIT 0,100");
    }
    ?>

    <div class="panel-body">
      <form class="form-horizontal" method="GET">  
        <div class="form-group">
          <label class="col-md-2">Dari tanggal</label>   
          <div class="col-md-2">
            <input type="date" name="sdate" class="form-control" value="<?php echo $sdate; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2">sampai tanggal</label>   
          <div class="col-md-2">
            <input type="date" name="edate" class="form-control" value="<?php echo $edate; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2"></label>   
          <div class="col-md-8">
            <input type="submit" class="btn btn-primary" value="Filter">
            <a href='goal.php'  class='btn btn-warning btn-sm'>Reset</a>
          </div>
        </div>
      </form>

      <table class="table table-bordered table-striped">
        <thead>
          <tr >
            <th class='text-center'>ID</th>
            <th class='text-center'>Waktu</th>
            <th class='text-center'>Input Suhu</th>  
            <th class='text-center'>Suhu</th>   
            <th class='text-center'>Delta Input Suhu</th>  
            <th class='text-center'>Delta Suhu</th> 
            <th class='text-center'>outputKipas</th>  
            <th class='text-center'>outputPeltier</th>
            <th class='text-center'>Nilai Pwm Kipas</th>
            <th class='text-center'>Nilai Pwm Peltier</th> 
            <th class='text-center'>Kecepatan Kipas</th> 
            <th class='text-center'>Tegangan Peltier</th>         
            
          </tr>
        </thead>
        <tbody>
          <?php
            
          while($data=mysqli_fetch_array($sqlAdmin))
          {
            echo "<tr >
            <td><center>$data[id]</td>
            <td><center>$data[waktu]</center></td> 
            <td><center>$data[inputsuhu]</td>
            <td><center>$data[suhuatas]</td>
            <td><center>$data[deltainputsuhu]</td> 
            <td><center>$data[deltasuhu]</td> 
            <td><center>$data[outputKipas]</td>   
            <td><center>$data[outputPeltier]</td>    
            <td><center>$data[pwmValueK]</td>     
            <td><center>$data[pwmValueP]</td>          
            <td><center>$data[outputFuzzyK]</td> 
            <td><center>$data[outputFuzzyP]</td>                          
            </tr>";
          }
          ?>
        </tbody>
      </table> 
    </div>
  </div>
</div>
<?php include "footer.php"; ?>