
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Converter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <style>
        /* Custom CSS styles can be placed here */
        .html {
            border: 1px solid #ccc;
            padding: 10px;
            height: 100%;
            overflow-y: auto;
        }
        /* Style for the source view */
        #source-view {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            white-space: pre-wrap; /* Preserve line breaks */
            overflow-wrap: break-word; /* Wrap long lines */
            background-color: #f9f9f9;
        }
        .circle-icon {
            border-radius: 50%;
            background-color: #000; /* Change this to whatever color you desire */
            padding: 10px; /* Adjust padding as needed */
            color: #fff; /* Change this to the desired icon color */
            font-size:26px;
        }
        #editor1 {
            height: 1900px!important;
        }
    </style>
</head>
<body>

<div class="container-fluid mt-4" style='margin:0 auto;'>
    <div class="row mx-auto">
        <div class="col mx-2" style='background-color:#276076!important;padding-bottom:2%;'>
            <h3 class='text-center' style='float:left;color: #efefef;font-weight: bold;text-align: right;font-style: italic;'>TEXT</h3><br>
            <div class='mt-4'>
                <textarea name="editor1" id="editor1" ></textarea>
            </div>
        </div>
        <div class="col" style='background-color:#276076!important;padding-bottom:2%;'>
            <h3 class='text-center mb-3' style='float:right;display: block;color: #efefef;font-weight: bold;text-align: right;line-height: 50px;font-style: italic;'>HTML  </h3>
            <div>
                <i class="fa fa-copy circle-icon" id="copy-html-btn"></i>
                <div id="source-view"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        CKEDITOR.replace('editor1');

        var editor = CKEDITOR.instances.editor1;

        editor.on('change', function() {
            console.log("Editor content changed.");
            updateSourceView();
        });

        function updateSourceView() {
            var content = editor.getData();
            var sourceView = document.getElementById('source-view');
            if (content.trim() != '') {
                sourceView.innerText = content;
            } else {
                sourceView.innerText = "Content not available.";
            }
            autoResizeTextarea(); // Call auto resize function after updating content
        }

        function copyHtmlContent() {
            var sourceView = document.getElementById('source-view');
            var range = document.createRange();
            range.selectNode(sourceView);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand("copy");
            window.getSelection().removeAllRanges();
            alert("HTML content copied!");
        }

        $('#copy-html-btn').click(function() {
            copyHtmlContent();
        });

        // Update source view on page load
        updateSourceView();
    });
    

</script>
 
</body>
</html>
