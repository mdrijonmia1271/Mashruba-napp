<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>

<table border="0" style="width:500px; border-collapse: collapse;">
    <tr>
        <td style="text-align: center;"><span style="text-decoration: underline;font-size: 18px; font-weight: bold;">BILL COPY</span></td>
    </tr>
</table>
<p></p>
<table border="0" style="width:500px; border-collapse: collapse;">
    <tr>
        <!--<td style="text-align: left;">Date: 01 <?php echo date("F", mktime(0, 0, 0, $rec->invoice_month, 10));?> <?php echo $rec->invoice_year;?><br>Customer Name: <?php echo $rec->customer_name;?><br>Billing Address: <?php echo $rec->customer_billing_address;?>
        </td>-->
        <td style="text-align: left;">Date: <?php echo date("F j, Y", strtotime($rec->created_date_time));?><br>Customer Name: <?php echo $rec->customer_name;?><br>Billing Address: <?php echo $rec->customer_billing_address;?>
        </td>
        <td style="text-align: right;"><span style="font-weight: bold;">INVOICE ID: <?php echo $rec->invoice_id;?></span></td>
    </tr>
</table>
<p></p>
<table border="0" style="width:500px; border-collapse: collapse;">
    <tr>
        <td style="text-align: left;"><span style="font-size: 14px; font-weight: bold;">Service Type: <?php echo get_service_type_by_service_id('service_type',$rec->service_type,'name');?></span></td>
    </tr>
</table>
<p></p>
<table border="1" style="width:500px; border-collapse: collapse;">
    <tr>
        <td width="5%"><span style="font-weight: bold;font-size: 12px;">SL</span></td>
        <td width="45%"><span style="font-weight: bold;font-size: 12px;">Description</span></td>
        <td width="20%"><span style="font-weight: bold;font-size: 12px;">Day / Quantity</span></td>
        <td width="15%"><span style="font-weight: bold;font-size: 12px;">Price</span></td>
        <td width="15%"><span style="font-weight: bold;font-size: 12px;">Taka</span></td>
    </tr>
    <tr>
        <td><span style="font-size: 11px;">01</span></td>
        <td><span style="font-size: 11px;"><?php echo $rec->description;;?></span></td>
        <td><span style="font-size: 11px;"><?php echo $rec->quantity;?></span></td>
        <td><span style="font-size: 11px;"><?php echo $rec->price/$rec->quantity;?></span></td>
        <td><span style="font-size: 11px;"><?php echo ($rec->dues != 0) ? $rec->dues : $rec->price;?></span></td>
    </tr>
    <tr>
        <td colspan="4" align="right">Total :</td>
        <td><span style="font-size: 11px;"><?php echo ($rec->dues != 0) ? $rec->dues : $rec->price;?></span></td>
        
    </tr>
    
</table>

<p></p>
<table border="0" style="width:500px; border-collapse: collapse;">
    <tr>
        <td style="text-align: left;">Taka In Words: <?php echo convert_number_to_words(($rec->dues != 0) ? $rec->dues : $rec->price);?> taka only.</td>
    </tr>
</table>

<p></p><p></p><p></p><p></p>
<table border="0" style="width:500px; border-collapse: collapse;">
    <tr>
        <td style="text-align: left;"><span style="text-decoration:overline;font-size: 15px; font-weight: bold;">Global Network Inc.</span></td>
    </tr>
</table>