$(document).ready(function() {
    // 1. Automatically load all records on startup
    loadData();

    // 2. CREATE: Handle form submission
    $('#userForm').on('submit', function(e) {
        e.preventDefault();
        
        // Save button text can double as an indicator if we are editing vs creating
        let submitBtn = $(this).find('button[type="submit"]');

        let userId = $('#userId').val();
         // Add a hidden field in index.php for editing later
        let targetUrl = userId ? "./ajax/update.php" : "./ajax/insert.php";

        $.ajax({
            url: targetUrl,
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.trim() === "Success") {
                    alert(userId ? "User updated successfully!" : "User added successfully!");
                    $('#userForm')[0].reset();
                   // Clear hidden ID if set
                    $('#userId').val(''); 
                    // Reset button text
                    submitBtn.text('Submit'); 
                    // Refresh list layout
                    loadData();
                     
                } else {
                    alert("Operation failed: " + response);
                }
            }
        });
    });

    //Fetch all user records from database
    function loadData() {
        $.ajax({
            url: "./ajax/fecth.php", 
            type: "GET",
            dataType: "json",
            success: function(data) {
                let rows = "";
                if(data.length === 0) {
                    rows = `<tr><td colspan="4" class="text-center">No records found</td></tr>`;
                } else {
                    $.each(data, function(key, value) {
                        rows += `<tr>
                            <td>${value.id}</td>
                            <td>${value.name}</td>
                            <td>${value.email}</td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-btn" data-id="${value.id}" data-name="${value.name}" data-email="${value.email}">Edit</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="${value.id}">Delete</button>
                            </td>
                        </tr>`;
                    });
                }
                $('#userData').html(rows);
            },
            error: function(xhr, status, error) {
                console.error("Data fetch error: " + error);
            }
        });
    }

    // Click Edit to populate the form inputs
    $(document).on('click', '.edit-btn', function() {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let email = $(this).data('email');

        // Dynamically put values back into the form fields
        $('#name').val(name);
        $('#email').val(email);
        
        // Ensure you add <input type="hidden" id="userId" name="id"> inside your #userForm in index.php
        if($('#userId').length === 0) {
            $('#userForm').append(`<input type="hidden" id="userId" name="id" value="${id}">`);
        } else {
            $('#userId').val(id);
        }
        
        $('#userForm').find('button[type="submit"]').text('Update User');
    });

    // this logci is for deleting the record with particular id
    $(document).on('click', '.delete-btn', function() {
        if (confirm("Are you sure you want to delete this record?")) {
            let id = $(this).data('id');

            $.ajax({
                url: "./ajax/delete.php",
                type: "POST",
                data: { id: id },
                success: function(response) {
                    if (response.trim() === "Success") {
                        alert("User removed successfully.");
                        loadData(); // Re-render table items
                    } else {
                        alert("Delete action failed: " + response);
                    }
                }
            });
        }
    });
});
