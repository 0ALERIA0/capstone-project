<div class="wrapper">
    <?php
    // Function to generate the calendar HTML
    function generateCalendar($month, $year) {
        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
        $totalDaysOfMonth = date('t', $firstDayOfMonth);
        $dateComponents = getdate($firstDayOfMonth);
        $monthName = $dateComponents['month'];
        $dayOfWeek = $dateComponents['wday'];

        // Get current date
        $currentDay = date('j');
        $currentMonth = date('n');
        $currentYear = date('Y');

        // Create an array of day names
        $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

        // Start table and create table header
        $calendar = "<table class='table-calendar'>";
        $calendar .= "<thead><tr>";
        foreach ($daysOfWeek as $day) {
            $calendar .= "<th>$day</th>";
        }
        $calendar .= "</tr></thead>";
        $calendar .= "<tbody><tr>";

        // Fill in blank cells for the first week
        for ($i = 0; $i < $dayOfWeek; $i++) {
            $calendar .= "<td></td>";
        }

        $dayCounter = 1;
        $month = str_pad($month, 2, "0", STR_PAD_LEFT); // Add leading zeros if needed
        while ($dayCounter <= $totalDaysOfMonth) {
            if ($dayOfWeek == 7) { // Start a new row if it's Sunday
                $dayOfWeek = 0;
                $calendar .= "</tr><tr>";
            }
            $dayRel = str_pad($dayCounter, 2, "0", STR_PAD_LEFT); // Add leading zeros if needed
            $date = "$year-$month-$dayRel";

            // Check if it's the current day
            $isToday = ($dayCounter == $currentDay && $month == $currentMonth && $year == $currentYear);

            // Add class for today
            $class = $isToday ? "class='today'" : "";

            $calendar .= "<td data-date='$dayCounter' data-month='$month' data-year='$year' $class>$dayCounter</td>";
            $dayCounter++;
            $dayOfWeek++;
        }

        // Fill in blank cells for the last week
        if ($dayOfWeek != 7) {
            $remainingDays = 7 - $dayOfWeek;
            for ($i = 0; $i < $remainingDays; $i++) {
                $calendar .= "<td></td>";
            }
        }

        $calendar .= "</tr></tbody>";
        $calendar .= "</table>";

        return $calendar;
    }

    // Get current month and year
    $currentMonth = date('n');
    $currentYear = date('Y');

    // Handle navigation
    if (isset($_GET['month']) && isset($_GET['year'])) {
        $currentMonth = $_GET['month'];
        $currentYear = $_GET['year'];
    }

    // Generate calendar HTML
    $calendarHTML = generateCalendar($currentMonth, $currentYear);

    // Display calendar
    echo '<h2 id="monthAndYear">' . date('F Y', mktime(0, 0, 0, $currentMonth, 1, $currentYear)) . "</h2>";
    echo "<a href='?month=" . ($currentMonth - 1) . "&year=$currentYear'><button id='next'>&raquo;</button></a>";
    echo "<a href='?month=" . ($currentMonth + 1) . "&year=$currentYear'><button id='previous'>&laquo;</button></a>";

    echo "<br><br>";
    echo $calendarHTML;

    // Jump to specific month and year
    echo "<form method='GET'>";
    echo "<button class='jump-button' type='submit' value='Jump'>Jump to: </button>";
    echo "<select class='select-date' name='month'>";
    for ($i = 1; $i <= 12; $i++) {
        echo "<option value='$i'" . ($i == $currentMonth ? ' selected' : '') . ">" . date('F', mktime(0, 0, 0, $i, 1, 2000)) . "</option>";
    }
    echo "</select>";
    echo "<select class='select-date' name='year'>";
    for ($i = date('Y') - 10; $i <= date('Y') + 10; $i++) {
        echo "<option value='$i'" . ($i == $currentYear ? ' selected' : '') . ">$i</option>";
    }
    echo "</select>";

    echo "</form>";

    // Back to current date button
    echo "<a href='?month=" . date('n') . "&year=" . date('Y') . "'><button id='back-to-current-date'>Back to Current Date</button></a>";
    ?>

</div>
