<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("connect.php");
    ?>
    
  <title>tDBc Example</title>
    
    
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
   
    <!-- -->
    
 
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-2.0.3.min.js"></script>
    

    
  <style>
    
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">tDBc</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container text-center">
    <h1>tDBc</h1>      
    <p>Show tDBc</p>
  </div>
</div>
   
    <?php
    
    //array nome colonne
   /* $var_ar = array("id", "nome", "descrizione","data","conferma","storno","fa","fs","partner","verifica","ff","upload");

$arrlength = count($var_ar);
    */
    
    
$query1=mysql_query("select * from  prodotti");
$sqlcolumns = "SHOW COLUMNS FROM prodotti";
$resultcolumns = mysql_query($sqlcolumns);
        
       
    
       $classtr="";
       $classtd="";
      
        ?>
    <div class="container text-center">
<div class="container-fluid bg-3 text-center"> 
                   
<table class="table table-striped table-bordered table-hover" id="mydata">
      <thead>
    <tr>
        <th> select</th>
    <?php    
        $ncolumns=0;
        $acn=array();
        while($rowcolumns = mysql_fetch_array($resultcolumns)){
            $acn[]=$rowcolumns['Field'];
            if($rowcolumns['Field']=="descrizione"){
               $rowcolumns['Field']="des";
           }
           echo '<th>'.$rowcolumns['Field'].'</th>';
        $ncolumns++;
        }
        ?>
         <th>upload</th>
    
    
    
</tr>
    </thead>
    <tbody>
        
        <?php
        while($query2=mysql_fetch_array($query1)){
        // if($i%2==0)
            $classtr = 'odd';
             $classtr = 'even'; 
             
        ?>
        <tr class="<?php echo $classtr;?>">   
        
        <td class="<?php echo $classtd;?>"> <input type="checkbox" name="cart_sing[]" value=""/> add</td>
            <?php
            for($x = 0; $x < $ncolumns; $x++) {
                
                if($acn[$x]=="fa"){
               
                         ?>
        
<td class="<?php echo $classtd;?>">
        <a href="#" class="fa<?php echo $query2['id'];?>"><?php 
               if($query2[$acn[$x]]==""){
                echo "--";   
               }else{
                   
               echo $query2[$acn[$x]]; 
               }
            ?></a>

        </td>
        
        <?php
           }
             else{
                 
            ?>
            <td class="<?php echo $classtd;?>">  
                <?php echo $query2[$acn[$x]]?>
            </td>
            <?php
              
            }
            }
            ?>
        <td class="<?php echo $classtd;?>">  
                <?php echo "add";?>
            </td>
            
        </tr>
        <?php 
            }
        ?>
        </tbody></table>
    </div>
    
    
     <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
    <script>
      $('#mydata').dataTable(
      {     
       "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      
          "order": [[ 1, "desc" ]]
      }

      );
        
        
 

    </script>
        
    
    
    </div>
<footer class="container-fluid text-center">
  <p>Baxstef</p>
</footer>

</body>
</html>
