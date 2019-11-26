<?
if ($_GET['report'] === "category") {
    if (isset($_GET['category'])) {
        if ($_GET['category'] === "-Select-") {
            ?>
            <thead>
                <tr class='text-center bg-primary'>
                    <th class='text-center'>Item Category ID</th>
                    <th class='text-center'>Item Category Name</th>
                </tr>
            </thead>
            <tbody>
                <?
                            $sqlDisplayItemCategory = "SELECT `item_category_id`,`item_category_name` FROM `item_category`";
                            if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                                while ($displayCat = $rawDate->fetch_assoc()) {
                                    $ItemCategoryId = $displayCat['item_category_id'];
                                    $ItemCategoryName = $displayCat['item_category_name'];
                                    ?>
                        <tr>
                            <td class='text-center'><? echo $ItemCategoryId; ?></td>
                            <td class='text-center'><? echo $ItemCategoryName; ?></td>
                        </tr>
                <?
                                }
                            }
                            ?></tbody><?
                                                } else {
                                                    ?>
            <thead>
                <tr class='text-center bg-primary'>
                    <th class='text-center'>Item Category Name</th>
                    <th class='text-center'>Item Code</th>
                    <th class='text-center'>Item Name</th>
                    <th class='text-center'>Item Type</th>
                    <th class='text-center'>Item Tax Code</th>
                    <th class='text-center'>Item Tax</th>
                </tr>
            </thead>
            <tbody>
                <?
                            $sqlDisplayItemCategory = "SELECT item_category.item_category_name,item.*,tax.tax_percentage FROM item_category AS item_category INNER JOIN item AS item ON item.item_category = item_category.item_category_id INNER JOIN tax AS tax ON item.item_tax = tax.tax_id WHERE item_category.item_category_id = '$_GET[category]'";
                            if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                                if(mysql_num_rows($rawDate) == 0){
                                    ?><tr><td class='text-center' colspan="5">No Data is present</td></tr><?
                                }else{
                                    $i = 0;
                                while ($displayCat = $rawDate->fetch_assoc()) {
                                    
                                    $catName = $displayCat['item_category_name'];
                                    $item_id = $displayCat['item_id'];
                                    $item_name = $displayCat['item_name'];
                                    $item_type = $displayCat['item_type'];
                                    $item_tax = $displayCat['item_tax'];
                                    $tax_percentage = $displayCat['tax_percentage'];
                                    ?>
                        <tr>
                                <? if($i == 0){?><td class='text-center'><? echo $catName;?></td><?}?>
                            <td class='text-center'><? echo $item_id; ?><br></td>
                            <td class='text-center'><? echo $item_name; ?><br></td>
                            <td class='text-center'><? echo $item_type; ?><br></td>
                            <td class='text-center'><? echo $item_tax; ?><br></td>
                            <td class='text-center'><? echo $tax_percentage; ?><br></td>
                        </tr>
                <?
                $i++;
                                }
                            }
                        }
                            ?></tbody><?
                                                }
                                            }
                                            ?>
    <thead>
        <tr class='text-center bg-primary'>
            <th class='text-center'>Item Category ID</th>
            <th class='text-center'>Item Category Name</th>
        </tr>
    </thead>
    <tbody>
        <?
            $sqlDisplayItemCategory = "SELECT `item_category_id`,`item_category_name` FROM `item_category`";
            if ($rawDate = $connect->query($sqlDisplayItemCategory)) {
                while ($displayCat = $rawDate->fetch_assoc()) {
                    $ItemCategoryId = $displayCat['item_category_id'];
                    $ItemCategoryName = $displayCat['item_category_name'];
                    ?>
                <tr>
                    <td class='text-center'><? echo $ItemCategoryId; ?></td>
                    <td class='text-center'><? echo $ItemCategoryName; ?></td>
                </tr>
        <?
                }
            }
            ?></tbody><?
                        }
                        ?>