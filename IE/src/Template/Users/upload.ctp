<html>
<head>
    <script src="https://unpkg.com/dropbox/dist/Dropbox-sdk.min.js"></script>
</head>
<body>
<h3>Welcome <strong><?= $this->request->session()->read('Auth.User.first_name')." ".$this->request->session()->read('Auth.User.last_name') ?></strong>! Use the dialog box to upload your documents.</h3>
<br>
<button class="btn btn-outline btn-primary" data-toggle="modal" data-target="#myModal">
    Instructions
</button>
<div class="uploads form large-9 medium-8 columns content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-0 input_form">
                <div class="work wow fadeInUp">
                    <h3 style="background-color:#337ab7; color:white;">
                        Upload your files here
                    </h3>
                    <p>
                    <form onSubmit="return uploadFile()">
                        <input type="file" id="file-upload" />
                        <br>
                        <button id="submitButton" type="submit">Submit</button>
                    </form>
                    </p>
                    <h5 id="results"></h5>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-0 input_form">
                <div class="work wow fadeInUp">
                    <h3 style="background-color:#337ab7; color:white;">
                        Uploaded file(s)
                    </h3>
                    <h4><span id="none1"></span></h4>
                    <h4 id="uploaded"></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4 col-md-offset-0 input_form" id ='showfile' style="display: none">
    <div class="work wow fadeInUp">
        <h3 style="background-color:#337ab7; color:white;">
            File you have in your folder
        </h3>
        <h4 id="filesInFolder"></h4>
    </div>
</div>
<!-- Popup Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">How to upload your files</h4>
            </div>
            <div class="modal-body">
                <p>
                    Step 1: Click on "Choose File"
                </p>
                <p>
                    Step 2: Select the files that your consultant requires you to upload for your visa application.
                </p>
                <p>
                    Step 3: Click submit and wait until the file is uploaded.
                </p>
                <p>
                    Step 4: The file uploaded successfully will be listed under uploaded files.
                </p>
                <p>
                    Step 4: To upload another file, repeat the instructions above.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->create(null) ?>
<?= $this->Form->button(__('Finish'),['id'=>'finishBtn']) ?>
<?= $this->Form->end() ?>
<script>
    $(document).ready(function(){
        event.preventDefault();
//        var none2 = document.getElementById('none2');
        var br = document.createElement("br");
        none1.appendChild(document.createTextNode("None"));
//        none2.appendChild(document.createTextNode("None"));
        var filesInFolder = document.getElementById('filesInFolder');
        var ACCESS_TOKEN = '8UAOxH2ahaAAAAAAAAAACP1D9Cn8SPxi-pUKfOHbu9YoEWxBykf9NVfzltcgcR3t';
        var dbx = new Dropbox({ accessToken: ACCESS_TOKEN });
        //get variable from controller method
        var path = <?php echo json_encode($str1); ?>;
        dbx.filesListFolder({path: path})
            .then(function(response) {
                //                displayFiles(response.entries);
                var files = response.entries;
                for  (var i = 0; i < files.length; i++){
                    filesInFolder.appendChild(document.createElement("strong"));
                    filesInFolder.appendChild(document.createTextNode(files[i].name));
                    filesInFolder.appendChild(document.createElement("br"));
                }
            })
            .catch(function(error) {
                console.error(error);
            });
        return false;
    });

    function uploadFile() {
        event.preventDefault();
        var ACCESS_TOKEN = '8UAOxH2ahaAAAAAAAAAACP1D9Cn8SPxi-pUKfOHbu9YoEWxBykf9NVfzltcgcR3t';
        var dbx = new Dropbox({ accessToken: ACCESS_TOKEN });
        var fileInput = document.getElementById('file-upload');
        var file = fileInput.files[0];
        var uploaded = document.getElementById('uploaded');
        var filesUploaded = uploaded.childNodes.length;

        //check with what we have in dropbox folder
        var filesInFolder = document.getElementById('filesInFolder');
        var filesInFolderLength = filesInFolder.childNodes.length;
        var cond=true;
        if (filesInFolderLength == 0 && filesUploaded==0 ){
            sendFile();
        }else{
            for (var i = 0; i < filesInFolder.childNodes.length; i++) {
                if (filesInFolder.childNodes[i].nodeValue == file.name) {
                    cond = false;
                }
            }
            if(cond) {
                for (var i = 0; i < uploaded.childNodes.length; i++) {
                    if (uploaded.childNodes[i].nodeValue == file.name) {
                        cond = false;
                    }
                }
            }
            if (!cond){
                if (confirm('Saving this file '+file.name+' will case overwriting. Do you want to continue?' )) {
                    sendFile();
                }else {
                }
            } else {
                sendFile();
            }
        }
        return false;
    }

    function sendFile(){
        event.preventDefault();
        var fileInput = document.getElementById('file-upload');
        var file = fileInput.files[0];
        var results = document.getElementById('results');
        results.textContent = '';
        var uploaded = document.getElementById('uploaded');
        var br = document.createElement("br");
        var error1 = document.getElementById('error');
        var ACCESS_TOKEN = '8UAOxH2ahaAAAAAAAAAACP1D9Cn8SPxi-pUKfOHbu9YoEWxBykf9NVfzltcgcR3t';
        var dbx = new Dropbox({ accessToken: ACCESS_TOKEN });
        results.appendChild(document.createTextNode('Please wait...'));
        var myVar = <?php echo json_encode($str1); ?>;
        dbx.filesUpload({path: myVar + file.name, contents: file})
            .then(function(response) {
                results.textContent =file.name+" uploaded!";
                var length = uploaded.childNodes.length;
                if (length === 0 ){
                    uploaded.appendChild(document.createTextNode(file.name));
                    uploaded.appendChild(br);
                }else{
                    var a=true;
                    for (var i = 0; i < length; i++) {
                        if(uploaded.childNodes[i].nodeValue == file.name){
                            a=false;
                        }
                    }
                    if (a){
                        uploaded.appendChild(document.createTextNode(file.name));
                        uploaded.appendChild(br);
                    }
                }
                $('#none1').hide();
            })
            .catch(function(error) {
                results.appendChild(document.createTextNode('File can\'t be uploaded, please try again'));
            });
        return false;
    }
</script>
</body>

</html>