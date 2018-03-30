<?php
//action.php
session_start();
include("database/db_conection.php");
if(isset($_POST["unumber"]))
{
    $order_table = '';
    $message = '';
    if($_POST["action"] == "add")
    {
        if(isset($_SESSION["shopping_cart"]))
        {
            $is_available = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                if($_SESSION["shopping_cart"][$keys]['unumber'] == $_POST["unumber"])
                {
                    $is_available++;
                    $_SESSION["shopping_cart"][$keys]['quantity'] = $_SESSION["shopping_cart"][$keys]['quantity'] + $_POST["quantity"];
                }
            }
            if($is_available < 1)
            {
                $item_array = array(
                    'unumber'               =>     $_POST["unumber"],
                    'pname'               =>     $_POST["pname"],
                    'sprice'               =>     $_POST["sprice"],
                    'quantity'          =>     $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][] = $item_array;
            }
        }
        else
        {
            $item_array = array(
                'unumber'               =>     $_POST["unumber"],
                'pname'               =>     $_POST["pname"],
                'sprice'               =>     $_POST["sprice"],
                'quantity'          =>     $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][] = $item_array;
        }
    }
    if($_POST["action"] == "remove")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["unumber"] == $_POST["unumber"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                $message = '<label class="text-success">Product Removed</label>';
            }
        }
    }
    if($_POST["action"] == "quantity_change")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($_SESSION["shopping_cart"][$keys]['unumber'] == $_POST["unumber"])
            {
                $_SESSION["shopping_cart"][$keys]['quantity'] = $_POST["quantity"];
            }
        }
    }
    $order_table .= '  
           '.$message.'  
           <table class="table table-bordered">  
                <tr>  
                     <th width="40%">Product Name</th>  
                     <th width="10%">Quantity</th>  
                     <th width="20%">Price</th>  
                     <th width="15%">Total</th>  
                     <th width="5%">Action</th>  
                </tr>  
           ';
    if(!empty($_SESSION["shopping_cart"]))
    {
        $total = 0;
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            $order_table .= '  
                     <tr>  
                          <td>'.$values["pname"].'</td>  
                          <td><input type="text" name="quantity[]" id="quantity'.$values["unumber"].'" value="'.$values["quantity"].'" class="form-control quantity" data-unumber="'.$values["unumber"].'" /></td>  
                          <td align="right">$ '.$values["sprice"].'</td>  
                          <td align="right">$ '.number_format($values["quantity"] * $values["sprice"], 2).'</td>  
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["unumber"].'">Remove</button></td>  
                     </tr>  
                ';
            $total = $total + ($values["quantity"] * $values["sprice"]);
        }
        $order_table .= '  
                <tr>  
                     <td colspan="3" align="right">Total</td>  
                     <td align="right">$ '.number_format($total, 2).'</td>  
                     <td></td>  
                </tr>  
                <tr>  
                     <td colspan="5" align="center">  
                          <form method="post" action="cart.php">  
                               <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                          </form>  
                     </td>  
                </tr>  
           ';
    }
    $order_table .= '</table>';
    $output = array(
        'order_table'     =>     $order_table,
        'cart_item'          =>     count($_SESSION["shopping_cart"])
    );
    echo json_encode($output);
}
?>