<html>
<head>
    <script src="https://unpkg.com/dropbox/dist/Dropbox-sdk.min.js"></script>
</head>
<body>
<h3>
    File(s) in this Customer's dropbox folder
</h3>
<div class="uploads form large-9 medium-8 columns content">
    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-0 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            List files
                        </h3>

                        <h4 id="files"></h4>
                        <!-- The files returned from the SDK will be added here -->
<!--                        <ul id="files"></ul>-->
<!--                        <ul id="readyToDownload"></ul>-->
                        <!-- The download button is added here -->
<!--                        <div id="results" style="margin-top: 30px"></div>-->
                        <!--                            </section>-->
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-0 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            Ready to Download
                        </h3>
                        <h4 id="readyToDownload"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts to run example -->
<script>
    $(document).ready(function(){
        event.preventDefault();
        var filesList = document.getElementById('files');
        var li;
        var ACCESS_TOKEN = '8UAOxH2ahaAAAAAAAAAACP1D9Cn8SPxi-pUKfOHbu9YoEWxBykf9NVfzltcgcR3t';
        var dbx = new Dropbox({ accessToken: ACCESS_TOKEN });
        //get variable from controller method
        var path = <?php echo json_encode($str1); ?>;
        dbx.filesListFolder({path: path})
            .then(function(response) {
                //                displayFiles(response.entries);
                var files = response.entries;
                for  (var i = 0; i < files.length; i++){
//                    li = document.createElement('li');
                    var downloadButton = document.createElement('button');
//                    downloadButton.onclick = download(files[i].name);
//                    downloadButton.setAttribute("onclick",download);
                    downloadButton.innerText = files[i].name;
                    downloadButton.setAttribute("id", files[i].name);
                    downloadButton.setAttribute("class", "clickedButton");
//                    li.appendChild(downloadButton);
                    filesList.appendChild(downloadButton);
                    filesList.appendChild(document.createElement("br"));
                    filesList.appendChild(document.createElement("br"));
//                    filesList.appendChild(li);
                }
            })
            .catch(function(error) {
                console.error(error);
            });
        return false;
    });

    $(document).on('click','.clickedButton',function(){
        event.preventDefault();
        download(this.id);
    });

    function download(filename) {
        event.preventDefault();
        var readyToDownload = document.getElementById('readyToDownload');
        var ACCESS_TOKEN = '8UAOxH2ahaAAAAAAAAAACP1D9Cn8SPxi-pUKfOHbu9YoEWxBykf9NVfzltcgcR3t';
        var dbx = new Dropbox({ accessToken: ACCESS_TOKEN });
        var str1 = (<?php echo json_encode($str1); ?>)+filename;
        dbx.filesDownload({path: str1})
            .then(function(data) {
//                li = document.createElement('li');
                var downloadUrl = URL.createObjectURL(data.fileBlob);
                var downloadButton = document.createElement('a');
                downloadButton.setAttribute('href', downloadUrl);
                downloadButton.setAttribute('download', data.name);
                downloadButton.setAttribute('class', 'button');
                downloadButton.innerText = 'Download: ' + data.name;
//                li.appendChild(downloadButton);
//                readyToDownload.appendChild(li);
                readyToDownload.appendChild(downloadButton);
                readyToDownload.appendChild(document.createElement("br"));
                readyToDownload.appendChild(document.createElement("br"));
            })
                .catch(function(error) {
                    console.error(error);
                });
    }

</script>
</body>
</html>