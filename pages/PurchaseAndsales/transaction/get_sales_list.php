<?
require '../../../connect.php';


if ($_POST['customerId'] != NULL && $_POST['fromDate'] != NULL && $_POST['toDate'] != NULL) {
    $customer= $_POST['customerId'];
    $fromDate=date('Y-m-d', strtotime($_POST['fromDate']));
    $toDate=date('Y-m-d', strtotime($_POST['toDate']));

    if($customer != 'All'){
    $sqlGetSalesList = "SELECT sales.sales_date, sales.sales_id,sales.total_amount_tax, customer_or_company.cust_comp_name, GROUP_CONCAT( item.item_name SEPARATOR ',') AS item_name,GROUP_CONCAT( iCat.item_category_name SEPARATOR ',') AS item_category_name, GROUP_CONCAT(tax.tax_code SEPARATOR ',') AS tax_code ,GROUP_CONCAT(pList.quantity SEPARATOR ',') AS quantity,GROUP_CONCAT(pList.price_per_unit SEPARATOR ',')  AS price_per_unit,GROUP_CONCAT(pList.total_amount SEPARATOR ',') AS total_amount,GROUP_CONCAT(pList.total_amount_with_tax SEPARATOR ',') AS total_amount_with_tax FROM sales AS sales INNER JOIN sales_list AS pList ON pList.sales_id = sales.sales_id INNER JOIN customer_or_company AS customer_or_company ON sales.customer_id=customer_or_company.customer_id INNER JOIN item_category as iCat ON pList.item_category = iCat.item_category_id INNER JOIN item AS item ON pList.item_code = item.item_id INNER JOIN tax AS tax ON item.item_tax= tax.tax_id WHERE sales.sales_date BETWEEN '$fromDate' AND '$toDate' AND customer_or_company.customer_id ='$customer' GROUP BY sales.sales_id ORDER BY sales.sales_id ASC";
    
    if ($rawData = $connect->query($sqlGetSalesList)) {
        if(mysqli_num_rows($rawData)){ 
        while ($data = $rawData->fetch_assoc()) {
            $salesDate = date('d-m-Y', strtotime($data['sales_date']));
            $salesList[]= array("salesDate"=>$salesDate,"salesId"=>$data['sales_id'],"customerName"=>$data['cust_comp_name'],"categoryName"=>$data['item_category_name'],"itemName"=>$data['item_name'],"quantity"=>$data['quantity'],"pricePerUnit"=>$data['price_per_unit'],"totalAmount"=>$data['total_amount'],"taxCode"=>$data['tax_code'],"totalAmountWithTax"=>$data['total_amount_with_tax'],"grandTotal"=>$data['total_amount_tax']);
        }
        echo json_encode($salesList);
    }else{
        echo json_encode("nothing");
    }
}else{
    echo json_encode("nothing");
}
}else{
    $sqlGetSalesList = "SELECT sales.sales_date, sales.sales_id,sales.total_amount_tax, customer_or_company.cust_comp_name, GROUP_CONCAT( item.item_name SEPARATOR ',') AS item_name,GROUP_CONCAT( iCat.item_category_name SEPARATOR ',') AS item_category_name, GROUP_CONCAT(tax.tax_code SEPARATOR ',') AS tax_code ,GROUP_CONCAT(pList.quantity SEPARATOR ',') AS quantity,GROUP_CONCAT(pList.price_per_unit SEPARATOR ',')  AS price_per_unit,GROUP_CONCAT(pList.total_amount SEPARATOR ',') AS total_amount,GROUP_CONCAT(pList.total_amount_with_tax SEPARATOR ',') AS total_amount_with_tax FROM sales AS sales INNER JOIN sales_list AS pList ON pList.sales_id = sales.sales_id INNER JOIN customer_or_company AS customer_or_company ON sales.customer_id=customer_or_company.customer_id INNER JOIN item_category as iCat ON pList.item_category = iCat.item_category_id INNER JOIN item AS item ON pList.item_code = item.item_id INNER JOIN tax AS tax ON item.item_tax= tax.tax_id WHERE sales.sales_date BETWEEN '$fromDate' AND '$toDate' GROUP BY sales.sales_id ORDER BY sales.sales_id ASC";
    if ($rawData = $connect->query($sqlGetSalesList)) {
        if(mysqli_num_rows($rawData)){ 
        while ($data = $rawData->fetch_assoc()) {
            $salesDate = date('d-m-Y', strtotime($data['sales_date']));
            $salesList[]= array("salesDate"=>$salesDate,"salesId"=>$data['sales_id'],"customerName"=>$data['cust_comp_name'],"categoryName"=>$data['item_category_name'],"itemName"=>$data['item_name'],"quantity"=>$data['quantity'],"pricePerUnit"=>$data['price_per_unit'],"totalAmount"=>$data['total_amount'],"taxCode"=>$data['tax_code'],"totalAmountWithTax"=>$data['total_amount_with_tax'],"grandTotal"=>$data['total_amount_tax']);
        }
        echo json_encode($salesList);
    }else{
        echo json_encode("nothing");
    }
    }else{
        echo json_encode("nothing");
    }
}
}
?>

