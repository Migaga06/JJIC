<?php

class Make_transaction_pdf extends Controller
{
  public function index()
  {

    $reserve = new Reserve();
    $rows_d = $reserve->viewDoneReserve();

    ?>
    <head>
    <style>
        * {
            /* Change your font family */
            font-family: sans-serif;
        }

        h2{
            color: #606060;
        }

        .content-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .content-table thead tr {
            background-color: #606060;
            color: white;
            text-align: left;
            font-weight: bold;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
            border: 1px solid #999;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #606060;
        }

        .content-table tbody tr.active-row {
            font-weight: bold;
            color: #404040;
        }
    </style>
    </head>

    <body style="margin-left: 140px; margin-top: 30px">

            <?php if($rows_d != null) { ?>

                <h2>Transaction Done</h2>
                <table class="content-table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Reserve Status</th>
                    </tr>
                </thead>
                    <?php foreach ($rows_d as $index => $item) { ?>
                <tbody>
                    <tr class="active-row">
                        <td ><?= $item->firstname?> <?= $item->lastname?></td>
                        <td ><?= $item->email?></td>
                        <td ><?= $item->product_name?></td>
                        <td><?= $item->product_type ?></td>
                        <td><i class="fa fa-peso-sign"></i> <?= $item->product_price ?></td>
                        <td><?= $item->product_qty ?></td>
                        <td ><?= $item->reserve_status?></td>
                    </tr>
                </tbody>
                    <?php } ?>
                </table>
            <?php } else { ?>

            <div class="container-fluid rounded-2 bg-dark p-2" style = "background-color: rgba(255, 51, 51, 1);">
                <h3 class = "text-white text-center">Currently don't have any transaction done in reserve!!</h3>
            </div>

            <?php } ?>

    </body>
    <?php
  }
}