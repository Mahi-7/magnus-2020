<!DOCTYPE html>
<html lang="en">

<head>
    <title>MAGNUS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .modal-content {
            color: #000;
        }
    </style>
</head>

<body>
    <div class="site-wrap">
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <header class="site-navbar py-3 shadow-lg" role="banner">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-11 col-xl-2">
                        <h1 class="mb-0"><a href="index.html" class="text-white h2 mb-0">Mag<span class="text-primary">nus</span> </a></h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
                </div>
            </div>
        </header>
    </div>


    <div class="site-section container">
        <ul class="nav nav-tabs">
            <li class="active my-4 pr-3"><a data-toggle="tab" href="#registered">All Registered Students</a></li>
            <li class="my-4 px-5"><a data-toggle="tab" href="#events">Events</a></li>
            <li class="my-4 px-5"><a data-toggle="tab" href="#messages">Messages</a></li>
        </ul>

        <div class="tab-content">
            <div id="registered" class="tab-pane fade in active">
                <div class="my-4 mx-auto" align="center">
                    <h5>List of all registered students for MAGNUS 2020</h5>
                    <button onclick="exportTableToExcel('tblData', 'Magnus List')" class="btn btn-primary my-4 px-4 text-white">Export to Excel</button>
                </div>
                <table class="table table-dark table-striped table-bordered table-hover text-center table-responsive-md table-responsive-sm" id="tblData">
                    <?php
                    echo "<tr >";
                    echo "<th>" . "Serial" . "</th>";
                    echo "<th>" . "Name" . "</th>";
                    echo "<th>" . "Mobile" . "</th>";
                    echo "<th>" . "Events" . "</th>";
                    echo "<th>" . "Email" . "</th>";
                    echo "<th>" . "College" . "</th>";
                    echo "</tr>";
                    include 'database.php';
                    $sql1 = "select * from magnus_registration ";
                    $rec = mysqli_query($conn, $sql1);
                    while ($std = mysqli_fetch_assoc($rec)) {
                    ?>
                        <tr>
                            <?php
                            echo "<td>" . $std['serial'];
                            echo "<td>" . $std['name'];
                            echo "<td>" . $std['mobile'];
                            echo "<td>" . $std['event'];
                            echo "<td>" . $std['email'];
                            echo "<td>" . $std['college'];
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <script type="text/javascript">
                    function exportTableToExcel(tableID, filename = '') {
                        var downloadLink;
                        var dataType = 'application/vnd.ms-excel';
                        var tableSelect = document.getElementById(tableID);
                        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                        // Specify file name
                        filename = filename ? filename + '.xls' : 'excel_data.xls';

                        // Create download link element
                        downloadLink = document.createElement("a");

                        document.body.appendChild(downloadLink);

                        if (navigator.msSaveOrOpenBlob) {
                            var blob = new Blob(['\ufeff', tableHTML], {
                                type: dataType
                            });
                            navigator.msSaveOrOpenBlob(blob, filename);
                        } else {
                            // Create a link to the file
                            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                            // Setting the file name
                            downloadLink.download = filename;

                            //triggering the function
                            downloadLink.click();
                        }
                    }
                </script>
            </div>
            <div id="events" class="tab-pane fade">
                <div class="container">
                    <?php
                    function eventList($event)
                    {
                        echo "<div class='my-4 mx-auto' align='right'><button onclick='exportTableToExcel('tblData', 'Magnus List')' class='btn btn-primary my-2 px-4 text-white'>Export to Excel</button></div>";
                        echo "<table class='table table-dark table-bordered table-striped table-hover text-center table-responsive-md table-responsive-sm'>";
                        echo "<tr >";
                        echo "<th>" . "Serial" . "</th>";
                        echo "<th>" . "Name" . "</th>";
                        echo "<th>" . "Mobile" . "</th>";
                        echo "<th>" . "Events" . "</th>";
                        echo "<th>" . "Email" . "</th>";
                        echo "<th>" . "College" . "</th>";
                        echo "</tr>";
                        include 'database.php';
                        $sql1 = "select * from magnus_registration where event='$event'; ";
                        $rec = mysqli_query($conn, $sql1);
                        while ($std = mysqli_fetch_assoc($rec)) {
                    ?>
                            <tr>
                                <?php
                                echo "<td>" . $std['serial'];
                                echo "<td>" . $std['name'];
                                echo "<td>" . $std['mobile'];
                                echo "<td>" . $std['event'];
                                echo "<td>" . $std['email'];
                                echo "<td>" . $std['college'];
                                ?>
                            </tr>
                    <?php
                        }
                        echo "</table>";
                    }
                    ?>
                    <div id="accordion">
                        <div class="card bg-dark">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#cricket">
                                    Cricket
                                </a>
                            </div>
                            <div id="cricket" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <?php eventList('cricket'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#badminton">
                                    Badminton
                                </a>
                            </div>
                            <div id="badminton" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <?php eventList('badminton'); ?>

                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#football">
                                    Football
                                </a>
                            </div>
                            <div id="football" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <?php eventList('football'); ?>
                                </div>
                            </div>
                            <div class="card bg-dark">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#basketball">
                                        Basketball
                                    </a>
                                </div>
                                <div id="basketball" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <?php eventList('basketball'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-dark">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#athletics">
                                        Athletics
                                    </a>
                                </div>
                                <div id="athletics" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <?php eventList('athletics'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-dark">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#tennis">
                                        Tennis
                                    </a>
                                </div>
                                <div id="tennis" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <?php eventList('tennis'); ?>
                                    </div>
                                </div>
                                <div class="card bg-dark">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#tabletennis">
                                            Table Tennis
                                        </a>
                                    </div>
                                    <div id="tabletennis" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php eventList('tabletennis'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-dark">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#kabbadi">
                                            Kabbadi
                                        </a>
                                    </div>
                                    <div id="kabbadi" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php eventList('kabbadi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-dark">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#carrom">
                                            Carrom
                                        </a>
                                    </div>
                                    <div id="carrom" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php eventList('carrom'); ?>
                                        </div>
                                    </div>
                                    <div class="card bg-dark">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#chess">
                                                Chess
                                            </a>
                                        </div>
                                        <div id="chess" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php eventList('chess'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card bg-dark">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#hockey">
                                                Hockey
                                            </a>
                                        </div>
                                        <div id="hockey" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php eventList('hockey'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card bg-dark">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#snooker">
                                                Snooker
                                            </a>
                                        </div>
                                        <div id="snooker" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <?php eventList('snooker'); ?>
                                            </div>
                                        </div>
                                        <div class="card bg-dark">
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#swimming">
                                                    Swimming
                                                </a>
                                            </div>
                                            <div id="swimming" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <?php eventList('swimming'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card bg-dark">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#pool">
                                                    Pool
                                                </a>
                                            </div>
                                            <div id="pool" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <?php eventList('pool'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card bg-dark">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#powerlifting">
                                                    Powerlifting
                                                </a>
                                            </div>
                                            <div id="powerlifting" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <?php eventList('powerlifting'); ?>
                                                </div>
                                            </div>
                                            <div class="card bg-dark">
                                                <div class="card-header">
                                                    <a class="card-link" data-toggle="collapse" href="#volleyball">
                                                        Volleyball
                                                    </a>
                                                </div>
                                                <div id="volleyball" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <?php eventList('volleyball'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="messages" class="tab-pane fade">
                                </div>
                            </div>
                        </div>

                        <script src="js/jquery-3.3.1.min.js"></script>
                        <script src="js/jquery.min.js"></script>
                        <script src="js/jquery.table2excel.js"></script>
                        <script src="js/jquery-migrate-3.0.1.min.js"></script>
                        <script src="js/jquery-ui.js"></script>
                        <script src="js/popper.min.js"></script>
                        <script src="js/bootstrap.min.js"></script>
                        <script src="js/owl.carousel.min.js"></script>
                        <script src="js/jquery.stellar.min.js"></script>
                        <script src="js/jquery.countdown.min.js"></script>
                        <script src="js/jquery.magnific-popup.min.js"></script>
                        <script src="js/bootstrap-datepicker.min.js"></script>
                        <script src="js/aos.js"></script>
                        <script src="js/main.js"></script>
</body>

</html>