<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('admin-assets')}}/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('admin-assets')}}/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset('admin-assets')}}/assets/demo/chart-area-demo.js"></script>
<script src="{{asset('admin-assets')}}/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{asset('admin-assets')}}/js/datatables-simple-demo.js"></script>
<style>
    .custom-table th:nth-child(1),
    .custom-table td:nth-child(1) {
        width: 30%;
    }
    .custom-table th:nth-child(2),
    .custom-table td:nth-child(2) {
        width: 10%;
    }

    .custom-table th:nth-child(3),
    .custom-table td:nth-child(3) {
        width: 10%;
    }

    .custom-table th:nth-child(4),
    .custom-table td:nth-child(4) {
        width: 25%;
    }

    /* Adjust other column widths here if needed */

    /* Ensure that table-layout is fixed to make column widths work */
    .custom-table {
        table-layout: fixed;
    }
</style>
