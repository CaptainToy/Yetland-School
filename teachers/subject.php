<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
         <link rel="stylesheet" href="../admin/css/main.css">

        <title>Sidebar menu responsive</title>
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

                       
                        <a href="./Class.html" class="nav__link ">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Student</span>
                        </a>
                        
                        <a href="./subject.html" class="nav__link active">
                            <i class='bx bx-book nav__icon' ></i>
                            <span class="nav__name">Subject</span>
                        </a>

                       

                        <a href="./result.html" class="nav__link">
                            <i class='bx bx-folder nav__icon' ></i>
                            <span class="nav__name">Result</span>
                        </a>

                      
                    </div>
                </div>

                <a href="../login.html" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

        <h2>Subject</h2>
        <button class="btn"><a href="./AddSubject.html">+Subject</a></button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Delete</th>

    
                </tr>
            </thead>
            <tbody>
                 <tr>
                    <td>1</td>
                    <td>English language</td>
                    <td><a href="./DeleteSubject.html" class="btn danger"><i class='bx bx-trash nav__icon' ></i></a></td>
                   
                    
    
                 </tr>
                
                
                 
            </tbody>
        </table>
        <!--===== MAIN JS =====-->
        <script src="../admin/js/main.js"></script>
    </body>
</html>