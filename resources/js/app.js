import './bootstrap';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

document.addEventListener("DOMContentLoaded", function () {
    const checkInInput = document.getElementById("check_in_date");
    const checkOutInput = document.getElementById("check_out_date");

    if (checkInInput && checkOutInput) {
        flatpickr(checkInInput, {
            dateFormat: "Y-m-d",
            minDate: "today",
            disable: window.bookedDates || [],
        });

        flatpickr(checkOutInput, {
            dateFormat: "Y-m-d",
            minDate: "today",
            disable: window.bookedDates || [],
        });
    }
});
