 <?php
    session_start();
    include 'header.php';
    include 'sidebar.php'; 
    include 'dbconnect.php';
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $query="SELECT * from registrations Where `event` = 'Coding'";
                  $query_run=mysqli_query($mycon,$query);
                  $count=mysqli_num_rows($query_run);
                  echo "<h3>$count</h3>"
                ?>
                  <p>Coding</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                
                <?php
                  $query="SELECT * from registrations Where `event` = 'Paper Presentation'";
                  $query_run=mysqli_query($mycon,$query);
                  $count=mysqli_num_rows($query_run);
                  echo "<h3>$count</h3>"
                ?>

                <p>Paper Presentation</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $query="SELECT * from registrations Where `event` = 'Post Presentation'";
                  $query_run=mysqli_query($mycon,$query);
                  $count=mysqli_num_rows($query_run);
                  echo "<h3>$count</h3>"
                ?>
                <p>Poster Presentation</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
              <?php
                  $query="SELECT * from registrations Where `event` = 'Web Designing'";
                  $query_run=mysqli_query($mycon,$query);
                  $count=mysqli_num_rows($query_run);
                  echo "<h3>$count</h3>"
                ?>

                <p>Web Designing</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
            <?php
                  $query="SELECT * from registrations Where `event` = 'Technical Quiz'";
                  $query_run=mysqli_query($mycon,$query);
                  $count=mysqli_num_rows($query_run);
                  echo "<h3>$count</h3>"
                ?>

              <p>Technical Quiz</p>
            </div>
             <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
        <!-- /.row -->
        <!-- Main row -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
    include 'footer.php';
?>  