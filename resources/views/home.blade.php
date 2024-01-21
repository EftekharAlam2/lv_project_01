<x-app-layout>
    <html>
<head>
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="m-5">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Employee Info
        </button>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="employeeForm" method="post" action="{{ route('add.employee') }}" enctype="multipart/form-data">
                @csrf
                <div id="employeeForms" class="mt-4">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" name="number" >
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                    
                    <!-- <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-success" onclick="addEmployeeForm()">Add Another Employee Form</button>
                        <button type="button" class="btn btn-danger" onclick="removeEmployeeForm()">Remove Form</button>
                    </div> -->
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
                
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
    </table>

    <!-- <form method="post" action="logout.php">
        <button class="btn btn-info" type="submit" name="logout">Logout</button>
    </form> -->
    <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-info">
                {{ __('Log Out') }}
            </button>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>
