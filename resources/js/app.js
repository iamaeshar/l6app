require('./bootstrap');
require('tinymce/themes/silver');
require('tinymce/plugins/image');
require('tinymce/plugins/code');
import tinymce from 'tinymce';
import Axios from 'axios';
tinymce.init({
    plugins: 'code image',
    selector: 'textarea#content',
    height: 400,
    image_title: true,
    /* we override default upload handler to simulate successful upload*/
    images_upload_handler: function(blobInfo, success, failure) {
        let formData = new FormData();
        formData.append('file', blobInfo.blob());
        Axios.post('/admin/upload', formData).then(function(res) {
            success(res.data.location);
        });
    }
});