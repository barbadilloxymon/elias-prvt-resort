<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar Availability</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="Css/calendar.css">
</head>
<body>

    <header class="header">
        <a href="index.php" class="logo"> <i class="fas fa-house-flood-water"></i>Elias Resort</a>
    </header>
    
    <div class="container">
      
      <form action="booking form.php">
        <div class="check-in-out">
            <div class="checkin-in-container">
                <p>Check in <span>*</span></p>
                <input type="date" class="input" required>
            </div>
        
            <div class="checkin-out-container">
                <p>Check out <span>*</span></p>
                <input type="date" class="input" required>
            </div>
            </div>
          <input type="submit" class="btn" value="CONTINUE">
      </form>
        

        <div class="calendar">
            <div class="month">
                <i class="fas fa-angle-left prev"></i>
                <div class="date">
                    <h1>April</h1>
                    <p>Fri April 13, 2024</p>
                </div>
                <i class="fas fa-angle-right next"></i>
            </div>

            <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            
            <div class="days">
                <div class="pre-date">31</div>
                <div>1</div>
                <div>2</div>
                <div>3</div>
                <div>4</div>
                <div>5</div>
                <div>6</div>
                <div>7</div>
                <div>8</div>
                <div>9</div>
                <div>10</div>
                <div>11</div>
                <div>12</div>
                <div>13</div>
                <div>14</div>
                <div>15</div>
                <div>16</div>
                <div>17</div>
                <div>18</div>
                <div>19</div>
                <div>20</div>
                <div>21</div>
                <div>22</div>
                <div>23</div>
                <div>24</div>
                <div>25</div>
                <div>26</div>
                <div>27</div>
                <div>28</div>
                <div>29</div>
                <div>30</div>
                <div class="next-date">1</div>
                <div class="next-date">2</div>
                <div class="next-date">3</div>
                <div class="next-date">4</div>
            </div>
        </div>

        <div class="color_availability">
            <div class="colorBox">
                <div class="color-box color-available"></div>
                <span>Available Date</span>
            </div>
            <div class="colorBox">
                <div class="color-box color-not-available"></div>
                <span>Not Available</span>
            </div>
            <div class="colorBox">
                <div class="color-box color-check-in"></div>
                <span>Check-in Date</span>
            </div>
            <div class="colorBox">
                <div class="color-box color-check-out"></div>
                <span>Check-out Date</span>
            </div>
        </div>
    </div>

    

    <!-- Javascript -->
    <script src="Js/calendar.js"></script>
      
</body>
</html>
