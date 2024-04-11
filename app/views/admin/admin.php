<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<!-- Main Content -->
<div class="container-fluid border">
<div class="container-fluid px-4 main-header d-flex justify-content-between py-2">
        <form id="searchForm">
          <input class="form-control me-1" type="search"  id="searchInput" placeholder="Search by Name" aria-label="Search" style="width:260px">
        </form>

        <div class="form-inline d-flex flex-row gap-1">
          <button type="button" class="btn btn-primary" onclick="$('#addModal').modal('show')">Create</button>
          <input type="number" id="row" style="width:80px; height: 40px;" class="form-control"/>
          <button type="button" class="btn btn-success" id="filter">Filter</button>
        </div>
      </div>
</div>

<section>
  <div class="tables container-fluid mt-1 px-5
   tbl-container d-flex flex-column justify-content-center align-content-center">
    <div class="row tbl-fixed">
      <table class="table-striped table-condensed" style="width:1920px !important;" id="myTable">
      <thead>
            <tr>

            </tr>
          </thead>
           <tbody>

          </tbody>
      </table>
    </div>
  </div>
</section>


<div class="container-fluid px-5 mb-3">
<div class="buttons d-flex align-content-end justify-content-end mt-3 px-2">
      <div class="page-of mt-2 me-2">Page <span id="current-page">1</span> of <span id="total-pages">1</span></div>
      <button id="prev-btn">Prev</button>
      <input type="number" placeholder="1" id="page-number" disabled>
      <button id="next-btn">Next</button>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" style="--bs-modal-width: 1000px !important;" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h2 class="modal-title" id="addModalLabel">Create</h2>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="actions/process_form.php">
                    <div class="row g-3" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                        <?php
                            include '../connection/connect.php';

                            $sql = "SELECT
                            COLUMN_NAME AS department_name
                            FROM INFORMATION_SCHEMA.COLUMNS
                            WHERE TABLE_NAME = 'tblproduct_transaction'
                            AND COLUMN_NAME != 'product_status'
                            AND ORDINAL_POSITION >= 2;";
                            $result = $conn->query($sql); // Execute the query

                            if ($result && $result->num_rows > 0) {
                                // Fetch column names from the database
                                $first = true; // Flag to track the first column
                                while ($row = $result->fetch_assoc()) {
                                    $department_name = $row["department_name"];
                                    ?>
                                    <div class="col-12 mb-3" style="flex: 0 0 auto; width: 200px;">
                                        <label class="form-label text-center fw-bolder w-100"><?= $department_name ?></label>
                                        <input type="text" class="form-control<?= $first ? ' required' : '' ?>" id="<?= $department_name ?>" name="<?= $department_name ?>"<?= $first ? ' required' : '' ?>>
                                    </div>
                                    <?php
                                    $first = false; // Unset flag after the first iteration
                                }
                            } else {
                                echo "<p>No results found</p>"; // Output if no results found
                            }
                        ?>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit_input" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>