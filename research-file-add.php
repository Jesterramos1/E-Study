
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<style>
    .maincon{
        width: 100%;
        
    }
    #resaddcardheader{
        background-color: #1C5090;
        font-weight: bold;
        font-size: 20px;
        color: white;
        text-align: center;
        text-transform: uppercase;
    }
    #preFileUpload{
        width: 40%;
        margin-left: auto;
        margin-right: auto;
    }
    #card{        
        height:500px;
    }
    #semicon{
        margin-top: 10%;
    }
    #status{
        font-size: 30x;
        color: #198754;
    }
    
    
</style>
<body>
<div class="maincon">
    <form action="code.php" method="post" enctype="multipart/form-data" class="needs-validation">        
    <div class="card text-center" id="card">
        <div class="card-header" id="resaddcardheader">
            Featured
        </div>
        <div class="card-body">
            <div id="semicon">
                <h5 class="card-title">Upload Thesis Soft Copy</h5>
                <div>
                    <label for="formFileLg" class="form-label">Large file input example</label>
                    <input class="form-control form-control-lg" id="preFileUpload" name = "preFileUpload" type="file">
                    <label id="status"></label>                                     
                </div>
                <div>
                <button class="btn btn-outline-primary" name="preUpload" id="preUpload">Submit File</button>  
                </div>
            </div>           
        </div>
        <div class="card-footer text-muted" id="resaddcardheader">
            
        </div>
    </div>
    </form>
</div>
<script>
    $('#preFileUpload').change(function(){
    var filename = $('#preFileUpload').val().replace(/C:\\fakepath\\/i, '')
    $.ajax({
        url: "code.php",
        method: "POST",
        data:{filename:filename},
        success: function(data){
            if(data > 0){
                //true(existing)
                $('#status').html("File Already Exist");
                $('#preUpload').attr('disabled', true);
            }else{
                //false(non-existing)
                $('#status').html("Ready to be Uploaded");
                $('#preUpload').attr('disabled', false);
            }
               
        }
        }); 
    });
</script>    
</body>
</html>