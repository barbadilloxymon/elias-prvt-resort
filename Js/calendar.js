const today = new Date(); // Store the initial load date
let selectedDates = []; // Array to store selected dates
let checkInDate = null; // Variable to store the check-in date
let checkOutDate = null; // Variable to store the check-out date

const renderCalendar = () => {
    const date = new Date(today.getFullYear(), today.getMonth(), 1); // Set to the first of the current month

    const monthDays = document.querySelector(".days");

    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();

    const prevLastDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();

    const firstDayIndex = date.getDay();

    const lastDayIndex = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDay();

    const nextDays = 7 - lastDayIndex - 1;

    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    document.querySelector(".date h1").innerHTML = months[date.getMonth()];
    document.querySelector(".date p").innerHTML = today.toDateString(); // Set to today's date

    let days = "";

    for (let x = firstDayIndex; x > 0; x--) {
        days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
    }

    for (let i = 1; i <= lastDay; i++) {
        const dateStr = `${date.getFullYear()}-${("0" + (date.getMonth() + 1)).slice(-2)}-${("0" + i).slice(-2)}`;
        let classStr = "";
        let hoverClass = "";

        if (selectedDates.includes(dateStr)) {
            classStr = "selected";
            hoverClass = "hover"; // Add 'hover' class for selected dates
        }

        if (dateStr === checkInDate || dateStr === checkOutDate) {
            hoverClass = "hover";
        }

        days += `<div class="day ${classStr} ${hoverClass}" data-date="${dateStr}">${i}</div>`;
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="next-date">${j}</div>`;
    }

    monthDays.innerHTML = days;

    // Update hover effect for selected dates
    const dayElements = monthDays.querySelectorAll('.day');
    dayElements.forEach(day => {
        day.addEventListener('mouseenter', () => {
            const dateStr = day.dataset.date;
            if (selectedDates.includes(dateStr)) {
                day.classList.add('hover');
            }
        });
        day.addEventListener('mouseleave', () => {
            const dateStr = day.dataset.date;
            if (selectedDates.includes(dateStr)) {
                day.classList.remove('hover');
            }
        });
    });
};

const toggleDateSelection = (event) => {
    const target = event.target;
    if (target.classList.contains("day")) {
        const dateStr = target.dataset.date;
        const clickedDate = new Date(dateStr);
        const todayDate = new Date(2024, 4, 8); // May 8, 2024

        // Allow selection for dates starting from May 8, 2024
        if (clickedDate >= todayDate) {
            const index = selectedDates.indexOf(dateStr);
            if (index === -1) {
                selectedDates.push(dateStr);
                target.classList.add("selected");
                target.classList.add("hover"); // Add hover effect when selected
            } else {
                selectedDates.splice(index, 1);
                target.classList.remove("selected");
                target.classList.remove("hover"); // Remove hover effect when unselected
            }
        }
    }
};

document.querySelector(".prev").addEventListener("click", () => {
    today.setMonth(today.getMonth() - 1);
    renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
    today.setMonth(today.getMonth() + 1);
    renderCalendar();
});

document.querySelector(".days").addEventListener("click", toggleDateSelection);

renderCalendar();
