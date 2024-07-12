$(document).ready(function () {
    $("#myForm").submit(function (event) {
        event.preventDefault();

        // Get values from the form
        var currentYear = parseInt($("#current_year").val());
        var currentSemester = parseInt($("#current_semester").val());
        var departmentName = $("#department_name").val();

        // Perform logic to update values
        if (currentSemester < 8) {
            currentSemester += 1;

            // Check conditions and update current_year
            if (currentSemester === 3) {
                currentYear = 2;
            } else if (currentSemester === 5) {
                currentYear = 3;
            } else if (currentSemester === 7) {
                currentYear = 4;
            }

            // Update form fields
            $("#current_semester").val(currentSemester);
            $("#current_year").val(currentYear);

            // Send data to server (you need to implement the server-side code)
            $.ajax({
                type: "POST",
                url: "class.php",
                data: {
                    currentYear: currentYear,
                    currentSemester: currentSemester,
                    departmentName: departmentName
                },
                success: function (response) {
                    console.log(response);
                    // Handle the server response if needed
                },
                error: function (error) {
                    console.error(error);
                }
            });
        } else {
            alert("Semester cannot exceed 8");
        }
    });
});
