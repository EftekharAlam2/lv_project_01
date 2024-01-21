<x-app-layout>
    <html>
<head>
    <title>Home Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    <!-- <div class="mb-3">
                        <label for="number" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" name="number" >
                    </div> -->
                    <div class="mb-3">
                    <label for="number" class="form-label">Phone Number</label>
                    <!-- <div id="numberContainer">
                        <input type="number" id="number" class="form-control" name="numbers[]" value="{{ old('numbers.0') }}" autofocus autocomplete="name">
                        <button type="button" class="btn btn-outline-primary" onclick="addNumberField()">Add Number</button>
                    </div> -->
                    <div id="numberContainer">
                        @foreach(old('numbers', []) as $number)
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="numbers[]" value="{{ $number }}" autocomplete="name">
                                    <button type="button" class="btn btn-outline-danger" onclick="removeNumberField(this)">Remove</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-primary" onclick="addNumberField()">Add Number</button>
                        @error('numbers.*')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    <!-- @error('numbers.*')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div> -->

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                    <div class="mb-3">
                        <label for="district" class="form-label">District</label>
                        <select class="form-select" id="district" name="district" onchange="fetchUpazilas(this.value)"></select>
                    </div>

                    <div class="mb-3">
                        <label for="upazila" class="form-label">Upazila</label>
                        <select class="form-select" id="upazila" name="upazila"></select>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="village" class="form-label">Village</label>
                        <select class="form-select" id="village" name="village"></select>
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
            </tr>
        </thead>
    </table>
    
    <script>
        function fetchLocations() {
            $.ajax({
                url: "{{ route('get.locations') }}",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    populateSelectOptions("#district", data.districts);
                    // populateSelectOptions("#upazila", data.upazilas);
                    // populateSelectOptions("#village", data.villages);
                    fetchUpazilas($('#district').val());
                }
            });
        }

        function fetchUpazilas(district) {
            $.ajax({
                url: "{{ route('get.upazilas') }}",
                type: "GET",
                dataType: "json",
                data: { district: district },
                success: function (data) {
                    populateSelectOptions("#upazila", data.upazilas);
                }
            });
        }


        

        function populateSelectOptions(selector, options) {
            const selectElement = $(selector);
            selectElement.empty();
            $.each(options, function (key, value) {
                selectElement.append('<option value="' + value + '">' + value + '</option>');
            });
        }

        $('#staticBackdrop').on('shown.bs.modal', function () {
            fetchLocations();
        });

        const maxNumberFields = 3;

        function addNumberField() {
            const container = document.getElementById('numberContainer');
            const numberFields = container.querySelectorAll('.input-group');

            if (numberFields.length < maxNumberFields) {
            const newInput = document.createElement('div');
            newInput.className = 'input-group mb-3';
            newInput.innerHTML = `
                <input type="number" class="form-control" name="numbers[]" autocomplete="username">
                <button type="button" class="btn btn-outline-danger" onclick="removeNumberField(this)">Remove</button>
            `;
            container.appendChild(newInput);
            }
        }

        function removeNumberField(button) {
            const container = document.getElementById('numberContainer');
            container.removeChild(button.parentElement);
          }


</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>
