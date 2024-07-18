<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
         <link rel="stylesheet" href="./css/main.css">

        <title>Teachers Document</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
                <img src="assets/img/perfil.jpg" alt="">
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">Yetland's Admin</span>
                    </a>

                    <div class="nav__list">
                        

                        <a href="./Teacher.php" class="nav__link active">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Teachers</span>
                        </a>
                        
                        <a href="./student.php" class="nav__link">
                            <i class='bx bx-message-square-detail nav__icon' ></i>
                            <span class="nav__name">Student</span>
                        </a>

                        <a href="./result.php" class="nav__link">
                            <i class='bx bx-bookmark nav__icon' ></i>
                            <span class="nav__name">Result</span>
                        </a>

                        <a href="./Add-post.php" class="nav__link">
                            <i class='bx bx-folder nav__icon' ></i>
                            <span class="nav__name">Post</span>
                        </a>

                        <a href="./School-fee.php" class="nav__link">
                            <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                            <span class="nav__name">School Fee</span>
                        </a>
                    </div>
                </div>

                <a href="../login.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

        <h2>Staffs Document</h2>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Edit</th>
    
                </tr>
            </thead>
            <tbody>
                 <tr>
                    <td>Koede abdulsalam</td>
                    <td>abdulsalamolukorede@gmail.com</td>
                    <td>Basic 5</td>
                    <td><a href="./editTeachers.php" class="btn sm"><i class='bx bx-file nav__icon' ></i></a></td>
                   
                    
    
                 </tr>
                
                
                 
            </tbody>
        </table>
        <!--===== MAIN JS =====-->
        <script src="./js/main.js"></script>
    </body>
</html>