<?php
include_once('link.php');
include_once('connection.php');
include_once('header1.php');   
  
$per_page_record = 3;  // Number of entries to show in a page as per assesment given       
if (isset($_GET["page"])) {    
      $page  = $_GET["page"];    
 }    
 else {    
       $page=1;    
 }    

  
 $start_from = ($page-1) * $per_page_record;     
    
 $query = "SELECT * FROM tbluser LIMIT $start_from, $per_page_record";     
 $rs_result = mysqli_query ($conn, $query);
 ?>
 
 <div class="container">   
      <br>   
      <div>   
        <h1>Registered Users</h1>   
<br>
<br>   
        <table class="table table-striped table-condensed  table-bordered">   
          <thead>   
            <tr>   
              <th width="10%">ID</th>   
              <th>Name</th>   
              <th>email</th>   
              <th>mobile</th>
              <th>password</th>   
            </tr>   
          </thead>   
          <tbody>   
    <?php
            $sn = 1;     
            while ($row = mysqli_fetch_array($rs_result)) {    
                  // Display the records.    
            ?>     
            <tr>     
             <td><?php echo $sn++; ?></td>     
            <td><?php echo $row["Firstname"]; ?></td>   
            <td><?php echo $row["email"]; ?></td>   
            <td><?php echo $row["mobile"]; ?></td>
            <td><?php echo $row["password"]; ?></td>                                            
            </tr>     
            <?php     
                };    
            ?>     
          </tbody>   
        </table>

        <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM tbluser";     
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        //Number of pages we want   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='dashboard.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='dashboard.php?page=" .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='dashboard.php?page=".$i."'> ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='dashboard.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>  
  
  
      <div class="inline">   
      <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
      placeholder="<?php echo $page."/".$total_pages; ?>" required>   
      <button onClick="go2Page();">Go</button>   
     </div>    
    </div>   
  </div>  
</center>   
  <script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'dashboard.php?page='+page;   
    }   
  </script>  
  </body>   
</html>