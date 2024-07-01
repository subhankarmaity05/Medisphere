<?php
$errors = array();
$success = false;
$hospital_name = $full_name = $mobile = $address = $beds = $appointment = '';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form-submit'])) {
    ?>
    <script>
        window.onload = function () {
            document.getElementById('contact').scrollIntoView();
        };
    </script>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'medisphere');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $hospital_name = trim($_POST["hospital_name"]);
    $full_name = trim($_POST["full_name"]);
    $mobile = trim($_POST["mobile"]);
    $address = trim($_POST["address"]);
    $beds = trim($_POST["beds"]);
    $appointment = trim($_POST["appointment"]);

    if (empty($hospital_name)) {
        $errors["hospital_name"] = "Hospital Name is required.";
    }

    if (empty($full_name)) {
        $errors["full_name"] = "Full Name is required.";
    }

    if (empty($mobile)) {
        $errors["mobile"] = "Mobile Number is required.";
    }

    if (empty($address)) {
        $errors["address"] = "Address is required.";
    }

    if (empty($beds)) {
        $errors["beds"] = "Number of Beds is required.";
    } elseif (!is_numeric($beds)) {
        $errors["beds"] = "Number of Beds must be a number.";
    }

    if (empty($appointment)) {
        $errors["appointment"] = "Preferred Date and Time for appointment is required.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO schedules (hospital_name, full_name, mobile, address, beds, appointment) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", $hospital_name, $full_name, $mobile, $address, $beds, $appointment);

        if ($stmt->execute()) {
            //echo "Your message has been sent successfully.";
            $success = true;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        foreach ($errors as $field => $error) {
            //echo "<p style='color: red;'>$error</p>";
        }
    }

    // Close the database connection
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en"><!--HTML START-->

<!-- Mirrored from quomodosoft.com/html/aamet/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jun 2024 07:35:46 GMT -->

<head><!--HEAD START-->

    <!--HEAD TITLE-->
    <title>Medisphere</title>

    <!--::::: SUPPORT META :::::::-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--:::::ALL CSS FILES:::::::-->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/fontawesome.css">
    <link rel="stylesheet" href="assets/css/plugins/modal-video.min.css">
    <link rel="stylesheet" href="assets/css/plugins/stellarnav.css">
    <link rel="stylesheet" href="assets/css/plugins/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/tiny-slider.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="shortcut icon" href="assets/img/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/button.css">
    <link rel="stylesheet" href="assets/css/inner.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="style.css">

</head><!--HEAD END-->

