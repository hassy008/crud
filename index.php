  <?php 
    include 'header.php';
    include 'config.php';
    include 'database.php';
  ?>


  <?php 
    $db=new Database();
    $query="SELECT * FROM tbl_user";
    $read=$db->select($query);
  ?>

  <?php
  //public function insert($query) msg
    if (isset($_GET['msg'])) {
      echo "<span style='color:green'>".$_GET['msg']."</span>";
    }
  ?>



  <table class="tblone">
    <tr>
      <th width="10%">ID</th>
      <th width="35%">Name</th>
      <th width="25%">Email</th>
      <th width="15%">Skill</th>
      <th width="15%">Action</th>

    </tr>

  <!--create php block to show the code-->
    <?php if($read) {?> 
    <?php 
      $i=1;
      while($row=$read->fetch_assoc()) { 

    ?>


    <tr>
      <td><?php echo $i++ ?></td>
      <td><?php echo $row['Name'];?></td><!--here write the Name/username like what you write on your DB table....and it is all CASE SENSITIVE-->
      <td><?php echo $row['Email'];?></td>
      <td><?php echo $row['Skill'];?></td>
      <td><a href="update.php?id=<?php echo urlencode($row['ID']);?>">Edit</a></td>
    </tr>
  <?php }?>
  <?php } else {?>
  <p>Data is not available!!</p>
  <?php } ?>

  </table>

  <a href="create.php">Create</a>






  <?php include 'footer.php';?>