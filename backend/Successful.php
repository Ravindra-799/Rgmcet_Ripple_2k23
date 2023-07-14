<?php include "header.php" ?>
<?php
    $f_code=$_POST['f_code'];
    if($f_code=='Ok')
    {
        ?>
    <div>
        <div class="conatct" >
            <div class="alert alert-success">Successfully Registred<br>Thank You.</div>
                <div class="card">
                    <div class="card-body border" id="printable">
                        <div class="row">
                            <div class="col-sm-24">
                                <img src="img/receipt.png" alt="Ripple Banner" align="center"  style="min-width:100% min-height=200px"/>
                            </div>
                        </div>
                    <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>RIPPLE 2K23</strong><br>
                                    RGMCET,CSE, Nerawada 'X' Roads,<br>
                                    Nandyal, Andhra Pradesh<br>
                                    Phone: (+91)-6281818878<br>
                                            (+91)-9494740349<br>
                                    Email:rgmcseripple2k23@gmail.com 
                            </address>
                        </div>
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong><?php echo $_POST['name'] ?></strong><br>
                            Event Name:<?php echo $_POST['event'] ?> <br>
                            Phone: <?php echo $_POST['phone'] ?><br>
                            Email: <?php echo $_POST['email'] ?>
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                    <strong>Invoice</strong><br>
                    <b>Event ID:</b> <?php echo $_POST['eventid'] ?><br>
                    <b>Payment Date:</b> <?php echo $_POST['date'] ?><br>
                     
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $_POST['eventid'] ?></td>
                                    <td><?php echo $_POST['event'] ?></td>
                                    <td> <?php echo $_POST['amt'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            
        </div> 
        <div class="row no-print">
                <div class="col-12">
                    <button type="button" class="btn btn-success float-right" style="margin-right: 5px;" onClick="printDiv('printable');">
                    <i class="fa fa-print"></i>Print</button>
                </div>
        </div>
    <div>
        <?php
    }
    else
    {
    ?>
       <div class="alert alert-danger">Transaction Failed<br>Please Try Again After Sometime.....</div>
    <?php
    }
?>


    

    <script>
        function printDiv(ele) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(ele).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
                
        }
    
    </script>
    <div>
        <?php include "footer.php" ?>
    </div>
</body>
