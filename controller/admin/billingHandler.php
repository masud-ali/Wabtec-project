<?php
session_start();
include_once("../../helper/auth.php");
include_once("../../model/admin/AdminModel.php");

require_role("admin");

$model = new AdminModel();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"] ?? "";
    $billing_id = $_POST["billing_id"] ?? "";
    $payment_method = $_POST["payment_method"] ?? "cash";

    if ($action == "mark_paid" && $billing_id != "") {
        $model->markBillAsPaid($billing_id, $payment_method);
        $_SESSION["success"] = "Bill marked as paid";
    }
}

header("Location: ../../view/admin/billing.view.php");
exit();
?>