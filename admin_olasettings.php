<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ola Response</title>
    <!-- Manual CSS -->
    <style type="text/css">
        #imgicon {
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }

        #admincardheader {
            background-color: #1C5090;
            font-weight: bold;
            font-size: 20px;
            color: white;
            text-align: center;
            text-transform: uppercase;
        }
        #headerlbl {
            font-weight: bold;
            font-size: 20px;
            color: #1C5090;
            text-align: center;
            text-transform: uppercase;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="card" id="admincard">
        <div class="sticky-sm-top">
            <div class="card-header" id="admincardheader">
                OLA Response Setting
            </div>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="keywordstxtbox" id="headerlbl" class="form-label">Frequently asked question(FAQ)</label>
                    <input type="text" class="form-control" id="keywordstxtbox" aria-describedby="Input a statement">
                </div>
                <div class="mb-3">
                    <label for="responsetxt" id="headerlbl" class="form-label">Response</label><br>
                    <textarea class="form-control" id="responsetxt" aria-label="With textarea" style="height: 240px;"></textarea>
                </div>
            </form>
        </div>
</body>

</html>