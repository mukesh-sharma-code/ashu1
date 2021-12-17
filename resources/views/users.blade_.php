<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
   
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        
            <!-- partial -->
            <div class="main-panel">
                <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
                    <div id="jqxgrid"></div>
                </div>
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script>
        $(document).ready(function(){
            var url = "/getAllUsers"
            $.getJSON(url,function(){

            })
        });
    </script>
</body>

</html>