

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <style type="text/css">
        canvas{
            padding: 0;
            margin: auto;
            display: block;
            width: 100%;
            border: 2px solid black;
        }
        #resaddcardheader{
            background-color: #1C5090;
            font-weight: bold;
            font-size: 20px;
            color: white;
            text-align: center;
            text-transform: uppercase;
        }
    </style>

    <title>Admin Panel</title>
</head>
<body>
  
    <div class="container">
        <div class="row">
        <?php include('message-insert.php'); ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="resaddcardheader">
                        <h4>Add New Research</h4>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row" >
                        <div class="col">
                            <canvas id="pdfViewer"></canvas>
                        </div>
                            <div class="col">
                                <div class="was">
                                <form action="code.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate required>
                                    <label class="form-label" for="myPdf">Research File</label>
                                    <input type="file" id="myPdf" name="res_file" />
                                    <div class="mb-3">
                                        <label>Research Title</label>
                                        <input type="text" name="title" class="form-control h-25" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Department</label>
                                        <select class="form-select" name="department" id="department" required>
                                          <option selected>Select a department</option>  
                                          <option  value="CEAT">College of Engineering, Architecture, and Technology</option>
                                          <option value="CBET">College of Business and Entrepreneurial Technology</option>
                                          <option value="CAS">College of Arts and Sciences</option>
                                          <option value="CED">College of Education</option>
                                          <option value="IPE">Institute of Physical Education</option>
                                          <option value="GS">Graduate School</option>
                                          

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date Publish</label>
                                        <input type="date_publish" name="date_publish" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Researchers:</label>                                
                                        <textarea id="researchers" name="researchers" class="form-control" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Location:</label>                               
                                        <select class="form-select" name="location" id="location" required>
                                          <option selected>Choose Location</option>
                                          <option value="CEAT Library">CEAT Library - Multi-purpose Building / Third (3rd) Floor</option>  
                                          <option value="CBET Library">CBET Library - SNAGAH Building / Second (2nd) Floor </option>
                                          <option value="CAS Library">CAS Library - MAB Building / Second (2nd) Floor</option>
                                          <option value="CED Library">CED Library - SNAGAH Building / Second (2nd) Floor</option>
                                          <option value="IPE Library">IPE Library - MAB Building / Fifth (5th) Floor</option>
                                          <option value="GS Library">GS Library - RND Building / Third (3rd) Floor</option>
                                        </select>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="save_research" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                                </div>
                            </div>                                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">// Loaded via <script> tag, create shortcut to access PDF.js exports.
    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

    $("#myPdf").on("change", function(e){
        var file = e.target.files[0]
        if(file.type == "application/pdf"){
            var fileReader = new FileReader();  
            fileReader.onload = function() {
                var pdfData = new Uint8Array(this.result);
                // Using DocumentInitParameters object to load binary data.
                var loadingTask = pdfjsLib.getDocument({data: pdfData});
                loadingTask.promise.then(function(pdf) {
                  console.log('PDF loaded');
                  
                  // Fetch the first page
                  var pageNumber = 1;
                  pdf.getPage(pageNumber).then(function(page) {
                    console.log('Page loaded');
                    
                    var scale = 1.5;
                    var viewport = page.getViewport({scale: scale});

                    // Prepare canvas using PDF page dimensions
                    var canvas = $("#pdfViewer")[0];
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render PDF page into canvas context
                    var renderContext = {
                      canvasContext: context,
                      viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    renderTask.promise.then(function () {
                      console.log('Page rendered');
                    });
                  });
                }, function (reason) {
                  // PDF loading error
                  console.error(reason);
                });
            };
            fileReader.readAsArrayBuffer(file);
        }
    });
</script>
</body>
</html>
