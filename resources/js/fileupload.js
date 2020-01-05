import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import { xsrf_token } from './helpers';

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

FilePond.registerPlugin(FilePondPluginImagePreview);

FilePond.setOptions({
    server: {
        url: '/images',
        headers: {
            'X-CSRF-TOKEN': xsrf_token()
        }
    },
});

FilePond.create(
    document.getElementById('pond-container')
);
