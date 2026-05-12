<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP AJAX CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <h3>Add User</h3>
            <form id="userForm" class="card card-body shadow-sm">
                <div class="mb-3">
                    <input type="hidden" id="userId" name="id">
                    <!--name input field-->
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name"  id="name" class="form-control" placeholder="Enter name" required>
                </div>
                <div class="mb-3">
                    <!-- email input field -->
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email"  id="email" class="form-control" placeholder="Enter email" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>

        <div class="col-md-8">
            <h3>User List</h3>
            <table class="table table-bordered table-striped bg-white shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <!-- AJAX will inject data in this tabel  container -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- jQuery CDN -->
<script src="https://jquery.com"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<script src="js/app.js"></script>
 

</body>
</html>
