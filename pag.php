<head>
    <title>Principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />


   
  </head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="noticias.php" class="nav-link">Noticias</a></li>
            <li class="nav-item"><a href="agent.html" class="nav-link">Agent</a></li>
            <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
            <li class="nav-item"><a href="properties.html" class="nav-link">Properties</a></li>
            <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="contactenos.php" class="nav-link">Contactenos</a></li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="container">
        <div class="row">
            <h2 class="text-center">Bootstrap styling for Responsive Datatable (Server Side)</h2>
        </div>

        <div class="row">

            <div class="col-md-12">

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Extn.</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th></th>
                        </tr>
                    </thead>

                </table>

            </div>
        </div>
    </div>
<script type="text/javascript">
  var data = [
          {
              "name": "Tiger Nixon",
              "position": "System Architect",
              "salary": "$320,800",
              "start_date": "2011/04/25",
              "office": "Edinburgh",
              "extn": "5421"
          },
          {
              "name": "Garrett Winters",
              "position": "Accountant",
              "salary": "$170,750",
              "start_date": "2011/07/25",
              "office": "Tokyo",
              "extn": "8422"
          },
          {
              "name": "Ashton Cox",
              "position": "Junior Technical Author",
              "salary": "$86,000",
              "start_date": "2009/01/12",
              "office": "San Francisco",
              "extn": "1562"
          },
          {
              "name": "Cedric Kelly",
              "position": "Senior Javascript Developer",
              "salary": "$433,060",
              "start_date": "2012/03/29",
              "office": "Edinburgh",
              "extn": "6224"
          },
          {
              "name": "Airi Satou",
              "position": "Accountant",
              "salary": "$162,700",
              "start_date": "2008/11/28",
              "office": "Tokyo",
              "extn": "5407"
          },
          {
              "name": "Brielle Williamson",
              "position": "Integration Specialist",
              "salary": "$372,000",
              "start_date": "2012/12/02",
              "office": "New York",
              "extn": "4804"
          },
          {
              "name": "Herrod Chandler",
              "position": "Sales Assistant",
              "salary": "$137,500",
              "start_date": "2012/08/06",
              "office": "San Francisco",
              "extn": "9608"
          },
          {
              "name": "Rhona Davidson",
              "position": "Integration Specialist",
              "salary": "$327,900",
              "start_date": "2010/10/14",
              "office": "Tokyo",
              "extn": "6200"
          },
          {
              "name": "Colleen Hurst",
              "position": "Javascript Developer",
              "salary": "$205,500",
              "start_date": "2009/09/15",
              "office": "San Francisco",
              "extn": "2360"
          },
          {
              "name": "Sonya Frost",
              "position": "Software Engineer",
              "salary": "$103,600",
              "start_date": "2008/12/13",
              "office": "Edinburgh",
              "extn": "1667"
          },
          {
              "name": "Jena Gaines",
              "position": "Office Manager",
              "salary": "$90,560",
              "start_date": "2008/12/19",
              "office": "London",
              "extn": "3814"
          },
          {
              "name": "Quinn Flynn",
              "position": "Support Lead",
              "salary": "$342,000",
              "start_date": "2013/03/03",
              "office": "Edinburgh",
              "extn": "9497"
          },
          {
              "name": "Charde Marshall",
              "position": "Regional Director",
              "salary": "$470,600",
              "start_date": "2008/10/16",
              "office": "San Francisco",
              "extn": "6741"
          },
          {
              "name": "Haley Kennedy",
              "position": "Senior Marketing Designer",
              "salary": "$313,500",
              "start_date": "2012/12/18",
              "office": "London",
              "extn": "3597"
          },
          {
              "name": "Tatyana Fitzpatrick",
              "position": "Regional Director",
              "salary": "$385,750",
              "start_date": "2010/03/17",
              "office": "London",
              "extn": "1965"
          },
          {
              "name": "Michael Silva",
              "position": "Marketing Designer",
              "salary": "$198,500",
              "start_date": "2012/11/27",
              "office": "London",
              "extn": "1581"
          },
          {
              "name": "Paul Byrd",
              "position": "Chief Financial Officer (CFO)",
              "salary": "$725,000",
              "start_date": "2010/06/09",
              "office": "New York",
              "extn": "3059"
          },
          {
              "name": "Gloria Little",
              "position": "Systems Administrator",
              "salary": "$237,500",
              "start_date": "2009/04/10",
              "office": "New York",
              "extn": "1721"
          },
          {
              "name": "Bradley Greer",
              "position": "Software Engineer",
              "salary": "$132,000",
              "start_date": "2012/10/13",
              "office": "London",
              "extn": "2558"
          },
          {
              "name": "Dai Rios",
              "position": "Personnel Lead",
              "salary": "$217,500",
              "start_date": "2012/09/26",
              "office": "Edinburgh",
              "extn": "2290"
          },
          {
              "name": "Jenette Caldwell",
              "position": "Development Lead",
              "salary": "$345,000",
              "start_date": "2011/09/03",
              "office": "New York",
              "extn": "1937"
          },
          {
              "name": "Yuri Berry",
              "position": "Chief Marketing Officer (CMO)",
              "salary": "$675,000",
              "start_date": "2009/06/25",
              "office": "New York",
              "extn": "6154"
          },
          {
              "name": "Caesar Vance",
              "position": "Pre-Sales Support",
              "salary": "$106,450",
              "start_date": "2011/12/12",
              "office": "New York",
              "extn": "8330"
          },
          {
              "name": "Doris Wilder",
              "position": "Sales Assistant",
              "salary": "$85,600",
              "start_date": "2010/09/20",
              "office": "Sidney",
              "extn": "3023"
          },
          {
              "name": "Angelica Ramos",
              "position": "Chief Executive Officer (CEO)",
              "salary": "$1,200,000",
              "start_date": "2009/10/09",
              "office": "London",
              "extn": "5797"
          },
          {
              "name": "Gavin Joyce",
              "position": "Developer",
              "salary": "$92,575",
              "start_date": "2010/12/22",
              "office": "Edinburgh",
              "extn": "8822"
          },
          {
              "name": "Jennifer Chang",
              "position": "Regional Director",
              "salary": "$357,650",
              "start_date": "2010/11/14",
              "office": "Singapore",
              "extn": "9239"
          },
          {
              "name": "Brenden Wagner",
              "position": "Software Engineer",
              "salary": "$206,850",
              "start_date": "2011/06/07",
              "office": "San Francisco",
              "extn": "1314"
          },
          {
              "name": "Fiona Green",
              "position": "Chief Operating Officer (COO)",
              "salary": "$850,000",
              "start_date": "2010/03/11",
              "office": "San Francisco",
              "extn": "2947"
          },
          {
              "name": "Shou Itou",
              "position": "Regional Marketing",
              "salary": "$163,000",
              "start_date": "2011/08/14",
              "office": "Tokyo",
              "extn": "8899"
          },
          {
              "name": "Michelle House",
              "position": "Integration Specialist",
              "salary": "$95,400",
              "start_date": "2011/06/02",
              "office": "Sidney",
              "extn": "2769"
          },
          {
              "name": "Suki Burks",
              "position": "Developer",
              "salary": "$114,500",
              "start_date": "2009/10/22",
              "office": "London",
              "extn": "6832"
          },
          {
              "name": "Prescott Bartlett",
              "position": "Technical Author",
              "salary": "$145,000",
              "start_date": "2011/05/07",
              "office": "London",
              "extn": "3606"
          },
          {
              "name": "Gavin Cortez",
              "position": "Team Leader",
              "salary": "$235,500",
              "start_date": "2008/10/26",
              "office": "San Francisco",
              "extn": "2860"
          },
          {
              "name": "Martena Mccray",
              "position": "Post-Sales support",
              "salary": "$324,050",
              "start_date": "2011/03/09",
              "office": "Edinburgh",
              "extn": "8240"
          },
          {
              "name": "Unity Butler",
              "position": "Marketing Designer",
              "salary": "$85,675",
              "start_date": "2009/12/09",
              "office": "San Francisco",
              "extn": "5384"
          },
          {
              "name": "Howard Hatfield",
              "position": "Office Manager",
              "salary": "$164,500",
              "start_date": "2008/12/16",
              "office": "San Francisco",
              "extn": "7031"
          },
          {
              "name": "Hope Fuentes",
              "position": "Secretary",
              "salary": "$109,850",
              "start_date": "2010/02/12",
              "office": "San Francisco",
              "extn": "6318"
          },
          {
              "name": "Vivian Harrell",
              "position": "Financial Controller",
              "salary": "$452,500",
              "start_date": "2009/02/14",
              "office": "San Francisco",
              "extn": "9422"
          },
          {
              "name": "Timothy Mooney",
              "position": "Office Manager",
              "salary": "$136,200",
              "start_date": "2008/12/11",
              "office": "London",
              "extn": "7580"
          },
          {
              "name": "Jackson Bradshaw",
              "position": "Director",
              "salary": "$645,750",
              "start_date": "2008/09/26",
              "office": "New York",
              "extn": "1042"
          },
          {
              "name": "Olivia Liang",
              "position": "Support Engineer",
              "salary": "$234,500",
              "start_date": "2011/02/03",
              "office": "Singapore",
              "extn": "2120"
          },
          {
              "name": "Bruno Nash",
              "position": "Software Engineer",
              "salary": "$163,500",
              "start_date": "2011/05/03",
              "office": "London",
              "extn": "6222"
          },
          {
              "name": "Sakura Yamamoto",
              "position": "Support Engineer",
              "salary": "$139,575",
              "start_date": "2009/08/19",
              "office": "Tokyo",
              "extn": "9383"
          },
          {
              "name": "Thor Walton",
              "position": "Developer",
              "salary": "$98,540",
              "start_date": "2013/08/11",
              "office": "New York",
              "extn": "8327"
          },
          {
              "name": "Finn Camacho",
              "position": "Support Engineer",
              "salary": "$87,500",
              "start_date": "2009/07/07",
              "office": "San Francisco",
              "extn": "2927"
          },
          {
              "name": "Serge Baldwin",
              "position": "Data Coordinator",
              "salary": "$138,575",
              "start_date": "2012/04/09",
              "office": "Singapore",
              "extn": "8352"
          },
          {
              "name": "Zenaida Frank",
              "position": "Software Engineer",
              "salary": "$125,250",
              "start_date": "2010/01/04",
              "office": "New York",
              "extn": "7439"
          },
          {
              "name": "Zorita Serrano",
              "position": "Software Engineer",
              "salary": "$115,000",
              "start_date": "2012/06/01",
              "office": "San Francisco",
              "extn": "4389"
          },
          {
              "name": "Jennifer Acosta",
              "position": "Junior Javascript Developer",
              "salary": "$75,650",
              "start_date": "2013/02/01",
              "office": "Edinburgh",
              "extn": "3431"
          },
          {
              "name": "Cara Stevens",
              "position": "Sales Assistant",
              "salary": "$145,600",
              "start_date": "2011/12/06",
              "office": "New York",
              "extn": "3990"
          },
          {
              "name": "Hermione Butler",
              "position": "Regional Director",
              "salary": "$356,250",
              "start_date": "2011/03/21",
              "office": "London",
              "extn": "1016"
          },
          {
              "name": "Lael Greer",
              "position": "Systems Administrator",
              "salary": "$103,500",
              "start_date": "2009/02/27",
              "office": "London",
              "extn": "6733"
          },
          {
              "name": "Jonas Alexander",
              "position": "Developer",
              "salary": "$86,500",
              "start_date": "2010/07/14",
              "office": "San Francisco",
              "extn": "8196"
          },
          {
              "name": "Shad Decker",
              "position": "Regional Director",
              "salary": "$183,000",
              "start_date": "2008/11/13",
              "office": "Edinburgh",
              "extn": "6373"
          },
          {
              "name": "Michael Bruce",
              "position": "Javascript Developer",
              "salary": "$183,000",
              "start_date": "2011/06/27",
              "office": "Singapore",
              "extn": "5384"
          },
          {
              "name": "Donna Snider",
              "position": "Customer Support",
              "salary": "$112,000",
              "start_date": "2011/01/25",
              "office": "New York",
              "extn": "4226"
          }
    ]


    $(document).ready(function () {
        $('#example').DataTable({
            "processing": true,
            "info": true,
            "stateSave": true,
            data: data,
            "columns": [
                { "data": "name" },
                { "data": "position" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" },
                {
                    "data": "Inquiry", "bSearchable": false, "bSortable": false, "sWidth": "40px",
                    "data": function (data) {
                        return '<button class="btn btn-danger" type="button">' + data.name + 'Delete</button>'
                    }
                }
            ]
        });
    });

    

</script>


  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  
