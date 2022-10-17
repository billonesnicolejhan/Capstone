<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-15 02:20:17 --> Severity: Notice --> Trying to get property 'payment_schedule_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Manager\dashboard.php 107
ERROR - 2022-10-15 02:20:18 --> Severity: Notice --> Trying to get property 'payment_schedule_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Manager\dashboard.php 107
ERROR - 2022-10-15 02:57:51 --> Severity: Notice --> Undefined variable: get C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\branch_temp\branch_dashboard.php 105
ERROR - 2022-10-15 02:57:51 --> Severity: Notice --> Trying to get property 'payment_schedule_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\branch_temp\branch_dashboard.php 105
ERROR - 2022-10-15 10:02:31 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\create_PO.php 6
ERROR - 2022-10-15 10:02:31 --> Severity: Notice --> Trying to get property 'purchase_request_no' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\create_PO.php 19
ERROR - 2022-10-15 10:02:31 --> Severity: Notice --> Trying to get property 'supplier_name' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\create_PO.php 30
ERROR - 2022-10-15 10:02:31 --> Severity: Notice --> Undefined variable: row C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\create_PO.php 80
ERROR - 2022-10-15 10:02:31 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\create_PO.php 80
ERROR - 2022-10-15 10:03:58 --> 404 Page Not Found: PurchaseOrderCtrl/gen_manage
ERROR - 2022-10-15 10:22:07 --> 404 Page Not Found: PurchaseOrderCtrl/gen_manage
ERROR - 2022-10-15 10:32:56 --> Severity: Notice --> Undefined property: CI_DB_mysqli_result::$result C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 127
ERROR - 2022-10-15 10:32:56 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 127
ERROR - 2022-10-15 10:39:33 --> 404 Page Not Found: PurchaseOrderCtrl/branch_manage_po
ERROR - 2022-10-15 10:39:37 --> Severity: Notice --> Undefined variable: get_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 6
ERROR - 2022-10-15 10:39:37 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 6
ERROR - 2022-10-15 10:39:37 --> Severity: Notice --> Undefined variable: display_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 10
ERROR - 2022-10-15 10:39:37 --> Severity: Notice --> Undefined variable: get_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 19
ERROR - 2022-10-15 10:39:37 --> Severity: Notice --> Trying to get property 'purchase_request_no' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 19
ERROR - 2022-10-15 10:39:37 --> Severity: Notice --> Undefined variable: select C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 30
ERROR - 2022-10-15 10:39:37 --> Severity: Notice --> Trying to get property 'supplier_name' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 30
ERROR - 2022-10-15 10:39:37 --> Severity: Notice --> Undefined variable: view C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 59
ERROR - 2022-10-15 10:39:37 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 59
ERROR - 2022-10-15 10:39:37 --> Severity: Notice --> Undefined variable: row C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 80
ERROR - 2022-10-15 10:39:37 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 80
ERROR - 2022-10-15 10:40:18 --> 404 Page Not Found: PurchaseOrderCtrl/branch_manage_po
ERROR - 2022-10-15 10:40:24 --> 404 Page Not Found: PurchaseOrderCtrl/branch_manage_po
ERROR - 2022-10-15 10:41:04 --> Query error: Column 'branch_id' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl_purchase_no` AS `purc`
JOIN `tbl_purchase_order` AS `order` ON `purc`.`purchase_request_id` = `order`.`PO_ID`
WHERE `branch_id` = '1'
ERROR - 2022-10-15 10:41:10 --> Query error: Column 'branch_id' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl_purchase_no` AS `purc`
JOIN `tbl_purchase_order` AS `order` ON `purc`.`purchase_request_id` = `order`.`PO_ID`
WHERE `branch_id` = '1'
AND  `PO_ID` LIKE '%p%' ESCAPE '!'
ERROR - 2022-10-15 10:41:13 --> Query error: Column 'branch_id' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl_purchase_no` AS `purc`
JOIN `tbl_purchase_order` AS `order` ON `purc`.`purchase_request_id` = `order`.`PO_ID`
WHERE `branch_id` = '1'
ERROR - 2022-10-15 10:41:18 --> Query error: Column 'branch_id' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl_purchase_no` AS `purc`
JOIN `tbl_purchase_order` AS `order` ON `purc`.`purchase_request_id` = `order`.`PO_ID`
WHERE `branch_id` = '1'
ERROR - 2022-10-15 10:42:02 --> Query error: Unknown column 'purch.branch_id' in 'where clause' - Invalid query: SELECT *
FROM `tbl_purchase_no` AS `purc`
JOIN `tbl_purchase_order` AS `order` ON `purc`.`purchase_request_id` = `order`.`PO_ID`
WHERE `purch`.`branch_id` = '1'
ERROR - 2022-10-15 10:51:52 --> Severity: Notice --> Undefined property: stdClass::$Purchase_order_NO C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 148
ERROR - 2022-10-15 10:52:32 --> Severity: Notice --> Undefined property: stdClass::$Purchase_order_NO C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 148
ERROR - 2022-10-15 10:53:21 --> Severity: Notice --> Undefined property: stdClass::$Purchase_order_NO C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 148
ERROR - 2022-10-15 10:55:21 --> Severity: Notice --> Undefined property: stdClass::$Purchase_order_NO C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 149
ERROR - 2022-10-15 11:02:33 --> Query error: Unknown column 'tbl_purchase_no.supplier_id' in 'on clause' - Invalid query: SELECT `order`.*
FROM `tbl_purchase_no` AS `purc`
JOIN `tbl_purchase_order` AS `order` ON `purc`.`purchase_request_id` = `order`.`PO_ID`
JOIN `tbl_supplier` ON `tbl_purchase_no`.`supplier_id` = `tbl_supplier`.`supplier_id`
WHERE `order`.`branch_id` = '1'
ERROR - 2022-10-15 11:03:38 --> Severity: Notice --> Undefined property: stdClass::$supplier_name C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 151
ERROR - 2022-10-15 11:59:45 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 7
ERROR - 2022-10-15 11:59:45 --> Severity: Notice --> Trying to get property 'supplier_name' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 7
ERROR - 2022-10-15 12:06:40 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 210
ERROR - 2022-10-15 12:06:40 --> Severity: Notice --> Trying to get property 'Purchase_order_No' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 7
ERROR - 2022-10-15 12:06:40 --> Severity: Notice --> Trying to get property 'purchase_request_no' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 10
ERROR - 2022-10-15 13:01:10 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 13:01:10 --> Severity: Notice --> Undefined variable: count C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\navbar.php 135
ERROR - 2022-10-15 13:01:10 --> Severity: Notice --> Undefined variable: count C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\navbar.php 141
ERROR - 2022-10-15 14:17:59 --> Severity: error --> Exception: Class 'Mpdf\Mpdf' not found C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 222
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 7
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Trying to get property 'Purchase_order_No' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 7
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 8
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Trying to get property 'purchase_request_no' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 8
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 9
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Trying to get property 'date_issued' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 9
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 10
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Trying to get property 'supplier_name' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 10
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Trying to get property 'street' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Trying to get property 'barangay' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Trying to get property 'city' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Trying to get property 'province' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 18
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Trying to get property 'contact' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 18
ERROR - 2022-10-15 14:23:46 --> Severity: Notice --> Undefined variable: get_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 42
ERROR - 2022-10-15 14:23:46 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 42
ERROR - 2022-10-15 14:23:47 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 14:24:12 --> Severity: error --> Exception: Too few arguments to function PurchaseOrderCtrl::print(), 0 passed in C:\xampp\htdocs\iDrive_Driving_Tutorial.com\system\core\CodeIgniter.php on line 533 and exactly 1 expected C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 220
ERROR - 2022-10-15 14:26:18 --> Severity: error --> Exception: WriteHTML() requires $html be an integer, float, string, boolean or an object with the __toString() magic method. C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Mpdf.php 13213
ERROR - 2022-10-15 14:30:43 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 14:34:08 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 14:38:06 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 7
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Trying to get property 'Purchase_order_No' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 7
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 8
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Trying to get property 'purchase_request_no' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 8
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 9
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Trying to get property 'date_issued' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 9
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 10
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Trying to get property 'supplier_name' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 10
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Trying to get property 'street' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Trying to get property 'barangay' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Trying to get property 'city' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Trying to get property 'province' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 18
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Trying to get property 'contact' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 18
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: get_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 42
ERROR - 2022-10-15 14:41:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 42
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Undefined variable: row C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 63
ERROR - 2022-10-15 14:41:19 --> Severity: Notice --> Trying to get property 'PO_ID' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 63
ERROR - 2022-10-15 14:41:20 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 7
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Trying to get property 'Purchase_order_No' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 7
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 8
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Trying to get property 'purchase_request_no' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 8
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 9
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Trying to get property 'date_issued' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 9
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 10
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Trying to get property 'supplier_name' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 10
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Trying to get property 'street' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Trying to get property 'barangay' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 15
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Trying to get property 'city' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Trying to get property 'province' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 16
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 18
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Trying to get property 'contact' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 18
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: get_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 42
ERROR - 2022-10-15 14:42:56 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 42
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Undefined variable: row C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 63
ERROR - 2022-10-15 14:42:56 --> Severity: Notice --> Trying to get property 'PO_ID' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\View_PO.php 63
ERROR - 2022-10-15 14:42:57 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 14:43:11 --> Severity: Notice --> Undefined variable: get_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 6
ERROR - 2022-10-15 14:43:11 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 6
ERROR - 2022-10-15 14:43:11 --> Severity: Notice --> Undefined variable: display_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 10
ERROR - 2022-10-15 14:43:11 --> Severity: Notice --> Undefined variable: get_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 19
ERROR - 2022-10-15 14:43:11 --> Severity: Notice --> Trying to get property 'purchase_request_no' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 19
ERROR - 2022-10-15 14:43:11 --> Severity: Notice --> Undefined variable: select C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 30
ERROR - 2022-10-15 14:43:11 --> Severity: Notice --> Trying to get property 'supplier_name' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 30
ERROR - 2022-10-15 14:43:11 --> Severity: Notice --> Undefined variable: view C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 59
ERROR - 2022-10-15 14:43:11 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 59
ERROR - 2022-10-15 14:43:11 --> Severity: Notice --> Undefined variable: row C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 80
ERROR - 2022-10-15 14:43:11 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 80
ERROR - 2022-10-15 14:44:43 --> Severity: Notice --> Undefined variable: get_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 6
ERROR - 2022-10-15 14:44:43 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 6
ERROR - 2022-10-15 14:44:43 --> Severity: Notice --> Undefined variable: display_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 10
ERROR - 2022-10-15 14:44:43 --> Severity: Notice --> Undefined variable: get_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 19
ERROR - 2022-10-15 14:44:43 --> Severity: Notice --> Trying to get property 'purchase_request_no' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 19
ERROR - 2022-10-15 14:44:43 --> Severity: Notice --> Undefined variable: select C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 30
ERROR - 2022-10-15 14:44:43 --> Severity: Notice --> Trying to get property 'supplier_name' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 30
ERROR - 2022-10-15 14:44:43 --> Severity: Notice --> Undefined variable: view C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 59
ERROR - 2022-10-15 14:44:43 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 59
ERROR - 2022-10-15 14:44:43 --> Severity: Notice --> Undefined variable: row C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 80
ERROR - 2022-10-15 14:44:43 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 80
ERROR - 2022-10-15 14:44:54 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 14:48:13 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 14:49:28 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 14:57:46 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:04:53 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:06:22 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:07:14 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:07:40 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:12:00 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:14:42 --> Query error: Table 'idrive_database.tbl_tbl' doesn't exist - Invalid query: SELECT *
FROM `tbl_purchase_no` AS `purc`
JOIN `tbl_purchase_order` AS `order` ON `purc`.`purchase_request_id` = `order`.`PO_ID`
JOIN `tbl_supplier` AS `supplier` ON `purc`.`supplier_id` = `supplier`.`supplier_id`
JOIN `tbl_tbl` AS `branch` ON `purc`.`branch_id` = `branch`.`branch_id`
WHERE `PO_ID` = '1'
ERROR - 2022-10-15 15:14:45 --> Query error: Table 'idrive_database.tbl_tbl' doesn't exist - Invalid query: SELECT *
FROM `tbl_purchase_no` AS `purc`
JOIN `tbl_purchase_order` AS `order` ON `purc`.`purchase_request_id` = `order`.`PO_ID`
JOIN `tbl_supplier` AS `supplier` ON `purc`.`supplier_id` = `supplier`.`supplier_id`
JOIN `tbl_tbl` AS `branch` ON `purc`.`branch_id` = `branch`.`branch_id`
WHERE `PO_ID` = '1'
ERROR - 2022-10-15 15:15:10 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:16:17 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:20:12 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:20:50 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:21:17 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:21:46 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:22:26 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:22:56 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:23:23 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:25:47 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:33:07 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:34:25 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:35:31 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:44:24 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:44:59 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:45:39 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:46:37 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:46:44 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:46:54 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:47:24 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:49:57 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:49:58 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:54:27 --> 404 Page Not Found: Info/index
ERROR - 2022-10-15 15:55:37 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:55:43 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:56:02 --> 404 Page Not Found: Accounts/Roboto-Regular.ttf
ERROR - 2022-10-15 15:56:20 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:56:28 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:56:55 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 15:59:53 --> Severity: Warning --> require_once(C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers/vendor/autoload.php): failed to open stream: No such file or directory C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 3
ERROR - 2022-10-15 15:59:53 --> Severity: Compile Error --> require_once(): Failed opening required 'C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers/vendor/autoload.php' (include_path='C:\xampp\php\PEAR') C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 3
ERROR - 2022-10-15 16:01:15 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 16:01:53 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 16:06:33 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 16:07:08 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 16:07:13 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 16:10:55 --> Severity: error --> Exception: WriteHTML() requires $html be an integer, float, string, boolean or an object with the __toString() magic method. C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Mpdf.php 13213
ERROR - 2022-10-15 16:11:21 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 16:11:28 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 16:11:41 --> Severity: error --> Exception: WriteHTML() requires $html be an integer, float, string, boolean or an object with the __toString() magic method. C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Mpdf.php 13213
ERROR - 2022-10-15 16:19:09 --> Severity: error --> Exception: WriteHTML() requires $html be an integer, float, string, boolean or an object with the __toString() magic method. C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Mpdf.php 13213
ERROR - 2022-10-15 16:19:29 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 16:19:34 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 17:28:03 --> Severity: Notice --> Undefined variable: get_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 6
ERROR - 2022-10-15 17:28:03 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 6
ERROR - 2022-10-15 17:28:03 --> Severity: Notice --> Undefined variable: display_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 10
ERROR - 2022-10-15 17:28:03 --> Severity: Notice --> Undefined variable: get_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 19
ERROR - 2022-10-15 17:28:03 --> Severity: Notice --> Trying to get property 'purchase_request_no' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 19
ERROR - 2022-10-15 17:28:03 --> Severity: Notice --> Undefined variable: select C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 30
ERROR - 2022-10-15 17:28:03 --> Severity: Notice --> Trying to get property 'supplier_name' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 30
ERROR - 2022-10-15 17:28:03 --> Severity: Notice --> Undefined variable: view C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 59
ERROR - 2022-10-15 17:28:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 59
ERROR - 2022-10-15 17:28:03 --> Severity: Notice --> Undefined variable: row C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 80
ERROR - 2022-10-15 17:28:03 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 80
ERROR - 2022-10-15 17:53:21 --> Severity: Notice --> Undefined variable: view_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\print_po.php 50
ERROR - 2022-10-15 17:53:21 --> Severity: Notice --> Trying to get property 'Purchase_order_No' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\print_po.php 50
ERROR - 2022-10-15 18:27:52 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:28:51 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:29:20 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:29:32 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:29:52 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:32:07 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:42:14 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:45:29 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:45:41 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:50:32 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:52:17 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:54:26 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:55:23 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:56:13 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:58:06 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 18:59:56 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 19:02:23 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 19:06:02 --> Severity: Notice --> Undefined variable: get_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 6
ERROR - 2022-10-15 19:06:02 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 6
ERROR - 2022-10-15 19:06:02 --> Severity: Notice --> Undefined variable: display_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 10
ERROR - 2022-10-15 19:06:02 --> Severity: Notice --> Undefined variable: get_code C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 19
ERROR - 2022-10-15 19:06:03 --> Severity: Notice --> Trying to get property 'purchase_request_no' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 19
ERROR - 2022-10-15 19:06:03 --> Severity: Notice --> Undefined variable: select C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 30
ERROR - 2022-10-15 19:06:03 --> Severity: Notice --> Trying to get property 'supplier_name' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 30
ERROR - 2022-10-15 19:06:03 --> Severity: Notice --> Undefined variable: view C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 59
ERROR - 2022-10-15 19:06:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 59
ERROR - 2022-10-15 19:06:03 --> Severity: Notice --> Undefined variable: row C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 80
ERROR - 2022-10-15 19:06:03 --> Severity: Notice --> Trying to get property 'purchase_request_id' of non-object C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\Branch_create_PO.php 80
ERROR - 2022-10-15 19:14:42 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 19:16:31 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 19:16:31 --> Severity: Notice --> Undefined variable: get_po C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\print_po.php 83
ERROR - 2022-10-15 19:16:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\Purchase_Order\print_po.php 83
ERROR - 2022-10-15 19:16:33 --> Severity: Notice --> Undefined offset: 3 C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Color\ColorConverter.php 244
ERROR - 2022-10-15 19:16:52 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 19:18:51 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 19:19:50 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 19:20:22 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 19:21:05 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 19:22:46 --> Severity: Notice --> Undefined variable: title C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\views\templates\header.php 9
ERROR - 2022-10-15 20:21:54 --> Severity: Notice --> Undefined property: CI_Loader::$library C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 112
ERROR - 2022-10-15 20:21:54 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 112
ERROR - 2022-10-15 20:22:29 --> Severity: Notice --> Undefined property: CI_Loader::$library C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 112
ERROR - 2022-10-15 20:22:29 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 112
ERROR - 2022-10-15 20:29:50 --> Severity: Notice --> Undefined property: CI_Loader::$library C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 112
ERROR - 2022-10-15 20:29:50 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 112
ERROR - 2022-10-15 20:32:32 --> Severity: Notice --> Undefined property: CI_Loader::$library C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 112
ERROR - 2022-10-15 20:32:32 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 112
ERROR - 2022-10-15 20:32:32 --> Severity: Notice --> Undefined variable: config C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:32 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:32 --> Severity: Notice --> Undefined property: PurchaseOrderCtrl::$uri_ C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:32 --> Severity: error --> Exception: Call to undefined function segment() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:41 --> Severity: Notice --> Undefined variable: config C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:41 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:41 --> Severity: Notice --> Undefined property: PurchaseOrderCtrl::$uri_ C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:41 --> Severity: error --> Exception: Call to undefined function segment() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:42 --> Severity: Notice --> Undefined variable: config C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:42 --> Severity: Notice --> Trying to access array offset on value of type null C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:42 --> Severity: Notice --> Undefined property: PurchaseOrderCtrl::$uri_ C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:32:42 --> Severity: error --> Exception: Call to undefined function segment() C:\xampp\htdocs\iDrive_Driving_Tutorial.com\application\controllers\PurchaseOrderCtrl.php 134
ERROR - 2022-10-15 20:40:27 --> Severity: error --> Exception: Incorrect output destination P C:\xampp\htdocs\iDrive_Driving_Tutorial.com\vendor\mpdf\mpdf\src\Mpdf.php 9640
ERROR - 2022-10-15 20:44:46 --> 404 Page Not Found: PurchaseOrderCtrl/branch_manage_po