<body><!--BODY START-->

    <!--PRELOADER START-->
    <div class="loadingio">
        <div class="ldio">
            <div></div>
        </div>
    </div>
    <!--PRELOADER END-->

    <!--::::: HEADER AREA START :::::::-->
    <div class="header__area__2 fixed_mobile" id="header">
        <div class="container">
            <div class="row">
                <div class="col-4 col-lg-2 align-self-center">
                    <a href="index.php" class="logo"><img src="assets/img/logo/logo1.png" alt></a>
                </div>
                <div class="col-8 col-lg-7 text-center align-self-center">
                    <div class="main__menu  main__menu__2">
                        <div class="stellarnav">
                            <ul class="navbarmneuclass">
                                <li class="current"><a href="#">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#service">Service</a></li>
                                <!-- <li><a href="#portfolio">Projects</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="about.html">About
                                                    Us</a></li>
                                            <li><a
                                                    href="single__portfolio.html">Portfolio
                                                    Details</a></li>
                                            <li><a
                                                    href="team.html">Team</a></li>
                                            <li><a href="contact.html">Contact
                                                    Us</a></li>
                                            <li><a href="single.html">Single
                                                    Blog</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                        </ul>
                                    </li> -->
                                <li><a href="#client">Clients</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-3 align-self-center text-center">
                    <a href="#contact" class="header__1__action__btn">Request Demo</a>
                </div>
            </div>
        </div>
    </div>
    <!--::::: HEADER AREA END :::::::-->

    <!--::::: WELCOME AREA START :::::::-->
    <div class="welcome__carousel2 owl-carousel fixed_mobile" id="home">
        <div class="welcome__area welcome__area__2 bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 align-self-center">
                        <div class="welcome__text">
                            <div class="welcome__title2">
                                <h1 class="wow fadeInDown">Hospital
                                    Information <BR> System <span>(HIS)</span>
                                </h1>
                                <h6 class="wow fadeInDown">Experience
                                    unparalleled speed, security <BR> and
                                    reliability with UA Innovations HIS
                                    software.</h6>
                            </div>
                            <div class="space-30"></div>
                            <a href="#contact" class="cbtn cbtn2 wow fadeInDown">get
                                started</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="welcome__right__author wow fadeIn">-->
            <!--    <img src="assets/img/welcome__bg/author__1.png" alt>-->
            <!--</div>-->
        </div>
        <div class="welcome__area welcome__area__3 bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 align-self-center">
                        <div class="welcome__text">
                            <div class="welcome__title2">
                                <h1 class="wow fadeInDown">Hospital
                                    Information <BR> System <span>(HIS)</span>
                                </h1>
                                <h6 class="wow fadeInDown">Experience
                                    unparalleled speed, security <BR> and
                                    reliability with UA Innovations HIS
                                    software.</h6>
                            </div>
                            <div class="space-30"></div>
                            <a href="#contact" class="cbtn cbtn2 wow fadeInDown">get
                                started</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="welcome__right__author wow fadeIn">-->
            <!--    <img src="assets/img/welcome__bg/author__1.png" alt>-->
            <!--</div>-->
        </div>
    </div>
    <!--::::: WELCOME AREA END :::::::-->

    <!--::::: ABOUT AREA START :::::::-->
    <div class="about__area_2 section-padding fixed_mobile" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about__left__img2 wow fadeInLeft">
                        <img src="assets/img/about/about1.png" alt>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="heading heading__2 no__margin wow fadeInDown">
                        <h3>Secure, Reliable, and Fast Cloud-based Hospital
                            Information System</h3>
                        <h6>Medisphere, a flagship product of UA Innovations
                            Private Limited, is a cutting-edge cloud-based
                            Hospital Information System (HIS) software,
                            designed to streamline operations for hospitals
                            with 50 to 2000 beds. This advanced solution
                            ensures exceptionally fast and secure management
                            of all hospital activities.</h6>

                        <!-- <div class="heading__2__work__list">
                                <h5>How we Work</h5>
                                <ul>
                                    <li>Best support for 24h daily,</li>
                                    <li>Higt-end diagnostic equipment and yearl
                                        update</li>
                                    <li>Best employees in the industry</li>
                                </ul>
                            </div> -->
                        <div class="space-30"></div>
                        <div class="abt_btn_otr">
                            <a href="#contact" class="cbtn cbtn2 wow fadeInDown">Request Demo</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--::::: ABOUT AREA END :::::::-->

    <!--::::: SERVICE AREA START :::::::-->
    <div class="service__2__area bg theme__overlay__2 padding100_70 fixed_mobile" id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="heading heading__2 white__heading wow fadeInDown">
                        <h2>Modules Features</h2>
                        <h6>Medisphere</h6>
                        <div class="line__heading__2__white"></div>
                    </div>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service__2__1.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>OPD Billing/collection</h4>
                            <p>The opd-patient billing module is used to
                                generate bills/receipts of a particular
                                patient with reference to the lab or
                                radiology test undergone by It, health
                                check-up plans, day care surgery packages,
                                day care surgeries, procedures and some
                                other category charges.
                                Note: the price list of the tests procedure
                                etc.
                                Can vary according to the agreement with
                                panel Company/TPA, the applications handies
                                the multiple rates list.
                            </p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service__2__2.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Patient Registration</h4>
                            <p>The system generates a UHID number for each
                                new patient registration, the same UHID is
                                used as the future reference for the
                                patient's medical record. The application
                                captures various demographic details like
                                name, age, address, contact, insurance,
                                national id no. at the time of registration.
                                The system has adequate search and recall
                                details from previous registration. The
                                application also supports barcode enabled
                                registrations.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1.4s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service6.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Casualty Registration</h4>
                            <p>Casualty and emergency module allows faster
                                registration of patients. It focilitates to
                                capture only key registration detais such as
                                demographic information, payment and
                                casualty details as accident information
                                such as accident date and time, location and
                                in case of medico legal cases (MLC), and the
                                police cose
                                number.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service7.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Help Desk</h4>
                            <p>Help desk has information can of the
                                patients,doctors,departments and employees
                                of the hospital. The floor plans / map of
                                the hospital ca also be stored in the
                                system. The room allocation information and
                                bed of the patient at that particular point
                                in time is constantly updated. The help desk
                                also allows operator to keep a tap on the
                                IPD bill of the patient as well.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service8.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>IPD Billing</h4>
                            <p>IPD-billing is a module for generating bills
                                for all the in-patients. IPD - billing gots
                                activated as soon as patient gets registered
                                and he is given a unique IP number. It takes
                                into account all the billable items/services
                                right from the admission date & time till
                                the discharge. It performs the calculations
                                of the total amount to be paid by the
                                patient taking into consideration the
                                various billable services, indents,
                                requisitions ordered / placed in favor of
                                the patient.
                            </p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Admission, Transfer & Discharge</h4>
                            <p>Admission, transfer & discharge feature is
                                the central control of all room allocations.
                                Prior to admission it checks previous
                                information of the patient and flogs the
                                operator about patient proferences and also
                                warns if there are any due payments. The odt
                                system displays the status of all the beds
                                of all wards in the hospital on g single
                                screen</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Management Information System</h4>
                            <p>MIS enables the user to retrieve information
                                from the database in a user-defined format.
                                Different MIS reports are provided at module
                                level and centrally for use by the
                                management. All the MIS’s can be viewed in
                                graphical & tabular format. Reports can be
                                pulled in excel, pdf or xml format.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>EDP Administration</h4>
                            <p>This is an administrator module, all the
                                master tables of all the modules can be
                                created /modified. The module gives the user
                                options to configure and limit user access
                                for the application. EDP allows the user to
                                manage tariff/items, category etc.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Laboratory</h4>
                            <p>This module facilitates in carrying out
                                investigations, entry of investigation
                                findings and access to lab reports
                                cumulatively for all the visits of the
                                patient. The system provides the facility to
                                help the department in their workflow
                                management. It shows the status of the
                                tests, samples, test results, report
                                generation of the test results etc. It also
                                helps to view the entire clinical history of
                                the patient.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Radiology Management</h4>
                            <p>Radiology module provides integrated and
                                comprehensive facilities for the radiology
                                department; it includes work list result
                                reporting and covers both inpatient and
                                outpatient. It has a comprehensive MIS
                                report. It shows the status of the tests,
                                test results, report generation of the test
                                results etc. </p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>IPD Billing(Panel Patient)</h4>
                            <p>In case of panel patient, the patient bill is
                                generated in a desired format, with desired
                                rates & conditions depending upon the
                                contract between the hospital & panel
                                company. IPD billing also allows for
                                co-payment as well as payment from multiple
                                insurance companies.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Purchase Management</h4>
                            <p>This module covers the end to end process
                                flow of the purchase department starting
                                right from PR till GRN. This is integrated
                                with all the departments, sub stores, for
                                receiving indent of routine items or for the
                                purchase of new items as per the
                                consumption or the minimum stock should be
                                maintained in the store or sub stores
                                for various items. Vendors can also file
                                their proposal and receive PO online through
                                a customised online portal.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>General Store</h4>
                            <p>This system seamlessly integrates the
                                purchase department, sub-stores and various
                                consumption-points (like wards, departments
                                etc.,) in the hospital to record
                                consumption and distribution of non-medical
                                items. Also with the aid of appropriate
                                reports stock of materials at different
                                store can be checked and maintained.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Medical Store</h4>
                            <p>This module facilitates storage and
                                dispensing of pharmaceutical items to in-
                                patients. It communicates with ward and
                                billing modules. The nurses place an order
                                to the pharmacy based on the doctor's
                                prescription for patients. The prescription
                                appears in the pharmacy module. This module
                                is interfaced with bar code.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Doctor Accounting</h4>
                            <p>This module facilitates in automatic
                                preparation of doctors payable as per the
                                rules
                                defined in the masters. The module allows to
                                define various permutations and
                                combinations as per which the doctor’s
                                payable is calculated so that automatically
                                doctors statement can be generated with a
                                click of a button.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Nursing Ward</h4>
                            <p>This module handles all the processes and
                                transactions that occur in a ward. These
                                transactions involve test- requisitions
                                placed for the patient, medicines consumed
                                by
                                the patient, any other consumables consumed
                                by the patient, bedside procedures
                                performed. All the details regarding all
                                these transactions are directly going to the
                                billing department for the verification for
                                final bill generation.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Operation Theatres Management</h4>
                            <p>OT scheduling is done and on the basis of the
                                availability OT managers approves slot with
                                desired surgeon and their team, pre-
                                preparation, recording operation start & end
                                time of operation, details of procedure
                                notes & nurse instructions, post operation
                                care procedures, etc. Seamless interface
                                with CSSD.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Bed Management</h4>
                            <p>Ability to view and manage bed across all
                                wards and all departments, ability to print
                                bed utilization per ward, consultant and
                                specialty on daily, weekly and monthly
                                basis,
                                ability to report bed days by ward,
                                consultant, specialty and
                                diagnosis/classification.
                                Ability to analyse ward or room occupancy
                                status certain attributes like service,
                                gender, age etc.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Medical Record Management</h4>
                            <p>This module gives the users the ability to
                                quickly and efficiently identify and locate
                                the physical location of a medical record
                                within the data warehouse of the hospital.
                                It also keeps a track of all patient files
                                and issuing of the same within the workflow
                                of the hospital.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Human Resources Management</h4>
                            <p>This Module helps to calculate and generate
                                Pay Slips, maintain employees' payroll and
                                personnel data on-line, monitor daily
                                attendance data, control position openings,
                                generate external reports, and prepare
                                payroll and personnel summary reports.
                                Designed specifically for the complex
                                personnel needs of health care networks it
                                supports an unlimited number of Staff, job
                                classifications and employee types
                                throughout an organization.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Appointment Management System:</h4>
                            <p>Incorporation of hospital calendar in the
                                Medisphere  by defining working and non-
                                working days and day care timings, doctor’s
                                schedule etc. Search for consulting
                                doctor as per department, services and
                                availability. Configure doctor's OPD
                                schedule
                                day wise. Booking of slots for patient ,
                                booking of multiple appointments per slot,
                                appointment cancellation / re-scheduling,
                                appointment through SMS, WAP enabled
                                mobile phones and through web portal.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Diet and kitchen</h4>
                            <p>The diet and kitchen module assists the
                                hospital kitchen staff to provide meals to
                                in – patients as per the instructions of the
                                dietician. The dietician works with the
                                physician to define the diet for the
                                patient. This module allows for ordering and
                                scheduling of meals, changing the orders as
                                per dietician's instructions.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Electronic Medical Record</h4>
                            <p>This features help us to save all the
                                clinical data of patient within a system
                                i.e. complete clinical records includes
                                present complains/order sets/lab
                                reports/examination/medicines/OT notes. This
                                feature allows generating discharge summary.
                                EMR facilitates the doctors to view the
                                complete medical history of the patient
                                (including investigation reports/icu /ot
                                notes etc). EMR also gives cumulative view
                                of patients all visits, diagnosis and
                                reports.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Pharmacy</h4>
                            <p>This module is used for all daily sales and
                                purchases of medical items for OPD and
                                walk-in patients. Pharmacy being seamlessly
                                integrated with EMR and barcode enables to
                                issue medicines items faster and accurately.
                                Pharmacy is also enabled with drug
                                interaction & lifesaving drug alerts to make
                                sure right medicine is dispensed to the
                                patient with proper advisory.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Security Management</h4>
                            <p>Medisphere is completely role and right based,
                                it authenticates and authorizes each
                                and every action of the user. The
                                application also captures the audit trails
                                for all the
                                transactions as well as user stamp for all
                                the activities performed within the
                                application. The security model fits in the
                                three tiers.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Blood Bank</h4>
                            <p>This module works on direct blood stock as
                                well as donor blood stock. The
                                application registers the donor information
                                and according to that only the blood
                                collection, blood screening, grouping, blood
                                component is maintained in the blood
                                bank store. We have various reports some of
                                them like stock status report, item-wise
                                stock status report, donor registration
                                report, blood issue report, blood service
                                report</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="single__service__2 wow fadeInUp" data-wow-delay="1s">
                        <div class="single__service__2__img">
                            <img src="assets/img/service/service9.png" alt>
                        </div>
                        <div class="single__service__2__description">
                            <h4>Financial Accounting Integration</h4>
                            <p>The financial accounting package generates
                                the financial statements on a monthly
                                and annual basis as per the requirement. All
                                the entries are posted into the FA
                                package from the HIS package and the profit
                                and loss account, balance sheet etc.
                                are generated automatically.</p>
                            <!-- <a href="#" class="readmore__btn">Read More <i
                                        class="far fa-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--::::: SERVICE AREA END :::::::-->

    <!--::::: PRICING AREA START :::::::-->
    <!-- <div class="pricing__area__2 section-padding2 fixed_mobile" id="price">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div class="heading heading__2 wow fadeInDown">
                            <h2>Our Pricing Plans</h2>
                            <h6>We are the leading and creative android
                                development <br> company in Meerut business</h6>
                            <div class="line__heading__2"></div>
                        </div>
                    </div>
                </div>
                <div class="space-60"></div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single__price__2 text-center wow fadeInUp"
                            data-wow-delay="1s">
                            <div class="single__price__2__icon">
                                <img src="assets/img/price/price__2__1.png" alt>
                            </div>
                            <div class="single__price__2__description">
                                <h2>Company</h2>
                                <p>Best for individuals</p>
                                <h3>$100 <span>Per Month</span></h3>
                                <div class="space-30"></div>
                                <a href="#" class="price__btn">Free trail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div
                            class="single__price__2 active text-center wow fadeInUp"
                            data-wow-delay="1.2s">
                            <div class="single__price__2__icon">
                                <img src="assets/img/price/price__2__2.png" alt>
                            </div>
                            <div class="single__price__2__description">
                                <h2>Medium</h2>
                                <p>Best for individuals</p>
                                <h3>$200 <span>Per Month</span></h3>
                                <div class="space-30"></div>
                                <a href="#" class="price__btn">Free trail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single__price__2 text-center wow fadeInUp"
                            data-wow-delay="1.4s">
                            <div class="single__price__2__icon">
                                <img src="assets/img/price/price__2__3.png" alt>
                            </div>
                            <div class="single__price__2__description">
                                <h2>Premium</h2>
                                <p>Best for individuals</p>
                                <h3>$100 <span>Per Month</span></h3>
                                <div class="space-30"></div>
                                <a href="#" class="price__btn">Free trail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  -->
    <!--::::: PRICING AREA END :::::::-->

    <!--::::: TEAM AREA START :::::::-->
    <!-- <div class="team__area__2 bg padding100_70 fixed_mobile" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div
                            class="heading heading__2 white__heading wow fadeInDown">
                            <h2>Our Professional Team</h2>
                            <h6>We are the leading and creative android
                                development <br> company in Meerut business</h6>
                            <div class="line__heading__2__white"></div>
                        </div>
                    </div>
                </div>
                <div class="space-60"></div>
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="single__team__2 wow fadeInUp"
                            data-wow-delay="1s">
                            <div class="single__team__2__img__area">
                                <div class="single__team__img">
                                    <img src="assets/img/team/team21.jpg" alt>
                                </div>
                                <div class="single__team_socials">
                                    <ul>
                                        <li><a class="facebook" href="#"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="dribbble" href="#"><i
                                                    class="fab fa-dribbble"></i></a></li>
                                        <li><a class="twitter" href="#"><i
                                                    class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single__team_description">
                                <p><a href="#">Creative Art Decorator</a></p>
                                <h4><a href="#">Milly Amelia Amy</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="single__team__2 wow fadeInUp"
                            data-wow-delay="1.2s">
                            <div class="single__team__2__img__area">
                                <div class="single__team__img">
                                    <img src="assets/img/team/team22.jpg" alt>
                                </div>
                                <div class="single__team_socials">
                                    <ul>
                                        <li><a class="facebook" href="#"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="dribbble" href="#"><i
                                                    class="fab fa-dribbble"></i></a></li>
                                        <li><a class="twitter" href="#"><i
                                                    class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single__team_description">
                                <p>Creative Art Decorator</p>
                                <h4>Chist Deo Adnan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 wow fadeInUp"
                        data-wow-delay="1.4s">
                        <div class="single__team__2">
                            <div class="single__team__2__img__area">
                                <div class="single__team__img">
                                    <img src="assets/img/team/team23.jpg" alt>
                                </div>
                                <div class="single__team_socials">
                                    <ul>
                                        <li><a class="facebook" href="#"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="dribbble" href="#"><i
                                                    class="fab fa-dribbble"></i></a></li>
                                        <li><a class="twitter" href="#"><i
                                                    class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single__team_description">
                                <p>Creative Art Decorator</p>
                                <h4>Mathiu Sina Babbie</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="single__team__2 wow fadeInUp"
                            data-wow-delay="1.6s">
                            <div class="single__team__2__img__area">
                                <div class="single__team__img">
                                    <img src="assets/img/team/team24.jpg" alt>
                                </div>
                                <div class="single__team_socials">
                                    <ul>
                                        <li><a class="facebook" href="#"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="dribbble" href="#"><i
                                                    class="fab fa-dribbble"></i></a></li>
                                        <li><a class="twitter" href="#"><i
                                                    class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single__team_description">
                                <p>Creative Art Decorator</p>
                                <h4>Delores Debra Priya</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!--::::: TEAM AREA END :::::::-->

    <!--::::: BLOG AREA START :::::::-->
    <div class="blog__area padding100_70 fixed_mobile" id="client">
        <div class="container">
             <div class="row">
                <div class="col-lg-6">
                    <div class="heading heading__2 wow fadeInDown">
                        <h2>What Our Client Says</h2>
                        <h6>Hear from our satisfied customers about their
                            experience with Medisphere's cloud-based
                            HIS.</h6>
                        <div class="line__heading__2"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single__blog blog2 wow fadeInUp" data-wow-delay="1s">
                        <!--<div class="single__blog__img">-->
                        <!--    <img src="assets/img/blog/doctor_img1.jpg" alt>-->
                        <!--</div>-->
                        <div class="single__blog__content">
                            <div class="single__blog__text">
                                <h4><a href="#">"Medisphere hospital information system has transformed 
                                our daily operations at Midland Healthcare & Research Center. 
                                It's incredibly user-friendly and has streamlined patient management
                                and record-keeping efficiently. Highly recommended!"</a></h4>
                                <!-- <a href="#" class="readmore__btn2">Read More
                                        <i class="far fa-arrow-right"></i></a> -->
                            </div>
                            <div class="single__blog__description">
                                
                                <div class="single__blog__author">
                                    <a href="#"><i class="fas fa-user"></i>Dr. B.P Singh</a>
                                </div>
                                <div class="single__blog__date">
                                    <a href="#">Midland Healthcare & Research Center</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-60"></div>
        </div>
    </div>
    <!--::::: BLOG AREA END :::::::-->

    <!--::::: TESTIMONIAL__2 AREA START :::::::-->
    <div class="testimonial__2__area bg testimonial__2__overlay section-padding fixed_mobile">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-12 m-auto text-center">
                    <div class="testimonials__2__carousel owl-carousel wow fadeInDown">
                        <div class="single__testimonial__2">
                            <h5>Medisphere, a flagship product of UA
                                Innovations Private Limited, which is a
                                cutting-edge cloud-based Hospital
                                Information System (HIS) software, designed
                                to streamline operations for hospitals with
                                50 to 2000 beds. This advanced solution
                                ensures exceptionally fast and secure
                                management of all hospital activities.</h5>
                            <div class="testimonial__2__author">
                                <h3>Medisphere</h3>
                                <p>UA Innovations</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--::::: TESTIMONIAL__2 AREA END :::::::-->

    <!--::::: CONTACT MAP AREA START :::::::-->
    <!-- <div class="contact__map fixed_mobile">
            <div class="responsive-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113911.20573097582!2d80.94251274999999!3d26.848692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd991f32b16b%3A0x93ccba8909978be7!2sLucknow%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1718111971765!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div> -->
    <!--::::: CONTACT MAP AREA END :::::::-->

    <!--::::: CONTACT AREA START :::::::-->
    <div class="contact__page section-padding fixed_mobile" id="contact">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-4 align-self-center">
                        <div class="contact__page__info">
                            <div class="contact__info__heading">
                                <h2>Request Demo</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Incidunt, labore?</p>
                            </div>
                            <div class="contact__locations">
                                <div class="single__contact__location">
                                    <div
                                        class="single__contact__location__icon">
                                        <div
                                            class="single__contact__location__icon__bg">
                                            <img
                                                src="assets/img/icon/phone__icon.png"
                                                alt>

                                        </div>
                                    </div>
                                    <h6>+91 9415025041
                                        <i class="fal fa-long-arrow-right"></i>
                                    </h6>
                                </div>
                                <div class="single__contact__location">
                                    <div
                                        class="single__contact__location__icon">
                                        <div
                                            class="single__contact__location__icon__bg">
                                            <img
                                                src="assets/img/icon/location__marker.png"
                                                alt>

                                        </div>
                                    </div>
                                    <h6>LUCKNOW UTTAR PRADESH
                                        <i
                                            class="fal fa-long-arrow-right"></i></h6>
                                </div>
                                <div class="single__contact__location">
                                    <div
                                        class="single__contact__location__icon">
                                        <div
                                            class="single__contact__location__icon__bg">
                                            <img
                                                src="assets/img/icon/envelope__icon.png"
                                                alt>
                                        </div>
                                    </div>
                                    <h6>hello@medisphere.org
                                        <i
                                            class="fal fa-long-arrow-right"></i><br>
                                        ujjwal@medisphere.org
                                        <i class="fal fa-long-arrow-right"></i>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <div class="col-lg-12 align-self-center">
                    <div class="tocken__form__area theme__bg__6 ">
                        <?php if ($success) {
                            $hospital_name = $full_name = $mobile = $address = $beds = $appointment = '';
                            ?>
                            <div class="alert alert-success" role="alert">
                                <b>Successfully Submitted</b>
                            </div>
                        <?php } ?>
                        <div class="tocken__form__heading">
                            <h2>Request Demo</h2>
                            <p>Please fill out the form below to schedule a
                                demo of our Medisphere cloud-based HIS.</p>
                        </div>
                        <div class="tocken__form">
                            <form method="post">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="hospital_name">Hospital Name</label>
                                        <input type="text" name="hospital_name" placeholder="Enter Hospital Name"
                                            value="<?= htmlspecialchars($hospital_name) ?>"
                                            class="<?= isset($errors['hospital_name']) ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback"><?= $errors['hospital_name'] ?? '' ?></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="full_name">Enter Your Name</label>
                                        <input type="text" name="full_name" placeholder="Full Name"
                                            value="<?= htmlspecialchars($full_name) ?>"
                                            class="<?= isset($errors['full_name']) ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback"><?= $errors['full_name'] ?? '' ?></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="mobile">Enter Your Mobile Number</label>
                                        <input type="tel" name="mobile" placeholder="Mobile Number"
                                            value="<?= htmlspecialchars($mobile) ?>"
                                            class="<?= isset($errors['mobile']) ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback"><?= $errors['mobile'] ?? '' ?></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="address">Enter Your Address</label>
                                        <input type="text" name="address" placeholder="Address"
                                            value="<?= htmlspecialchars($address) ?>"
                                            class="<?= isset($errors['address']) ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback"><?= $errors['address'] ?? '' ?></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="beds">Enter The No. of Beds</label>
                                        <input type="number" name="beds" placeholder="No. of Beds"
                                            value="<?= htmlspecialchars($beds) ?>"
                                            class="<?= isset($errors['beds']) ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback"><?= $errors['beds'] ?? '' ?></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="appointment">Preferred Date time for appointment:</label>
                                        <input type="datetime-local" name="appointment" id="birthdaytime"
                                            value="<?= htmlspecialchars($appointment) ?>"
                                            class="<?= isset($errors['appointment']) ? 'is-invalid' : '' ?>">
                                        <div class="invalid-feedback"><?= $errors['appointment'] ?? '' ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 ml-auto p-0">
                                    <button class="tocken__submit__btn" type="submit" name="form-submit">Schedule a
                                        Demo</button>
                                </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--::::: CONTACT AREA END :::::::-->

    <!--::::: LOGO AREA START :::::::-->
    <!-- <div class="logo__area__2 padding-bottom fixed_mobile">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="logo_carousel owl-carousel">
                            <div class="single___logo__table wow fadeInDown">
                                <div class="single__logo__table__cell">
                                    <img src="assets/img/logo/4.png" alt>
                                </div>
                            </div>
                            <div class="single___logo__table wow fadeInDown">
                                <div class="single__logo__table__cell">
                                    <img src="assets/img/logo/1.png" alt>
                                </div>
                            </div>
                            <div class="single___logo__table wow fadeInDown">
                                <div class="single__logo__table__cell">
                                    <img src="assets/img/logo/2.png" alt>
                                </div>
                            </div>
                            <div class="single___logo__table wow fadeInDown">
                                <div class="single__logo__table__cell">
                                    <img src="assets/img/logo/3.png" alt>
                                </div>
                            </div>
                            <div class="single___logo__table wow fadeInDown">
                                <div class="single__logo__table__cell">
                                    <img src="assets/img/logo/5.png" alt>
                                </div>
                            </div>
                            <div class="single___logo__table wow fadeInDown">
                                <div class="single__logo__table__cell">
                                    <img src="assets/img/logo/4.png" alt>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!--::::: LOGO AREA END :::::::-->

    <!--::::: CALL TO ACTION AREA START :::::::-->
    <div class="container fixed_mobile">
        <div class="cta__area__2 bg padding50-50">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-sm-9 align-self-center">
                        <div class="cta__content white">
                            <h2>Secure and fast hospital management</h2>
                        </div>
                    </div>
                    <div class="col-sm-3 text-right align-self-center">
                        <a href="#service" class="cbtn cbtn11">Get Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--::::: CALL TO ACTION AREA END :::::::-->

    <!--:::::FOOTER AREA START:::::::-->
    <div class="footer__area section-padding fixed_mobile">
        <div class="container">

            <div class="row pb-4">
                <div class="col-lg-4">
                    <div class="single__footer__2 footer__contact__aderess">
                        <div class="ftr_logo">
                            <a href="index.php" class="footer__logo2">
                                <img src="assets/img/logo/logo1.png" alt>
                            </a>
                        </div>

                        <h3>About Company</h3>
                        <p><i class="fas fa-address-card"></i> LUCKNOW UTTAR
                            PRADESH</p>
                        <!-- <p><i class="fas fa-phone"></i> Phone: +91
                                9415025041
                            </p> -->
                        <p><i class="fas fa-envelope"></i> Email:
                            hello@medisphere.org <br>
                            ujjwal@medisphere.org
                        </p>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single__footer__2">
                        <h3>Useful Links</h3>
                        <ul class="footer__links">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#service">Service</a></li>
                            <li><a href="#client">Clients</a></li>
                            <li><a href="#contact">Request Demo</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-3">
                        <div class="single__footer__2">
                            <h3>Latest Campaign</h3>
                            <div class="single__campaign single__campaign__2">
                                <div class="campaign__location">
                                    <p><i class="fas fa-location-arrow"></i>
                                        Colofonia</p>
                                </div>
                                <div class="campaign__link">
                                    <a href="#">Successful Business for Usually
                                        require help . . .</a>
                                </div>
                            </div>
                            <div class="single__campaign single__campaign__2">
                                <div class="campaign__location">
                                    <p><i class="fas fa-location-arrow"></i>
                                        Colofonia</p>
                                </div>
                                <div class="campaign__link">
                                    <a href="#">Successful Business for Usually
                                        require help . . .</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <div class="col-lg-4">
                    <div class="single__footer__2">
                        <h3>Subscribe Newsletter</h3>
                        <div class="subscribe__area">
                            <form action="#">
                                <input type="search" placeholder="Enter Your Email...">
                            </form>
                            <a href="#" class="subscribe__button"><i class="fas fa-location-arrow"></i></a>
                        </div>

                        <div class="footer__descrition">
                            <p>Sign up for our latest News articles We won’t
                                give you spam mails.</p>
                        </div>
                        <!-- <ul class="footer__social inline">
                                <li><a class="facebook" href="#"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a class="dribbble" href="#"><i
                                            class="fab fa-dribbble"></i></a></li>
                                <li><a class="pinterest" href="#"><i
                                            class="fab fa-pinterest"></i></a></li>
                                <li><a class="twitter" href="#"><i
                                            class="fab fa-twitter"></i></a></li>
                            </ul> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="copywrt_prt text-center">
            <p>&copy; Copyright 2023-2025 | All Right Reserved by UA Innovations Private Limited</p>
        </div>
    </div>
    <!--:::::FOOTER AREA END :::::::-->

    <!--:::::ALL JS FILES:::::::-->
    <script src="assets/js/plugins/jQuery.2.1.0.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/jquery.nav.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.min.js"></script>
    <script src="assets/js/plugins/jquery-modal-video.min.js"></script>
    <script src="assets/js/plugins/stellarnav.js"></script>
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/jquery.counterup.js"></script>
    <script src="assets/js/plugins/owl.carousel.js"></script>
    <script src="assets/js/plugins/tiny-slider.js"></script>
    <script src="assets/js/plugins/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
</body><!--BODY END-->

<!-- Mirrored from quomodosoft.com/html/aamet/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Jun 2024 07:36:08 GMT -->

</html><!--HTML END-->