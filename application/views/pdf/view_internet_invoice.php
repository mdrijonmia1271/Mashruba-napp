<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>

<table border="0" style="width:500px; border-collapse: collapse;">
    <tr>
        <td style="text-align: center;"><span style="text-decoration: underline;font-size: 18px; font-weight: bold;">INTERNET BILL COPY</span></td>
    </tr>
</table>
<p></p>
<table border="0" style="width:500px; border-collapse: collapse;">
    <tr>
        <!--<td style="text-align: left;">Date: 01 <?php //echo date("F", mktime(0, 0, 0, $rec->invoice_month, 10));?> <?php //echo $rec->invoice_year;?><br>Customer ID: <?php //echo $rec->customer_id;?><br>Company Name: <?php //echo $rec->company_name;?><br>Billing Address: <?php //echo $rec->customer_billing_address;?>
        </td>-->
        <td style="text-align: left;">
            <?php //echo date('d F, Y', strtotime($Idate.'+1 months'));?>
            Date: <?php $Idate = "01-".$rec->invoice_month.'-'.$rec->invoice_year; echo date('d F, Y', strtotime($Idate));?><br>
            Customer ID: <?php echo $rec->customer_id;?><br>
            Company Name: <?php echo $rec->company_name;?><br>
            Billing Plan: <?php echo $rec->billing_plan;?><br>
            Billing Address: <?php echo $rec->customer_billing_address;?>
        </td>
        <td style="text-align: right;"><span style="font-weight: bold;">INVOICE ID: <?php echo $rec->invoice_id;?></span></td>
    </tr>
</table>
<p></p>
<table border="0" style="width:500px; border-collapse: collapse;">
    <!--<tr>
        <td style="text-align: left;"><span style="font-size: 14px; font-weight: bold;">Internet bill for the month of <?php //echo date("F", mktime(0, 0, 0, $rec->invoice_month, 10));?> <?php //echo $rec->invoice_year;?></span></td>
    </tr>-->
    <!--<tr>
        <td style="text-align: left;"><span style="font-size: 14px; font-weight: bold;">INTERNET BILL</span></td>
    </tr>-->
</table>
<p></p>
<table border="1" style="width:770px;border-collapse: collapse;">
    <tr>
        <td width="5%"><span style="font-weight: bold;font-size: 12px;">SL</span></td>
        <td width="40%"><span style="font-weight: bold;font-size: 12px;">Description</span></td>
        <!--<td width="20%"><span style="font-weight: bold;font-size: 12px;">Bandwidth Limit</span></td>-->
        <td width="10%"><span style="font-weight: bold;font-size: 12px;">Duration</span></td>
<!--        <td width="15%"><span style="font-weight: bold;font-size: 12px;">No of Connection</span></td>-->
        <td width="10%"><span style="font-weight: bold;font-size: 12px;">Taka</span></td>
    </tr>
    <?php 
    if(!empty($pending_rec)) { 
        $i=1; $total=0;
        //echo "<pre>";
        //print_r($pending_rec);
        //exit();
        foreach($pending_rec as $value) { 
    ?>
    <tr>
        <td><span style="font-size: 11px;"><?php echo $i;?></span></td>
        <td><span style="font-size: 11px;"><?php echo "Due ".$value->description;?></span></td>
        <!--<td><span style="font-size: 11px;"><?php //echo $value->bandwith_limit;?></span></td>-->
        <td><span style="font-size: 11px;"><?php echo get_duration_by_customer_auto_id('customer', $value->customer_auto_id, 'duration');?></span></td>
<!--        <td><span style="font-size: 11px;"><?php //echo get_no_of_connection_by_customer_auto_id('customer', $value->customer_auto_id, 'no_of_connection');?></span></td>-->
        <td><span style="font-size: 11px;"><?php echo ($value->dues != 0) ? $value->dues : $value->price;?></span></td>
    </tr>   
     <?php $total += ($value->dues != 0) ? $value->dues : $value->price;$i++;}
    }?>
    <tr>
        <td><span style="font-size: 11px;"><?php echo (isset($i) ? $i : '1');?></span></td>
        <td><span style="font-size: 11px;"><?php echo $rec->description;?></span></td>
        <!--<td><span style="font-size: 11px;"><?php //echo $rec->bandwith_limit;?></span></td>-->
        <td><span style="font-size: 11px;"><?php echo get_duration_by_customer_auto_id('customer', $rec->customer_auto_id, 'duration');?></span></td>
<!--        <td><span style="font-size: 11px;"><?php //echo get_no_of_connection_by_customer_auto_id('customer', $rec->customer_auto_id, 'no_of_connection');?></span></td>-->
        <td><span style="font-size: 11px;"><?php echo ($rec->dues != 0) ? $rec->dues : $rec->price;?></span></td>
    </tr>
    <tr>
        <td colspan="3" align="right">Total :</td>
        <td><span style="font-size: 11px;">
            <?php
                $previous_due = (isset($total) ? $total : 0);
                $running_month_bill = ($rec->dues != 0) ? $rec->dues : $rec->price;
                echo $total_bill = $previous_due + (isset($running_month_bill) ? $running_month_bill : 0);
            ?>
            </span>
        </td>
        
    </tr>
    
</table>

<p></p>
<table border="0" style="width:500px; border-collapse: collapse;">
    <tr><td style="text-align: left;">Taka In Words: <?php echo convert_number_to_words($total_bill);?> taka only.</td></tr>
</table>

<p></p><p></p><p></p><p></p>
<table border="0" style="width:500px; border-collapse: collapse;">
    <tr>
        <td style="text-align: left;"><span style="text-decoration:overline;font-size: 15px; font-weight: bold;">Global Network Inc.</span><br><br>Note: Last Payment date of the bill, 10th of current month otherwise the line will disconnect.
        </td>
    </tr>
</table>