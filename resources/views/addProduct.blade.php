<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Add Product</title>
</head>

<body>

    <div style="margin:100px;">
        <h4 style="text-align: center;">Product form</h4>
        <form enctype="multipart/form-data" method="POST" action="">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description</span>
                </div>
                <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"></label>
                <input type="text" class="form-control" name="category" id="exampleInputPassword1" placeholder="Category">
            </div>

            <div class="custom-file form-group" id="imageDiv">

                <input type="file" name="picture" class="custom-file-input" onchange="validateImage(event)" id="image">
                <label class="custom-file-label" id="imageLabel" for="inputGroupFile01">Choose file</label>
            </div>
            <br>
            <div id="imgErrorDiv"></div>
            <!-- <img id="output"  alt="output" height="200" width="200" style="float: right;"> -->
            <br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script>
        var x = 1;

        function validateImage(event) {
            var imageDIv = document.getElementById("imageDiv");
            var imageName = document.getElementById("image");
            if (x == 2) {
                        document.getElementById('output').remove();
                        x = 1;
                    }
            var imageErrorDiv = document.getElementById("imgErrorDiv");
            imageErrorDiv.innerHTML = "";


            var imgPath = imageName.value;
            if (imgPath !== '') {
                var imgExtDot = imgPath.lastIndexOf(".") + 1;
                console.log(imgExtDot);
                var imgExt = imgPath.substr(imgExtDot, imgPath.length).toLowerCase();
                console.log(imgExt);

                if (imgExt == "jpg" || imgExt == "png" || imgExt == "jpeg") {
                    if (x == 2) {
                        document.getElementById('output').remove();
                        x = 1;
                    }

                    x = 2;
                    var output = document.createElement('img');
                    output.id = 'output';
                    output.height = 200;
                    output.width = 200;
                    output.style = "float:right";
                    output.src = URL.createObjectURL(event.target.files[0]);

                    document.getElementById("imageLabel").innerHTML = imageName.value;

                    imageDIv.after(output);
                } else {
                    imageErrorDiv.innerHTML = "Please Enter Image only";
                }

            } else {

            }




        }
    </script>

</body>

</html>
